<form method="post"   action="index.php?m=a&a=2">
	<input type="text" value="ww" name="aa" />
 
	<button type="submit">提交</button>
</form>
<?php
session_start();
unset($_SESSION["a"]);
print_r($_SESSION);
?>