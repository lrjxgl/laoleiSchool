<?php
class DB{
	public $mysqli;
	function __construct($host,$user,$pass,$dbname){
		$this->mysqli=new mysqli($host,$user,$pass,$dbname);
		if ($this->mysqli->connect_errno) {
		    printf("数据库连接出错: %s\n", $this->mysqli->connect_error);
		    exit();
		}
		$this->mysqli->set_charset("utf8mb4");
	}
	function query($sql){
		if($result = $this->mysqli->query($sql)){
			return $result;
		}
		exit($this->mysqli->error);
	}
	function getOne($sql){
		$result = $this->query($sql);
		$rs=$result->fetch_array(MYSQLI_NUM);
		return $rs[0];
	}
	function getRow($sql){
		$result = $this->query($sql);
		return $result->fetch_array(MYSQLI_ASSOC);
	} 
	function getAll($sql){
		$result = $this->query($sql);
		$list=array();
		while($rs=$result->fetch_array(MYSQLI_ASSOC)){
			$list[]=$rs;
		}
		return $list;
	}
	function getCols($sql){
		$result = $this->query($sql);
		$list=array();
		while($rs=$result->fetch_array(MYSQLI_NUM)){
			$list[]=$rs[0];
		}
		return $list;
	}
	function insert($sql){
		$this->query($sql);
		return $this->mysqli->insert_id;
	}
}

$db = new DB("localhost", "root", "123", "laoleiphp");
