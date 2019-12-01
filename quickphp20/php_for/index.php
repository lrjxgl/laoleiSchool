<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
for ($i = 1; $i <= 10; $i+=2) {
    echo $i;
}
for ($i = 10; $i >0; $i--) {
    echo $i;
}

//for可以嵌套
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 2; $j++) {
        echo $i.$j."<br/>";
    }
	if($i==5) break;
}

$people = Array(
	Array('name' => 'Kalle', 'salt' => 856412), 
	Array('name' => 'Pierre', 'salt' => 215863)
);
$len=count($people);
for($i = 0; $i < $len; ++$i)
{
    $people[$i]["pm"] = "第".$i."个";
}
print_r($people);
//foreach

$people = Array(
	Array('name' => 'Kalle', 'salt' => 856412), 
	Array('name' => 'Pierre', 'salt' => 215863)
);
foreach($people as $key=>$val){
	echo $val["name"];
}

foreach($people as $key=>$val):
	echo $val["name"];
endforeach;
?>