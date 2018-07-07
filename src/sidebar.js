import React, { Component } from 'react';
import './sidebar.css';

class SideBar extends Component {
  constructor(props) {
    super(props)

    this.state = {
      username: '',
      email: '',
      password: '',
      selected: '',
      New: "title",
      Incomplete: "title",
      Complete: "title",
      Contact: "title",
    }
  }
  handleSelect = (event) => {
    this.props.onSelect(event);
    if(event == "New"){
    this.setState({
      New: "title-selected",
      Incomplete: "title",
      Complete: "title",
      Contact: "title",
    })
    }
    if(event == "Incomplete"){
    this.setState({
      New: "title",
      Incomplete: "title-selected",
      Complete: "title",
      Contact: "title",
    })
    }
    if(event == "Complete"){
    this.setState({
      New: "title",
      Incomplete: "title",
      Complete: "title-selected",
      Contact: "title",
    })
    }
    if(event == "Contact"){
    this.setState({
      New: "title",
      Incomplete: "title",
      Complete: "title",
      Contact: "title-selected",
    })
    }

  }
  // <img src={Profile} className = "picture" alt='Profile Pic' />
  // <div className = "profile">
  //   Ceiline Zhang
  // </div>
  render() {
    return (
      <div className = "sidebar">
        <div className = "menu">
          <div className = {this.state.New} onClick={() =>{this.handleSelect('New')}}>
            New Ticket
          </div>
          <div className = {this.state.Incomplete} onClick={() =>{this.handleSelect('Incomplete')}}>
            Incomplete
          </div>
          <div className = {this.state.Complete} onClick={() =>{this.handleSelect('Complete')}}>
            Complete
          </div>
        </div>
     </div>
    )
  }
}

export default SideBar
