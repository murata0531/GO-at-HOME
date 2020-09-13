<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント新規作成</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                background: -moz-radial-gradient(#CBBACC, #2580B3);
                background: -webkit-radial-gradient(#CBBACC, #2580B3);
                background: radial-gradient(#CBBACC, #2580B3);
            }
            
            .form_bg {
                background: -moz-radial-gradient(#CBBACC, #2580B3);
                background: -webkit-radial-gradient(#CBBACC, #2580B3);
                background: radial-gradient(#CBBACC, #2580B3);
                height: 100vh;
                padding-top:80px;
                align-items: center;
            }
            .form_horizontal {
                text-align: center;
            }
            .form_horizontal .form_icon {
                color: #fff;
                font-size: 100px;
                line-height: 85px;
                margin: 0 0 13px;
            }
            .form_horizontal .title {
                color: #fff;
                font-size: 23px;
                font-weight: 700;
                letter-spacing: 1px;
                text-transform: uppercase;
                margin: 15px;
            }
            .form_horizontal .form-check-label {
                margin-bottom: 10px;
                font-size: 20px;
                font-weight: bolder;
                color: #fff;
            }
            .form_horizontal .form-check-inline .form-check-input {
                margin-bottom: 10px;
                width: 15px;
                height: 15px;
            }
            .form_horizontal .form-group {
                margin: 0 auto 10px;
                position: relative;
            }
            .form_horizontal .input-icon {
                position: absolute;
                left: 15px;
                top: 20px;
                transform: translateY(-50%);
                font-size: 15px;
                color: #777;
            }
            .form_horizontal .form-control {
                color: #555;
                background-color: #fff;
                font-size: 18px;
                letter-spacing: 1px;
                height: 37px;
                padding: 2px 15px 2px 35px;
                border: none;
                border-radius: 50px;
            }
            .form_horizontal .form-control::placeholder {
                color: rgba(0, 0, 0, 0.7);
                font-size: 14px;
                text-transform: capitalize;
            }
            .form_horizontal .relationship {
                color: #555;
                background-color: #fff;
                font-size: 18px;
                letter-spacing: 1px;
                height: 37px;
                padding: 2px 15px 2px 35px;
                /* margin: 0 auto 0; */
                outline: none;
                border: none;
                border-radius: 50px;
            }
            .form_horizontal .fami {
                color: #555;
                background-color: #fff;
                font-size: 18px;
                letter-spacing: 1px;
                height: 37px;
                padding: 2px 15px 2px 35px;
                outline: none;
                border: 1px green;
                border-radius: 50px;
            }
            .form_horizontal .btn {
                color: #fff;
                background-color: #222;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: 1px;
                width: 100%;
                padding: 10px 20px;
                margin: 0 0 15px 0;
                border: none;
                border-radius: 20px;
                text-transform: uppercase;
            }
            .btn:hover {
                background-color: #444;
            }
            .form_horizontal .form-options {
                color: #fff;
                margin: 0;
                padding: 0;
                list-style: none;
                font-weight: bold;
                
            }
            .form_horizontal .form-options li a {
                letter-spacing: 1px;
                margin: 0 0 10px;
                display: block;
                color
            }
            a:link, a:visited, a:hover, a:active {
                color: #fff;
            }
            .form_horizontal .form-options li a i {
                font-size: 14px;
            }
            #helpbutton {
                background-color: transparent;
                border: none;
                cursor: pointer;
                outline: none;
            }
        
            #overlay {
                display: none;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                z-index: 9;
                background-color: rgba(0, 0, 0, .65);
            }
            #modal {
                display: none;
                position: fixed;
                left: 50%;
                top: 50%;
                z-index: 99;
                transform: translate(-50%, -50%);
                max-width: 70vw;
                max-height: 70vh;
                box-sizing: border-box;
                padding: 32px;
                border-radius: 8px;
                background-color: #fff;
                text-align:left;
            }
            .active {
                display: block !important;
            }
        </style>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="form_bg">
            <div class="container">
                <div class="row">
                    <div class="offset-md-4 col-md-4 offset-sm-3 col-sm-6">
                        <form class="form_horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form_icon">
                                <i class="fas fa-house-user"></i>
                            </div>
                            <h3 class="title">新規アカウント登録</h3>

                            <input type="hidden" name="count" value="0" id="hideCounter">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"  onclick="change1();" {{ old('inlineRadioOptions','option1') == 'option1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">新規家族追加</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="change1();" {{ old('inlineRadioOptions') == 'option2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">既存の家族に入る</label>
                            </div>

                            <!-- {{-- radiobottonで新規家族追加押された場合 --}} -->
                            <div id="tsuika">
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-home"></i></span>
                                    <input class="form-control @error('family-name') is-invalid @enderror" type="text" name="family-name" value="{{ old('family-name') }}" placeholder="家族名">
                                    @error('family-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- {{-- radiobottonで既存の家族に入るを押された場合 --}} -->
                            <div id="kizon">
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-home"></i></span>
                                    <input class="form-control @error('family-id') is-invalid @enderror" type="text" name="family-id" value="{{ old('family-id') }}" placeholder="家族IDを入力してください">
                                    @error('family-id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="button" id="helpbutton"><i class="far fa-question-circle"></i></button>
                            <div id="modal">
                                <p><span style="font-weight:bold;">【新規家族追加】</span>を選択した場合、新しく家族を作成することができます</p>
                                <p><span style="font-weight:bold;">【既存の家族に入る】</span>を選択した場合、すでに登録してある家族に入ることができます</p>
                                
                                <p style="color:red;font-weight:bold;">※家族IDは家族ルームの【設定】項目から確認することができます</p>

                                <p></p>
                                <div>
                                    <button id="close">閉じる</button>
                                </div>
                            </div>
                            <div id="overlay"></div>

                            <!-- ここから動的部品 -->

                            @empty(old('name'))
                            <div class="form-block" id="form_block[0]">
                            
                                <h3 class="title" style="color:#CC0000;">家族</h3>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input class="form-control @error('name.0') is-invalid @enderror" name="name[]" id="name[]" value="{{ old('name.0') }}" type="text"  placeholder="なまえ" required>
                                    @error('name.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-at"></i></span>
                                    <input class="form-control @error('email.0') is-invalid @enderror" type="email" name="email[]" id="email[]" value="{{ old('email.0') }}" placeholder="メールアドレス" required>
                                    @error('email.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control @error('password.0') is-invalid @enderror" type="password" name="password[]" id="password[]" placeholder="パスワード(8文字以上で入力してください)" required>
                                    @error('password.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control @error('password_confirmation.0') is-invalid @enderror" type="password" name="password_confirmation[]" id="password_confirmation[]" placeholder="パスワード再入力" required>
                                    @error('password_confirmation.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-users"></i></span>
                                    <select class="relationship w-100  @error('relations.0') is-invalid @enderror" name="relations[]" id="relations[]" required>
                                        <option selected disabled="disabled"value="no">続柄</option>
                                        <option value="father">父</option>
                                        <option value="mother">母</option>
                                        <option value="son">息子</option>
                                        <option value="daughter">娘</option>
                                        <option value="grandpa">祖父</option>
                                        <option value="grandmo">祖母</option>
                                    </select>
                                    @error('relations.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-group"id="fclose" style="display: none;">
                                    <span class="input-icon"><i class="fas fa-user-minus"></i></span>
                                    <button class="fami btn-primary btn-outline-success w-100"  id="deletekazoku">削除</button>
                                </div>

                            </div>

                            <div class="form-group">
                                <span class="input-icon"><i class="fas fa-user-plus"></i></span>
                                <input class="fami btn-primary btn-outline-success w-100" type="button" value="家族追加" id="kazoku">
                            </div>

                            @else
                            @foreach(old('name') as $key => $value)
                            <div class="form-block" id="form_block[{{$key}}]">
                            
                                <h3 class="title" style="color:#CC0000;">家族</h3>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input class='form-control @error("name.$key") is-invalid @enderror' name="name[]" id="name[]" value='{{ old("name.$key") }}' type="text"  placeholder="なまえ" required>
                                    @error("name.$key")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-at"></i></span>
                                    <input class='form-control @error("email.$key") is-invalid @enderror' type="email" name="email[]" id="email[]" value='{{ old("email.$key") }}' placeholder="メールアドレス" required>
                                    @error("email.$key")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class='form-control @error("password.$key") is-invalid @enderror' type="password" name="password[]" id="password[]" placeholder="パスワード(8文字以上で入力してください)" required>
                                    @error("password.$key")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class='form-control @error("password_confirmation.$key") is-invalid @enderror' type="password" name="password_confirmation[]" id="password_confirmation[]" placeholder="パスワード再入力" required>
                                    @error("password_confirmation.$key")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-users"></i></span>
                                    <select class='relationship w-100  @error("relations.$key") is-invalid @enderror' name="relations[]" id="relations[]" required>
                                        <option disabled="disabled"value="0" {{ (old("relations.$key","0") == '0') ? "selected":"" }}>続柄を選択してください</option>
                                        <option value="1" name="relations[]" {{ (old("relations.$key") == '1') ? "selected":"" }}>父</option>
                                        <option value="2" name="relations[]" {{ (old("relations.$key") == '2') ? "selected":"" }}>母</option>
                                        <option value="3" name="relations[]" {{ (old("relations.$key") == '3') ? "selected":"" }}>息子</option>
                                        <option value="4" name="relations[]" {{ (old("relations.$key") == '4') ? "selected":"" }}>娘</option>
                                        <option value="5" name="relations[]" {{ (old("relations.$key") == '5') ? "selected":"" }}>祖父</option>
                                        <option value="6" name="relations[]" {{ (old("relations.$key") == '6') ? "selected":"" }}>祖母</option>
                                    </select>
                                    @error("relations.$key")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <hr>

                                @if($key == 0)
                                <div class="form-group"id="fclose" style="display: none;">
                                    <span class="input-icon"><i class="fas fa-user-minus"></i></span>
                                    <button class="fami btn-primary btn-outline-success w-100"  id="deletekazoku">削除</button>
                                </div>
                                @elseif($key != 0)
                                <div class="form-group"id="fclose">
                                    <span class="input-icon"><i class="fas fa-user-minus"></i></span>
                                    <button class="fami btn-primary btn-outline-success w-100"  id="deletekazoku">削除</button>
                                </div>
                                @endif

                                <div class="form-group">
                                    <span class="input-icon"><i class="fas fa-user-plus"></i></span>
                                    <button class="fami btn-primary btn-outline-success w-100" id="kazoku">家族追加</button>
                                </div>
                            </div>

                            @endforeach
                            @endempty
                            <br>

                            <input class="btn signin w-50" type="submit" value="登 録">
                            <ul class="form-options">
                                <li><a href="/login">アカウントをお持ちの方はこちら<i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var count = document.getElementById('hideCounter');
            const familyAdd = document.getElementById("familyAdd");
           
            $(document).ready(function() {
                $("#helpbutton").on("click", function(e) {
                    e.preventDefault();
                    $("#overlay, #modal").addClass("active");

                    $("#close, #overlay").on("click", function() {
                        $("#overlay, #modal").removeClass("active");
                        return false;
                    });
                });
            });
            $(function(){
                // フォームカウント
                var frm_cnt = 0;
                    // clone object
                $(document).on('click', '#kazoku', function() {
                    var original = $('#form_block\\[' + frm_cnt + '\\]');
                    var originCnt = frm_cnt;
                    
                    frm_cnt++;
                    alert("a");
                    original
                    .clone()
                    .hide()
                    .insertAfter(original)
                    .attr('id', 'form_block[' + frm_cnt + ']') // クローンのid属性を変更。
                    .end() // 一度適用する
                    .find('input, textarea').each(function(idx, obj) {
                        $(obj).val('');
                    });
                    // clone取得
                    var clone = $('#form_block\\[' + frm_cnt + '\\]');
                    clone.children('#fclose').show();
                    clone.slideDown('slow');
                });
                    // close object
                    $(document).on('click', '#fclose', function() {
                    var removeObj = $(this).parent();
                    removeObj.fadeOut('fast', function() {
                    removeObj.remove();
                    // 番号振り直し
                    frm_cnt = 0;
                    $(".form-block[id^='form_block']").each(function(index, formObj) {
                        if ($(formObj).attr('id') != 'form_block[0]') {
                        frm_cnt++;
                        $(formObj)
                            .attr('id', 'form_block[' + frm_cnt + ']') // id属性を変更。
                            .find('input, select').each(function(idx, obj) {
                            $(obj).attr({
                            id: $(obj).attr('id').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']'),
                            });
                        });
                        }
                    });
                    });
                });
                });
            function change1() {
                radio = document.getElementsByName('inlineRadioOptions')
                if (radio[0].checked) {
                    document.getElementById('tsuika').style.display = "";
                    document.getElementById('kizon').style.display = "none";
                } else if (radio[1].checked) {
                    document.getElementById('tsuika').style.display = "none";
                    document.getElementById('kizon').style.display = "";
                }
            }
            window.onload = change1;
    </script>
    </body>
    
</html>