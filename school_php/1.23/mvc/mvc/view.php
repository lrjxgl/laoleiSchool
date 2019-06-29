<?php
class view{
	public $template_dir   = '';
	public $_var=array();
	public function __construct($template_dir=""){
		$this->template_dir=$template_dir;
	}
	
	public function assign($var,$value=""){
		if(is_array($var)){
			foreach($var as $k=>$v){
				$this->_var[$k]=$v;
			}
		}else{
			$this->_var[$var]=$value;
		}
	}
	
	public function display($filename){
		extract($this->_var);
		if(!file_exists($this->template_dir."/".$filename))  exit($filename."模板不存在");
		require $this->template_dir."/".$filename;
	}
}
?>