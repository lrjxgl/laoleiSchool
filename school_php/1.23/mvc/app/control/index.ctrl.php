<?php
class indexControl extends control{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$data=array(
			"1"=>"人才",
			"2"=>"时间",
			3=>"执行力"
		);
		$this->view->assign(array(
			"data"=>$data,
			"row"=>M("guest")->getRow("select * from sky_guest  limit 1"),
			"list"=>M("guest")->getAll("select * from sky_guest order by id DESC limit 10")
		));
		$this->view->display("index.php");
	}
	
	public function onShow(){
		$id=intval($_GET["id"]);
		$data=M("guest")->getRow("select * from sky_guest where id=".$id." limit 1");
		$this->view->assign(array(
			"data"=>$data
		));
		$this->view->display("show.php");
	}
	
	public function onAdd(){
		$id=isset($_GET["id"])?intval($_GET["id"]):0;
		$data=M("guest")->getRow("select * from sky_guest where id=".$id." limit 1");
		$this->view->assign(array(
			"data"=>$data
		));
		$this->view->display("add.php");
	}
	
	public function onSave(){
		$id=intval($_POST["id"]);
		$title=htmlspecialchars($_POST["title"]);
		$content=htmlspecialchars($_POST["content"]);
		if($id){
			M("guest")->update(array(
				"title"=>$title,
				"content"=>$content
			),"id=".$id);
		}else{
			M("guest")->insert(array(
				"title"=>$title,
				"content"=>$content
			));
		}
		echo json_encode(array(
			"error"=>0,
			"message"=>"保存成功"
		));
	}
}
?>