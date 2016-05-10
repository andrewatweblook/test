<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Input;

class User extends Controller
{
 	public function register()
    {
        return view('test_views\register');
    }
	
	public function register_process()
    {
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$message = '';
		$results = DB::select('select * from users where email = :email', ['email' => $email]);
		if(count($results)==0){
			DB::insert('insert into users (fullname, email, password) values (?, ?, ?)', [$fullname, $email, $password]);
			$message = $fullname.', Thank you for register with us.';
		}else{
			$message = $fullname.', Email is already registered with us.';
		}
        	return view('test_views\register_process', ['message' => $message]);
    }
	
	public function login()
    {
        return view('test_views\login');
    }

	public function login_process()
    {
		$email=$_POST['email'];
		$password=$_POST['password'];
		$message = '';
		$results = DB::select('select * from users where email = :email and password = :password', ['email' => $email, 'password' => $password]);
		if(count($results)==0){
			$message = 'Email or Password is wrong';
			return view('test_views\login_process', ['message' => $message]);
		}else{
			Session::put('uid', $results);
			return redirect('dashboard');
		}
    }
	
	public function dashboard(){
		$value = Session::get('uid');
		$mearray = array();
		foreach($value[0] as $vals){$mearray[]=$vals;}
		$results = DB::select('select * from gallery where uid = :uid', ['uid' => $mearray[0]]);
		$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
		return view('test_views\dashboard', ['value' => $results2,'gals'=>$results]);	
	}
	
	public function gallery_process(){
		$value = Session::get('uid');
		$mearray = array();
		foreach($value[0] as $vals){$mearray[]=$vals;}
		$destinationPath = 'uploads'; // upload path
		$extension = Input::file('fileField')->getClientOriginalExtension(); // getting image extension
		$fileName = $mearray[0].'_'.date('Ymdhis').'.'.$extension; // renameing image
		Input::file('fileField')->move($destinationPath, $fileName); // uploading file to given path
		DB::insert('insert into gallery (uid, img) values (?, ?)', [$mearray[0], $destinationPath.'/'.$fileName]);
		return redirect('dashboard');
	}
	
	public function profile_process(){
		$fullname=$_POST['fullname'];
		$password=$_POST['password'];
		$value = Session::get('uid');
		$mearray = array();
		foreach($value[0] as $vals){$mearray[]=$vals;}
		DB::statement("UPDATE users SET fullname = '".$fullname."', password = '".$password."'  where uid = ".$mearray[0]);
		return redirect('dashboard');
	}
	
	public function logout(){
		Session::forget('uid');
		return redirect('login');
	}

}
