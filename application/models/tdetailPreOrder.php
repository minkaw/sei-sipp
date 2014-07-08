<?php
class tdetailPreOrder extends CI_Model{
	var $detailPreOrder = "t_detail_preorder";
	var $produk = "t_produk";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_detail_po,$id_po,$id_prod,$jumlah_produk)
	{
		$this->id_detail_po= $id_detail_po;
		$this->id_po= $id_po;
		$this->id_prod= $id_prod;
		$this->jumlah_produk= $jumlah_produk;
	}
	
	function getList($id_po){
		$this->db->select('dpo.*, pd.nama_prod, pd.hrg_prod');
		$this->db->join($this->produk .' as pd', 'pd.id_prod = dpo.id_prod', 'left');
		$this->db->where('dpo.id_po',$id_po);
		$query = $this->db->get($this->detailPreOrder .' as dpo ');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	function create()
	{		
		$arrayData = array(
			'id_detail_po'=>$this->id_detail_po,
			'id_po'=>$this->id_po,
			'id_prod'=>$this->id_prod,
			'jumlah_produk'=>$this->jumlah_produk
		);
		return $this->db->insert($this->detailPreOrder, $arrayData);
	}
	
	function update($id_detail_po)
	{
		$arrayData = array(
			'id_po'=>$this->id_po,
			'id_prod'=>$this->id_prod,
			'jumlah_produk'=>$this->jumlah_produk
		);
		$this->db->where('id_detail_po', $id_detail_po);
		return $this->db->update($this->detailPreOrder, $arrayData);
	}
	
	function remove($id_detail_po)
	{
		$this->db->where('id_detail_po', $id_detail_po);
		return $this->db->delete($this->detailPreOrder);
	}	
	
	function detail($id_detail_po)
	{
		$this->db->where('id_detail_po', $id_detail_po);
		$query = $this->db->get($this->detailPreOrder);	
		return $query->result_array();
	}
}
?>