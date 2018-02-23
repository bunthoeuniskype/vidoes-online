<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
   
   public function index()
   {   	

   	$user_count = DB::table('users')->count('id');
   	$feedback_count = DB::table('feed_back')->count('id');
   	$customer_count = DB::table('customer')->count('id');
   	return view('sys_admin.dashboard',compact('user_count','customer_count','feedback_count'));
   }
   
}
