<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

   public function index()
   {
       $this->load->view('index');
   }

   public function contact_view()
     {
        
            $this->load->model('Model_contact');
            $this->load->view('templates/header');
            $this->load->view('pages/contact');
            
     }

    public function save_contact()
    {
				
        	    $this->load->helper(array('form', 'url'));
			    $this->load->library('form_validation');
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('comments', 'Comments', 'required');

                if ($this->form_validation->run() && $this->input->post("send_contact"))
                {
                    $this->load->model('Model_contact');  
                    $data = array(  
                        "name" => $this->input->post("name"),  
                        "email" => $this->input->post("email"),
                        "comments" => $this->input->post("comments")
                    );
                    $this->Model_contact->savecontactinfo($data);
           			redirect('Home/index_view');
                }
                else
                {
                    $this->load->view('templates/header');
					$this->load->view('pages/contact');
				}                  
             
        }
}
?>