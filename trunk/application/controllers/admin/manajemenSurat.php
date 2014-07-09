<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class manajemenSurat extends CI_Controller {
	var $judulNama = "Surat";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tmanajemenSurat');
		$this->load->model('taccountManager');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/manajemenSurat/index/';

		$config['total_rows'] = $this->db->count_all('t_manajemenSurat');
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
		$data['results'] = $this->tmanajemenSurat->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/manajemenSurat/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$data['comboAM'] = $this->taccountManager->getComboList();
		$this->load->view('pages/backend/manajemenSurat/form',$data);
	}
	
	function edit($id_surat){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tmanajemenSurat->detail($id_surat);
		$data['comboAM'] = $this->taccountManager->getComboList();
		$this->load->view('pages/backend/manajemenSurat/form',$data);
	}
	
	function save()
	{
		$id_surat = $this->input->post('id_surat');
		$no_pelanggan = $this->input->post('no_pelanggan');
		$nama_file = $this->input->post('nama_file');
		$status_surat = $this->input->post('status_surat');
		$no_am = $this->input->post('no_am');
		$keterangan = $this->input->post('keterangan');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{	
			$this->tmanajemenSurat->setData($id_surat,$no_pelanggan,$nama_file,$status_surat,$no_am,$keterangan);
			if(!$id_surat){
				$this->tmanajemenSurat->create();
			}else{
				$this->tmanajemenSurat->update($id_surat);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/manajemenSurat');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/manajemenSurat');
	}
	
	function delete($id_surat)
	{
		$getHapus = $this->tmanajemenSurat->detail($id_surat);
		@unlink("upload/dokumen/".$getHapus[0]['nama_file']);
		
		if ($this->tmanajemenSurat->remove($id_surat)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/manajemenSurat','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/manajemenSurat');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tmanajemenSurat->getListSearch($name);
		$this->load->view('pages/backend/manajemenSurat/list',$data);
	}
}

?>
