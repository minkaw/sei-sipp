<?php
class tpenjualan extends CI_Model{
	var $penjualan = "t_penjualan";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_penj,$no_penj,$tgl_penj,$jml_penj,$totHrg_penj,$keuntungan)
	{
		$this->id_penj= $id_penj;
		$this->no_penj= $no_penj;
		$this->tgl_penj= $tgl_penj;
		$this->jml_penj= $jml_penj;
		$this->totHrg_penj= $totHrg_penj;
		$this->keuntungan= $keuntungan;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->penjualan, $page, $uri_segment);
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
			'id_penj'=>$this->id_penj,
			'no_penj'=>$this->no_penj,
			'tgl_penj'=>$this->tgl_penj,
			'jml_penj'=>$this->jml_penj,
			'totHrg_penj'=>$this->totHrg_penj,
			'keuntungan'=>$this->keuntungan
		);
		return $this->db->insert($this->penjualan, $arrayData);
	}
	
	function update($id_penj)
	{
		$arrayData = array(
			'no_penj'=>$this->no_penj,
			'tgl_penj'=>$this->tgl_penj,
			'jml_penj'=>$this->jml_penj,
			'totHrg_penj'=>$this->totHrg_penj,
			'keuntungan'=>$this->keuntungan
		);
		$this->db->where('id_penj', $id_penj);
		return $this->db->update($this->penjualan, $arrayData);
	}
	
	function remove($id_penj)
	{
		$this->db->where('id_penj', $id_penj);
		return $this->db->delete($this->penjualan);
	}	
	
	function detail($id_penj)
	{
		$this->db->where('id_penj', $id_penj);
		$query = $this->db->get($this->penjualan);	
		return $query->result_array();
	}
	
	function checkingpenjualan($no_penj)
	{
		$this->db->where('no_penj', $no_penj);
		$query = $this->db->get($this->penjualan);	
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}	
	}
	
	function getListSearch($name){
		$this->db->like('tgl_penj',$name);
		$query = $this->db->get($this->penjualan);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
}
?>