<?php
$mysqli = new mysqli("localhost", "root", "123", "laoleiphp");

/* check connection */
if ($mysqli->connect_errno) {
    printf("数据库连接出错: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8mb4");
$sql = "SELECT id,title FROM sky_guest ORDER by ID LIMIT 3";
$result = $mysqli->query($sql);
/*根据数字获取行*/
$row = $result->fetch_array(MYSQLI_NUM);
print_r($row);
/*根据字段获取行*/
$row = $result->fetch_array(MYSQLI_ASSOC);
print_r($row);
//函数
function query($sql){
	global $mysqli;
	if($result = $mysqli->query($sql)){
		return $result;
	}
	exit($mysqli->error);
	
}
function getOne($sql){
	global $mysqli;
	$result = query($sql);
	$rs=$result->fetch_array(MYSQLI_NUM);
	return $rs[0];
}
function getRow($sql){
	global $mysqli;
	$result = query($sql);
	return $result->fetch_array(MYSQLI_ASSOC);
} 
function getAll($sql){
	global $mysqli;
	$result = query($sql);
	$list=array();
	while($rs=$result->fetch_array(MYSQLI_ASSOC)){
		$list[]=$rs;
	}
	return $list;
}
function getCols($sql){
	global $mysqli;
	$result = query($sql);
	$list=array();
	while($rs=$result->fetch_array(MYSQLI_NUM)){
		$list[]=$rs[0];
	}
	return $list;
}
function insert($sql){
	global $mysqli;
	query($sql);
	return $mysqli->insert_id;
}
$id=insert("insert into sky_guest set title='插入测试'");
echo "id=".$id."<br/>";
$row=getOne("SELECT id,title FROM sky_guest ORDER by ID LIMIT 1");
print_r($row);
$row=getRow("SELECT id,title FROM sky_guest ORDER by ID LIMIT 1");
print_r($row);
 $list=getAll("SELECT id,title FROM sky_guest ORDER by ID LIMIT 3");
 print_r($list);
 $ids=getCols("SELECT id,title FROM sky_guest ORDER by ID LIMIT 3");
 print_r($ids); 
/* free result set */
$result->free();

/* close connection */
$mysqli->close();
?> 