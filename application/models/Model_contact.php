<?php

class Model_contact extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function savecontactinfo($data){
		$this->db->insert("contact", $data); 
	}
}
?>