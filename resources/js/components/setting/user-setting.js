import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class UserSetting extends React.Component {

    render() {

        return (

            <div>

                <div class="box4 col-lg">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between p-0">
                            <div class="subname p-2 font-weight-bold">グループの設定・変更</div>
                            <div class="p-2 font-weight-bold"><i class="setting fas fa-cog"></i></div>
                        </div>
                    </div>
                </div>
                <div class="box5 mt-4 mx-4">
                    <div class="class col-8 mx-auto">
                        <form class="user-setting" method="post" className="user-setting" encType="multipart/form-data">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"').getAttribute('content')} />

                            <h4 class="name font-weight-bold">ユーザー設定</h4>
                            <div class="form-group">
                                <label for="exampleInputId">ユーザーID : </label>
                                <p class="text-monospace">111111</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputIcon">アイコン : </label>
                                <img src="img/user_red.png" width="70" height="70" class="rounded-circle align-middle img-responsive"></img>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">名前 : </label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="サザエ" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">メールアドレス : </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="sazae@sazae.com" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">パスワード : </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" readonly></input>
                            </div>
                            <a href="#"><button type="submit" class="btn btn-primary float-left bg-secondary border-0">戻る</button></a>
                            <a href="#"><button type="submit" class="btn btn-primary float-right border-0" style="background-color: #00AC97;">変更する</button></a>
                        </form>
                    </div>
                </div>
            </div>
        )
    }
}