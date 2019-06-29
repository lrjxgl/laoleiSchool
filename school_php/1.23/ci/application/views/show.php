<!DOCTYPE html>
<html>
	<?php include "head.php"?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">详细页</div>
			<a href="<?=site_url('/index/add/'.$data["id"])?>" class="header-right-btn">修改</a>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="row-box">
			<div class="mgb-10 f16"><?=$data["title"]?></div>
			
			<div class="d-content"><?=$data["content"]?></div>
			<div class="btn btn-danger js-delete" url="<?=site_url('/index/deleteData/'.$data["id"])?>">删除</div>
			</div>
		</div>
	</body>
</html>
