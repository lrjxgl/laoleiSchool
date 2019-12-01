<?php
//获取url携带的参数a
$a=isset($_GET["a"])?$_GET["a"]:"";
switch($a){
	case "add":
		echo "添加";
		break;
	case "save":
		echo "保存";
		break;
	case "delete":
		echo "删除";
		break;
	case "reply":
		echo "回复页面";
		break;
	case "reply_save":
		echo "回复保存";
		break;
	default:
		echo "首页";
		break;
}