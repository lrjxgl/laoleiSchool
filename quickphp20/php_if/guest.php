<?php
//获取url携带的参数a
$a=isset($_GET["a"])?$_GET["a"]:"";
if($a=="add"){
	echo "添加页	";
}elseif($a=="save"){
	echo "保存页";
}elseif($a=="delete"){
	echo "删除页面";
}elseif($a=="reply"){
	echo "回复页面";
}elseif($a=="reply_save"){
	echo "回复保存";
}else{
	echo "首页";
}