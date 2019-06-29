<?php

if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){
	move_uploaded_file($_FILES["upfile"]["tmp_name"],"upload.jpg");
}
echo json_encode(array(
	"filename"=>"upload.jpg",
	"post"=>$_POST
));
?>