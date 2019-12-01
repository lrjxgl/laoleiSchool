<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BBS</title>
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
	</head>
	<body>
		<div class="main">
			<div class="nav">
				<a href="user.php">首页</a>
				<a href="user.php?a=login">用户登录</a>
				<a class="active" href="user.php?a=register">用户注册</a>
			</div>
            <div>
               <?=$msg?>
            </div>

		</div>
	</body>
</html>
