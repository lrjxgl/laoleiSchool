<?php
$i=2;
switch ($i) {
    case 0:
        echo "i = 0";
        break;
    case 1:
        echo "i =1";
        break;
    case 2:
	case 3:
        echo "i= ".$i;
        break;
}
$a="aa学";
$b="2";
switch($a){
	case "aa":
		if($b==2){
			echo "aa 2";
		}
		break;
	default:
		echo "其他的";
		break;
}