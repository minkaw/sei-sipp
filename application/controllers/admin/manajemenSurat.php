<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class manajemenSurat extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tmanajemenSurat');
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
		$this->load->view('pages/backend/manajemenSurat/form',$data);
	}
	
	function edit($id_ak){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tmanajemenSurat->detail($id_ak);
		$this->load->view('pages/backend/manajemenSurat/form',$data);
	}
	
	function save()
	{
		$id_ak = $this->input->post('id_ak');
		$no_ak = $this->input->post('no_ak');
		$pekerjaan = $this->input->post('pekerjaan');
		$anggaran = $this->input->post('anggaran');
		$progress = $this->input->post('progress');
		$aksi = $this->session->userdata('aksi');
		$status_ak = $this->input->post('status_ak');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{	
			$this->tmanajemenSurat->setData($id_ak,$no_ak,$pekerjaan,$anggaran,$progress,$aksi,$status_ak,$daftar_po);
			if($aksi){
				if(!$id_ak){
				$this->tmanajemenSurat->create();
				}else{
					$this->tmanajemenSurat->update($id_ak);
				}
				$this->session->set_flashdata('success', true);
				redirect('admin/manajemenSurat');
			}
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/manajemenSurat');
	}
	
	function delete($id_ak)
	{
		if ($this->tmanajemenSurat->remove($id_ak)){
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
