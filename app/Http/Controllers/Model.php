<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Input;
use App\Flight;

class Model extends Controller
{
 	public function model_insert()
    {
		$value = Session::get('uid');
		$mearray = array();
		foreach($value[0] as $vals){$mearray[]=$vals;}
		$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
		$flights = Flight::all();
        return view('test_views\model_insert',['value' => $results2,'flights' => $flights]);
    }
 	public function model_update($fid)
    {
		$value = Session::get('uid');
		$mearray = array();
		foreach($value[0] as $vals){$mearray[]=$vals;}
		$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
		$flight = Flight::where('fid',$fid)->first();
		return view('test_views\model_update',['value' => $results2,'flight'=>$flight]);
    }
 	public function model_delete($fid)
    {
		try{
			$flight = Flight::find($fid);
			$flight->delete();
			return redirect('model_insert');
		}catch(\Illuminate\Database\QueryException $e){
			$message = $e->getMessage();
			$value = Session::get('uid');
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\model_delete_process',['value' => $results2,'message' => $message]);
		}
    }

 	public function model_insert_process()
    {
		try{
			$fnumber=$_POST['fnumber'];
			$seats=$_POST['seats'];
			$origin=$_POST['origin'];
			$flight = new Flight;
			$flight->fnumber = $fnumber;
			$flight->seats = $seats;
			$flight->origin = $origin;
			$flight->save();
			return redirect('model_insert');
		}catch(\Illuminate\Database\QueryException $e){
			$message = $e->getMessage();
			$value = Session::get('uid');
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\model_insert_process',['value' => $results2,'message' => $message]);
		}
		
    }
 	public function model_update_process()
    {
		try{
			$fid=$_POST['fid'];
			$fnumber=$_POST['fnumber'];
			$seats=$_POST['seats'];
			$origin=$_POST['origin'];
			Flight::where('fid',$fid)
			->update(['fnumber' => $fnumber,'seats' => $seats,'origin' => $origin]);
			return redirect('model_insert');
		}catch(\Illuminate\Database\QueryException $e){
			$message = $e->getMessage();
			$value = Session::get('uid');
			$mearray = array();
			foreach($value[0] as $vals){$mearray[]=$vals;}
			$results2 = DB::select('select * from users where uid = :uid', ['uid' => $mearray[0]]);
			return view('test_views\model_update_process',['value' => $results2,'message' => $message]);
		}
    }


}
