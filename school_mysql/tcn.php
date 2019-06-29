<?php
if(!isset($_GET["a"])){
	
	exit;
}
switch($_GET["a"]){
	case "save":
		$file=$_GET["file"];
		$content=$_POST["content"];
		$unfile=json_decode(file_get_contents("tlog.txt"),true);
		
		$unfile[]=$file;
		file_put_contents("tlog.txt",json_encode($unfile));
		file_put_contents("tcn/".$file,$content);
		break;
	case "get":
		$file=$_GET["file"];
		echo file_get_contents($file);
		break;
	case "files":
		$files=glob("en/*.html");
		$unfile=json_decode(file_get_contents("tlog.txt"),true);
		$newfile=array();
		if(!empty($unfile)){
			foreach($files as $k=>$file){
				if(!in_array($file,$unfile)){
					$newfile[]=$file;
				}
			}
		}
		echo json_encode($newfile);
		
		break;
}

?>