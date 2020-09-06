import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class UserSetting extends React.Component {

    render() {

        return (

            <div>

                <div className="box4 col-lg">
                    <div className="container">
                        <div className="d-flex align-item-center justify-content-between p-0">
                            <div className="subname p-2 font-weight-bold">グループの設定・変更</div>
                            <div className="p-2 font-weight-bold"><i className="setting fas fa-cog"></i></div>
                        </div>
                    </div>
                </div>
                <div className="box5 mt-4 mx-4">
                    <div className="class col-8 mx-auto">
                        <form action="newaccount" method="post" className="user-setting" encType="multipart/form-data">

                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"').getAttribute('content')} />

                            <h4 className="name font-weight-bold">ユーザ設定</h4>
                            <div className="form-group">
                                <label for="exampleInputId">ユーザID : </label>
                                <p className="text-monospace">1</p>
                            </div>
                            <div className="form-group">
                                <label for="exampleInputIcon">アイコン : </label>
                                <img src="./icon/default.png" width="70" height="70" className="rounded-circle align-middle img-responsive"></img>
                            </div>
                            <div className="form-group">
                                <label for="exampleInputName1">名前 : </label>
                                <input type="text" className="form-controll" id="exampleInputName1" placeholder="111" readOnly></input>
                            </div>
                            <div className="form-group">
                                <label for="exampleInputEmail1">メールアドレス : </label>
                                <input type="text" className="form-controll" id="exampleInputEmail1" placeholder="email.com" readOnly></input>
                            </div>
                            <div className="form-group">
                                <label for="exampleInputPassword1">パスワード : </label>
                                <input type="text" className="form-controll" id="exampleInputPassword1" readOnly></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        )
    }
}