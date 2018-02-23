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
use Mail;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
     if(!Session::has('customer')){         
     return redirect('customer/login');
      }else{
        $customer = Customer::find(Session::get('customer')->id);
        return view('Site::customer_profile',compact('customer'));
     }
     
    }


    public function verify(Request $request)
    {       
       $customer = Customer::where(['verify'=>$request->verify,'status'=>'0'])->orderBy('id','DESC')->first();
      
        if(count($customer) > 0){
            $c = Customer::find($customer->id);
        $c->status = 1;
        if($c->save()){
        Session::flash('success','Verify is Successfully');
        return redirect('customer/login');
        }else{
         Session::flash('failed','Verify is Expired');
         return redirect('customer/login');
         }

        }else{
         Session::flash('failed','Verify is Expired');
         return redirect('customer/login');
        }
        

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
            'email' => 'required|email',
        ]);

       $verify = str_random(25).''.date('Ymdhis');
       $customer = new Customer();
       $customer->username = $request->username;
       $customer->password = md5($request->password);
       $customer->confirm_password = $verify.'&p='.$request->password.'&v='.$verify;
       $customer->email = $request->email;
       $customer->phone = $request->phone;  
       $customer->status = 0;      
       $customer->verify = $verify;

       if($customer->save()){
        
        $password = $request->password;
        $username = $request->username;
        $receiveby = $request->email;
        $subject = 'Hi '.$request->username.' Please Verify Email Address';
        $messages = url('verify/'.$customer->verify);
    
      Mail::send('Site::message',compact('messages','username','password'), function ($message) use ($receiveby,$subject) {     
        $message->from('admin@ecamschool.com', 'E-Cam School');        
        $message->to($receiveby)->subject($subject);
      
      });

        Session::flash('success','Please Verify Email Address : '.$customer->email);
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

         $verify = Customer::where('username','=', $username)
                           ->where('password','=', md5($password))
                           ->where('status','=', '0')
                           ->first(); 
        if(count($verify) > 0){

        Session::flash('failed','Please Verify Email Address!');
        return Redirect::back();
        }

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
            return redirect('customer/profile');
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
    public function update(Request $request)
    {
       
       $customer = Customer::find(Session::get('customer')->id);

       $this->validate($request, [
            'username' => 'required|unique:customer,username,'.$customer->id.',id',
            'password' => 'same:confirm_password',
            'email' => 'required|email',
        ]);

        $requestData = $request->all();  
        
        $verify = str_random(25).''.date('Ymdhis');

        $data =  array_merge($requestData , array(         
        'dob'=> implode("-", array_reverse(explode("/", $request->dob))),
        )); 
            
        if(!empty($request->password)){ 
        $data['password'] = md5($request->password);          
        $data['confirm_password'] =  $verify.'&p='.$request->password.'&v='.$verify;
        }else{
           $data = array_except($data,array('password','confirm_password'));    
        }

       if($customer->update($data)){
        return response()->json(['updated'=>true]);
       }else{
        return response()->json(['updated'=>false]);
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
