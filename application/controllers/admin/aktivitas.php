<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class aktivitas extends CI_Controller {
	var $judulNama = "ReportMonitoring";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('taktivitas');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/aktivitas/index/';

		$config['total_rows'] = $this->db->count_all('t_aktivitas');
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
		$data['results'] = $this->taktivitas->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/aktivitas/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$data['noAktivitas'] = $this->taktivitas->getNoAktivitas();
		$this->load->view('pages/backend/aktivitas/form',$data);
	}
	
	function edit($id_ak){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->taktivitas->detail($id_ak);
		$this->load->view('pages/backend/aktivitas/form',$data);
	}
	
	function save()
	{
		$id_ak = $this->input->post('id_ak');
		$no_ak = $this->input->post('no_ak');
		$tgl_ak = date('Y-m-d');
		$pekerjaan = $this->input->post('pekerjaan');
		$anggaran = $this->input->post('anggaran');
		$progress = $this->input->post('progress');
		$aksi = $this->input->post('aksi');
		$status_ak = $this->input->post('status_ak');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{	
			$this->taktivitas->setData($id_ak,$no_ak,$tgl_ak,$pekerjaan,$anggaran,$progress,$aksi,$status_ak);
			if(!$id_ak){
				$this->taktivitas->create();
			}else{
				$this->taktivitas->update($id_ak);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/aktivitas');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/aktivitas');
	}
	
	function delete($id_ak)
	{
		if ($this->taktivitas->remove($id_ak)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/aktivitas','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/aktivitas');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->taktivitas->getListSearch($name);
		$this->load->view('pages/backend/aktivitas/list',$data);
	}
}

?>
