import React, { Component } from 'react';
import './App.css';
import './tab.css';
import { Redirect } from 'react-router';
import axios from 'axios';
import { Tabs, TabLink, TabContent } from '../node_modules/react-tabs-redux';
import TextField from '../node_modules/material-ui/TextField';
import MuiThemeProvider from '../node_modules/material-ui/styles/MuiThemeProvider';

class App extends Component {
  eventLogger = (e: MouseEvent, data: Object) => {
    console.log('Event: ', e);
    console.log('Data: ', data);
  };
  constructor(props) {
    super(props);
    this.state = {
      width: 0,
      height: 0,
      redirect: false,
      redirectadmin: false,
      about: false,
      type: "admin",
    }
    this.updateWindowDimensions = this.updateWindowDimensions.bind(this);
  }
  componentDidMount() {
    this.updateWindowDimensions();
    window.addEventListener('resize', this.updateWindowDimensions);
  }
  componentWillUnmount() {
    window.removeEventListener('resize', this.updateWindowDimensions);
  }
  updateWindowDimensions() {
    this.setState({ width: window.innerWidth, height: window.innerHeight });
  }
  handleLogIn = () => {
    return axios.get('http://localhost:3000/users/')
    .then(response => console.log(response.data));
  }
  openAbout = () => {
    if(this.state.about){
      this.setState({
        about: false,
      })
    }
    else{
      this.setState({
        about: true,
      })
    }
  }
  renderEmployee = () => {
    const styles = {
      errorStyle: {
        color: '#FF847C',
      },
      underlineFocusStyle: {
        borderColor: '#99B898',
      },
      floatingLabelStyle: {
        color: '#2A363B',
      },
      floatingLabelFocusStyle: {
        color: '#FF847C',
      },
    };
    return(
      <div className = "Post">
          <h1 className = "selected-user">Employees</h1>
          <div className = 'text'>
            <MuiThemeProvider>
              <TextField
              floatingLabelText="Email"
              floatingLabelStyle={styles.floatingLabelStyle}
              floatingLabelFocusStyle={styles.floatingLabelFocusStyle}
              underlineFocusStyle={styles.underlineFocusStyle}/>
            </MuiThemeProvider>
          </div>
          <div className = 'text'>
            <MuiThemeProvider>
              <TextField floatingLabelText="Password"
              floatingLabelStyle={styles.floatingLabelStyle}
              floatingLabelFocusStyle={styles.floatingLabelFocusStyle}
              underlineFocusStyle={styles.underlineFocusStyle}/>
            </MuiThemeProvider>
          </div>
          <button className= "load" onClick={() => {this.setState({redirect: true})}}>
            Login
          </button>
          <div className= "switch">
            Not an Employee? Click <span className= "switch-link" onClick={() => {this.setState({type: "admin"})}}> here </span> for Admin login
          </div>
      </div>
    )
  }
  renderAdmin = () => {
    const styles = {
      errorStyle: {
        color: '#FF847C',
      },
      underlineFocusStyle: {
        borderColor: '#99B898',
      },
      floatingLabelStyle: {
        color: '#2A363B',
      },
      floatingLabelFocusStyle: {
        color: '#FF847C',
      },
    };
    return(
      <div className = "Post">
          <h1 className = "selected-user">Admin</h1>
          <div className = 'text'>
            <MuiThemeProvider>
              <TextField
              floatingLabelText="Email"
              floatingLabelStyle={styles.floatingLabelStyle}
              floatingLabelFocusStyle={styles.floatingLabelFocusStyle}
              underlineFocusStyle={styles.underlineFocusStyle}/>
            </MuiThemeProvider>
          </div>
          <div className = 'text'>
            <MuiThemeProvider>
              <TextField floatingLabelText="Password"
              floatingLabelStyle={styles.floatingLabelStyle}
              floatingLabelFocusStyle={styles.floatingLabelFocusStyle}
              underlineFocusStyle={styles.underlineFocusStyle}/>
            </MuiThemeProvider>
          </div>
          <button className= "load" onClick={() => {this.setState({redirectadmin: true})}}>
            Login
          </button>
          <div className= "switch">
            Not an admin? Click <span className= "switch-link" onClick={() => {() => {this.setState({type: "Employee"})}}> here </span> for Employee login
          </div>
      </div>
    )
  }
  render() {
    console.log(this.state.width);
    if (this.state.redirect) {
    return <Redirect push to="/user" />;
    }
    if (this.state.redirectadmin) {
    return <Redirect push to="/admin" />;
    }
    console.log(this.state.type);
    return (
      <div className="Background">
        <div className="App">
          {this.state.type === "admin" ? this.renderAdmin() : this.renderEmployee()}
        </div>
      </div>
    );
  }
}
export default App;
