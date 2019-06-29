<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
class IndexController extends Controller
{
    
	
	public function index(){
		$data=array(
			"title"=>"老雷的博客",
			"description"=>"老雷的博客专门讲web开发的",
			"List"=>DB::select('select * from sky_guest order by id DESC limit 10')
		);
		//return redirect(url("/index/add"));
		return view("index",$data);
	}
	
	public function show($id){
		$data=DB::table("sky_guest")->where("id",$id)->first();
		$data=array(
			"data"=>$data
		);
		return view("show",$data);
	}
	public function add($id=0){
		if($id){
			$data=DB::table("sky_guest")->where("id",$id)->first();
		}else{
			$data=array();
		}
		
		$data=array(
			"data"=>$data
		);
		return view("add",$data);
	}
	public function create(Request $request){
		//$title=$request->input('title');
		$post=$request->all();
		if(isset($post["id"])){
			DB::table("sky_guest")
				->where("id",$post["id"])
				->update(array(
					"title"=>$post["title"],
					"content"=>$post["content"]
				));
		}else{
			DB::table("sky_guest")->insert(array(
				"title"=>$post["title"],
				"content"=>$post["content"]
			));
		}
		echo json_encode(array(
			"error"=>0,
			"message"=>"success",
			"data"=>$request->all()
		));
	}
}
