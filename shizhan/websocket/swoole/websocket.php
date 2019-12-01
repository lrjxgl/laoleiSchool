<?php
/**
 * 私聊 群聊
 */
class skyWebSocket{
	public $server;
	public $groupClients;
	public $uidClients;
	public $session;
	//用户检测
	public $timerClients=array();
	public function __construct($ip="0.0.0.0",$port="8282"){
		$this->server=new swoole_websocket_server($ip, $port);
		echo "ws://$ip:$port";
	}
	public function connect($client){
		$this->timerClients[$client]=1;
	}
	public function send($client_id,$msg){
		return $this->server->push($client_id, json_encode($msg));
	}
	/**绑定用户**/
	public function bindUid($client_id,$uid){
		$this->uidClients[$uid][$client_id]=$uid;
	}
	public function unBindUid($client_id,$uid=0){
		unset($this->uidClients[$uid][$client_id]);
	}
	public function clearUid($uid){
		unset($this->uidClients[$uid]);
	}
	/**给用户发送**/
	public function sendToUid($uid,$msg){
		if(isset($this->uidClients[$uid])){
			foreach($this->uidClients[$uid] as $client_id){
				//clientid不存在 要做检测 移除$client_id
				if(!$this->send($client_id,$msg)){
					$this->unBindUid($client_id,$uid);
				}
				
			}
		}
	}
	public function isInGroup($gid,$client_id){
		if(!isset($this->groupClients[$gid][$client_id])){
			return false;
		}
		return true;
	}
	public function joinGroup($gid,$client_id){
		$this->groupClients[$gid][$client_id]=$client_id;
	}
	public function unJoinGroup($gid,$client_id){
		unset($this->groupClients[$gid][$client_id]);
	}
	public function clearGroup($gid){
		unset($this->groupClients[$gid]);
	}
	public function sendGroup($gid,$msg){
		foreach($this->groupClients[$gid] as $client_id){
			if(!$this->send($client_id, $msg)){
				$this->unJoinGroup($gid,$client_id);
			}
		}
	}
	public function sendToClient($client_id,$msg){
		$this->send($client_id, $msg);
	}
	
	public function isUidOnline($uid){
		if(isset($this->uidClients[$uid])){
			foreach($this->uidClients[$uid] as $client_id){
				//clientid不存在 要做检测 移除$client_id
				if(!$this->send($client_id,$msg)){
					$this->unBindUid($client_id,$uid);
				}else{
					return true;
				}
				
			}
		}
	}	
	
	public function run(){
		$this->server->start();
		
	}
	public function session_set($client_id,$k,$v){
		$this->session[$client_id][$k]=$v;
	}
	public function session_get($client_id,$k){
		return $this->session[$client_id][$k];
	}
	
	public function session_del($client_id){
		unset($this->session[$client_id]);
	}
	
	public function clientClose($client_id){
		$this->session_del($client_id);
		//删除所有加入的群
		if(!empty($this->groupClients)){
			foreach($this->groupClients as $gid=>$clients){
				foreach($clients as $k=>$cid){
					if($client_id=$cid){
						unset($this->groupClients[$gid][$k]);
					}
				}
			}
		}
		//删除所有绑定的uid
		if(!empty($this->uidClients)){
			foreach($this->uidClients as $uid=>$clients){
				foreach($clients as $k=>$cid){
					if($cid==$client_id){
						unset($this->uidClients[$cid][$k]);
					}
				}
			}
		}
	}
}
$ws= new skyWebSocket();
$ws->server->on('open', function($server, $req) use($ws) {
	$ws->connect($req->fd);
		    echo "connection open: {$req->fd}\n";
});
$ws->server->on('message', function($server, $frame) use ($ws) {
	$client_id=$frame->fd;
	$msg=json_decode($frame->data,true);
	echo $frame->data." \n";
	if(isset($msg["gid"])){
		if(!$ws->isInGroup($msg["gid"],$client_id)){
			$ws->joinGroup($msg["gid"],$client_id);
		}
		
		$ws->sendGroup($msg["gid"],$msg);
		
	}else{
		
		if(isset($msg["wsclient_to"])){
			$to_client_id=$msg["wsclient_to"];
			$ws->sendToClient($to_client_id,$msg);
		}else{
			//需要可登录
			$ws->sendToClient($client_id,$msg);
		}
		
	}
});
$ws->server->on('close', function($server, $fd) {
	echo "connection close: {$fd}\n";
});
$ws->run();