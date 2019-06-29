<?php
cache::set("a","1");
echo cache::get("a");
$mem=new memcache();
$mem->connect('localhost', 11211);
$mem->set("aa","aa",0,30);
echo $mem->get("aa");
$redis=new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->set("rk","redis缓存",30);
echo $redis->get("rk");
class cache{
	public static $dir="cache";
	public static function set($k,$v,$expire=12345678){
		$md5=md5($k);//有可能会冲突
		//md5值切割成目录a/b/c/$k
		$content=serialize(array(
			"value"=>$v,
			"expire"=>time()+$expire
		));
		file_put_contents(self::$dir."/".$k,$content);
	}
	public static function get($k){
		$md5=md5($k);
		if(!file_exists(self::$dir."/".$k)){
			return false;
		}
		$c=file_get_contents(self::$dir."/".$k);
		$arr=unserialize($c);
		if($arr["expire"]<time()){
			return false;
		}
		return $arr["value"];
	}
}

?>