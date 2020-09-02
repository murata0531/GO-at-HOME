import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Home from "./home/home-main.js";
import Private from "./private/private-main.js";


export default class App extends Component {
    render() {
        return (
           
            <Router>
            <div>
            
            <Switch>
            <Route path="/home" exact component={Home} />
            <Route path="/home/private" component={Private} />
            </Switch>
            </div>
        </Router>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}