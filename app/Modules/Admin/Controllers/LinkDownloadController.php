<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Post;
use App\Modules\Admin\Models\LinkDownload;
use App\Modules\Admin\Models\VideoList;
use App\Language;
use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class LinkDownloadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $subcategory = [];
       return view("Admin::linkdownload.index",compact('subcategory'));
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
        return view('Admin::linkdownload.add',compact('language','order','post'));
    }

      public function addlinkdownload($post_group_id)
    {
        $linkdownload = LinkDownload::where(['post_group_id'=>$post_group_id])->orderBy('id','ASC')->get();
        $post = Post::where(['language_code'=>App::getLocale(),'group_id'=>$post_group_id])->pluck('title','group_id')->all();
                  
        return view('Admin::linkdownload.add',compact('post','linkdownload'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {   
  
       $slug = str_random(20).''.date('Ymdhis');  

       $linkdownload = new LinkDownload();       
       $linkdownload->post_group_id = $request->post_group_id;
       $linkdownload->title =  $request->title; 
       $linkdownload->link =  $request->link; 
       $linkdownload->created_by = Auth::user()->id;   
       $linkdownload->slug = $slug;      
      
      if($linkdownload->save()){
        Session::flash('save','Save is Successfully!');
      }else{
        Session::flash('save','Save is Failed!');
      }
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
    public function edit(Request $request, $id)
    {
        $post = Post::where('language_code',App::getLocale())->pluck('title','group_id')->all();
        $editlinkdownload = LinkDownload::find($id);
        $linkdownload = LinkDownload::where(['post_group_id'=>$editlinkdownload->post_group_id])->orderBy('id','ASC')->get();   
        return view('Admin::linkdownload.edit',compact('linkdownload','post', 'editlinkdownload'));
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

       $linkdownload = LinkDownload::findOrFail($id);
       $linkdownload->post_group_id = $request->post_group_id;
       $linkdownload->title =  $request->title; 
       $linkdownload->link =  $request->link; 
       $linkdownload->updated_by = Auth::user()->id;  
       $linkdownload->status = $request->status; ;  
       
       if($linkdownload->save()){
        Session::flash('save','Save is Successfully!');
      }else{
        Session::flash('save','Save is Failed!');
      }
     
     Session::flash('save','Save is Successfully!');
     return redirect('admin/addlinkdownload/'.$request->post_group_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $linkdownload = LinkDownload::findOrFail($id);      
      $linkdownload->delete();
      Session::flash('save','Delete is Successfully!');
      return Redirect::back();
    }

    public function destroy($id)
    {
        //
    }
}
