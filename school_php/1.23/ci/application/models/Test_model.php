<?php
class Test_model extends CI_Model {
	 
    public function __construct()
    {
        $this->load->database();
    }
	public function getList(){
		 $query = $this->db->get('guest');
        return $query->result_array();
	}
	
	public function getRow($id){
		 $query = $this->db->get_where('guest',array("id"=>$id));
	    return $query->row_array();
	}
}