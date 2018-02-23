<?php namespace App\Modules\Security\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Modules\Security\Models\Security;
use Session;
use Redirect;
use Auth;
use App\Http\Classes\BackupDB;

class BackupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	$con = DB::connection()->getconfig();	 

	$host = $con['host'];
	$username = $con['username'];
	$password = $con['password'];
	$database = $con['database'];


$backupDatabase = new BackupDB($host, $username, $password, $database);
$result = $backupDatabase->backupTables("*");
return redirect(url($result));

} 

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function block($id)
	{
		$block = Block_Ip::find($id); 
		$block->status = 1;
		$block->save();
		Session::flash('save','Block is Successfully !');
		return Redirect::back();
	}

	public function unblock($id)
	{
		$block = Block_Ip::find($id); 
		$block->status = 0;
		$block->save();
		Session::flash('save','UnBlock is Successfully !');
		return Redirect::back();
	}

	public function addblock($id)
	{
		$block = new Block_Ip();
		$log = Security::find($id);
		//dd($log->ip_address);		
		$block->ip_address = $log->ip_address;		
		$block->status = 1;
		$block->user_id = Auth::user()->id;		
		$block->save();
		Session::flash('save','Block is Successfully !');
		return Redirect::back();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
