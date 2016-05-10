<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Controllers\Controller as Controller;
use DB;

class Home extends Controller
{
 	public function index()
    {
		$value = Session::get('uid');
		if(isset($value)){
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\home',['value' => $results2]);
		}else{
			 return view('test_views\home');	
		}
    }

 	public function about()
    {
		$value = Session::get('uid');
		if(isset($value)){
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\about',['value' => $results2]);
		}else{
			return view('test_views\about');	
		}

    }
	
 	public function contact()
    {
		$value = Session::get('uid');
		if(isset($value)){
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\contact',['value' => $results2]);
		}else{
			return view('test_views\contact');	
		}

    }

}
