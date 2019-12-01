<?php
$list=array(
	array(
		"id"=>1,
		"title"=>"第一个",
		"num"=>1.345
	),
	array(
		"id"=>2,
		"title"=>"第二个",
		"num"=>"1.00"
	),
);
$data=array(
	"id"=>1,
	"title"=>"文章详情"
);
//echo json_encode($data,JSON_UNESCAPED_UNICODE);
//echo json_encode($list,JSON_UNESCAPED_UNICODE);
echo $json=json_encode(array(
	"list"=>$list,
	"data"=>$data
),JSON_UNESCAPED_UNICODE);
print_r(json_decode($json));
print_r(json_decode($json,true));
?>