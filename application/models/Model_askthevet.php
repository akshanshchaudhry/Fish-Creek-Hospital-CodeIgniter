<?php

class Model_askthevet extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getQuestions(){
		$query = $this->db->query('select * from questions');
		if($query->num_rows()>0){
			return $query->result();
		}
		
		else{
			return NULL;
		}
	}
}
?>