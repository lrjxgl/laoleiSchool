<!DOCTYPE html>
<html>
	<?php include "head.php"; ?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">详情页</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<form action="index.php?a=save" class="row-box">
			 
				<input type="hidden" name="id" value="<?php echo isset($data["id"])?$data["id"]:"";?>" />
				<div class="input-flex">
					<div class="input-flex-label">标题</div>
					<input class="input-flex-text" type="text" name="title" value="<?php echo isset($data["id"])?$data["title"]:"";?>" />
				</div>
				<div class="mgb-10">内容</div>
				<textarea class="textarea-flex-text" name="content"><?php echo isset($data["id"])?$data["content"]:"";?></textarea>
				<div ungo=1 class="btn-row-submit js-submit">保存</div>
			</form>
 
		</div>
	</body>	
</html>	
