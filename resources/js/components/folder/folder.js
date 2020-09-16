import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class SharedFolder extends React.Component {

    componentDidMount() {
        let database = firebase.database();
        const userid = user_id;

        let room = "shareduser" + userid;
        let storage = firebase.storage();
        let pathReference = storage.ref();

        let prevTask = Promise.resolve();

        let str = '';
        let addshare = document.getElementById("addshare");

        database.ref(room).on("child_added", (data) => {
            prevTask = prevTask.finally(async () => {
                const v = data.val();
                const k = data.key;


                await pathReference.child('shared/' + userid + '/' + v.isfile).getDownloadURL().then(function (url) {

                    str += '<div class="col mb-3"><div class="card">';
                    str += '<a href=' + url + '><img src="' + url + '" class="card-img-top" alt="..."></a>';
                    // str += '<div class="card-body"><h5 class="card-title">ファイル名：</h5><p class="card-text">' + isfile + '</p>';
                    // str += '<a href="' + url + '" class="btn btn-primary btn-sm">ダウンロード</a>';
                    // str += '</div></div></div>';
                    str += '</div></div>';
                    addshare.innerHTML += str;

                }).catch(function (error) {

                    // A full list of error codes is available at
                    // https://firebase.google.com/docs/storage/web/handle-errors
                    switch (error.code) {
                        case 'storage/object-not-found':
                            alert('File doesn\'t exist');
                            break;

                        case 'storage/unauthorized':
                            alert('User doesn\'t have permission to access the object');
                            break;

                        case 'storage/canceled':
                            alert('User canceled the upload');
                            break;


                        case 'storage/unknown':
                            alert('Unknown error occurred, inspect the server response');
                            break;
                    }
                });

            });
        });



    }
    render() {
        return (

            <div>
                <div class="box4 col-lg" id='share-setting'>
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between p-0">
                            <div class="subname p-2 font-weight-bold">ファイル保管</div>
                            <div class="p-2 font-weight-bold"><i class="setting fas fa-cog"></i></div>
                        </div>
                    </div>
                </div>
                <div class="box5 mt-4 mx-4">
                    <div class="class col-10 mx-auto">
                        <div class="btn-up m-0 my-3">
                            <button type="button" class="btn btn-outline-info">フォルダを作成</button>
                            <label htmlFor="shareupload" className="btn btn-outline-info" id="sharelabel"><input type="file" id="shareupload"></input>ファイルをアップロード</label>

                            <button type="button" class="btn btn-outline-success" onClick={
                                function () {

                                    let database = firebase.database();
                                    const userid = user_id;
                                    let room = "shareduser" + userid;
                                    let btn2 = document.getElementById('shareupload');

                                    let now = new Date();

                                    if (btn2.files.length > 0) {
                                        var file = btn2.files[0].name;

                                        let storageRef = firebase.storage().ref();
                                        let uploadTask = storageRef.child('shared/' + userid + '/' + file).put(btn2.files[0]);

                                        uploadTask.on('state_changed',
                                            function (snapshot) {
                                                // Observe state change events such as progress, pause, and resume
                                                // See below for more detail
                                            }, function (error) {
                                                // Handle unsuccessful uploads
                                            }, function () {
                                                // Handle successful uploads on complete
                                                // For instance, get the download URL: https://firebasestorage.googleapis.com/...

                                                database.ref(room).push({
                                                    uid: userid,
                                                    isfile: file,
                                                    date: now.getFullYear() + '年' + eval(now.getMonth() + 1) + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分'
                                                });

                                            }
                                        );

                                    }
                                    btn2.value = '';
                                }}>確定</button>
                        </div>
                        <div class="card-columns container-fluid p-0">
                            <div id="addshare">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        );
    }
}


