<?php
session_start();
$a=isset($_GET["a"])?htmlspecialchars($_GET["a"]):"index";
require "db.class.php";
if(in_array($a,array("add","save","reply_save"))){
	if(!isset($_SESSION["ssuser"])){
		header("Location: user.php?a=login");
		exit;
	}
}
$bbs=new bbs($db);
$bbs->$a();
class bbs{
    public $db;
    public function __construct($db){
        $this->db=$db;
    }
    public function index(){
	 
        $sql="select * from sky_bbs where status<4 order  by id DESC";
        $list=$this->db->getall($sql);
        if(!empty($list)){
			$uids=array();
			foreach($list as $v){
				$uids[]=$v["userid"];
			}
			$us=$this->getUserByIds($uids);
			
			foreach($list as $k=>$v){
				$v["nickname"]=$us[$v["userid"]]["nickname"];
				$list[$k]=$v;
			}
		}
        require "tpl/index.php";
    }
    public function add(){
        require "tpl/add.php";
    }

    public function save(){
		$title=$_POST["title"];
		$content=$_POST["content"];
		$createtime=date("Y-m-d H:i:s");
		$userid=$_SESSION["ssuser"]["userid"];
		$sql=" insert into sky_bbs set 
			title='".$title."',
			content='".$content."',
			createtime='".$createtime."',
			userid=".$userid." 
		";
		$id=$this->db->insert($sql);
        require "tpl/save.php";
    }

    public function show(){
        $id=$_GET["id"];
        $sql="select * from sky_bbs where id=".$id;
        $data=$this->db->getRow($sql);
		if(empty($data)){
			$msg="当前帖子已经被删除了";
			require "tpl/msg.php"; 
			exit;
		}
		$author=$this->db->getRow("select userid,nickname from sky_user where userid=".$data["userid"]);
		//获取评论
		$sql="select * from sky_bbs_comment where topicid=".$id." order by id ASC";
		$list=$this->db->getAll($sql);
		if(!empty($list)){
			foreach($list as $v){
				$uids[]=$v["userid"];
			}
			$us=$this->getUserByIds($uids);
			
			foreach($list as $k=>$v){
				$v["nickname"]=$us[$v["userid"]]["nickname"];
				$list[$k]=$v;
			}
		}
		//刷新人气
		$sql="update sky_bbs set view_num=view_num+1 where id=".$id;
		$query=$this->db->query($sql);
        require "tpl/show.php";
    }

    public function reply_save(){
       $topicid=$_POST["topicid"];
       $content=$_POST["content"];
	   $userid=$_SESSION["ssuser"]["userid"];
       $createtime=date("Y-m-d H:i:s");
       //查询主题
       $sql="select * from sky_bbs where id=".$topicid;
       $topic=$this->db->getRow($sql);
       //插入评论
       $sql=" insert into sky_bbs_comment set 
		   content='".$content."',
		   createtime='".$createtime."',
		   userid=".$userid." ,
		   topicid=".$topicid."
	   ";
       $query=$this->db->query($sql);
       //更新主题
       $sql="update sky_bbs set comment_num=comment_num+1 where id=".$topicid;
       $query=$this->db->query($sql);
       require "tpl/reply_save.php";
    }
	public function del(){
		$id=$_GET["id"];
		$sql="delete from sky_bbs where id=".$id;
		$sql="update   sky_bbs set status=11 where id=".$id;
		$this->db->query($sql);
		$msg="删除成功";
		require "tpl/msg.php"; 
	}
	public function getUserByIds($ids){
		$sql="select userid,nickname from sky_user where userid in(".implode(",",$ids).") ";
		$res=$this->db->getAll($sql);
		if($res){
			$list=array();
			foreach($res as $v){
				$list[$v["userid"]]=$v;
			}
			return $list;
		}
		return false;
	}
	
	
	
	

}