<?php
$a=Swoole\Timer::tick(100, function(){
    echo "timAAA ".date("Y-m-d H:i:s")." \n";
	file_get_contents("https://www.baidu.com");
});

$b=Swoole\Timer::tick(100, function(){
    echo "timeoutBBB ".date("Y-m-d H:i:s")." \n";
});