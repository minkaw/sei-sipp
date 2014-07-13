<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	var $judulNama = "Manajemen";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tuser');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}

	function index() {
		$config['base_url'] = base_url().'admin/user/index/';

		$config['total_rows'] = $this->db->count_all('t_user');
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
		$data['results'] = $this->tuser->getList($config['per_page'],$this->uri->segment(3));
		$this->load->view('pages/backend/user/list',$data);
	}
	
	function add(){
		$data['mode'] = "Tambah";
		$data['menu'] = $this->judulNama;
		$this->load->view('pages/backend/user/form',$data);
	}
	
	function edit($id_user){
		$data['mode'] = "Ubah";
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tuser->detail($id_user);
		$this->load->view('pages/backend/user/form',$data);
	}
	
	function save()
	{
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status_user = $this->input->post('status_user');
		$no_pelanggan = $this->input->post('no_pelanggan');
		$last_login = date('Y-m-d');
		$use_user = 0;
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$this->tuser->setData($id_user,$username,$password,$level,$status_user,$last_login,$use_user,$no_pelanggan);
			if(!$id_user){
				$this->tuser->create();
			}else{
				$this->tuser->update($id_user);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/user');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/user');
	}
	
	function searchData(){
		$name = $this->input->post('name');
		$data['menu'] = $this->judulNama;
		$data['results'] = $this->tuser->getListSearch($name);
		$this->load->view('pages/backend/user/list',$data);
	}
}

?>
