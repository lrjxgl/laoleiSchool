<?php
//骰子题目
 $a=3;
 if($a>=5){
	echo "大"; 
 }elseif($a<3){
	 echo "小";
 }else{
	 echo "平";
 }
 //红绿灯
 $deng="红色";
 if($deng=="红色"){
	 echo "小明停一停";
 }elseif($deng=="绿色"){
	 echo "小明过马路";
 }else{
	 echo "小明等一等";
 }
 //小明穿衣服
 $a="早上";
 $b="晴天";
 if($a=="早上"){
	 if($b=="晴天"){
		 echo "带帽子穿短袖";
	 }else{
		 echo "带雨伞和穿短裤";
	 }
 }elseif($a=="晚上"){
	 if($b=="晴天"){
	 		 echo "穿短袖拖鞋";
	 }else{
	 		 echo "雨伞和穿拖鞋";
	 }
 }

?>