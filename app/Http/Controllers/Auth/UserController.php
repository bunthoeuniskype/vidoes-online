<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Redirect;
use Session;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
use App\Setting;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;

//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserController extends Controller
{

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;
 
 use ThrottlesLogins, RedirectsUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/sys_admin';

 public function username()
    {
        return 'email';
    }

	public function __construct()
    {
   //  $this->middleware($this->guestMiddleware(), ['except' => 'logout']);     
    }

    public function index()
    {      
         
        
    }
    public function viewsignin()
    {
    	if(Auth::guest()){
        	 $setting = Setting::orderBy('id','DESC')->first();
          return view('sys_admin.login', compact('setting'));
        }else{
          return redirect('/sys_admin');           
        }  
    }

 

    public function signout()
    {
        Auth::guard($this->getGuard2())->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/sys_admin');
    }

 	protected function getGuard2()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

   
    public function signin(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        $block_ip = DB::table('block_ip')->select(['ip_address'])->where('status',1)->get();
        
        foreach ($block_ip as $value) {
            if($value->ip_address == $_SERVER['REMOTE_ADDR']){
               Session::flash('failed','Your Account have been block by admin!');
                return Redirect::back();
            }
        }

        //dd($block_ip);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
       
        $credentials = $this->getCredentials($request,['status'=>1]);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
             DB::table('log_history')->insert(['user_id' => Auth::user()->id,'ip_address' => $_SERVER['REMOTE_ADDR'],'date' => Carbon::now("Asia/Bangkok") ]);           
        //     return redirect('sys_admin');  
         return $this->handleUserWasAuthenticated($request, $throttles);            
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }
        
        Session::flash('failed','E-mail and Password Invalid !');
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {

        \Session::put('locale',$request->locale);       

        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);        
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'These credentials do not match our records.';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request, $status)
    {
        $r = $request->only($this->loginUsername(), 'password');
        $data = array_merge($status,$r);
        return $data;
    }

 
    /**
     * Get the guest middleware for the application.
     */
    public function guestMiddleware()
    {
        $guard = $this->getGuard();

        return $guard ? 'guest:'.$guard : 'guest';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    /**
     * Determine if the class is using the ThrottlesLogins trait.
     *
     * @return bool
     */
    protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(static::class)
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
    
}

    

