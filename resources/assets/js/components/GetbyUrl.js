import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Pagination from './Pagination';
import {Truncate} from 'react-read-more';

var currentUrl = window.location.href;
//var baseUrl = location.protocol + '//' + location.host;
var url1 = currentUrl.substr(0, currentUrl.lastIndexOf('/'));
var baseUrl = url1.substr(0, url1.lastIndexOf('/'));

export function  getData(offset){
       return axios.get(currentUrl+'/site?offset='+offset)
           .then(res => res.data)      
           .catch(function (error) {
         console.log(error);
       })      
    }

export default class GetbyUrl extends Component {

    constructor(props) {
       super(props);
       this.state = {
             posts: [],  
             pageOfItems: [],
             offset : 0,            
             countAll : 0,
             countAllOrder : 0,
             };            
        this.handleLoadMore = this.handleLoadMore.bind(this); 
        this.handleNewest = this.handleNewest.bind(this);         
        }

       handleLoadMore() {   
        let newOffest = this.state.offset + 1; 
        this.setState({ offset : newOffest });        
          getData(newOffest).then(response => {
          this.setState({
            posts : response.data,
            countAll : response.countAll,
            countAllOrder : response.skip,

            })
          });              
        }

        handleNewest() {      
          let newOffest = this.state.offset - 1; 
        this.setState({ offset : newOffest });        
          getData(newOffest).then(response => {
          this.setState({
            posts : response.data,
            countAll : response.countAll,
            countAllOrder : response.skip,

            })
          });              
        }


      componentDidMount(){
         this.setState({ offset : this.state.offset }); 
          getData(this.state.offset).then(response => {
          this.setState({
            posts : response.data,
            countAll : response.countAll,
            countAllOrder : response.skip,
        })
      });         
     }


    render() {
        const btnLeft = {
          float: 'left',
          width: '200px',        
        };
        const btnDisableLeft = {       
         cursor :  this.state.offset == 0 ? "not-allowed" : "pointer" ,
        };
        const btnDisableRight = {
         cursor : this.state.countAll <= this.state.countAllOrder ? "not-allowed" : "pointer",
        };
        const btnRight = {
          float: 'right',
          width: '200px'
        };
        return (
            <div className="row">
                  { this.state.posts.map((post,index) => {                                 
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
                            { this.state.posts.length == 0 &&
                              <div  className="col-12">
                                <div className="mbr-section-btn text-center">
                                  <a className="btn btn-sm btn-secondary-outline display-3" href="#">Not Found</a>
                                </div> 
                               </div> 
                            }
                           <div className="col-12">  
                             <div className="mbr-section-btn text-left" style={btnLeft}>
                                  <a className="btn btn-sm btn-secondary-outline display-3" onClick={this.handleNewest} style={btnDisableLeft}>Newest Post</a>
                             </div>   
                             <div className="mbr-section-btn text-right" style={btnRight}>
                                  <a style={btnDisableRight} className="btn btn-sm btn-secondary-outline display-3" onClick={this.handleLoadMore}>Older Post</a>
                             </div> 
                          </div>          
                     </div>     
           
         );
    }
}
if (document.getElementById('get-by-url-app')) {
    ReactDOM.render(<GetbyUrl />, document.getElementById('get-by-url-app'));
}

