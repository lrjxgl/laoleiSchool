<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户登录</title>
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
	</head>
	<body>
		<div class="main">
			<div class="nav">
				<a href="bbs.php">首页</a>
				<a class="active"  href="user.php?a=login">用户登录</a>
				<a href="user.php?a=register">用户注册</a>
			</div>
			<form method="post" action="user.php?a=loginsave">
				<div class="input-flex">
					<span class="txl">账号</span>
					<input placeholder="请输入账号" type="text" name="username" class="txt" />
				</div>
				 
				<div class="input-flex">
					<span class="txl">密码</span>
					<input placeholder="请输入密码" type="password" name="password" class="txt" />
				</div> 
				<div class="flex flex-jc-center">
					<button class="btn">确认登录</button>
				</div>
			</form>
		</div>
	</body>
</html>
