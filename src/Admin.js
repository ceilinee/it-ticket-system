import React, { Component } from 'react';
import './App.css';
import './tab.css';
import { Redirect } from 'react-router';
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
      about: false};
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
  render() {
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
    console.log(this.state.width);
    if (this.state.redirect) {
    return <Redirect push to="/user" />;
    }
    return (
      <div className="Background">
      </div>
    );
  }
}
export default App;
