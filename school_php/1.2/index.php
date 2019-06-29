<?php
//php+mysql-老雷PHP全栈开发教程
//CURD
$mysqli = new mysqli("localhost", "root", "123", "laoleiphp");
$mysqli->query("set names utf8");
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"default";
switch($a){
	case "create":
		//插入数据
		$sql="insert sky_guest set title='测试数据',createtime='".date("Y-m-d H:i:s")."',catid=1 ";
		$mysqli->query($sqlQ);
		$id=$mysqli->insert_id;
		echo "create::".$id;
		break;
	case "update":
		//更新数据
		$id=intval($_GET["id"]);
		$sql="update sky_guest set title='测试数据',createtime='".date("Y-m-d H:i:s")."',catid=2 where id=".$id;
		$mysqli->query($sql);
		echo "update";
		break;
	case "list":
		//查询数据
		$sql="SELECT * from sky_guest";
		$res = $mysqli->query($sql);		
		$row = $res->fetch_all(MYSQLI_ASSOC);
		
		echo "读取列表";
		print_r($row);
		break;
	case "read":
		//查询数据
		$id=intval($_GET["id"]);
		$sql="SELECT * from sky_guest where id=".$id;
		$res = $mysqli->query($sql);		
		$row = $res->fetch_all(MYSQLI_ASSOC);
		
		echo "读取详情";
		print_r($row);
		break;
	case "delete":
		//删除
		$sql="delete from sky_guest limit 1";
		$mysqli->query($sql);
		echo "delete";
		break;
	default:
		echo "php连接mysql数据的实现";
		break;
}
//查询一条id
$sql="SELECT * from sky_guest  limit 1";
$res = $mysqli->query($sql);		
$row = $res->fetch_array(); 
?>
<style>
	a{
		font-size: 18px;
		margin: 20px;
	}
</style>
<br />
<a href="index.php?a=create">Create</a>
<a href="index.php?a=update&id=<?=$row["id"]?>">Update</a>
<a href="index.php?a=read&id=<?=$row["id"]?>">Read</a>
<a href="index.php?a=list">Read List</a>
<a href="index.php?a=delete">Delete</a>