<?php
$socket = stream_socket_server("udp://127.0.0.1:8000", $errno, $errstr, STREAM_SERVER_BIND);
if (!$socket) {
    die("$errstr ($errno)");
}
$clients=array();
do {
    $pkt = stream_socket_recvfrom($socket, 1024, 0, $peer);
	
    echo "$peer $pkt \n";
	if($clients){
		if(!in_array($pkt,$clients)){
			$clients[$peer]=$peer;
		}
	}else{
		$clients[$peer]=$peer;
	}
	
    //stream_socket_sendto($socket, date("Y m d H:i:s").$pkt."\n", 0, $peer);
	sendAll($pkt);
} while ($pkt !== false);
function sendAll($msg){
	global $clients,$socket;
	foreach($clients as $client){
		stream_socket_sendto($socket, $msg."\n", 0, $client);
	}
}
?> 