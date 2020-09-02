<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>LOGIN FORM</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .form_bg {
                background: -moz-radial-gradient(#9be15d, #00e3ae);
                background: -webkit-radial-gradient(#9be15d, #00e3ae);
                background: radial-gradient(#9be15d, #00e3ae);
                height: 100vh;
                display: flex;
                align-items: center;
                /* filter: opacity(90%); */
            }
            .form_horizontal {
                text-align: center;
            }
            .form_horizontal .form_icon {
                color: #fff;
                font-size: 120px;
                line-height: 85px;
                margin: 0 0 13px;
            }
            .form_horizontal .title {
                color: #fff;
                font-size: 30px;
                font-weight: 700;
                letter-spacing: 1px;
                text-transform: uppercase;
                margin: 0 0 35px 0;
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
                font-size: 13px;
                color: #777;
            }
            .form_horizontal .form-control {
                color: #555;
                background-color: #fff;
                font-size: 18px;
                letter-spacing: 1px;
                height: 37px;
                padding: 3px 15px 3px 35px;
                border: none;
                border-radius: 50px;
            }
            .form_horizontal .form-control::placeholder {
                color: rgba(0, 0, 0, 0.7);
                font-size: 14px;
                text-transform: capitalize;
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
        </style>
    </head>
    <body>
        <div class="form_bg">
            <div class="container">
                <div class="row">
                    <div class="offset-md-4 col-md-4 offset-sm-3 col-sm-6">
                        <form class="form_horizontal" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form_icon">
                                <i class="fa fa-user-circle"></i>
                            </div>
                            <h3 class="title">ログインフォーム</h3>

                            <div class="form-group">
                                <span class="input-icon"><i class="fas fa-at"></i></span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="パスワード">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="#"><input class="btn signin w-50" type="submit" value="ロ グ イ ン"></a>
                            <ul class="form-options">
                                <li><a href="{{ route('password.request') }}">パスワードを忘れた場合</a></li>
                                <li><a href="/register">新しくアカウントを作る<i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>