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
            <div class="flex" style="margin-bottom:10px;">
                <div class="mgr-5">回复</div>
                <div class="f14 cl2"> <?=$data["title"]?></div>
            
            </div>
		<form action="guest.php?a=reply_save" method="POST">
            <input type="hidden" name="id" value="<?=$data["id"]?>" />
			
            <div>
				<textarea name="reply_content"></textarea>
			</div>
			<div class="flex flex-jc-center">
				<button type="submit" class="btn">回复留言</button>
			</div>
		</form>
		</div>
	</body>
</html>
