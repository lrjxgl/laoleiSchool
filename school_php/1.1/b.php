<?php
//namespace php\base;
require "a.php";
use php\base;
$b=new base\a();
$b->set("asdasd");
echo $b->get();
echo mb_strlen("我是中国人my");
echo mb_substr("我是中国人my",1,3);
$string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

$xml = simplexml_load_string($string);

print_r($xml);