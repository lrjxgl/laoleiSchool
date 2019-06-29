<?php
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"index";
function ec($data){
	header("Access-Control-Allow-Origin: *");
	echo json_encode(array(
		"error"=>0,
		"message"=>"success",
		"data"=>$data
	));
}
switch($a){
	case "index":
		for($i=1;$i<10;$i++){
			$list[]=array(
				"id"=>$i,
				"title"=>"这是测试标题{$i}",
				"description"=>"这是测试简介哦哦哦{$i}",
				"imgurl"=>"http://img.deitui.com/?w=100&h=100&text=老雷"
			);
		}
		$data=array(
			"list"=>$list
		);
		ec($data);
		break;
	case "list":
		for($i=1;$i<10;$i++){
			$list[]=array(
				"id"=>$i,
				"title"=>"这是测试标题{$i}",
				"description"=>"这是测试简介哦哦哦{$i}",
				"imgurl"=>"http://img.deitui.com/?w=100&h=100&text=老雷"
			);
		}
		$data=array(
			"list"=>$list
		);
		ec($data);
		break;
	case "show":
		$id=isset($_GET["id"])?$_GET["id"]:1;
		$data=array(
			"data"=>array(
				"id"=>$id,
				"title"=>"这是测试标题{$id}",
				"content"=>"{$id}这是内容内容侧是我啊这是内容内容侧是我啊这是内容内容侧是我啊这是内容内容侧是我啊",
				"createtime"=>date("Y-m-d")
			)
		);
		ec($data);
		break;
	case "post":
		$data=$_POST;
		ec($data);
		break;
}

?>