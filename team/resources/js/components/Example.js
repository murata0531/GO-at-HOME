import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    
    return (
        
        <div class="container-fluid">
            <div class="row">
                <div class="box1 col-2 text-center p-2">
                    <div>
                        <h1>M E N U</h1>
                        <br></br>
                        <br></br>
                        <div class="btn-group-vertical">
                        <button type="button" class="btn btn-group-lg btn-secondary border-0 p-3"><strong>ログイン</strong></button>
                        <button type="button" class="btn btn-group-lg btn-secondary border-0 p-3"><strong>マイページ</strong></button>
                        <div class="btn-group dropright">
                            <button type="button" class="btn dropdown-toggle btn-secondary border-0 p-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>カテゴリー</strong></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">PC関連</a>
                                <a class="dropdown-item" href="#">家電</a>
                                <a class="dropdown-item" href="#">電化製品</a>
                                <a class="dropdown-item" href="#">ダイエット器具</a>

                                <div class="box2 col-10">
                                    <form class="form-inline">
                                        <div class="input-group w-50 mx-auto p-2">
                                            <input class="form-control badge-pill" type="search" placeholder="比較したいものを入力"></input>
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary rounded-pill" type="submit"><i class="fas fa-search"></i></button>
                                            </span>
                                            
                                        </div>
                                    </form>
                                    <div class="card-columns p-2">
                                        <div class="card border-0 rounded">
                                            <img src="/img/img_1.jpeg" class="card-img img-thumbnail p-2" alt="インテリ"></img>
                                            <div class="card border-0 rounded">
                                            <img src="img/img_3.jpg" class="card-img img-thumbnail p-2" alt="インテリ"></img>

                                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
            
        
    );
}


export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
