<?php

namespace App\Modules\Site\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Site\Models\Customer;

use Auth;
use Session;
use Redirect;
use Validator;
use DB;
use App;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
    }

     public function logout(Request $request)
    {
      Session::forget('customer');
      return redirect('/');
    }

    public function register(Request $request)
    {
       $this->validate($request, [
            'username' => 'required|unique:customer,username',
            'password' => 'required',
            'email' => 'required|unique:customer,email',
        ]);

       $customer = new Customer();
       $customer->username = $request->username;
       $customer->password = md5($request->password);
       $customer->confirm_password = $request->password;
       $customer->email = $request->email;
       $customer->phone = $request->phone;

       if($customer->save()){
        Session::flash('success','Register is successfully');
        return redirect('customer/login');
       }else{        
        Session::flash('failed','Register is failed');
        return Redirect::back();
       }

    }

     public function login(Request $request)
    {
        
        if($request->oldUrl){
        Session::put('oldUrl',$request->oldUrl);
        }

     $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $customer = Customer::where('username','=', $username)
                           ->where('password','=', md5($password))
                           ->where('status','=', '1')
                           ->first();   
        if(Session::has('customer')){ 
          Session::forget('customer');
          Session::put('customer',$customer);  
         }else{
           Session::put('customer',$customer);
         }  

        if(!Session::has('customer')){
            Session::flash('failed','User Name and Password Invalid!');
                 return Redirect::back();
            }else{
        

        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            return redirect::to($oldUrl);
        }else{
            return redirect('/');
        }
       
      } 
     
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
