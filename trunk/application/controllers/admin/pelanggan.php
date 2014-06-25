<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tpelanggan');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/pelanggan/index/';

		$config['total_rows'] = $this->db->count_all('t_pelanggan');
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
		$data['results'] = $this->tpelanggan->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/pelanggan/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$this->load->view('pages/backend/pelanggan/form',$data);
	}
	
	function edit($id_plgn){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tpelanggan->detail($id_plgn);
		$this->load->view('pages/backend/pelanggan/form',$data);
	}
	
	function save()
	{
		$id_plgn = $this->input->post('id_plgn');
		$nama_plgn = $this->input->post('nama_plgn');
		$alamat_plgn = $this->input->post('alamat_plgn');
		$cp_plgn = $this->input->post('cp_plgn');
		$nik = $this->session->userdata('nik');
		$status_plgn = $this->input->post('status_plgn');
		$daftar_po = $this->input->post('daftar_po');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{	
			$this->tpelanggan->setData($id_plgn,$nama_plgn,$alamat_plgn,$cp_plgn,$nik,$status_plgn,$daftar_po);
			if($nik){
				if(!$id_plgn){
				$this->tpelanggan->create();
				}else{
					$this->tpelanggan->update($id_plgn);
				}
				$this->session->set_flashdata('success', true);
				redirect('admin/pelanggan');
			}
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/pelanggan');
	}
	
	function delete($id_plgn)
	{
		if ($this->tpelanggan->remove($id_plgn)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/pelanggan','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/pelanggan');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tpelanggan->getListSearch($name);
		$this->load->view('pages/backend/pelanggan/list',$data);
	}
}

?>
