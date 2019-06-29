<?php
/*
认识mysql数据表-老雷PHP全栈开发教程
*/
require "../db.php";
$table="sky_demo";
$table2=$table."_2";
//创建表
$sql="create table {$table}(
	id int unsigned not null auto_increment,
	title varchar(32) not null default '' comment '标题',
	status tinyint unsigned not null default 0 comment '状态',
	catid smallint unsigned not null default 0 comment '分类',
	userid int unsigned not null default 0 comment '用户',
	testcol tinyint unsigned not null default 0 comment '测试字段',
	createtime datetime not null default '2019-11-01 08:09:10' comment '创建时间',
	updatetime datetime not null default '2019-11-01 08:09:10' comment '创建时间',
	description varchar(225) CHARACTER SET utf8mb4 not null default '' comment '描述',
	content mediumtext comment '内容',
	primary key(id),
	key userid(userid,id),
	key catid(catid,id,status)
) engine=innodb default charset=utf8 comment '文章表' ";

//删除表
$sql="drop table {$table2};";

//重命名表
$sql="rename table {$table} to {$table2}";

//DB::query($sql);
//增加字段
$sql="
alter table {$table} 
add column testcol tinyint unsigned not null default 0 comment '测试字段'
";
//DB::query($addColumn);
//修改字段
$sql="
alter table {$table}
modify column status  tinyint unsigned not null default 0 comment '状态'
";
//变更字段
$sql="
alter table {$table} 
change testcol2 testcol int unsigned not null default 0 comment '测试字段'
";
//删除字段
$sql="
	alter table {$table}
	drop testcol
";
//索引
$sql="
	create index abc on {$table}(userid,status,createtime)
";
$sql="
	drop index abc on {$table}
";
$sql=" alter table {$table} add index abc(userid,status,createtime)	
";
$sql=" alter table {$table} drop index abc";
//显示数据表结构
$sql="show create table {$table}";
$res=DB::getRow($sql);
echo html($res["Create Table"]);
 
echo "执行成功";

function html($str){
	$str=nl2br($str);
	$str=str_replace("  ","&nbsp;&nbsp;",$str);
	return $str;
}