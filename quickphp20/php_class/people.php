<?php
class people{
	//属性
	const constant = '常量';
	private $sec="秘密";
	public $height=123;
	protected $age=10;
	public $weight=64;
	//构造函数
	public function __construct(){
		echo "构造函数初始化";
	}
	public function __desctruct(){
		echo "虚构函数 收尾";
	}
	protected function age(){
		return $this->age;
	}
	private function secret(){
		return "这是我的秘密";
	}
	public function love(){
		return "love food";
	}
	public function say(){
		return "say you ";
	}
}
class girl extends people{
	public function __construct($age){
		$this->age=$age;
	}
	public function getAge(){
		return $this->age;
	}
	public function say(){
		$str=parent::say();
		return $str." say me";
	}
}
class boy extends people{
	public $weight=123;
	public function __construct($age){
		$this->age=$age;
	}
	public function getAge(){
		return $this->age;
	}
	public function weight(){
		return $this->weight;
	}
}
$girl=new girl(18);
echo $girl->getAge();
echo $girl->love();
echo $girl->say();
echo $girl->height;
