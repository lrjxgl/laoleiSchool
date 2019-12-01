<!DOCTYPE html>
<html>
    <head>
        <title>BBS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
		<style>
			.d-box{
				padding:10px;
				border:1px solid #eee;
				margin-bottom:10px;
			}
			.d-title{
				margin-bottom:10px;
			}
			.d-content{
				color:#666;
			}
			.cm-hd{
				padding:10px 0px;
				border-bottom:1px solid #eee;
				margin-bottom:10px;
				font-weight:600;
			}
		</style>
    </head>
    <body>
        <div class="main">
			<div class="nav">
				<a class="active" href="bbs.php">论坛首页</a>
				<a href="bbs.php?a=add">发布帖子</a>
			</div>
			<div class="d-box">
				<div class="d-title"><?=$data["title"]?></div>
				<div class="flex mgb-10">
					<div class="mgr-10 f12  cl3"><?=$author["nickname"]?></div>
					<div class="mgr-10 f12  cl3">人气 <?=$data["view_num"];?></div>
					<div class="mgr-10 f12  cl3">评论 <?=$data["comment_num"];?></div>
				</div>
				<div class="d-content"><?=$data["content"]?></div>
			</div>
			<?php
				if(!empty($list)):
			?>
			<div class="cm-hd">评论列表</div>
			<div class="list">
				<?php
					foreach($list as $v):
				?>
				<div class="item">
					 
					<div class="item-other">
						<div class="mgr-10"><?=$v["nickname"]?></div>
						 
						<div class="flex-1"></div>
						<div class="f12"><?=$v["createtime"]?></div>
					</div>
					<div class="item-desc cl2 mgb-10">
						<?=$v["content"]?>
					</div>
					 
			
				</div>
				<?php
					endforeach;
				?>
				 
			
			</div>
			<?php
				endif;
			?>
			<div>
				<form method="post" action="bbs.php?a=reply_save">
					<input type="hidden" name="topicid" value="<?=$data["id"]?>">
					<div>
						<textarea placeholder="请输入回复内容" name="content"></textarea>
					</div>
					<div class="flex flex-jc-center">
						<button class="btn">发布评论</button>
					</div>
				</form>
			</div>
		</div>
    </body>
</html>