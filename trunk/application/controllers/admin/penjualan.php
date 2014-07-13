<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	var $judulNama = "Penjualan";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tpenjualan');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/penjualan/index/';

		$config['total_rows'] = $this->db->count_all('t_penjualan');
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
	
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tpenjualan->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/penjualan/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$data['noPenjualan'] = $this->tpenjualan->getNoPenjualan();
		$this->load->view('pages/backend/penjualan/form',$data);
	}
	
	function edit($id_po){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['id_po'] = $id_po;
		$data['noPenjualan'] = $this->tpenjualan->getNoPenjualan();
		$data['detail'] = $this->tpenjualan->detail($id_po);
		$this->load->view('pages/backend/penjualan/form',$data);
	}
	
	function save()
	{
		$id_penj = $this->input->post('id_penj');
		$id_po = $this->input->post('id_po');
		$no_penj = $this->input->post('no_penj');
		$tgl_penj = $this->input->post('tgl_penj');
		$status_penjualan = $this->input->post('status_penjualan');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{	
			$this->tpenjualan->setData($id_penj,$id_po,$no_penj,$tgl_penj,$status_penjualan);
			if(!$id_penj){
				$this->tpenjualan->create();
			}else{
				$this->tpenjualan->update($id_penj);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/penjualan');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/penjualan');
	}
	
	function searchData(){
		$name = $this->input->post('no_penj');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tpenjualan->getListSearch($name);
		$this->load->view('pages/backend/penjualan/list',$data);
	}
}

?>
