<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tproduk');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/produk/index/';

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
	
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tproduk->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/produk/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$this->load->view('pages/backend/produk/form',$data);
	}
	
	function edit($id_prod){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tproduk->detail($id_prod);
		$this->load->view('pages/backend/produk/form',$data);
	}
	
	function save()
	{
		$id_prod = $this->input->post('id_prod');
		$no_prod = $this->input->post('no_prod');
		$nama_prod = $this->input->post('nama_prod');
		$hrg_prod = $this->input->post('hrg_prod');
		$kapasitas = $this->input->post('kapasitas');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$this->tproduk->setData($id_prod,$no_prod,$nama_prod,$hrg_prod,$kapasitas);
			if(!$id_prod){
				$this->tproduk->create();
			}else{
				$this->tproduk->update($id_prod);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/produk');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/produk');
	}
	
	function delete($id_prod)
	{
		if ($this->tproduk->remove($id_prod)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/produk','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/produk');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tproduk->getListSearch($name);
		$this->load->view('pages/backend/produk/list',$data);
	}
}

?>