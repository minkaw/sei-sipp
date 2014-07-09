<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class DaftarPO extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tproduk');
	}

	function index() {
		$config['base_url'] = base_url().'home/paftarPO/index/';

		$config['total_rows'] = $this->db->count_all('t_produk');
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<div class="box-footer clearfix"><ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';

		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
	
		$data['results'] = $this->tproduk->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/frontend/daftarPO', $data);
	}
}
?>