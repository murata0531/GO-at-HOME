<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <style>
            /* header部分ここから↓ */
            .box1 {
                background-color: #00AC97;
                background: -webkit-gradient(linear, left top, left bottom, from(#ddd), to(#00AC97));
                background: linear-gradient(to bottom, #ddd, #00AC97);
                background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 172, 151, 0.5)), to(rgba(0, 163, 129, 0.7)));
                background: linear-gradient(to bottom, rgba(0, 172, 151, 0.5), rgba(0, 163, 129, 0.7));
                height: 80px;
            }
            .box1 .title {
                color: #fff;
                padding: 0;
                margin: 0;
                font-family: 'Alegreya Sans SC', sans-serif;
            }
            /* header部分ここまで↑ */
            /* menu(左の画面)部分ここから↓ */
            .box2 {
                height: calc(100vh - 80px);
                border-right: 1px solid #777;
                overflow-y: scroll;
                -ms-overflow-style: none;
            }
            .box2::-webkit-scrollbar {
                display: none;
            }
            .box2 .user_name {
                background-color: transparent;
                font-size: 18px;
                outline: none;
                border: 0;
                border-bottom: 1px solid #444;
                color: #777;
            }
            .box2 .room-setting {
                font-size: x-large;
                color: #444;
            }
            .box2 .form-group {
                margin: 0 auto 10px;
                position: relative;
            }
            .box2 .form-group .form-control {
                color: #555;
                background-color: #f5f5f5;
                font-size: 18px;
                letter-spacing: 1px;
                height: 37px;
                padding: 2px 35px 2px 15px;
                border: none;
                border-radius: 50px;
            }
            .box2 .form-group .form-control:focus {
                border: none;
                outline: none;
            }
            .box2 .form-group .input-icon {
                color: #777;
                position: absolute;
                right: 15px;
                top: 20px;
                -webkit-transform: translateY(-50%);
                        transform: translateY(-50%);
                font-size: 15px;
            }
            .box2 .menu {
                max-width: 100;
            }
            .box2 .menu label {
                display: block;
                margin: 0;
                padding: 10px;
                line-height: 1;
                color: #fff;
                background: #00AC97;
                cursor: pointer;
            }
            .box2 .menu input {
                display: none;
            }
            .box2 .menu #menu_bar01:checked ~ #list01 li,
            .box2 .menu #menu_bar02:checked ~ #list02 li {
                height: 50px;
                opacity: 1;
            }
            .box2 .menu ul {
                margin: 0;
                padding: 0;
                background: #f4f4f4;
                list-style: none;
            }
            .box2 .menu ul li {
                height: 0;
                overflow: hidden;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .box2 .menu a {
                display: block;
                padding: 15px;
                text-decoration: none;
                color: #000;
            }
            /* ログアウトのデザイン */
            .box2 a:link, a:visited, a:hover, a:active {
                color: #555;
            }
            /* /ログアウトのデザイン */
            
            /* menu(左の画面)部分ここまで↑ */
            /* subheader部分ここから↓ */
            .box4 {
                height: 50px;
                border-bottom: 1px solid #777;
                /* box4のバックカラー */
                background-color: #f5f5f5;
                /* /box4のバックカラー */
                font-family: "Hannari";
                font-size:large;
                color:#fff;
            }
            #home-box4 {
                background-color:#33ab61;
                
            }
            #private-box4 {
                background-color: #337dab;
            }
            #user-setting-box4{
                background-color:#777777;
            }
            .box4 .setting {
                height: 100%;
                font-size: large;
            }
            
            /* subheader部分ここまで↑ */
            /* 会話部分ここから↓ */
            .box5 {
                height: calc(100vh - 190px);
                overflow-y: scroll;
                -ms-overflow-style: none;
            }
            
            .box5::-webkit-scrollbar {
                display: none;
            }
            .box5 .user-setting  {
                overflow-y:scroll;
                -ms-overflow-style:none;
            }
            .box5 .user-setting::-webkit-scrollbar {
                display:none;
            }
            .box5 .messageLine {
                overflow: auto;
                border-right: 1px solid #555;
                border-left: 1px solid #555;
            }
            .box5 .opponent {
                float: left;
                line-height: 1.3em;
            }
            .box5 .opponent .message_box {
                max-width: 100%;
                font-size: 17px;
                background: #fff;
                border: 1px solid #999;
                border-radius: 0px 30px 30px 30px;
                margin-left: 50px;
            }
            .box5 .myself {
                float: right;
                line-height: 1.3em;
            }
            .box5 .myself .message_box {
                max-width: 100%;
                font-size: 17px;
                background: #fff;
                border: 1px solid #999;
                border-radius: 30px 0px 30px 30px;
                margin-right: 50px;
            }
            .box5 .faceicon {
                line-height: 1.3em;
            }
            .box5 .clear {
                clear: both;
            }
            #setting-sub {
                background-color: #00AC97;
            }
            #review table{
                position: fixed;
                /*基準を画面の左上に*/
                top: 60%;
                left: 40%;
                width:200px;
                height:auto;
                margin:0;
            }
            
            #review img {
                object-fit: cover;
                width: 200px;
            }
            #review input {
                text-align:center;
                width:100%;
            }
            .box5 #send {
                position: absolute;
                bottom: 0;
                background-color: #eee;
                border: 1px solid #ddd;
            }
            .box5 #exampleFormControlTextarea1 {
                line-height: 18px;
                height: 60px;
                width: 800px;
                border: 1px solid #ccc;
                border-radius: 5px;
                -webkit-box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.2) inset;
                box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.2) inset;
            }
            /* 会話部分ここまで↑ */
            /* 会話送信部分ここから↓ */
            .box5 #btn1 {
                height: 50px;
                font-size: 30px;
                margin: 0;
                background-color: #9370db;
                border: 1px solid #bbb;
                border-radius: 5px;
            }
            .box5 i {
                color: #fff;
            }
            .box5 #btn2 {
                display:none; /* アップロードボタンのスタイルを無効にする */
            }
            .box5 #avatar {
                height: 50px;
                font-size: 30px;
                margin: 0;
                background-color: #1e90ff;
                border: 1px solid #bbb;
                border-radius: 5px;
            }
            .box5 #btn3 {
                height: 50px;
                font-size: 30px;
                margin: 0px;
                background-color: gray;
                border: 1px solid #bbb;
                border-radius: 5px;
            }
            /* 会話送信部分ここまで↑ */
            
            .box5 a:link, a:visited, a:hover, a:active {
                color: #fff;
            }}
            .vali {
                color:red;
                font-weight:bold;
            }
        </style>
        
        <title>go @ home</title>

        <!-- ここにアプリのscriptタグを貼り付けます。 -->

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
            https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-analytics.js"></script>

        <script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-storage.js"></script>
        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyCov15JIexxNYYD1atR213t_rREKImqCDE",
                authDomain: "chat-1b8c5.firebaseapp.com",
                databaseURL: "https://chat-1b8c5.firebaseio.com",
                projectId: "chat-1b8c5",
                storageBucket: "chat-1b8c5.appspot.com",
                messagingSenderId: "671003935191",
                appId: "1:671003935191:web:1ec022df476d8950c94b92",
                measurementId: "G-46Q0C6NENN"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();
        </script>
        
    </head>
    <body>
        
    <div class="container-fluid">
            <!-- {{-- header部分ここから↓ --}} -->
            <div class="header row">
                <div class="box1 col-lg d-flex align-items-center justify-content-center">
                    <h1 class="title text-monospace">GO @ HOME</h1>
                </div>
            </div>
            <!-- {{-- header部分ここまで↑ --}} -->
            <div class="main row">
                <!-- {{-- menu(左の画面)部分ここから↓ --}} -->
                <div class="box2 col-3 p-0">
                    <div class="d-flex justify-content-center">
                        <div class="p-2">
                            <img src="{{ asset($user->user_icon) }}" width="70" height="70" class="rounded-circle align-middle img-responsive">
                        </div>
                        <div class="py-2 d-flex align-items-center">
                            <a href="#">
                                <input class="user_name align-middle font-weight-bold text-center" type="text" size="13px" value="{{$user->name}}" readonly>
                            </a>
                        </div>
                        <div class="p-2 d-flex align-items-center">
                            <a href="/home/usersetting"><i class="room-setting fas fa-user-cog p-2"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" size="23" placeholder="グループ名・名前を入力">
                        <span class="input-icon"><i class="fas fa-search"></i></span>
                    </div>
                    <div class="menu">
                        <label for="menu_bar01"><i class="fa fa-users pr-2"></i>グループ<i class="fas fa-angle-down float-right"></i></label>
                        <input type="checkbox" id="menu_bar01" class="accordion" />
                        <ul id="list01">
                        @foreach($family as $e)
                            <li><a href="/home/?familyid={{$e->id}}&userid={{$user->id}}&familyname={{$e->family_name}}">{{$e->family_name}}</a></li>
                        @endforeach
                        </ul>
                        <label for="menu_bar02"><i class="fas fa-user pr-2"></i>家族<i class="fas fa-angle-down float-right"></i></label>
                        <input type="checkbox" id="menu_bar02" class="accordion" />
                        <ul id="list02">
                        @foreach($family_user as $e)
                            <li><a href="/home/private?privateid={{$e->id}}&privatename={{$e->name}}&privateicon={{$e->user_icon}}">{{$e->name}}</a></li>
                        @endforeach
                        </ul>
                        <label for="menu_bar03"><i class="fas fa-folder pr-2"></i>共有<i class="fas fa-share float-right"></i></label>
                        <a href="#"><input type="button" id="menu_bar03" class="accordion" /></a>
                        <div class="py-2 d-flex align-items-center text-center">
                        <form method="post" name="form1" action="{{route('logout')}}">
                        @csrf
                            <a href="javascript:form1.submit()" class="logout"><i class="fas fa-user-circle p-2">ログアウト</i></a>
                        </form>
                            
                        </div>
                    </div>  
                    
                </div>
                <!-- {{-- menu(左の画面)部分ここまで↑ --}} -->
                <div class="box3 col-9 p-0">
                      
                    <!-- react埋め込み -->
                    <div id = "app"></div>

                </div>
            </div>
        <script>
            
            var name = @json($user->name);
            var icon = @json($user->user_icon);
            var user_id = @json($user->id);
            var first_family = @json($first_family);
            var family_user = @json($family_user);
            var user = @json($user);
            
            var setting_name = @json($errors->first('setting_name'));
            var setting_email = @json($errors->first('setting_email'));
            
            var setting_pass = @json($errors->first('setting_password'));
            var setting_pass2 = @json($errors->first('setting_password2'));
           var oldname = @json(old('setting_name'));
           var oldemail = @json(old('setting_email'));
           
            function func2(){
                
                let btn2 = document.getElementById('btn2');
                let btn3 = document.getElementById('btn3');
                let tu = document.getElementById('review');
                let exampleFormControlTextarea1 = document.getElementById('exampleFormControlTextarea1');
                tu.innerHTML = '';
                btn2.value = '';
                if(exampleFormControlTextarea1.value == ''){
                    btn3.disabled = "disabled";
                    btn3.style.backgroundColor = "gray";
                }
                alert(btn2.files.length);
            }
            
        </script>

        
        <script src="{{asset('/js/app.js')}}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        
    </body>
</html>