<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reportMonitoring extends CI_Controller {
	var $judulNama = "Report Monitoring";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('treportMonitoring');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/reportMonitoring/index/';

		$config['total_rows'] = $this->db->count_all('t_reportMonitoring');
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
		$data['results'] = $this->treportMonitoring->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/reportMonitoring/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$data['noreportMonitoring'] = $this->treportMonitoring->getNoreportMonitoring();
		$this->load->view('pages/backend/reportMonitoring/form',$data);
	}
	
	function edit($id_ak){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->treportMonitoring->detail($id_ak);
		$this->load->view('pages/backend/reportMonitoring/form',$data);
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
			$this->treportMonitoring->setData($id_ak,$no_ak,$tgl_ak,$pekerjaan,$anggaran,$progress,$aksi,$status_ak);
			if(!$id_ak){
				$this->treportMonitoring->create();
			}else{
				$this->treportMonitoring->update($id_ak);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/reportMonitoring');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/reportMonitoring');
	}
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->treportMonitoring->getListSearch($name);
		$this->load->view('pages/backend/reportMonitoring/list',$data);
	}
}

?>
