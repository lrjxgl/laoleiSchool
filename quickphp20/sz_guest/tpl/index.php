<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>留言板</title>
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1" />
		<link href="tpl/css/app.css" rel="stylesheet" />
		<style>
			.list{
				width: 98%;
				margin: 0 auto;
			}
			.item{
				padding: 10px;
				margin-bottom: 10px;
				border: 1px solid #eee;
				border-radius: 10px;
			}
			.item-title{
				margin-bottom: 5px;
			}
			.item-other{
				display: flex;
				flex-direction: row;
				margin-bottom: 5px;
				color: #969696;
				font-size: 14px;
 
			}
			.item-desc{
				color: #646464;
				font-size: 14px;
			}
			.item-reply{
				margin: 10px;
				border: 1px solid #eee;
				padding: 10px;
			}
			fieldset{
				border-radius: 5px;
			}
			legend{
				color: #969696;
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<div class="nav">
				<a class="active" href="guest.php">留言首页</a>
				<a href="guest.php?a=add">我要留言</a>
			</div>
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
						<div><?=$v["telephone"]?></div>
						<div class="flex-1"></div>
						<div class="f12 mgr-5"><?=$v["createtime"]?></div>
						<?php
						if(empty($v["reply_content"])):
						?> 
						<a href="guest.php?a=reply&id=<?=$v["id"]?>" class="f12 cl1">我要回复</a>
						<?php
						endif;
						?>	
					</div>
					<div class="item-desc cl2">
						 <?=$v["content"]?>
					</div>
					<?php
						if($v["reply_content"]):
					?> 
					<fieldset class="item-reply">
						<legend>回复</legend> 
						<div class="item-desc cl2">
							<?=$v["reply_content"]?>
						</div>
					</fieldset>
					 
					<?php
						endif;
					?>
				</div>
				<?php
					endforeach;
					endif;	
				?>
				 
			</div>
		</div>	
	</body>
</html>
