<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class detailPreOrder extends CI_Controller {
	var $judulNama = "PreOrder";
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('tproduk');
		$this->load->model('tdetailPreOrder');
		$username = $this->session->userdata('username');
		if (!$username)
		  redirect("admin/login");
	}
	//popup list
	function dtlPreOrder($id_po){
		$data['results'] = $this->tdetailPreOrder->getList($id_po);
		$this->load->view('pages/backend/detailPreOrder/list',$data);
	}
	
	//index
	function formDtlPreOrder($id_po){
		$data['idPo'] = $id_po;
		$data['menu'] = $this->judulNama;
		$data['comboProduk'] = $this->tproduk->getComboList();
		$data['results'] = $this->tdetailPreOrder->getList($id_po);
		$this->load->view('pages/backend/detailPreOrder/form',$data);
	}
	
	function edit($id_po,$id_detail_po){
		$data['mode'] = "Ubah";
		$data['idPo'] = $id_po;
		$data['menu'] = $this->judulNama;
		$data['detail'] = $this->tdetailPreOrder->detail($id_detail_po);
		$data['comboProduk'] = $this->tproduk->getComboList();
		$data['results'] = $this->tdetailPreOrder->getList($id_po);
		$this->load->view('pages/backend/detailPreOrder/form',$data);
	}
	
	function save()
	{
		$id_detail_po = $this->input->post('id_detail_po');
		$id_po = $this->input->post('id_po');
		$id_prod = $this->input->post('id_prod');
		$jumlah_produk = $this->input->post('jumlah_produk');
		
		$submit = $this->input->post('submit');	
		if($submit)
		{
			$this->tdetailPreOrder->setData($id_detail_po,$id_po,$id_prod,$jumlah_produk);
			if(!$id_detail_po){
				$this->tdetailPreOrder->create();
			}else{
				$this->tdetailPreOrder->update($id_po);
			}
			$this->session->set_flashdata('success', true);
			redirect('admin/detailPreOrder/formDtlPreOrder/'.$id_po);
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/detailPreOrder/formDtlPreOrder/'.$id_po);
	}
	
	function delete($id_po,$id_detail_po)
	{
		if ($this->tdetailPreOrder->remove($id_detail_po)){
			$this->session->set_flashdata('delete', true);
			redirect('admin/detailPreOrder/formDtlPreOrder/'.$id_po,'refresh');
		}
		$this->session->set_flashdata('error', true);
		redirect('admin/detailPreOrder/formDtlPreOrder/'.$id_po);
	}	
}
?>