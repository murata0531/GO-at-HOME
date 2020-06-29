import React , { Component } from 'react';
import ReactDOM from 'react-dom';

import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';


import NavBar from './NavBar'
import About from './About'
import User from './User'
import UserDetail from './UserDetail'

import Main from './Main'

export default class App extends Component {
    
    render(){
        return (
        
            <div class="spa_main">
                <Router>
                    
                    <header>
                        <h1>SPA(シングルページアプリケーション)</h1>
                    </header>
                    <NavBar />
                    <Switch>
                        <Route path="/" exact component={Main} />
                        <Route path="/about" component={About} />
                        <Route path="/user" exact component={User} />
                        <Route path="/user/:id" component={UserDetail} />
                    </Switch>
                
                </Router>
            </div>
        
        )
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}

