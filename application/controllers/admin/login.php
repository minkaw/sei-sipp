<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tuser');
	}

	function index() {
		$data['partial'] = "";
		$this->load->view('pages/backend/login', $data);
	}
	
	function validate()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$queryAdmin = $this->tuser->checkuserAdmin($username,$password);
		$queryAM = $this->tuser->checkuserAM($username,$password);
		if($queryAdmin || $queryAM){
			redirect('admin/home');
		}else{
			$this->session->set_flashdata('error', true);
			$this->index();
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}

}
