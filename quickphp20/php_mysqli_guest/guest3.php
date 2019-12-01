<?php
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"index";
require "db.class.php";
$guest=new guest($db);
$guest->$a();
class guest{
    public $db;
    public function __construct($db){
        $this->db=$db;
    }
    public function index(){
        $sql="select * from sky_guest order by id DESC";
        $list=$this->db->getall($sql);
        
        require "tpl/index.php";
    }
    public function add(){
        require "tpl/add.php";
    }

    public function save(){
        $title=$_POST["title"];
        $nickname=$_POST["nickname"];
        $telephone=$_POST["telephone"];
        $content=$_POST["content"];
        $createtime=date("Y-m-d H:i:s");
        $sql=" insert into sky_guest set title='".$title."',nickname='".$nickname."',telephone='".$telephone."',content='".$content."',createtime='".$createtime."' ";
        $id=$this->db->insert($sql);
        require "tpl/save.php";
    }

    public function reply(){
        $id=$_GET["id"];
        $sql="select * from sky_guest where id=".$id;
        $data=$this->db->getRow($sql);
        require "tpl/reply.php";
    }

    public function reply_save(){
        $id=$_POST["id"];
        $reply_content=$_POST["reply_content"];
        $reply_createtime=date("Y-m-d H:i:s");
        $sql=" update sky_guest set reply_content='".$reply_content."',reply_time='".$reply_createtime."' where id=".$id;
        $query=$this->db->query($sql);
        require "tpl/reply_save.php";
    }

}