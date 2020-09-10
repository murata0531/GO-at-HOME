import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class UserEmailSetting extends React.Component {

    constructor(props) {
        super(props)
        this.state = { setting_name: user.name, setting_email: user.email, setting_password: '', setting_password2: '' } // stateのkey名とフォームのname属性を一致させる
        this.handleChange = this.handleChange.bind(this)
    }

    handleChange(e) {
        let name = e.target.name; // フォームのname属性を取得 
        this.setState({ [name]: e.target.value }) // name属性 = stateのkey名なのでstateに保存
    }

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
                        <form className="user-setting" method="post" action="/userupdate" encType="multipart/form-data">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"').getAttribute('content')} />

                            <h4 className="name font-weight-bold">ユーザー設定</h4>
                            <div className="form-group">
                                <label htmlFor="exampleInputId">ユーザーID : </label>
                                <p className="text-monospace">{user.id}</p>
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputIcon">アイコン : </label>
                                <img src={icon} width="70" height="70" className="rounded-circle align-middle img-responsive"></img>
                            </div>
                            
                            <div className="form-group">
                                <label htmlFor="exampleInputEmail">変更前のメールアドレス : </label>
                                <input type="email" className="form-control" value={user.email} placeholder="メールアドレス"  readOnly></input>
                            </div>
                            
                            <div className="form-group">
                                <label htmlFor="exampleInputEmail">変更後のメールアドレス : </label>
                                <input type="email" className="form-control" id="exampleInputEmail1" name="setting_email" onChange={this.handleChange} value={oldemail} placeholder="メールアドレス"  required></input>
                            </div>
                            <p className="vali">{setting_email}</p>

                           
                            <Link to="/home/usersetting">
                                <button className="btn btn-primary float-left bg-secondary border-0">戻る</button>
                            </Link>
                            <input type="submit" className="btn btn-primary float-right border-0" id="setting-sub" value=">変更を確定"></input>
                        </form>

                    </div>
                </div>
            </div>
        );
    }
}