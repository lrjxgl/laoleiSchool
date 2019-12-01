<?php
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"index";
require "db.class.php";
switch($a){
    case "add":
        require "tpl/add.php";
    break;
    case "save":
        $title=$_POST["title"];
        $nickname=$_POST["nickname"];
        $telephone=$_POST["telephone"];
        $content=$_POST["content"];
        $createtime=date("Y-m-d H:i:s");
        $sql=" insert into sky_guest set title='".$title."',nickname='".$nickname."',telephone='".$telephone."',content='".$content."',createtime='".$createtime."' ";
        $db->query($sql);
        require "tpl/save.php";
    break;
    case "reply":
        $id=$_GET["id"];
        $sql="select * from sky_guest where id=".$id;
        $data=$db->getRow($sql);
        require "tpl/reply.php";
    break;
    case "reply_save":
        $id=$_POST["id"];
        $reply_content=$_POST["reply_content"];
        $reply_createtime=date("Y-m-d H:i:s");
        $sql=" update sky_guest set reply_content='".$reply_content."',reply_time='".$reply_createtime."' where id=".$id;
        $query=$db->query($sql);
        require "tpl/reply_save.php";
        break;
    default:
        $sql="select * from sky_guest order by id DESC";
        $list=$db->getall($sql);
        require "tpl/index.php";
    break;
}


?>