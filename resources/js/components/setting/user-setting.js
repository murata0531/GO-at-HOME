import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class UserSetting extends React.Component {

    render() {

        return (
            <div>

                <div className="box4 col-lg" id="user-setting-box4">
                    <div className="container">
                        <div className="d-flex align-items-center justify-content-between p-0">
                            <div className="subname p-2 font-weight-bold">ユーザの設定・変更</div>
                            <div className="p-2 font-weight-bold"><i className="setting fas fa-cog"></i></div>
                        </div>
                    </div>
                </div>
                <div className="box5 mt-4 mx-4">
                    <div className="class col-8 mx-auto">
                        <form class="user-setting">
                            <h4 class="name font-weight-bold">ユーザー設定</h4>
                            <div className="form-group">
                                <label htmlFor="exampleInputId">ユーザーID : </label>
                                <p class="text-monospace">{user.id}</p>
                            </div>
                            <div class="form-group">
                                <label htmlFor="exampleInputIcon">アイコン : </label>
                                <img src={icon} width="70" height="70" className="rounded-circle align-middle img-responsive"></img>
                            </div>
                            <div class="form-group mt-3">
                                <label htmlFor="exampleInputName">名前 : </label>
                                <input type="text" className="form-control" id="exampleInputName1" placeholder={user.name} readOnly></input>
                                <Link to="/home/usernamesetting">
                                    <button className="btn btn-primary float-right border-0 mt-2" id="setting-sub">変更する</button>
                                </Link>
                                </div>
                            <div class="form-group mt-5">
                                <label htmlFor="exampleInputEmail">メールアドレス : </label>
                                <input type="email" className="form-control" id="exampleInputEmail1" placeholder={user.email} readOnly></input>
                                <Link to="/home/useremailsetting">
                                    <button className="btn btn-primary float-right border-0 mt-2" id="setting-sub">変更する</button>
                                </Link>
                            </div>
                            <div class="form-group mt-5">
                                <label htmlFor="exampleInputPassword">パスワード : </label>
                                <input type="password" className="form-control" id="exampleInputPassword1" readOnly></input>
                                <Link to="/home/userpasswordsetting">
                                    <button className="btn btn-primary float-right border-0 mt-2" id="setting-sub">変更する</button>
                                </Link>
                            </div>
                        </form>
                        <a href="/home/"><button className="btn btn-primary float-left bg-secondary border-0">戻る</button></a>
                    </div>
                </div>
            </div>
        )
    }
}