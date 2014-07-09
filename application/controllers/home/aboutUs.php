<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->view('pages/frontend/aboutUs');
	}
}
?>