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

      // $posts_newest = Post::where(['language_code'=>App::getLocale(),'status'=>1])->orderBy('group_id','DESC')->paginate(Setting::getSetting()->per_page);  

        return view("Site::index");
    }

   public function getHome(Request $res){

            $offset=0;
            $limit = 12;            
            if(isset($res->offset)){
                $offset = $res->offset;
            }
            $skip = $limit * $offset;
            $posts = Post::where(['language_code'=>App::getLocale(),'status'=>1,'content_type'=>'post'])->take($limit)->skip($skip)->orderBy('group_id','DESC')->get(); 
            $countAll = Post::where(['language_code'=>App::getLocale(),'status'=>1])->count();
            return response()->json(['data'=>$posts,'countAll'=>$countAll,'skip'=>$skip]);
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

public function page(Request $request ,$slug)   {

        $page = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();
        return view("Site::page",compact('page'));
    }


 public function videos_detail(Request $request ,$slug)   {

        $urlShare = $request->url();    
        $post = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();    

        $videoplay = Post::where(['language_code'=>App::getLocale(),'slug'=>$slug, 'status'=>1])->first();

        $postRelateSubCate = Post::where(['sub_category_group_id'=> $post->sub_category_group_id, ['sub_category_group_id', '<>', '0'],'language_code'=>App::getlocale(),'status'=>1])
                            ->limit(8)->orderBy('group_id','DESC')
                            ->get();

        if(count($postRelateSubCate) > 0){
            $postRelate=$postRelateSubCate;
        }else{
            $postRelateCate=Post::where(['category_group_id'=> $post->category_group_id,'language_code'=>App::getlocale(),'status'=>1])
                            ->limit(8)->orderBy('group_id','DESC')
                            ->get();
            $postRelate=$postRelateCate;                
        }


        $videolist = VideoList::where(['language_code'=>App::getLocale(),'status'=>1,'post_group_id'=>$post->group_id])->orderBy('order','ASC')->get(); 

        //count view
        $countView = Post::where('group_id',$post->group_id); 
        $countView->update(['count_view' =>  $post->count_view+1]);     

      //    $comment = Comment::where(['status'=>1,'post_group_id'=>$post->group_id])->orderBy('id','DESC')->limit(5)->get();

       $post_group_id = $post->group_id;
       return view("Site::videos_detail",compact('post','videolist','postRelate','comment','post_group_id','urlShare','videoplay'));
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

    //$posts = DB::table('post')->where(['category_group_id'=> $category->group_id,'language_code'=>App::getlocale(),'status'=>1])->orderBy('group_id','DESC')->paginate(Setting::getSetting()->per_page);

    return view('Site::category',compact('category','posts'));
}
public function getBycategory(Request $request ,$slug)
{   
            $offset=0;
            $limit = 12;            
            if(isset($request->offset)){
                $offset = $request->offset;
            }
            $skip = $limit * $offset;

     $category = Category::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();
     $posts = Post::where(['language_code'=>App::getLocale(),'status'=>1,'category_group_id'=> $category->group_id,'content_type'=>'post'])->take($limit)->skip($skip)->orderBy('group_id','DESC')->get();
    
     $countAll =  Post::where(['language_code'=>App::getLocale(),'status'=>1,'category_group_id'=> $category->group_id,'content_type'=>'post'])->count();
    return response()->json(['data'=>$posts,'countAll'=>$countAll,'skip'=>$skip]);
}

public function getBysubcategory(Request $request ,$slug)
{   
            $offset=0;
            $limit = 12;            
            if(isset($request->offset)){
                $offset = $request->offset;
            }
            $skip = $limit * $offset;

    $subcategory = SubCategory::where(['language_code' => App::getLocale(), 'slug' => $slug,'status'=>1])->first();

    $posts = Post::where(['language_code'=>App::getLocale(),'status'=>1,'sub_category_group_id'=> $subcategory->group_id,'content_type'=>'post'])->take($limit)->skip($skip)->orderBy('group_id','DESC')->get();
    
     $countAll =  Post::where(['language_code'=>App::getLocale(),'status'=>1,'sub_category_group_id'=> $subcategory->group_id,'content_type'=>'post'])->count();
    return response()->json(['data'=>$posts,'countAll'=>$countAll,'skip'=>$skip]);
}


public function subcategory(Request $request ,$slug)
{
    $subcategory = SubCategory::where(['language_code' => App::getLocale(), 'slug' => $slug, 'status'=>1])->first();
   // $posts = DB::table('post')->where(['sub_category_group_id'=> $subcategory->group_id,'language_code'=>App::getlocale(),'status'=>1])->orderBy('group_id','DESC')->paginate(Setting::getSetting()->per_page);  
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

    $posts = DB::table('post')->where(['sub_category_group_id'=> $subcategory->group_id,'language_code'=>App::getlocale(),'status'=>1])->orderBy('group_id','DESC')->get();

    return view('Site::subcategoryvideomore',compact('subcategory','posts'));
}


public function lastvideo(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1, 'post_status'=>'new'])->orderBy('group_id','DESC')->limit(16)->get();   
    return view('Site::lastvideo',compact('posts'));
}

public function lastvideomore(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1, 'post_status'=>'new'])->orderBy('group_id','DESC')->get();   
    return view('Site::lastvideomore',compact('posts'));
}


public function videofree(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1])->orderBy('group_id','DESC')->limit(16)->get();   
    return view('Site::videofree',compact('posts'));
}

public function videofreemore(Request $request)
{
   $posts = DB::table('post')->where(['language_code'=>App::getlocale(),'status'=>1])->orderBy('group_id','DESC')->get();   
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

public function contactR(Request $request){
    $feedback = new Feedback();
    if($feedback->create($request->all())){
        return response()->json(['status'=>'200']);
    }
     return response()->json(['status'=>'500']);
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
