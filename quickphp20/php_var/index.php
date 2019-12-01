<?php
	$a="这是一个变量";
	echo $a;
	$t=true;
	var_dump($t);
	//字符串
	$a="字符串";
	$b='字符串';
	$d=$a."连接起来了";
	$e="$a $b";
	echo $d;
	//数组
	$a=array("a","b","c");
	//key a b c
	$b=array(
		"a"=>"aaa",
		"b"=>"bbb",
		"c"=>"ccc"
	);
	$array = [
		"foo" => "bar",
		"bar" => "foo",
	];
	print_r($b);
	//变量范围
	$a=1;
	function bb(){
		global $a;
		$a=2;
	}
	bb();
	echo $a;
	//可变变量
	$a="b";
	$b=1;
	echo $$a;
?>