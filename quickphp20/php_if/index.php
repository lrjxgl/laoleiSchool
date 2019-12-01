<?php
$a=3;
	//单独if
	if($a==1){
		echo "1";
	}
	//if else
	if($a==1){
		echo "1";
	}else{
		echo "3";
	} 
	//if elseif else 
	if($a==1){
		echo "1";
	}elseif($a==2){
		echo "2";
	}else{
		echo "3";
	}
	//嵌套if
	 $a=2;
	 $b=3;
	 if($a==2){
	 	if($b==3){
	 		echo "a==2 b==3";
	 	}else{
	 		echo "a=2 b!=3";
	 	}
	 }else{
	 	echo "a!=2";
	 }