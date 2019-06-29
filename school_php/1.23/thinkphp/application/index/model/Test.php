<?php

namespace app\index\model;

use think\Model;

class Test extends Model
{	
	  protected $table = 'sky_guest';
	protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
	
	public function getList(){
		return array(
			1=>array(
				"id"=>1,
				"title"=>"第一行数据"
			),
			2=>array(
				"id"=>2,
				"title"=>"第二行数据"
			)
		);
	}
}