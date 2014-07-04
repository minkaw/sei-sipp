<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class preOrder extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tpreOrder');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/preOrder/index/';

		$config['total_rows'] = $this->db->count_all('t_preOrder');
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
		$data['results'] = $this->tpreOrder->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/preOrder/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$this->load->view('pages/backend/preOrder/form',$data);
	}
	
	function edit($id_po){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tpreOrder->detail($id_po);
		$this->load->view('pages/backend/preOrder/form',$data);
	}
	
	function save()
	{
		$id_po = $this->input->post('id_po');
		$no_po = $this->input->post('no_po');
		$tgl_po = date('Y-m-d');
		$jml_po = $this->input->post('jml_po');
		$totHrg_po = $this->input->post('totHrg_po');
		$deadline = date('Y-m-d');
		$status_po = $this->input->post('status_po');
		$daftar_prod = $this->input->post('daftar_prod');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$this->tpreOrder->setData($id_po,$no_po,$tgl_po,$jml_po,$totHrg_po,$deadline,$status_po,$daftar_prod);
			if(!$id_po){
				$this->tpreOrder->create();
			}else{
				$this->tpreOrder->update($id_po);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/preOrder');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/preOrder');
	}
	
	function delete($id_po)
	{
		if ($this->tpreOrder->remove($id_po)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/preOrder','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/preOrder');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tpreOrder->getListSearch($name);
		$this->load->view('pages/backend/preOrder/list',$data);
	}
}

?>
