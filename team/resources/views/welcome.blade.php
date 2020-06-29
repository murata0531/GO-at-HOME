<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
        
        <style>
            * {
                font-family: 'FontAwesome';
            }

            body {
                min-width :900px;
            }

            .box1 {
                background-color: #f5f5f5;
                top: 0;
                left: 0;
            }

            .box2 {
                background-color: #eeeeee;
                top: 0;
                right: 0;
            }

            .box2 .form-control {
                height: 40px;
                border-radius: 25px;
                outline: 0;
                border-color: #7fbfff;
                background: #eee;
            }

            .box2 .input-group-btn .btn {
                height: 40px;
                background: #7fbfff;
                color: #fff;
                border: none;
                outline: 0;
                border-radius: 0 25px 25px 0;
            }

            .box2 .input-group-btn .btn .fa-search {
                font-size: 20px;
            }

            .box2 .input-group-btn .btn .fa-search.hover {
                color: #888;
            }

            .box2 .card-columns .card img {
                -webkit-filter: opacity(80%);
                filter: opacity(80%);
            }

            .btn {
                background-color: #eeeeee;
                color: #20272B;
            }

            #view-box {
                position:relative;
            }

            .spa_main {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-right: -50%;
                transform: translate(-50%, -50%);
                background-color:rgba(255,255,255,0.5);
                height:100%;
                width:100%;
            }
        </style>
        
        <title>比較サイト</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="box1 col-2 text-center p-2">
                    <h1>M E N U</h1>
                    <br>
                    <br>
                    <div class="btn-group-vertical">
                        <button type="button" class="btn btn-group-lg btn-secondary border-0 p-3"><a href="/about"><strong>ログイン</strong></a></button>
                        <button type="button" class="btn btn-group-lg btn-secondary border-0 p-3"><strong>マイページ</strong></button>
                        <div class="btn-group dropright">
                            <button type="button" class="btn dropdown-toggle btn-secondary border-0 p-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>カテゴリー</strong></button>
                            <div class="dropdown-menu">
                                {{-- カテゴリをリンクで引っ張ってくる --}}
                                <a class="dropdown-item" href="#">PC関連</a>
                                <a class="dropdown-item" href="#">家電</a>
                                <a class="dropdown-item" href="#">電化製品</a>
                                <a class="dropdown-item" href="#">ダイエット器具</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box2 col-10">
                    <form class="form-inline">
                        <div class="input-group w-50 mx-auto p-2">
                            <input class="form-control badge-pill" type="search" placeholder="比較したいものを入力">
                            <span class="input-group-btn">
                                <button class="btn btn-primary rounded-pill" type="submit"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <div class="card-columns p-2" id="view-box">
                        <div class="card border-0 rounded">
                            <img src="/img/img_1.jpeg" class="card-img img-thumbnail p-2" alt="インテリ">
                        </div>
                        <div class="card border-0 rounded">
                            <img src="img/img_2.jpg" class="card-img img-thumbnail p-2" alt="ドライフラワー">
                        </div>
                        <div class="card border-0 rounded">
                            <img src="img/img_5.jpg" class="card-img img-thumbnail p-2" alt="家具">
                        </div>
                        <div class="card border-0 rounded">
                            <img src="img/img_6.jpeg" class="card-img img-thumbnail p-2" alt="電化">
                        </div>
                        <div class="card border-0 rounded">
                            <img src="img/img_4.jpg" class="card-img img-thumbnail p-2" alt="インテリ">
                        </div>
                        <div class="card border-0 rounded">
                            <img src="img/img_3.jpg" class="card-img img-thumbnail p-2" alt="インテリ">
                        </div>
                        <div>
                        <div id="app"></div>
                            <script src="{{ asset('js/app.js') }}" defer></script>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        
    </body>
</html>