<?php
$e=123;
$f=&$e;
$f=346;
echo $e."<br/>";
class A {
    public $foo = 1;
}  
class C{
	public $foo=4;
}
$a = new A;
$b = $a;     // $a ,$b都是同一个标识符的拷贝
             // ($a) = ($b) = <id>
$b->foo = 2;
$b=NULL; 
echo "a->".$a->foo."\n";
 
$c = new A;
$d = &$c;    // $c ,$d是引用
             // ($c,$d) = <id>
$d->foo = 3;
//$d=NULL;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 4;
	
}

foo($e);
 
echo $e->foo."\n";

?> 