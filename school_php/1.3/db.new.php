<?php
 class DB{
	public  $mysqli;
	 public  function __construct(){
		 
	 }
	 public  function connect($host,$user,$pwd,$database){
		$this->mysqli = new mysqli($host,$user,$pwd,$database);
		$this->mysqli->set_charset("utf8");
	 }
	 public function stmt_bind_param($stmt,$params){
	 		if ($params != null) {
	 			$types = ''; 
	 			foreach($params as $param) {
	 			  if(is_int($param)) {
	 				$types .= 'i'; //integer
	 			  } elseif (is_float($param)) {
	 				$types .= 'd'; //double
	 			  } elseif (is_string($param)) {
	 				$types .= 's'; //string
	 			  } else {
	 				$types .= 'b';
	 			  }
	 			}
	 			$bind_names[] = $types;
	 			for ($i=0; $i<count($params);$i++) {
	 			  $bind_name = 'bind' . $i;
	 			  $$bind_name = $params[$i];
	 			  $bind_names[] = &$$bind_name;
	 			}
	 			call_user_func_array(array($stmt,'bind_param'),$bind_names);
	 		  }
	 		  return $stmt; 
	 }
	 public  function query($sql,$param=array()){
		 if(!empty($param)){
			 $stmt =  $this->mysqli->stmt_init();
			 $stmt->prepare($sql);
			 $stmt=$this->stmt_bind_param($stmt,$param);
			 $stmt->execute();
			 $res=$stmt->get_result();
		 }else{
			 $res=$this->mysqli->query($sql);
		 }
		 
		 if($this->mysqli->error){
			 echo $this->mysqli->error;
			 exit;
		 }
		 return $res;
	 }
	 public  function getAll($sql,$param=array()){
		$res=$this->query($sql,$param);
		
		 return $res->fetch_all(MYSQLI_ASSOC);
	 }
	 public  function getRow($sql,$param=array()){
		 $res=$this->query($sql,$param);
		 return $res->fetch_assoc();
	 }
	 public  function getCols($sql,$param=array()){
		$res=$this->query($sql,$param);
		$data=array();
		if($res){
			while($rs=$res->fetch_row()){
				$data[]=$rs[0];
			}
		}
		
		return $data;	
	 }
	 public  function getOne($sql,$param=array()){
		$res=$this->query($sql,$param);
		$rs= $res->fetch_row();
		if($rs){
			return $rs[0];
		}else{
			return false;
		}
	 }
	  
	 public function close(){
		 $this->mysqli->close();
	 }
	 public function __destruct(){
		 $this->close();
	 }
 }
 class MODEL extends DB{
	 public  $table="";
	 public $pre="sky_";
	 public function __construct(){
		 parent::__construct();
	 }
	
	 public  function setTable($table){
		$this->table=$this->pre.$table;
		return $this;
	 }
	 public  function select($ops){
		$sql="select * from ".$this->table." where {$ops['where']} order by {$ops['order']} limit {$ops['start']},{$ops["limit"]} "; 
	 
		return parent::getAll($sql); 
	 }
	
	 
 }
 function M($table){
	global $db;
	$db->setTable($table);
	return $db; 
 }
$db=new model();
$db->connect("localhost", "root", "123", "laoleiphp");
 
$res=$db->setTable("guest")->getAll("select * from sky_guest limit 3 ");
 print_r($res);
 $res=M("guest")->select(array(
	"where"=>" 1 ",
	"start"=>4,
	"order"=>"id DESC",
	"limit"=>3
 ));
 print_r($res);
 $res=M("guest")->getAll("select * from sky_guest where id>? AND catid=? limit 3",array(4,1));
 print_r($res);