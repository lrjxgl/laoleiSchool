<?php
 class DB{
	public static $mysqli;
	 public  function __construct(){
		 
	 }
	 public static function connect($host,$user,$pwd,$database,$port="3306"){
		self::$mysqli = new mysqli($host,$user,$pwd,$database,$port);
		self::$mysqli->set_charset("utf8");
	 }
	 public static function query($sql){
		 $res=self::$mysqli->query($sql);
		 if(self::$mysqli->error){
			 echo self::$mysqli->error;
			 exit;
		 }
		 return $res;
	 }
	 public static function getAll($sql){
		 $res=self::$mysqli->query($sql);
		 return $res->fetch_all(MYSQLI_ASSOC);
	 }
	 public static function getRow($sql){
		 $res=self::$mysqli->query($sql);
		 return $res->fetch_assoc();
	 }
	 public static function getCols($sql){
		$res=self::$mysqli->query($sql);
		$data=array();
		while($rs=$res->fetch_row()){
			$data[]=$rs[0];
		}
		return $data;	
	 }
	 public static function getOne($sql){
		$res=self::$mysqli->query($sql);
		$rs= $res->fetch_row();
		if($rs){
			return $rs[0];
		}else{
			return false;
		}
	 }
 }
 DB::connect("127.0.0.1", "kingServer", "kingshard", "laoleiphp","9696"); 
 //DB::query("insert into sky_test_shard_range set id=40002,  title='kingshard demo' ");
 $time=time();
$res= DB::getRow("select count(*) from sky_test_shard_range where id>100 AND id<20000 ");
 print_r($res);