<?php
 //红绿灯
 $deng="红色";
 switch($deng){
	 case "红色":
	 echo "小明停一停";
		 break;
	case "绿色":
	echo "小明过马路";
		break;
	default:
	echo "小明等一等";
		break;
 }
 
//骰子
$a=1;$b=2;
$num=$a+$b;
switch($num){
	case 8:
	case 10:
	case 12:
		echo "赢了";
		break;
	case 3:
	case 4:
	case 5:
		echo "输了";
		break;
	default:
		echo "平局";
		break;
}
?>