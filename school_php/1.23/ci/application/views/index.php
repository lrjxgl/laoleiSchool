<!DOCTYPE html>
<html>
	<?php include "head.php"?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">老雷博客</div>
			 
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="row-box"> 
				<?php foreach ($list as $news_item): ?>

				<a  href="<?php echo site_url('index/show/'.$news_item['id']); ?>" class="row-item">
					<div class="row-item-title"><?php echo $news_item['title']; ?></div>	
				</a>
				<?php endforeach; ?>
				</div>
		</div>
		<div class="footer">
			<a href="<?=site_url('/index/index')?>" class="footer-item icon-home">首页</a>
			<a href="<?=site_url('/index/add')?>" class="footer-item icon-add">添加</a>
		</div>
	</body>
</html>
