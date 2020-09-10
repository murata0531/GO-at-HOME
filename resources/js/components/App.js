import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Home from "./home/home-main.js";
import Private from "./private/private-main.js";
import UserSetting from "./setting/user-setting.js";
import UserSettingChange from './setting/user-setting-change.js';


//各種設定変更フォーム//

import UserNameSetting from './setting/user-name-setting';
export default class App extends Component {
    render() {
        return (
           
            <Router>
            <div>
            
            <Switch>
            <Route path="/home" exact component={Home} />
            <Route path="/home/private" component={Private} />
            <Route path="/home/usersetting" component={UserSetting} />
            <Route path="/home/usernamesetting" component={UserNameSetting} />
            </Switch>
            </div>
        </Router>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}