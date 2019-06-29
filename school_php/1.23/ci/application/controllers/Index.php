<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		 $this->load->model('test_model');
        $this->load->helper('url_helper');
	}
	public function index()
	{
		$list=$this->test_model->getList();
		//$list=array();
		$this->load->view('index',array(
			"list"=>$list
		));
	}
	public function show($id){
		 
		$data=$this->test_model->getRow($id);
		
	 
		$this->load->view('show',array(
			"data"=>$data
		));
	}
	public function add($id=0){
		
		if($id){
			$data=$this->test_model->getRow($id);
		}else{
			$data=array();
		}
		$this->load->view('add',array(
			"data"=>$data
		));
	}
	
	public function create(){
		$data=$this->input->post(array('id', 'title',"content"), TRUE);
		if(isset($data["id"])){
			$this->test_model->db->update("guest",$data,array("id"=>$data["id"]));
		}else{
			$this->test_model->db->insert("guest",$data);
		}
		echo json_encode(array("error"=>0,"message"=>"success","data"=>$data));
	}
	
	public function deleteData($id=0){
		$this->test_model->db->query("delete from ".$this->db->dbprefix('guest')." where id=".$id);
		echo json_encode(array("error"=>0,"message"=>"success"));
	}
}
