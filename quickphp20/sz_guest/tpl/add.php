<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>留言板</title>
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
	</head>
	<body>
		<div class="main">
			<div class="nav">
				<a href="guest.php">留言首页</a>
				<a class="active" href="guest.php?a=add">我要留言</a>
			</div>
		<form action="guest.php?a=save" method="POST">
			<div class="input-flex">
				<span class="txl">标题</span>
				<input type="text" name="title" class="txt" />
			</div>
			<div class="input-flex">
				<span class="txl">联系人</span>
				<input type="text" name="nickname" class="txt" />
			</div>
			<div class="input-flex">
				<span class="txl">电话</span>
				<input type="text" name="telephone" class="txt" />
			</div>
			<div>
				<textarea name="content"></textarea>
			</div>
			<div class="flex flex-jc-center">
				<button type="submit" class="btn">发布留言</button>
			</div>
		</form>
		</div>
	</body>
</html>