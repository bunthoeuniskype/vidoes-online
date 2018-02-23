<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Category;
use App\Modules\Admin\Models\SubCategory;
use App\Modules\Admin\Models\Post;
use App\Http\Classes\Youtube;

use App\Language;
use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post = Post::where('language_code',App::getLocale())->orderBy('id','DESC')->get();         
       return view("Admin::post.index",compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category=Category::where(['language_code'=>App::getLocale(),'status'=>1])->orderBy('id','DESC')->pluck('name','group_id')->all();
     //  $subcategory=SubCategory::where(['language_code'=>App::getLocale(),'status'=>1])->orderBy('id','DESC')->pluck('name','group_id')->all();
        $language = Language::where('status',1)->orderBy('id','asc')->get();        
        return view('Admin::post.add',compact('language','category','subcategory'));
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

    $group_id_max = Post::max('group_id');
    $group_id_max_add = $group_id_max + 1;
    $language = Language::where('status',1)->orderBy('id','asc')->get();

    $slug = str_random(30).''.date('Ymdhis');
    foreach ($language as $key => $v) {      
       $post = new Post(); 
       $post->group_id =  $group_id_max_add;
       $post->category_group_id =  $request->category_group_id;
       $post->sub_category_group_id =  $request->sub_category_group_id;             
       $post->image = $request->image;   
       $post->video_id = $youtube->getYouTubeVideoId($request->video_id);   
       $post->video_type = 'youtube';  
       $post->title = $request->title[$key];     
       $post->description = $request->description[$key];       
       $post->author_description = $request->author_description;
       $post->created_by = Auth::user()->id;
       $post->language_code = $v->code;
       $post->slug = $slug;
       $post->save();
       
    }      
      Session::flash('save','Save is Successfully!');
      return redirect('admin/post');
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
       $category=Category::where(['language_code'=>App::getLocale(),'status'=>1])->orderBy('id','DESC')->pluck('name','group_id')->all();

        $post = Post::where('group_id',$id)->limit(2)->get();    

        $language = Language::where('status',1)->orderBy('id','asc')->get();

        return view('Admin::post.edit',compact('post','category','language','id'));

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

      $youtube = new Youtube();
      
      $post = Post::where('group_id',$id)->limit(2)->get();
      foreach($post as $key => $v){
       $post = Post::findOrFail($v->id);  
       $post->category_group_id =  $request->category_group_id;
       $post->sub_category_group_id =  $request->sub_category_group_id;     
       $post->image = $request->image;       
       $post->video_id = $youtube->getYouTubeVideoId($request->video_id);    
       $post->video_type = 'youtube';  
       $post->title = $request->title[$key];      
       $post->description = $request->description[$key];   
       $post->author_description = $request->author_description;
       $post->updated_by = Auth::user()->id;   
       $post->status = $request->status;  
       $post->save();

    }      
      Session::flash('save','Save is Successfully!');
      return redirect('admin/post');
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
