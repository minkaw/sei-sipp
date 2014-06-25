<?php
class tproduk extends CI_Model{
	var $produk = "t_produk";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_prod,$no_prod,$nama_prod,$hrg_prod,$kapasitas)
	{
		$this->id_prod= $id_prod;
		$this->no_prod= $no_prod;
		$this->nama_prod= $nama_prod;
		$this->hrg_prod= $hrg_prod;
		$this->kapasitas= $kapasitas;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->produk, $page, $uri_segment);
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
			'id_prod'=>$this->id_prod,
			'no_prod'=>$this->no_prod,
			'nama_prod'=>$this->nama_prod,
			'hrg_prod'=>$this->hrg_prod,
			'kapasitas'=>$this->kapasitas
		);
		return $this->db->insert($this->produk, $arrayData);
	}
	
	function update($id_prod)
	{
		$arrayData = array(
			'no_prod'=>$this->no_prod,
			'nama_prod'=>$this->nama_prod,
			'hrg_prod'=>$this->hrg_prod,
			'kapasitas'=>$this->kapasitas
		);
		$this->db->where('id_prod', $id_prod);
		return $this->db->update($this->produk, $arrayData);
	}
	
	function remove($id_prod)
	{
		$this->db->where('id_prod', $id_prod);
		return $this->db->delete($this->produk);
	}	
	
	function detail($id_prod)
	{
		$this->db->where('id_prod', $id_prod);
		$query = $this->db->get($this->produk);	
		return $query->result_array();
	}
	
	function getListSearch($name){
		$this->db->like('nama_prod',$name);
		$query = $this->db->get($this->produk);
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