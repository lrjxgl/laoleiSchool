<?php
 class DB{
	public static $mysqli;
	 public  function __construct(){
		 
	 }
	 public static function connect($host,$user,$pwd,$database){
		self::$mysqli = new mysqli($host,$user,$pwd,$database);
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
	 public static function close(){
		 self::$mysqli->close();
	 }
	 public function __destruct(){
		 self::$mysqli->close();
	 }
 }


 DB::connect("localhost", "root", "123", "laoleiphp");
$res=DB::getAll("select * from sky_guest limit 10 ");
 print_r($res);