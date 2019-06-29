<!DOCTYPE html> 
<html> 
<head>
	<title>认识 PHP-老雷PHP全栈开发教程</title>
</head>
<body> 
<h1>认识 PHP</h1>
<div>php是一种脚本语言，主要是用来做web应用</div>
<div> 学习参考：php手册  </div>
<?php
	/**
	 * 函数 echoln
	 **/
	function echoln($str){
		echo $str;
		echo "<br/>";
		return true;
	}
	//变量 $i
	$i=0;
	echoln($i);
	
	define("A","这是常量");
	echoln(A);
	/**运算符
	*算术运算符： + - * / %
	*赋值运算符：$x="a";  x += y ,x -= y,x *= y,x /= y.
	*比较运算符:x == y, x === y, x != y, x !== y, x > y, x < y, x >= y ,x <= y
	*逻辑运算符：x && y， x || y， ! x
	*三元运算符： x==y?a:b;
	**/
	echoln($i.A);
	/*数据类型
	*	String（字符串） $a="字符串";
		Integer（整型）	$a=1;
		Float（浮点型）	$a=1.234;
		Boolean（布尔型） $a=false; $a=true;
		Array（数组） $a=array(1,2,34,5);
		Object（对象） $a=new a();
		NULL（空值）。 $a=null
	*/
    //if for
	
	for($i=0;$i<10;$i++){
		if($i==5){
			echoln("i==5");
		}elseif($i==3){
			echoln("i==3");
		}else{
			echoln($i);
		}
	}
	//switch
	$act="b";
	switch($act){
		case "a":
			echoln("act==a");
			break;
		case "b":
			echoln("act==b");
			break;
		default:
			echoln($act);
	}
	//while
	$i=0;
	while($i<5){
		echoln("i=".$i);
		$i++;
	}
	//do while
	$i=6;
	do{
		echoln("至少执行一次 i=".$i);
	}while($i<5);
	$a="a";
	//数组
	$cars=array("Volvo","BMW","Toyota"); 
	$carss=["Volvo","BMW","Toyota"];
	print_r($cars);
	echo "<br/>";
	$arr=array(
		"a"=>"aaa",
		"b"=>"bbbb",
		"c"=>"cccc"
	);
	print_r($arr);
	echo "<br/>";
	echoln($cars[1]);
	echoln($arr["a"]);
	//函数
	function abc(){
		return "abc";
	}
	$b=$a;
	echoln($b);
	$c= abc();
	echoln($c);
	//类
	class a{
		public function __construct(){
			
		}
		public static function b(){
			
		}
		public function abc(){
			return "function abc";
		}
	}
	$a=new a();
	//a::b(); 
	echoln($a->abc());
	class b extends a{
		public function __construct(){
			parent::__construct();
		}
		public function d(){
			return  "function d";
		}
	}
	$b=new b();
	echoln($b->abc());
	echoln($b->d());
?> 
  
</body> 
</html>
//去看 去写 去执行