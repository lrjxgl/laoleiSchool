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
				<a class="active" href="bbs.php">论坛首页</a>
				<a href="bbs.php?a=add">发布帖子</a>
			</div>
			<?php
				if(isset($_SESSION["ssuser"])):
			?>
			<div style="padding:0px 10px 10px 10px">
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
			<div class="list">
				<?php
				if(!empty($list)):
				foreach($list as $k=>$v):
				?>
				<div class="item">
					<div class="item-title">
						<?=$v["title"]?>
					</div>
					<div class="item-other">
						<div class="mgr-10"><?=$v["nickname"]?></div>
						 
						<div class="flex-1"></div>
						<div class="f12"><?=$v["createtime"]?></div>
					</div>
					<div class="item-desc cl2 mgb-10">
						<?=$v["content"]?>
					</div>
					<div class="flex flex-ai-center">
						<div class="mgr-10 f12">查看 <?=$v["view_num"]?></div>
						<div class="mgr-10 f12">评论 <?=$v["comment_num"]?></div>
						<div class="flex-1"></div>
						<a class="btn link" href="bbs.php?a=show&id=<?=$v["id"]?>">查看详情</a>
						<a class="btn link" href="bbs.php?a=del&id=<?=$v["id"]?>">删除帖子</a>
					</div>
				 
				</div>
				<?php
					endforeach;
					endif;
				?>
				 
				 
			</div>
		</div>	
	</body>
</html>
