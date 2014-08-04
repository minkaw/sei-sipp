<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class UploadPengajuan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tmanajemenSurat');
	}

	function index() {
		$this->load->view('pages/frontend/uploadPengajuan');
	}
	
	function save()
	{
		$id_surat = $this->input->post('id_surat');
		$no_pelanggan = $this->input->post('no_pelanggan');
		$status_surat = $this->input->post('status_surat');
		$no_am = "";
		$keterangan = "";
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$config['upload_path'] = './upload/dokumen';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('nama_file')){
			
				$getFile = $this->upload->data();
				$nama_file = $getFile['file_name'];
			
				$this->tmanajemenSurat->setData($id_surat,$no_pelanggan,$nama_file,$status_surat,$no_am,$keterangan);
				if(!$id_surat){
					$this->tmanajemenSurat->create();
				}else{
					$this->tmanajemenSurat->update($id_surat);
				}
				$this->session->set_flashdata('success', true);
				redirect('home/uploadPengajuan');
			}else{
				$this->session->set_flashdata('failed', true);
				$this->session->set_flashdata('flag', 'Upload Pengajuan');
				redirect('home/uploadPengajuan');
			}
		}
		$this->session->set_flashdata('error', true);
		redirect('home/uploadPengajuan');
	}
}
?>