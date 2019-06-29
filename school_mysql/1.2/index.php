<?php
/*
常用sql的查询语句-老雷PHP全栈开发教程
*/
require "../db.php";
$rs=DB::getAll("select * from sky_demo where id>1 AND id<10");
print_r($rs);
