<?php
session_start();
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"index";
require "db.class.php";
$user=new User($db);
$user->$a();
class User{
	public $db;
	public function __construct($db){
	    $this->db=$db;
	}
	public function Index(){
		 
		$this->tokenLogin();
		require "tpl/index.php";
	}
	public function Login(){
		
		require "tpl/login.php";
	}
	public function LoginSave(){
		$username=$_POST["username"];
		$password=$_POST["password"];
		if(empty($username) ){
			$msg="用户名不能为空";
			require "tpl/msg.php";
			exit;
		}
		$row=$this->db->getRow("select * from sky_user where username='".$username."' ");
		if(!$row){
			$msg="用户名{$username}不存在";
			require "tpl/msg.php";
			exit;
		}
		if(md5($password)!=$row["password"] ){
			$msg="账户密码出错";
			require "tpl/msg.php";
			exit;
		}
		
		$msg="登录成功";
		$_SESSION["ssuser"]=array(
			"userid"=>$row["userid"],
			"nickname"=>$row["nickname"]
		);
		//实现记住账号功能
		$token=$row["userid"].".".md5($row["userid"].$row["password"]);
		setcookie("ssToken",$token,time()+3600*24,"/");
		require "tpl/msg.php";
	}
	public function tokenLogin(){
		if(!isset($_SESSION["ssuser"])){
			if(isset($_COOKIE["ssToken"])){
				$token=$_COOKIE["ssToken"];
				$arr=explode(".",$token);
				$row=$this->db->getRow("select * from sky_user where userid='".intval($arr[0])."' ");
				if($arr[1]==md5($row["userid"].$row["password"])){
					$_SESSION["ssuser"]=array(
						"userid"=>$row["userid"],
						"nickname"=>$row["nickname"]
					);
				}
			}
		}
	}
	public function register(){
		require "tpl/register.php";
	}
	public function registerSave(){
		$username=$_POST["username"];
		$nickname=$_POST["nickname"];
		$password=$_POST["password"];
		$password2=$_POST["password2"];
		if(empty($username) || empty($nickname)){
			$msg="用户名或者昵称不能为空";
			require "tpl/msg.php";
			exit;
		}
		$row=$this->db->getRow("select * from sky_user where username='".$username."' or nickname='".$nickname."' ");
		
		if($row){
			$msg="用户名或者昵称已经存在";
			require "tpl/msg.php";
			exit;
		}
		if($password!=$password2){
			$msg="两次密码输入不一致";
			require "tpl/msg.php";
			exit;
		}
		$sql="insert into sky_user set
				username='".$username."',
				nickname='".$nickname."',
				password='".md5($password)."'
		";
		$this->db->insert($sql);
		$msg="注册成功";
		require "tpl/msg.php";
		exit;
	}
	public function loginOut(){
		unset($_SESSION["ssuser"]);
		setcookie("ssToken",0,time()-10,"/");
		$msg="注销成功";
		require "tpl/msg.php";
	}
	
}