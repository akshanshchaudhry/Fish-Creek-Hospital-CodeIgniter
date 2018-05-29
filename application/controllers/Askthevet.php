<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Askthevet extends CI_Controller {

   public function index()
   {
       $this->load->view('index');
   }


    public function askthevet_view()
    { 
	
           $this->load->model('Model_askthevet');
		   $data['questions'] = $this->Model_askthevet->getQuestions();
           $this->load->view('templates/header');
           $this->load->view('pages/askthevet',$data);
           $this->load->view('templates/footer');
    }
}
?>