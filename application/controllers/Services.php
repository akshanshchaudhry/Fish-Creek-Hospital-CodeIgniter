<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

   public function index()
   {
       $this->load->view('index');
   }


    public function services_view()
    { 
	
           $this->load->model('Model_services');
		   $data['services'] = $this->Model_services->getServicename();
           $this->load->view('templates/header');
           $this->load->view('pages/services',$data);
           $this->load->view('templates/footer');
    }
}
?>