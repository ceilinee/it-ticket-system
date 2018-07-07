import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter, Redirect, Switch, Router, Route, Link } from 'react-router-dom'
import './index.css';
import registerServiceWorker from './registerServiceWorker';
import App from './App.js';
import User from './User.js';
import Admin from './Admin.js';

render(
    <BrowserRouter>
      <Switch>
        <Route exact={true} path='/' component={App}/>
        <Route path='/user' component={User}/>
        <Route path='/admin' component={Admin}/>
      </Switch>
    </BrowserRouter>,
    document.getElementById('root')
);
registerServiceWorker();
