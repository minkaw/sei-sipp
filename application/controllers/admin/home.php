<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends CI_Controller {
	var $judulNama = "Dashboard";
	
	function __construct() {
		parent::__construct();

		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$data['menu'] = $this->judulNama;
		$this->load->view('pages/backend/home',$data);
	}

}
