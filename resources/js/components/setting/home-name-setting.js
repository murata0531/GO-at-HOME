import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class HomeNameSetting extends React.Component {

    constructor(props) {
        super(props);
        this.state = { value: '' };

        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({ value: event.target.value });
    }

    render() {

        return (
            <div>
                <div className="box4 col-lg" id="family-setting-box4">
                    <div className="container">
                        <div className="d-flex align-items-center justify-content-between p-0">
                            <div className="subname p-2 font-weight-bold">グループの設定・変更</div>
                            <div className="p-2 font-weight-bold"><i className="setting fas fa-cog"></i></div>
                        </div>
                    </div>
                </div>
                <div className="box5 mt-4 mx-4" id="famsetbox">
                    <div className="class col-8 mx-auto">
                        <form className="user-setting" method="post" action="/userupdate" encType="multipart/form-data">
                            <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"').getAttribute('content')} />

                            <h4 className="name font-weight-bold">家族・グループ設定</h4>
                            <div className="form-group">
                                <label htmlFor="exampleId">家族ID : </label>
                                <p className="text-monospace">{first_family.id}</p>
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputFamily">変更前の家族グループ名 : </label>
                                <input type="text" className="form-control" id="exampleInputName1" placeholder={first_family.family_name} readOnly></input>
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputName">変更後の家族グループ名 : </label>
                                <input type="text" className="form-control" id="exampleInputName1" name="setting_family_name" onChange={this.handleChange} value={this.state.value} placeholder="名前" required></input>
                            </div>
                            
                            <Link to="/home/homesetting">
                                <button className="btn btn-primary float-left bg-secondary border-0">戻る</button>
                            </Link>
                            <input type="submit" className="btn btn-primary float-right border-0" id="setting-sub" value=">変更を確定"></input>

                            <input type="hidden" name="family_hidden_id" value={first_family.id}></input>
                        </form>

                    </div>
                </div>
            </div>
        );
    }
}