<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Post;

use App\Language;
use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class PageController extends Controller
{
    
    protected $content_type='page'; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $post = Post::where(['language_code'=>App::getLocale(),'content_type'=>$this->content_type])->orderBy('id','DESC')->get();         
       return view("Admin::page.index",compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::where('status',1)->orderBy('id','asc')->get();        
        return view('Admin::page.add',compact('language','category','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {

    $group_id_max = Post::max('group_id');
    $group_id_max_add = $group_id_max + 1;
    $language = Language::where('status',1)->orderBy('id','asc')->get();

    $slug = str_random(30).''.date('Ymdhis');
    foreach ($language as $key => $v) {      
       $post = new Post(); 
       $post->group_id =  $group_id_max_add;
       $post->title = $request->title[$key];     
       $post->content = $request->description[$key];    
       $post->created_by = Auth::user()->id;
       $post->language_code = $v->code;
       $post->order =$request->order;
       $post->slug = $slug;
       $post->content_type ='page';
       $post->save();
       
    }      
      Session::flash('save','Save is Successfully!');
      return redirect('admin/page');
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
        $post = Post::where('group_id',$id)->limit(2)->get();   

        $language = Language::where('status',1)->orderBy('id','asc')->get();

        return view('Admin::page.edit',compact('post','category','language','id'));

       }
  
    public function delete($id)
    {

     $post = Post::where('group_id',$id)->get();   

     foreach ($post as $value) {
      $p = Post::findOrFail($value->id);
      $p->delete();
     }
     Session::flash('save','Delete is Successfully!');
     return Redirect::back();

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
   
      $post = Post::where('group_id',$id)->limit(2)->get();
      foreach($post as $key => $v){
       $post = Post::findOrFail($v->id);
       $post->title = $request->title[$key];     
       $post->content = $request->description[$key];    
       $post->created_by = Auth::user()->id;
       $post->language_code = $v->language_code;     
       $post->order =$request->order;  
       $post->updated_by = Auth::user()->id;   
       $post->status = $request->status;  
       $post->save();
    }      
      Session::flash('save','Save is Successfully!');
      return redirect('admin/page');
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
