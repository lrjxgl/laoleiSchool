<?php
class Demo
{
   public $pub_one="这是公有的";
   protected $prot_one="这是受保护的";
   private $private_one="这是私有的";
   
   static $static_one="static这是可以直接访问的";
	const constant = 'constant value';
   public function __construct(){
	   echo "start <br/>";
   }
   public function  __destruct(){
	   echo "end <br/>";
   }
   function test(){
	   echo "test is public <br/>";
   }
   private function private_test(){
	   echo "private_test is private <br/>";
   }
    protected function protected_test(){
   	   echo "protected_test is protected <br/>";
   }
   public function get(){
	   $this->private_test();
	   echo $this->private_one;
	   echo self::$static_one;
   }
   public function set($private_one){
	   $this->private_one=$private_one;
   }
   
   
}

class Child extends demo{
	
	public function my(){
		
	}
	public function p(){
		parent::test();
		//parent::private_test();
		parent::protected_test();
	}
}
/*
$demo=new Demo();

echo $demo::constant;
echo $demo->pub_one;

echo $demo->prot_one;
echo $demo->private_one;

//$demo->test();
//$demo->private_test();
//$demo->protected_test();
$demo->get();

*/

$demo=new Child();
$demo->set("这是设置的私有的<br/>");
$demo->get();
//$demo->protected_test();
$demo->p();
/**/
?> 