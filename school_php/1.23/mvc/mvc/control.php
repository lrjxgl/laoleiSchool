<?php
require "db.php";
require "model.php";
require "view.php";
require "function/function.php";
$dbconfig=require "app/config/config.php";
$m=isset($_GET['m'])?$_GET['m']:"index";
$a=isset($_GET['a'])?"on".$_GET['a']:"onDefault";
require "app/control/$m.ctrl.php";
$mctrl=$m."control";
$ctrl=new $mctrl();
$ctrl->$a();

function M($model){
	$mdclass=$model."model";
	if(isset($GLOBALS[$mdclass])){
		return $GLOBALS[$mdclass];
	}
	require_once "app/model/".$model.".model.php";
	
	$GLOBALS[$mdclass]=new $mdclass();
	$GLOBALS[$mdclass]->connect(dbConfig::$host,dbConfig::$user,dbConfig::$password,dbConfig::$database);
	$GLOBALS[$mdclass]->table="sky_".$model;
	return $GLOBALS[$mdclass]; 
}
class control{
	public $view;
	public function __construct(){
		$this->view();
	}
	public function View(){
		$this->view=new view("app/view");
		//view::init("app/view");
	}
	
	 
}
?>