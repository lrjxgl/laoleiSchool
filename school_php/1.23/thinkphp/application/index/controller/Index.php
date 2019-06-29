<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Test;
class Index extends Controller
{
	public function __construct(){
		parent::__construct();
	}
    public function index()
    {
        // 获取包含域名的完整URL地址
		$test=new test();
        $this->assign(array(
			'list'=>$test->getList(),
			"dbList"=>Db::table('sky_guest')->select(),
			"mdList"=>$test->select()
		));
        return $this->fetch('index');
    }
	public function show(){
		$test=new test();
		$id=input('get.id');;
		 $this->assign(array(
			"data"=>$test->get($id)
		 ));
		return $this->fetch('show');
	}
	public function add(){
		$test=new test();
		$id=input('get.id');
		 $this->assign(array(
			"data"=>$test->get($id)
		 ));
		return $this->fetch('add');
	}
	public function Create(){
		
		$data=[
			'title'  =>  input('post.title'),
			"content"=>input('post.content'),
			'userid' =>  time()
		];
		$test = new test();
		if(!$id=input('post.id')){
		 
			$test->save($data);
		}else{
			$test->save($data,["id"=>$id]);
		}
		
		return array("error"=>0,"message"=>"保存成功");
	}
	
	public function deleteData(){
		$id=input('get.id');
		$test = new test();
		$test->where("id",$id)->delete();
		return array("error"=>0,"message"=>"删除成功");
	}
}
