import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Pagination from './Pagination';
import {Truncate} from 'react-read-more';

var currentUrl = window.location.href;
//var baseUrl = location.protocol + '//' + location.host;
var url1 = currentUrl.substr(0, currentUrl.lastIndexOf('/'));
var baseUrl = url1.substr(0, url1.lastIndexOf('/'));
export default class GetbyUrl extends Component {

    constructor(props) {
       super(props);
     
        this.state = {
             posts: [],  
             pageOfItems: []  
             };  
        this.onChangePage = this.onChangePage.bind(this);  
        }

      onChangePage(pageOfItems) {
        // update state with new page of items
        this.setState({ pageOfItems: pageOfItems });
        }

     componentDidMount(){
       axios.get(currentUrl+'/site')
       .then(response => { 
        this.setState({ posts:response.data});
       })
       .catch(function (error) {
         console.log(error);
       })
     }
 
    render() {
        return (
            <div className="row">
                  { this.state.pageOfItems.map((post,index) => {                                 
                                        return (                                        
                                           <div className="card col-12 col-sm-6 col-md-4 col-lg-4" key={post.id}>
                                              <div className="card-wrapper p-3">
                                              <a href={`${baseUrl}/videos_detail/${post.slug}/play`}>
                                                  <div className="card-img">
                                                  <span className="mbr-iconfont mbri-video icon-play-style"></span>
                                                      <img src={`https://img.youtube.com/vi/${post.video_id}/mqdefault.jpg`} alt="Videos"/>
                                                  </div>
                                                </a>
                                                  <div className="card-box">
                                                  <a href={`videos_detail/${post.slug}/play`}>
                                                      <h4 className="card-title pb-3 mbr-fonts-style font-media" id="link_title">
                                                            {post.title}
                                                      </h4>
                                                  </a>
                                                     <p className="font-media-desc">
                                                        <Truncate lines={1} ellipsis={<span>... <a href={`videos_detail/${post.slug}/play`}>Read more</a></span>}>
                                                           {post.description} 
                                                        </Truncate>  
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>                           
                                       );                                  
                                    })
                                 } 
                            <div className="col-12">     
                              <Pagination items={this.state.posts} onChangePage={this.onChangePage} />  
                            </div> 
                            { this.state.posts.length == 0 &&
                              <div  className="col-12">
                                <div className="mbr-section-btn text-center">
                                  <a className="btn btn-sm btn-secondary-outline display-3" href="#">Not Found</a>
                                </div> 
                               </div> 
                            }
                     </div>     
           
         );
    }
}
if (document.getElementById('get-by-url-app')) {
    ReactDOM.render(<GetbyUrl />, document.getElementById('get-by-url-app'));
}

