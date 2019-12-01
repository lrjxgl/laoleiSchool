<?php
function myFun($a,$b=2){
	echo "fun";
	return "函数定义".($a+$b);
}
function aa(){
	$args = func_get_args();
	print_r($args);
}
function bb(...$args){
	print_r($args);
}
echo myFun(1);
aa(1,2,3,4,5);
bb(1,2,3,4,5);
$message=" world!";
$example = function ($arg) use ($message) {
	var_dump($arg . ' ' . $message);
};
$example("hello");
?>