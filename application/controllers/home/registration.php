<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Registration extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tpelanggan');
		$this->load->model('tuser');
	}

	function index() {
		$this->load->view('pages/frontend/registration');
	}
	
	function save()
	{
		$id_user = "";
		$no_pelanggan = $this->input->post('no_pelanggan');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$last_login = date('Y-m-d');
		$use_user = 0;
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$query = $this->tpelanggan->checkingPelanggan($no_pelanggan);
			if($query){
				$status_user = "ON";
				$this->tuser->setData($id_user,$username,$password,$level,$status_user,$last_login,$use_user,$no_pelanggan);
				$this->tuser->create();
				
				$this->session->set_flashdata('success', true);
				redirect('home/registration');
			}else{
				$this->session->set_flashdata('error', true);
				redirect('home/registration');
			}
		}
	}
}
