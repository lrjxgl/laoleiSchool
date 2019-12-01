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
				<a href="bbs.php">论坛首页</a>
				<a  class="active" href="bbs.php?a=add">发布帖子</a>
			</div>
		<form method="post" action="bbs.php?a=save">
			<div class="input-flex">
				<span class="txl">主题</span>
				<input placeholder="请输入帖子主题" type="text" name="title" class="txt" />
			</div>
			 
			<div>
				<textarea placeholder="请输入帖子内容" name="content"></textarea>
			</div>
			<div class="flex flex-jc-center">
				<button class="btn">发布帖子</button>
			</div>
		</form>
		</div>
	</body>
</html>
