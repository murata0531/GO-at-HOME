import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class HomeSetting extends React.Component {

    render() {

        const homesetting = {
            background: "#00AC97",
        }

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
                        <form className="user-setting">
                            <h4 className="name font-weight-bold">家族・グループ設定</h4>
                            <div className="form-group">
                                <label htmlFor="exampleId">家族ID : </label>
                                <p className="text-monospace">{first_family.id}</p>
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputFamily">家族グループ名 : </label>
                                <input type="text" className="form-control" id="exampleInputName1" placeholder={first_family.family_name} readOnly></input>
                                <Link to="/home/homenamesetting">
                                    <button type="submit" className="btn btn-primary float-right border-0 mt-2" style={homesetting}>変更する</button>
                                </Link>
                            </div>
                            <div className="form-group col-5 mt-5 p-0">
                                <div className="family pt-10">
                                    <label htmlFor="menu_bar03"><i className="fas fa-user pr-2"></i>家族情報<i className="fas fa-angle-down float-right"></i></label>
                                    <input type="checkbox" id="menu_bar03" className="accordion" />
                                    <ul id="list03">
                                        <li readOnly>
                                            <span className="use">カツオ
                                                    <a href="#"><i className="fas fa-info-circle float-right" data-toggle="modal" data-target="#exampleModal"></i></a>
                                            </span>
                                        </li>
                                        <li readOnly>
                                            <span className="use">ワカメ
                                                    <a href="#"><i className="fas fa-info-circle float-right" data-toggle="modal" data-target="#exampleModal"></i></a>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span className="use">家族追加...
                                                        <i className="fas fa-plus float-right"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <a href="/home"><button type="submit" className="btn btn-primary float-left bg-secondary border-0">戻る</button></a>

                    </div>
                </div>
            </div>

        )
    }
}