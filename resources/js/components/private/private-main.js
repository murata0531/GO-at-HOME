import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class Private extends React.Component {

    constructor(props) {
        super(props);
        this.state = { value: '' };

        this.handleChange = this.handleChange.bind(this);

    }

    handleChange(event) {
        this.setState({ value: event.target.value });
        var btn3 = document.getElementById('btn3');
        if (event.target.value == '') {
            btn3.disabled = "disabled";
            btn3.style.backgroundColor = "gray";
        } else {
            btn3.disabled = "";
            btn3.style.backgroundColor = "#00AC97";
        }
    }

    componentDidMount() {
        var param;
        if (1 < document.location.search.length) {
            // 最初の1文字 (?記号) を除いた文字列を取得する
            var query = document.location.search.substring(1);

            // クエリの区切り記号 (&) で文字列を配列に分割する
            var parameters = query.split('&');

            var result = new Object();
            for (var i = 0; i < parameters.length; i++) {
                // パラメータ名とパラメータ値に分割する
                var element = parameters[i].split('=');

                var paramName = decodeURIComponent(element[0]);
                var paramValue = decodeURIComponent(element[1]);

                // パラメータ名をキーとして連想配列に追加する
                result[paramName] = decodeURIComponent(paramValue);
            }
            param =  result;
        }
        
        var database = firebase.database();
        const userid = user_id;

        if(userid > param.privateid){
            var room = userid + "private" + param.privateid;
        }else if(userid < param.privateid){
            var room = param.privateid + "private" + userid;
        }
        
        const output = document.getElementById("messageLine");

        //受信処理
        database.ref(room).on("child_added", function (data) {
            const v = data.val();
            const k = data.key;
            let str = "";

            if (v.uid == userid) {
                // str += '<div class="name"><img src="..' + v.icon + '" width="50" height="50" class="rounded-circle float-left img-responsive">名前：' + v.name + '</div>';
                str += '<div class="opponent">';
                str += '<div class="faceicon">';
                str += '<img src="..' + v.icon + '" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></div>';
                str += '<div class="message_box m-2">';
                str += '<div class="message_content p-3">';
                str += '<div class="message_text">' + v.message + '</div></div></div></div>';
                str += '<div class="clear"></div>';

            } else {
                // str += '<div class="name"><img src="..' + v.icon + '" width="50" height="50" class="rounded-circle float-left img-responsive">名前：' + v.name + '</div>';
                str += '<div class="myself">';
                str += '<div class="faceicon">';
                str += '<img src="../icon/user_blue.png" width="50" height="50" class="rounded-circle align-middle img-responsive float-right"></div>';
                str += '<div class="message_box m-2">';
                str += '<div class="message_content p-3">';
                str += '<div class="message_text">' + v.message + '</div></div></div></div>';
                str += '<div class="clear"></div>';
            }
            // str += '<div class="text">日時：' + v.date + '</div>';
            // str += '<div class="text">メッセージ：' + v.message + '</div><hr>';
            output.innerHTML += str;
        });
    }

    render() {

        var fstring = JSON.stringify(family_user);
        var param;
        if (1 < document.location.search.length) {
            // 最初の1文字 (?記号) を除いた文字列を取得する
            var query = document.location.search.substring(1);

            // クエリの区切り記号 (&) で文字列を配列に分割する
            var parameters = query.split('&');

            var result = new Object();
            for (var i = 0; i < parameters.length; i++) {
                // パラメータ名とパラメータ値に分割する
                var element = parameters[i].split('=');

                var paramName = decodeURIComponent(element[0]);
                var paramValue = decodeURIComponent(element[1]);

                // パラメータ名をキーとして連想配列に追加する
                result[paramName] = decodeURIComponent(paramValue);
            }
            param =  result;
        }
        return (

            <div>
                <div className="box4 col-lg">
                    <div className="container">
                        <div className="d-flex align-items-center justify-content-between p-0">
                            <div className="subname p-2 font-weight-bold">プライベート</div>
                           
                                    <div className="users p-2 font-weight-bold">
                                        <img src={param.privateicon} width="30" height="30" className="rounded-circle align-middle img-responsive"></img>&nbsp;{param.privatename}
                                    </div>
                         
                            <Link to="/home/exexample">
                                <div className="p-2 font-weight-bold"><i className="setting fas fa-cog"></i></div>
                            </Link>

                        </div>
                    </div>
                </div>
                {/* <!-- {{-- subheader部分ここまで↑ --}}
                {{-- 会話部分ここから↓ --}} --> */}
                <div className="box5">
                    <div id="messageLine" className="p-2">

                        {/* <!-- 会話挿入空間 --> */}

                    </div>
                    {/* <!-- {{-- 会話部分ここまで↑ --}}
                    {{-- 会話送信部分ここから↓ --}} --> */}
                    <div id="send" className="col p-2">
                        <div className="form-inline col">
                            <button id="btn1" type="submit" className="btn btn-primary col-2"><i className="fas fa-video"></i></button>
                            {/* <!-- <button id="btn2" type="file" id="avatar" name="avatar" className="btn btn-primary col-2"><i className="fas fa-folder-open"></i></button> --> */}
                            <label htmlFor="btn2" id="avatar" name="avatar" className="btn btn-primary col-2"><input id="btn2" type="file" ></input><i className='fas fa-folder-open'></i></label>
                            <div className="form-group col-6">
                                <textarea className="form-control" id="exampleFormControlTextarea1" rows="3" value={this.state.value} onChange={this.handleChange}></textarea>
                            </div>
                            <button id="btn3" type="submit" className="btn btn-primary col-2" onClick={
                                function () {
                                    
                                    var database = firebase.database();
                                    const userid = user_id;

                                    if(userid > param.privateid){
                                        var room = userid + "private" + param.privateid;
                                    }else if(userid < param.privateid){
                                        var room = param.privateid + "private" + userid;
                                    }

                                    const aname = name;
                                    const aicon = icon;
                                    
                                    var btn3 = document.getElementById('btn3');
        
            
                                    const exampleFormControlTextarea1 = document.getElementById("exampleFormControlTextarea1");

                                    var now = new Date();

                                    database.ref(room).push({
                                        uid: userid,
                                        icon: aicon,
                                        name: aname,
                                        message: exampleFormControlTextarea1.value,
                                        date: now.getFullYear() + '年' + eval(now.getMonth() + 1) + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分'
                                    });

                                    exampleFormControlTextarea1.value = "";
                                    btn3.disabled = "disabled";
                                }
                            }><i className="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                    {/* <!-- {{-- 会話送信部分ここまで↑ --}} --> */}
                </div>
            </div>

        )
    }
}



