<?php
$redis=new redis();
$redis->connect('127.0.0.1', 6379);
$key="aaa";
$redis->set($key,"aaa",100);
echo $redis->get($key);
echo "<br/>";
echo "<a>aaa</a>"

/*
$redis->del($key);
if(!$redis->get($key)){
	echo "$key 不存在";
}
*/
?>
 