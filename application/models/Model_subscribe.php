<?php

class Model_subscribe extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getServices(){
		$query_one = $this->db->query('select * from service');
		if($query_one->num_rows()>0){
			return $query_one->result();
		}
		
		else{
			return NULL;
		}
	}
	
	function getPet(){
		$query_two = $this->db->query('select * from pet');
		if($query_two->num_rows()>0){
			return $query_two->result();
		}
		
		else{
			return NULL;
		}
	}
	
	function savesubscriptioninfo($client_full_name,$client_address,$client_email,$client_phone,$client_password,$service_name,$pet_name){
		
		//getting service and pet ids
		$this->db->select('serviceid');
		$this->db->where('servicename', $service_name);
		$query = $this->db->get('service');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row)
			{
				$service_id_tbi= $row['serviceid'];
			}
		}
			
		$this->db->select('petid');
		$this->db->where('petname', $pet_name);
		$query = $this->db->get('pet');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row)
			{
				$pet_id_tbi = $row['petid'];
			}
		}
		//pet and service fetched
		
		
		
		$this->db->select('clientid');
        $this->db->where('email', $client_email);
        $query = $this->db->get('client');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $client_id_tbi = $row['clientid'];
            }
		$this->subscription_data($client_id_tbi,$service_id_tbi,$pet_id_tbi);		
			
        }
        else
        {
                //$hash = password_hash($client_password, PASSWORD_BCRYPT, array("cost" => 10));
				
				$client_password_tbi = md5($client_password);
                $client_data_tbi = array('name'=>$client_full_name,
                    'address'=>$client_address,                    
                    'email'=>$client_email,
					'phone'=>$client_phone,
                    'password'=>$client_password_tbi
                );
                $query = $this->db->insert('client',$client_data_tbi);
                //data inserted in client table
				
			$this->db->select('clientid');
			$this->db->where('email', $client_email);
			$query_second = $this->db->get('client');
			if ($query_second->num_rows() > 0) {
				foreach ($query_second->result_array() as $row)
				{
					$client_id_tbi = $row['clientid'];
				}
			$this->subscription_data($client_id_tbi,$service_id_tbi,$pet_id_tbi);
        }
		}
        
 
	
	}
	
	 function subscription_data($client_id,$service_id,$pet_id) 
	{
		$sub_data_tbi = array('clientid'=>$client_id,
                    'serviceid'=>$service_id,
                    'petid'=>$pet_id,
                    'date'=>date('Y-m-d')
                );
		$query1 = $this->db->insert('subscription',$sub_data_tbi);
	}	
	
}

?>