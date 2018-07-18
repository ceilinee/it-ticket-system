import React, { Component } from 'react';
import './App.css';
import './tab.css';
import SideBar from './sidebar.js';
import Tickets from './Tickets.js';
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
      about: false,
      selected: 'New',
    };
    this.updateWindowDimensions = this.updateWindowDimensions.bind(this);
  }
  onSelect = (value) => {
    this.setState({
      selected: value,
    })
    console.log(value);
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
  renderNew = () => {
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
      <div className= "new-ticket">
        <div className = "ticket-body">
            <h1 className = "selected-user">New Ticket</h1>
            <textarea placeholder="Title" className= "text-box" rows= "2" value={this.state.value} onChange={this.handleChange} />
            <textarea placeholder="Describe your problem" className= "text-box" rows= "7" value={this.state.value} onChange={this.handleChange} />
            <div>
                <label>
                <input
                  name="isGoing"
                  type="checkbox"
                  checked={this.state.isGoing}
                  onChange={this.handleInputChange} />
                  Low
                </label>
                <label>
                <input
                  name="isGoing"
                  type="checkbox"
                  checked={this.state.isGoing}
                  onChange={this.handleInputChange} />
                  Medium
                </label>
                <label>
                <input
                  name="isGoing"
                  type="checkbox"
                  checked={this.state.isGoing}
                  onChange={this.handleInputChange} />
                  High
                </label>
            </div>
            <button className= "new-ticket-button">
               Submit Ticket
            </button>
        </div>
     </div>
    )
  }
  renderComplete = () => {
    var ticketNow = [
      {
        id: 1,
        name: 'More issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high'
      },
      {
        id: 2,
        name: 'Issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high'
      },
      {
        id: 3,
        name: 'Lots of issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high'
      }
    ]

    return(
      ticketNow.map( ticket =>
        <Tickets
          key={ticket.id}
          ticket={ticket}
          onEnter={this.props.onEnterGame}
        />
      )
    )
  }
  renderIncomplete = () => {
    var ticketNow = [
      {
        id: 1,
        name: 'More issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high',
        information: 'I have so many problems with this computer wow this is really urgent please help this computer',
      },
      {
        id: 2,
        name: 'So many issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high',
        information: 'I have so many problems with this computer wow this is really urgent please help this computer',
      },
      {
        id: 3,
        name: 'Lots of issues',
        createdBy: 'Ceiline',
        startingDate: 'Monday',
        priority: 'high',
        information: 'I have so many problems with this computer wow this is really urgent please help this computer',
      }
    ]

    return(
      ticketNow.map( ticket =>
        <Tickets
          key={ticket.id}
          ticket={ticket}
          onEnter={this.props.onEnterGame}
        />
      )
    )
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
      <div>
        <SideBar onSelect={this.onSelect}/>
        <div className = "Header">
          {this.state.selected == "Incomplete" ? this.renderIncomplete() : ''}
          {this.state.selected == "Complete" ? this.renderComplete() : ''}
          {this.state.selected == "New" ? this.renderNew() : ''}
        </div>
      </div>
    );
  }
}
export default App;
