<!DOCTYPE html>
<html>
	<?php include "head.php"; ?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">详情页</div>
			<a class="header-right-btn" href="index.php?a=add&id=<?=$data["id"]?>">编辑</a>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="row-box">
				<div class="f16 mgb-10"><?=$data["title"]?></div>
				<div class="d-content">
					<?=$data["content"]?>
				</div>
			</div>
 
		</div>
	</body>	
</html>	