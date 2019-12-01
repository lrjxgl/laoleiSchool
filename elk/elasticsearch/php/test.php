<?php
require "cls_elasticsearch.php";
$es=new elasticSearch("http://127.0.0.1:9200/laoleiphp");
//创建索引
$ops=[
    "settings" => [
        "number_of_shards" => 1
    ],
    "mappings" => [
        "properties" => [
            "title" => [ 
				"type" => "text",
				"analyzer"=> "ik_max_word",
				"search_analyzer"=> "ik_max_word"
			],
			"content" => [ 
				"type" => "text",
				"analyzer"=> "ik_max_word",
				"search_analyzer"=> "ik_max_word"
			]
        ]
    ]
];
//创建索引
$e=$es->head("article");
if(!$e){
	$res=$es->put("article",$ops);
}

/*
//更新索引
$es->post("article/_close");
$res=$es->put("article/_settings",$ops);
$es->post("article/_open");
//删除索引
$es->delete("article") ;
*/
//创建文档
$id=time();
$data=array(
	"id"=>$id,
	"title"=>"测试中国文件".date("Y-m-d H:i:s")
);
//创建自动id
//$res=$es->post("article/_doc",$data);
//创建更新文档
$res=$es->put("article/_doc/$id",$data);

//print_r($res);
//查询  
$query=array(
	"query"=>array(
		"match"=>array(
			"title"=>"中国"
			
		)
	),
	"from"=> 0,
	"size"=> 30
);

$res=$es->search("article",$query);
print_r($res);