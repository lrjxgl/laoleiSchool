<?php
//算术运算符
/*
$a=1;$b=2;
echo $a+$b;
 echo 3**3;
 */
//赋值运算符
$a = 3;
$a += 5; // 等于 $a = $a + 5;
echo $a;
$b = "Hello ";
$b .= "There!" ;//$b=$b."There";
echo $b;
//比较运算符
 $a=3;$b=4;
 if($a>$b){
	 echo "a>b";
 }else{
	 echo "a<=b";
 }
//递增／递减运算符
 $a=1;
 echo ++$a;
 $a=1;
 echo $a++;
//逻辑运算符
 $a=true;$b=false;
 if($a && $b){
	 echo "a b true";
 }
 //字符串运算
 $a = "Hello ";
 $b = $a . "World!";
 $a = "Hello ";
 $a .= "World!";
 b=$a.' World';
?>
