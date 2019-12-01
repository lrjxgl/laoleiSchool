<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户系统</title>
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
		
	</head>
	<body>
		<div class="main">
			<?php
				if(isset($_SESSION["ssuser"])):
			?>
			<div style="padding:20px">
				欢迎你，<?=$_SESSION["ssuser"]["nickname"]?>
				<a href="user.php?a=loginout">注销登录</a>
			</div>
			<?php
				else:
			?>
			<div class="nav">
				<a href="user.php?a=login">去登录</a>
				<a href="user.php?a=register">去注册</a>
			</div>
			<?php
				endif;
			?>
		</div>
		
	</body>
</html>
