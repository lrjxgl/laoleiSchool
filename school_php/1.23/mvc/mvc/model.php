<?php
class model extends DB {
	
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
	
	public function selectRow($ops){
		
		$where=isset($ops["where"])?$ops["where"]:"1";
		$orderby=isset($ops["ordder"])?" order by {$ops['order']} ":"";
		$limits=isset($ops["limit"])?"limit {$ops['start']},{$ops["limit"]} ":"";
		$sql="select * from ".$this->table." where $where $orderby $limits ";
		return parent::getRow($sql); 
	}
	
	public function insert($data){
		$sql="insert into ".$this->table." set  ";
		$i=0;
		foreach($data as $k=>$v){
			if($i>0){
				$sql.=",";
			}
			$sql.= " $k='".$v."'";
			$i++;
		}
		$this->query($sql);
		return $this->mysqli->insert_id;
	}
	
	public function update($data,$where){
		$sql="update ".$this->table." set  ";
		$i=0;
		foreach($data as $k=>$v){
			if($i>0){
				$sql.=",";
			}
			$sql.= " $k='".$v."'";
			$i++;
		}
		$sql.=" where $where ";
		$this->query($sql);
		 
	}
}
?>