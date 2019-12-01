<?php

// PHP 7 之前的代码
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}
class Util{
	public function setLogger($obj){
		$obj->log("hhh");
	}
}
$util=new Util();
$util->setLogger(new Logger());

// 使用了 PHP 7+ 后的代码
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
 