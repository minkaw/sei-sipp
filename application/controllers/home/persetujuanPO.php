<?php 
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class PersetujuanPO extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('tpreOrder');
		$this->load->model('tdetailPreOrder');
	}

	function index() {
		$no_pelanggan = $this->session->userdata('noPelanggan');
		$data['nilai'] = "2";
		$data['results'] = $this->tpreOrder->getListPelanggan($no_pelanggan);
		$this->load->view('pages/frontend/persetujuanPO',$data);
	}
	
	function detail($id_po){
		$no_pelanggan = $this->session->userdata('noPelanggan');
		$getDetail = $this->tpreOrder->detail($id_po);
		if($getDetail){
			$data['nilai'] = "1";
			$data['results'] = $this->tdetailPreOrder->getList($getDetail[0]['id_po']);
			$data['detail'] = $this->tpreOrder->detailPoPelanggan($no_pelanggan);
		}else{
			$data['nilai'] = "0";
		}
		$this->load->view('pages/frontend/persetujuanPO',$data);
	}
	
	function save()
	{
		$id_po = $this->input->post('id_po');
		$no_po = $this->input->post('no_po');
		$no_pelanggan = $this->input->post('no_pelanggan');
		$tgl_po = $this->input->post('tgl_po');
		$deadline = $this->input->post('deadline');
		$status_po = $this->input->post('status_po');
		$persetujuan_po = 1;
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			if($this->tpreOrder->checkingNoPelanggan($no_pelanggan)){
				$this->tpreOrder->setData($id_po,$no_po,$no_pelanggan,$tgl_po,$deadline,$status_po,$persetujuan_po);
				if($id_po){
					$this->tpreOrder->update($id_po);
				}
				$this->session->set_flashdata('success', true);
				redirect('home/persetujuanPO');
			}else{
				$this->session->set_flashdata('failed', true);
				$this->session->set_flashdata('flag', 'No. Pelanggan');
				redirect('home/persetujuanPO');
			}
		}
		$this->session->set_flashdata('error', true);
		redirect('home/persetujuanPO');
	}
}
?>