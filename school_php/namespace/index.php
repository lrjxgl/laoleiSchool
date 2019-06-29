<?php

use mvc\arr;
use mvc\str;
require "arr/array.php";
require "str/string.php";

echo str\add("我是","中国人");
$a=array(1,2,3);
$b=array(6,7,8);
$c=arr\add($a,$b);
print_r($c);
