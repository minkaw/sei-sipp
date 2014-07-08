<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AccountManager extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('taccountManager');
		$this->load->model('tuser');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/accountManager/index/';

		$config['total_rows'] = $this->db->count_all('t_accountManager');
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
		$offset=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->taccountManager->getList($config['per_page'],$offset);
		$this->load->view('pages/backend/accountManager/list',$data);
	}
	
	function add(){
		$data['mode'] = "taccountManagerbah";
		$data['menu'] = $this->judulNama;
		$data['comboUser'] = $this->tuser->getComboList();
		$this->load->view('pages/backend/accountManager/form',$data);
	}
	
	function edit($no_am){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->taccountManager->detail($no_am);
		$data['comboUser'] = $this->tuser->getComboList();
		$this->load->view('pages/backend/accountManager/form',$data);
	}
	
	function save()
	{
		$nik = $this->input->post('nik');
		$no_am = $this->input->post('no_am');
		$nama_am = $this->input->post('nama_am');
		$alamat_am = $this->input->post('alamat_am');
		$tlp_am = $this->input->post('tlp_am');
		$id_user = $this->input->post('id_user');
		$email_am = $this->input->post('email_am');
		$status_am = $this->input->post('status_am');
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->taccountManager->setData($nik,$no_am,$nama_am,$alamat_am,$tlp_am,$email_am,$id_user,$status_am);
			if(!$no_am){
				$this->taccountManager->create();
				$this->tuser->update_using_user($id_user);
			}else{
				$this->taccountManager->update($no_am);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/accountManager');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/accountManager');
	}
	
	function delete($no_am)
	{
		if ($this->taccountManager->remove($no_am)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/accountManager','refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/accountManager');
	}	
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->nik->getListSearch($name);
		$this->load->view('pages/backend/accountManager/list',$data);
	}
}

?>