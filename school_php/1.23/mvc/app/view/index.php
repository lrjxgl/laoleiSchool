<!DOCTYPE html>
<html>
	<?php include "head.php"; ?>
	<body>
		<div class="header">
			<div class="header-title">MVC框架</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
 
		 
		<div class="row-box">
			<?php foreach($list as $v):?>
				<a href="index.php?m=index&a=show&id=<?=$v["id"]?>" class="row-item">
					<div class="row-item-title"><?=$v["title"]?></div>
					 
				</a>
			<?php endforeach;?>	
		</div>
		</div>
		<div class="footer-row"></div>
		<div class="footer">
			<a href="index.php" class="footer-item icon-home">首页</a>
			<a href="?a=add" class="footer-item icon-add">发布</a>
		</div>
	</body>
</html>
