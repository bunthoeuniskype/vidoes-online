<?php

namespace App\Modules\Security\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Auth;
use Hash;
use Redirect;
use DB;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::all();  
      return view("Security::user.index",compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("Security::user.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            
        ]);

    if(Auth::user()->name !== "Admin"){
        Session::flash('failed','Don\'t have permission for create user!');
        return Redirect::back();
    }else{
      $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        
        Session::flash('save','Save is Successfully!');
        return redirect('admin/user');  
    }

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
        $user = User::find($id);       
        //$roles = Role::lists('display_name','id'); 
        //$userRole = $user->roles->lists('id','id')->toArray();
         
        return view('Security::user.edit',compact('user'));
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
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm_password',
           
        ]);

     if(Auth::user()->name !== "Admin"){

        Session::flash('failed','Don\'t have permission for update user!');
        return Redirect::back();

    }else{
   
        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
           $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        if($user->name === "Admin" && $request->name !== "Admin"){
        Session::flash('failed','Admin Can\'t Change Your Name but can only change email and password!');
        return Redirect::back();
        }else{
        $user->update($input);        
        Session::flash('save','Save is Successfully!');
        return redirect('admin/user');
        }
        
       }

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
