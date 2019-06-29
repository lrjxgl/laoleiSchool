<?php


//缩放
function thumb($img){
$im=imagecreatefromjpeg($img);
$sim=imagescale($im,200,-1,IMG_BICUBIC_FIXED );
header("Content-type:image/png");
imagejpeg($sim);
}
 
function crop($img){
	$im=imagecreatefromjpeg($img);
$size = min(imagesx($im), imagesy($im));
$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
header("Content-type:image/png");
imagejpeg($im2);
}
 
//打水印
function imgMerge($to,$from,$tx,$ty,$fx,$fy,$fw,$fh,$pct=100){
	$timg=imagecreatefromjpeg($to);
	$fimg=imagecreatefromjpeg($from);
	imagecopymerge($timg,$fimg,$tx,$ty,$fx,$fy,$fw,$fh,$pct);
	imagejpeg($timg,"merge.jpg");
}
//旋转
function imgRoate($img,$deg){
	$im=imagecreatefromjpeg($img);
	$im2= imagerotate($im, $deg, 0);
	header("Content-type:image/jpeg");
	imagejpeg($im2);
}
//正方形缩略图
function thumb100($img){
	$im=imagecreatefromjpeg($img);
	$w=100;
	$sx=imagesx($im);
	$sy=imagesy($im);
	if($sx>$sy){
		$w=$sx*100/$sy;
	}
	$sim=imagescale($im,$w,-1,IMG_BICUBIC_FIXED );
	$im2 = imagecrop($sim, ['x' => 0, 'y' => 0, 'width' => 100, 'height' => 100]);
	header("Content-type:image/png");
	imagejpeg($im2);
}
imgMerge("img.jpg","mao2.jpg",0,100,0,0,100,100,80);
//imgRoate("img.jpg",60);
//thumb100("img.jpg");