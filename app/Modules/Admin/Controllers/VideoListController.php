<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Post;
use App\Modules\Admin\Models\VideoList;
use App\Language;
use App\Http\Classes\Youtube;

use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class VideoListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $subcategory = [];
       return view("Admin::videolist.index",compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    

        $post = Post::where('language_code',App::getLocale())->pluck('title','group_id')->all();
        $order = VideoList::max('order');
        $language = Language::where('status',1)->orderBy('id','asc')->get();        
        return view('Admin::videolist.add',compact('language','order','post'));
    }

      public function addvideolist($post_group_id)
    {
        $videolist = VideoList::where(['post_group_id'=>$post_group_id,'language_code'=>App::getLocale()])->orderBy('order','ASC')->get();
        $post = Post::where(['language_code'=>App::getLocale(),'group_id'=>$post_group_id])->pluck('title','group_id')->all();
        $order = VideoList::where('post_group_id',$post_group_id)->max('order');
        $language = Language::where('status',1)->orderBy('id','asc')->get();        
        return view('Admin::videolist.addvideolist',compact('language','order','post','videolist'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {

    $youtube = new Youtube();

    $group_id_max = VideoList::max('group_id');
    $group_id_max_add = $group_id_max + 1;
    $language = Language::where('status',1)->orderBy('id','asc')->get();
    $slug = str_random(6).''.date('Ymdhis');

    foreach ($language as $key => $v) { 

       $videolist = new VideoList(); 
       $videolist->group_id = $group_id_max_add;
       $videolist->post_group_id = $request->post_group_id;
       $videolist->title =  $request->title[$key]; 
       $videolist->video_id =  $youtube->getYouTubeVideoId($request->video_id); 
       $videolist->created_by = Auth::user()->id;
       $videolist->language_code = $v->code;
       $videolist->order =  $request->order;  
       $videolist->slug = $slug;      
       $videolist->save();

    }      
      Session::flash('save','Save is Successfully!');
      return Redirect::back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('language_code',App::getLocale())->pluck('title','group_id')->all();
        $editvideolist = VideoList::where('group_id',$id)->get();

        foreach ($editvideolist as $key => $value) {
          if($key==0){
             $post_group_id = $value->post_group_id;
          }
         
        }

        $videolist = VideoList::where(['post_group_id'=>$post_group_id,'language_code'=>App::getLocale()])->orderBy('order','DESC')->get();

        return view('Admin::videolist.edit',compact('videolist','post','id','editvideolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $youtube = new Youtube();
      
      $videolist = VideoList::where('group_id',$id)->get();
      foreach($videolist as $key => $v){
       $videolist = VideoList::findOrFail($v->id); 
       $videolist->post_group_id = $request->post_group_id;
       $videolist->title =  $request->title[$key]; 
       $videolist->video_id =  $youtube->getYouTubeVideoId($request->video_id);  
       $videolist->updated_by = Auth::user()->id;       
       $videolist->order =  $request->order;  
       $videolist->status =  $request->status;      
       $videolist->save();
      }  
     Session::flash('save','Save is Successfully!');
     return redirect('admin/addvideolist/'.$request->post_group_id);
    }

    public function delete($id)
    {
     $videolist = VideoList::where('group_id',$id)->get();

      foreach($videolist as $key => $v){
       $videolist = VideoList::findOrFail($v->id); 
       $videolist->delete();      
    
      }  
     Session::flash('save','Delete is Successfully!');
     return Redirect::back();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
