<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

   public function index()
   {
       $this->load->view('index');
   }


    public function subscribe_view()
    { 
	
           $this->load->model('Model_subscribe');
		   $data['services'] = $this->Model_subscribe->getServices();
		   $data['pet'] = $this->Model_subscribe->getPet();
		   
           $this->load->view('templates/header');
           $this->load->view('pages/Subscribe',$data);
		   $this->load->view('templates/footer');
		   
		   
    }
	
	
	public function subscribe_validation()
    {
				
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('client_full_name', 'Name', 'required');
			$this->form_validation->set_rules('client_address', 'Address', 'required');
			$this->form_validation->set_rules('client_email', 'Email', 'required|regex_match[/^(.+)@([^\.].*)\.([a-z]{2,})$/]');
			$this->form_validation->set_rules('client_phone', 'Phone Number', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('client_password', 'Password', 'trim|required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]');

                if ($this->form_validation->run() == FALSE)  
                {
                   $this->load->model('Model_subscribe');
				   $data['services'] = $this->Model_subscribe->getServices();
				   $data['pet'] = $this->Model_subscribe->getPet();
				   $this->load->view('templates/header');
				   $this->load->view('pages/Subscribe',$data);
				   $this->load->view('templates/footer');
                }
                else
                {
					if($this->input->post("send_now_subscribe"))
					{
					
                    $client_full_name = $_POST['client_full_name'];
                    $client_address = $_POST['client_address'];
                    $client_email = $_POST['client_email'];
                    $client_phone = $_POST['client_phone'];
                    $client_password = $_POST['client_password'];
                    $service_name = $_POST['service_name'];
                    $pet_name = $_POST['pet_name'];
                    $this->load->model('Model_subscribe');
					
                    $this->Model_subscribe->savesubscriptioninfo($client_full_name,$client_address,$client_email,$client_phone,$client_password,$service_name,$pet_name);
                    //$this->session->set_flashdata('msg', 'Successfully created subscription for '.$_POST['client_name'].' !!');
                    redirect('Home/index_view');
					}
		   
                    

                }
        }
		
/*	public function password_check($str)
   {
	  if (preg_match('#[0-9]#', $str) && preg_match('#[a-z]#', $str) && preg_match('#[A-Z]#', $str)) {
		return TRUE;
	  }
	  else{
		  $this->form_validation->set_message('password_check','Please input valid password containing atleast one uppercase, one lower case and one number. It should be minum 8 letters and maximum 16 letters long');
		  return FALSE;
	  }
	  
} */
}
?>