<?php

class SocketService
{
    private $address;
    private $port;
    private $_sockets;
	public $clients;
	public $maxid=1000;
	public $groups;
	public $groupClients;
    public function __construct($address = '', $port='')
    {
            if(!empty($address)){
                $this->address = $address;
            }
            if(!empty($port)) {
                $this->port = $port;
            }
    }
	
	public function joinGroup($cliend_id,$groupid){
		$this->groupClients[$groupid][$cliend_id]=$cliend_id;
	}
	public function sendGroup($groupid,$msg){
		if(!isset($this->groupClients[$groupid])){
			return false;
		}		
		$cids=$this->groupClients[$groupid];
		if(!empty($cids)){
			foreach($cids as $cid){
				if(isset($this->$clients[$cids])){
					$this->send($this->$clients[$cids],$msg);
				}else{
					unset($this->groupClients[$groupid]);
				}
				
			}
		}		
		
	}
	public function sendAll($msg){
		foreach($this->clients as $kk=>$cc){
			if($kk>0){
				$this->send($cc, $msg);
			}								
		}
	}
	public function onConnect($client_id){
		echo  "Client client_id:{$client_id}   \n";
         
	}
	
	public function onMessage($client_id,$msg){
		//发给所有的
		$this->sendAll($msg);	
	}
	
	public function onClose($client_id){
		echo "$client_id close \n";
	}
	
    public function service(){
        //获取tcp协议号码。
        $tcp = getprotobyname("tcp");
        $sock = socket_create(AF_INET, SOCK_STREAM, $tcp);
        socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1);
        if($sock < 0)
        {
            throw new Exception("failed to create socket: ".socket_strerror($sock)."\n");
        }
        socket_bind($sock, $this->address, $this->port);
        socket_listen($sock, $this->port);
        echo "listen on $this->address $this->port ... \n";
        $this->_sockets = $sock;
    }
 
    public function run(){
        $this->service();
        $this->clients[] = $this->_sockets;
        while (true){
            $changes = $this->clients;
            $write = NULL;
            $except = NULL;
            socket_select($changes,  $write,  $except, NULL);
            foreach ($changes as $key => $_sock){
                if($this->_sockets == $_sock){ //判断是不是新接入的socket
                    if(($newClient = socket_accept($_sock))  === false){
						unset($this->clients[$key]);
						continue;
                    }
                    $line = trim(socket_read($newClient, 1024));
					echo strlen($line)."\n";
                    $this->handshaking($newClient, $line);
					$this->maxid++;
                    $this->clients[$this->maxid] = $newClient;
                    $this->onConnect($this->maxid);
                } else {
					$ret=@socket_recv($_sock, $buffer,  2048, 0);
					echo strlen($buffer)."\n";
					if(strlen($buffer)<9){
							socket_shutdown ($_sock,2);
							unset($this->clients[$key]);
							$this->onClose($key);
							socket_clear_error();
					}else{
						$msg = $this->decode($buffer);
						$this->onMessage($key,$msg);
					}
                    
                }
            }
        }
    }
 
    /**
     * 握手处理
     * @param $newClient socket
     * @return int  接收到的信息
     */
    public function handshaking($newClient, $line){
 
        $headers = array();
        $lines = preg_split("/\r\n/", $line);
        foreach($lines as $line)
        {
            $line = chop($line);
            if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
            {
                $headers[$matches[1]] = $matches[2];
            }
        }
        $secKey = $headers['Sec-WebSocket-Key'];
        $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
        $upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
            "Upgrade: websocket\r\n" .
            "Connection: Upgrade\r\n" .
            "WebSocket-Origin: $this->address\r\n" .
            "WebSocket-Location: ws://$this->address:$this->port/websocket/websocket\r\n".
            "Sec-WebSocket-Accept:$secAccept\r\n\r\n";
        return socket_write($newClient, $upgrade, strlen($upgrade));
    }
	
	
	
	
	/**
     * 发送数据
     * @param $newClinet 新接入的socket
     * @param $msg   要发送的数据
     * @return int|string
     */
    public function send($newClinet, $msg){
        $msg = $this->encode($msg);
        if(false==@socket_write($newClinet, $msg, strlen($msg))){
			socket_shutdown ($newClinet,2);	
		}
    }
    /**
     * 解析接收数据
     * @param $buffer
     * @return null|string
     */
    public function decode($buffer){
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;
        if ($len === 126)  {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        } else if ($len === 127)  {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        } else  {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }
 
    
	/**
	*加密消息
	**/
    public function encode($buffer) {
		$first_byte="\x81";
		$len=strlen($buffer);
		if ($len <= 125) {
            $encode_buffer = $first_byte . chr($len) . $buffer;
        } else {
            if ($len <= 65535) {
                $encode_buffer = $first_byte . chr(126) . pack("n", $len) . $buffer;
            } else {
                $encode_buffer = $first_byte . chr(127) . pack("xxxxN", $len) . $buffer;
            }
        }
		return $encode_buffer;
    }
 
    /**
     * 关闭socket
     */
    public function close(){
        return socket_close($this->_sockets);
    }
}
 
$sock = new SocketService('127.0.0.1','8000');
$sock->run();