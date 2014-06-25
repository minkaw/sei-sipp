<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tuser');
	}

	function index() {
		$this->load->view('pages/frontend/login');
	}
	
	function validate()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$query = $this->tuser->checkuserPelanggan($username,$password);
		if($query){
			redirect('home/dashboard');
		}else{
			$this->session->set_flashdata('error', true);
			$this->index();
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('home/dashboard');
	}
}
