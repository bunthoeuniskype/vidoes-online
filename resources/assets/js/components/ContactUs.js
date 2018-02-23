import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {NotificationContainer, NotificationManager} from 'react-notifications';
import axios from 'axios';

export default class ContactUs extends Component
{
      constructor() {
        super();
        this.handleSubmit = this.handleSubmit.bind(this);
      }

    handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const data = new FormData(form);
    
   /* fetch('site/contact', {
      method: 'POST',
      body: data,
    }).then(response => {      
        if(response.status == 200){
            this.refs.form.reset();
            NotificationManager.success('Message Send Successfully', 'Message Info');
        }
        //else
            NotificationManager.warning('Message Send Failed', 'Close after 3000ms', 3000);
       })
       .catch(function (error) {
         console.log(error);
       })*/

    axios.post('site/contact', data)
        .then(response => {      
        if(response.status == 200){
            this.refs.form.reset();
            NotificationManager.success('Message Send Successfully', 'Message Info');
        }
        //else
            NotificationManager.warning('Message Send Failed', 'Close after 3000ms', 3000);
       })
       .catch(function (error) {
         console.log(error);
       }) 
  }

    render() {
        return(
            <div>
                <form className="block mbr-form" onSubmit={this.handleSubmit} ref="form">
                     <div className="col-md-6 multi-horizontal">
                                <input type="text" className="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-z"/>
                            </div>
                            
                            <div className="col-md-12">
                                <input type="text" className="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-z"/>
                            </div>
                            <div className="col-md-12">
                                <textarea className="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" id="message-form4-z"></textarea>
                            </div>
                            <div className="input-group-btn col-md-12 pull-right">
                                <button type="submit" className="btn btn-xs btn-primary display-4"><span className="mbri-letter mbr-iconfont mbr-iconfont-btn"></span> Send</button>
                            </div>                      
                </form>
             </div>
        );
    }
}

var divName = {
  paddingBottom: '2px', 
};
var divButton = {
 paddingTop: '10px',
};

//export default ContactUs;
if (document.getElementById('contact-app')) {
    ReactDOM.render(<ContactUs />, document.getElementById('contact-app'));
}

