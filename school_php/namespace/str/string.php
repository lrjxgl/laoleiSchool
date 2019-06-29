<?php
	namespace mvc\str;
	function cutstr($str,$len){
		return mb_substr($str,0,$len);
	}
	function add($a,$b){
		return $a.$b;
	}
?>