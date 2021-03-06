<?php

namespace App\Modules\Site\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Post;
use App\Modules\Admin\Models\SubCategory;
use App\Modules\Admin\Models\Category;
use App\Modules\Admin\Models\VideoList;
use App\Modules\Site\Models\Comment;
use App\Modules\Site\Models\LinkDownload;
use App\Modules\Site\Models\Feedback;
use App\Modules\Security\Models\Setting;

use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class SiteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $category = Category::where(['language_code'=>App::getLocale(), 'status'=>1])->orderBy('order','ASC')->get();           

        $subcategory = SubCategory::where(['language_code'=>App::getLocale(), 'status'=>1])->limit(3)->orderBy('order','ASC')->get();

        $posts_newest = Post::where(['language_code'=>App::getLocale(), 'status'=>1])->orderBy('group_id','ASC')->limit(8)->get();       
        
        return view("Site::index",compact('subcategory','posts_newest'));
    }

  public function downloadResource(Request $request ,$slug)
    {

        if(!Session::get('customer')){
            Session::put('oldUrl',$request->url());
            return redirect('customer/login');
        }else{

        $download = Setting::where('status',1)->orderBy('id','DESC')->first(); 

        $post = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();
            return view('Site::download',compact('download','post'));
        }
    
    }

  public function downloadFile(Request $request ,$slug)
    {

        if(!Session::get('customer')){
            Session::put('oldUrl',$request->url());
            return redirect('customer/login');
        }else{
        $download = LinkDownload::where(['status'=>1,'slug'=>$slug])->first(); 
        return redirect($download->link);       
        }
    
    }

public function ratingPost(Request $request)
{
   $p = Post::where(['group_id'=>$request->group_id])->get();
   foreach ($p as $key => $value) {
      $post = Post::findOrFail($value->id); 
      $post->rating = $request->rating;
      $post->save();
   }
   $response = 'Rating is Successfully';
   return response()->json($response);
}

 public function videos_detail(Request $request ,$slug)   {

         $urlShare = $request->url();    

        $post = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();
        
        $videoplay = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();

        foreach(Post::where('group_id',$post->group_id)->get() as $v){
            $p = Post::findOrFail($v->id);
            $p->count_view =  $p->count_view+1;
            $p->save();
        }

        $subcategory = SubCategory::where(['language_code'=>App::getLocale(), 'group_id'=>$post->sub_category_group_id, 'status'=>1])->first();

         $comment = Comment::where(['status'=>1,'post_group_id'=>$post->group_id])->orderBy('id','DESC')->limit(5)->get();       
         $post_group_id = $post->group_id;
        return view("Site::videos_detail",compact('post','comment','post_group_id','urlShare','videoplay'));
    }

    public function videos_details(Request $request ,$slug)   {

         $urlShare = $request->url();    

       // $post = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();

       $videoplay = VideoList::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();
        
        $post = Post::where(['language_code'=>App::getLocale(),'group_id'=>$videoplay->post_group_id, 'status'=>1])->first();

        foreach(Post::where('group_id',$post->group_id)->get() as $v){
            $p = Post::findOrFail($v->id);
            $p->count_view =  $p->count_view+1;
            $p->save();
        }

        $subcategory = SubCategory::where(['language_code'=>App::getLocale(), 'group_id'=>$post->sub_category_group_id, 'status'=>1])->first();

         $comment = Comment::where(['status'=>1,'post_group_id'=>$post->group_id])->orderBy('id','DESC')->limit(5)->get();       
         $post_group_id = $post->group_id;
        return view("Site::videos_detail",compact('post','comment','post_group_id','urlShare','videoplay'));
    }


public function category(Request $request ,$slug)
{
    $category = Category::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();

    $posts = DB::table('post')->where(['category_group_id'=> $category->group_id,'language_code'=>App::getlocale(),'status'=>1,'download_type'=>'sale'])->limit(16)->orderBy('group_id','DESC')->get();

    return view('Site::category',compact('category','posts'));
}


public function subcategory(Request $request ,$slug)
{
    $subcategory = SubCategory::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();
    $posts = DB::table('post')->where(['sub_category_group_id'=> $subcategory->group_id,'language_code'=>App::getlocale(),'status'=>1,'download_type'=>'sale'])->limit(16)->orderBy('group_id','DESC')->get();
  //  dd($subcategory);
    return view('Site::subcategory',compact('subcategory','posts'));
}

public function categoryvideomore(Request $request ,$slug)
{
    $category = Category::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();

    $posts = DB::table('post')->where(['category_group_id'=> $category->group_id,'language_code'=>App::getlocale(),'status'=>1,'download_type'=>'sale'])->orderBy('group_id','DESC')->get();
  
    return view('Site::categoryvideomore',compact('category','posts'));
}

public function subcategoryvideomore(Request $request ,$slug)
{
    $subcategory = SubCategory::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();

    $posts = DB::table('post')->where(['sub_category_group_id'=> $subcategory->group_id,'language_code'=>App::getlocale(),'status'=>1,'download_type'=>'sale'])->orderBy('group_id','DESC')->get();

    return view('Site::subcategoryvideomore',compact('subcategory','posts'));
}

public function videofree(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1,'download_type'=>'free'])->orderBy('group_id','DESC')->limit(16)->get();   
    return view('Site::videofree',compact('posts'));
}

public function videofreemore(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1,'download_type'=>'free'])->orderBy('group_id','DESC')->get();   
    return view('Site::videofreemore',compact('posts'));
}

public function search(Request $request)
{
   $posts = DB::table('post')
   ->where(['language_code'=>App::getlocale(),'status'=>1])
   ->where('title','LIKE','%'.$request->search.'%')
   ->orderBy('group_id','DESC')->get();   
    return view('Site::search',compact('posts'));
}

public function contact(Request $request)
{
   $contact = Setting::where(['status'=>1])->first();
    return view('Site::contact',compact('contact'));
}

public function feedback(Request $request)
{
    $feedback = new Feedback();
    $feedback->create($request->all());
    Session::flash('send','Send is Successfully!');
    return Redirect::back();
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
