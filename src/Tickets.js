import React, { Component } from 'react'
import './App.css';

class Tickets extends Component {
  constructor(props) {
    super(props)

    this.state = {
      username: '',
      email: '',
      open: false,
    }
  }
  render() {
    return (
      <div className= "ticket">
        <div className = "ticket-body">
          {this.props.ticket.name}
          <div className = "ticket-date">
          {this.props.ticket.startingDate}
          </div>
          <div className = "ticket-information">
          {this.props.ticket.information}
          </div>
        </div>
        <div className = "information">
          <button className = "status-button">
            Change status
          </button>
        </div>
     </div>
    )
  }
}

export default Tickets
