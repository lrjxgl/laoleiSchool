<?php

function fsocket_get_contents($url="www.baidu.com"){
	$fp = fsockopen($url, 80, $errno, $errstr, 30);
	if (!$fp) {
		echo "$errstr ($errno)<br />\n";
	} else {
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host: $url\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		while (!feof($fp)) {
			echo fgets($fp, 128);
		}
		fclose($fp);
	}
}
function stream_contents($url="www.baidu.com"){
	$fp = stream_socket_client($url, $errno, $errstr, 30);
	if (!$fp) {
		echo "$errstr ($errno)<br />\n";
	} else {
		fwrite($fp, "GET / HTTP/1.0\r\nHost: www.baidu.com\r\nAccept: */*\r\n\r\n");
		while (!feof($fp)) {
			echo fgets($fp, 1024);
		}
		fclose($fp);
	}
}