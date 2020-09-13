<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ビデオチャット</title>
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
    
    <style>

      html,body {
        background-color: black;
        height:100vh;
        margin:0;
      }
      video {
        background-color: black;
        width: 80%;
      }


      /* 相手画面 */
      .remote-stream {
        position:relative;
        width: 78.5%;
        margin:0 auto;
      }
      /* 自分画面 */
      .local-stream {
        position:absolute;
        width: 20%;
        top: 70%;
        left:80%;
      }
      .videoid{
        position:absolute;
        width: 10%;
        top: 10%;
        left:80%;
      }
      #js-call-trigger{
        border-radius:30px;
        background-color: #00FF00;
        width: 285px;
        height: 50px;
      }
      #js-close-trigger{
        border-radius:30px;
        background-color: #FF3333;
        width: 285px;
        height: 50px;
      }
      #js-remote-id{
        border-radius:30px;
        font-size: 25px;
      }
      #js-local-id, #text-id{
      color: white;
      font-size: 30px;
      }
      #clip{
        background-color: #FFCC66;
        width: 285px;
        height: 50px;
        border-radius:30px;
      }
      .btn-mouseover:hover + .mouseover__box{
            display: block;
        }
        .mouseover__box:hover{
          display: block;
        }
        .mouseover__box{
          display: none;
          position: absolute;
          z-index:1;
          left:30%;
          width: auto;
          padding-left: 15px;
          padding-right: 15px;
          padding-top:5px;
          vertical-align: middle;            
          font-size: 13px;
          background-color: #fff;
          border: 5px solid #ccc;
          box-sizing: border-box;
          text-align:center;
          border-radius: 10px;
        }

        button {
          cursor: pointer;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">

      <div class="p2p-media">
        <div class="remote-stream">
          <video id="js-remote-stream"></video>
        </div>
        <div class="local-stream">
          <video id="js-local-stream"></video>
        </div>
        <div class="videoid">
          <p id= "text-id">あなたのID<br><span id="js-local-id"></span></p>
          <input type="text" placeholder="ここに相手のIDを入力" id="js-remote-id">
          <button id = "clip" onclick="copy()" class="btn-mouseover"><i class="fas fa-clipboard-list"></i></button>
          <div class="mouseover__box" style="left:40%; top:130%;">
              <p>自分のIDをコピーする</p>
          </div>
          <button id="js-call-trigger"class=" btn-mouseover"><i class="fas fa-phone"></i></button>
          <div class="mouseover__box" style="left:40%; top:130%;">
              <p>通話する</p>
          </div>
          <button id="js-close-trigger" class=" btn-mouseover"><i class="fas fa-phone-slash"></i></button>
          <div class="mouseover__box" style="left:40%; top:130%;">
              <p>通話を切る</p>
          </div>
        </div>
      </div>
        <!--<p class="meta" id="js-meta"></p>-->
    </div>
    </div>
      
      <script src="//cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
      <script>window.__SKYWAY_KEY__ = ;</script>
      <script>
      const Peer = window.Peer;

      (async function main() {
        const localVideo = document.getElementById('js-local-stream');
        const localId = document.getElementById('js-local-id');
        const callTrigger = document.getElementById('js-call-trigger');
        const closeTrigger = document.getElementById('js-close-trigger');
        const remoteVideo = document.getElementById('js-remote-stream');
        const remoteId = document.getElementById('js-remote-id');
        //const meta = document.getElementById('js-meta');
        //const sdkSrc = document.querySelector('script[src*=skyway]');

        /*meta.innerText = `
          UA: ${navigator.userAgent}
          SDK: ${sdkSrc ? sdkSrc.src : 'unknown'}
        `.trim();*/

        const localStream = await navigator.mediaDevices
          .getUserMedia({
            audio: true,
            video: true,
          })
          .catch(console.error);

        // Render local stream
        localVideo.muted = true;
        localVideo.srcObject = localStream;
        localVideo.playsInline = true;
        await localVideo.play().catch(console.error);

        const peer = (window.peer = new Peer({
          key: window.__SKYWAY_KEY__,
          debug: 3,
        }));

        // Register caller handler
        callTrigger.addEventListener('click', () => {
          // Note that you need to ensure the peer has connected to signaling server
          // before using methods of peer instance.
          if (!peer.open) {
            return;
          }

          const mediaConnection = peer.call(remoteId.value, localStream);

          mediaConnection.on('stream', async stream => {
            // Render remote stream for caller
            remoteVideo.srcObject = stream;
            remoteVideo.playsInline = true;
            await remoteVideo.play().catch(console.error);
          });

          mediaConnection.once('close', () => {
            remoteVideo.srcObject.getTracks().forEach(track => track.stop());
            remoteVideo.srcObject = null;
          });

          closeTrigger.addEventListener('click', () => mediaConnection.close(true));
        });

        peer.once('open', id => (localId.textContent = id));

        // Register callee handler
        peer.on('call', mediaConnection => {
          mediaConnection.answer(localStream);

          mediaConnection.on('stream', async stream => {
            // Render remote stream for callee
            remoteVideo.srcObject = stream;
            remoteVideo.playsInline = true;
            await remoteVideo.play().catch(console.error);
          });

          mediaConnection.once('close', () => {
            remoteVideo.srcObject.getTracks().forEach(track => track.stop());
            remoteVideo.srcObject = null;
          });

          closeTrigger.addEventListener('click', () => mediaConnection.close(true));
        });

        peer.on('error', console.error);
      })();
        function copy() {
          var text = document.getElementById("js-local-id").innerText;
          var area = document.createElement("textarea");
          //p要素の内容をtextareaに記述
          area.textContent = text;

          //生成したものをdocumentに追加
          document.body.appendChild(area);
          area.select();
          document.execCommand("copy");
          document.body.removeChild(area);
          alert("IDをコピーしました。");
  }

    </script>
  </body>
</html>