<?php
//session_start();
//echo AI::baidu("你好");

class AI{
	public static $dayTime="早上";
	public static $skills=[""];
	public static $talkList=[];
	public static $dir="ailog";
	public static $aiConfig=array();
	public static $uLogIds=array();
	public static $maxStep=5;
	public function init(){
		$config=DB::getRow("select * from ".DB::$tablepre."mod_im_ai  ");
		$cfg=json_decode($config["content"],true);
		if(!empty($cfg)){
			$self::$aiConfig=$config;
		}else{
			$self::$aiConfig=array_merge($config,$cfg);
		}
		 
	}
	public function getTime(){
		$time=time();
		
	}
	public static function answer($ask,$touid="",$fuid=""){
		$re=self::myAnswer($ask,$touid,$fuid);
		if($re){
			return $re;
		}
		return self::baidu($ask,$touid,$fuid);
		 
	}
	public static function write($ask){
		file_put_contents("ask.txt",$ask."\n\r",FILE_APPEND);	
	}
	public static function myAnswer($ask,$touid="",$fuid=""){
		if(preg_match("/你叫什么名字|您的名字|怎么称呼/",$ask)){
			return self::getName($touid);
		}
		if(preg_match("/你多大了|你几岁了|芳龄|几岁了/",$ask)){
			return "我今年1岁了";
		}
	}
	public static function getName($uid){
		switch($uid){
			case "fd175.1511":
				return "我是ai小王子";
				break;
			default:
				return "我是ai小仙女";
				break;
		}
	}
	public static function baidu($ask="",$touid="",$fuid=""){
		$asker=md5($touid.$fuid);
		$token = self::baiduToken();
		$url = 'https://aip.baidubce.com/rpc/2.0/unit/service/chat?access_token=' . $token;
		$log_id=microtime(true);
		$sec=explode(".",$log_id)[1];
		$timestamp=date("Y-m-d H:i:s.",$log_id).substr($sec,0,3);
		$req=array(
			"version"=>"2.0",
			"service_id"=>"",
			"skill_ids"=>self::$skills,			
			"log_id"=>$log_id,
			//"session_id"=>"",
			"session_id"=>"",
			"request"=>array(
				"query"=>$ask,
				"user_id"=>"1"
			)
			 
		);
		
		if(isset(self::$talkList[$asker]) && !empty(self::$talkList[$asker])){
			$req["session"]=json_encode(array(
				"service_id"=>"",
				"session_id"=>$asker,
				"skill_sessions"=>self::$skills,
				"interactions"=>self::$talkList[$asker],
				//"interactions"=>$_SESSION[$asker]
			));
		}
		$bodys = json_encode($req);
		$res = self::curl_post($url, $bodys);
		 
		$json=json_decode($res,true);
		
		if($json["error_code"]==0){
			self::$uLogIds[$asker]=$log_id;
			if( isset(self::$talkList[$asker]) && count(self::$talkList[$asker])>5){
				array_shift(self::$talkList[$asker]);
			}
			self::$talkList[$asker][]=array(
				"interaction_id"=>$log_id,
				"timestamp"=>$timestamp,
				"request"=>$req["request"],
				"response_list"=>$json["result"]["response_list"]
			);
			//$bodys;
			
			$list=$json["result"]["response_list"][0]["action_list"];
			if(!empty($list)){
				foreach($list as $v){
					$nn[]=$v["say"];
				}
				//存储到数据库
				
				return $nn[0];
			}
		}
		return false;
	}
	public static function baiduToken(){
		$tk=file_get_contents("https://aip.baidubce.com/oauth/2.0/token?grant_type=client_credentials&client_id={$s}&client_secret={$s}");
		$tk=json_decode($tk,true); 
		return $token=$tk['access_token'];
	}
	public static function   curl_post($url = '', $param = '')
	{
		if (empty($url) || empty($param)) {
			return false;
		}
		$postUrl = $url;
		$curlPost = $param;
		// 初始化curl
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $postUrl);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		// 要求结果为字符串且输出到屏幕上
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		// post提交方式
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		// 运行curl
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
	}
	
	
}
?>