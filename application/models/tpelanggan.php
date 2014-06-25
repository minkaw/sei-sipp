<?php
class tpelanggan extends CI_Model{
	var $pelanggan = "t_pelanggan";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_plgn,$nama_plgn,$alamat_plgn,$cp_plgn,$nik,$status_plgn,$daftar_po)
	{
		$this->id_plgn= $id_plgn;
		$this->nama_plgn= $nama_plgn;
		$this->alamat_plgn= $alamat_plgn;
		$this->cp_plgn= $cp_plgn;
		$this->nik= $nik;
		$this->status_plgn= $status_plgn;
		$this->daftar_po= $daftar_po;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->pelanggan, $page, $uri_segment);
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
			'id_plgn'=>$this->id_plgn,
			'nama_plgn'=>$this->nama_plgn,
			'alamat_plgn'=>$this->alamat_plgn,
			'cp_plgn'=>$this->cp_plgn,
			'nik'=>$this->nik,
			'status_plgn'=>$this->status_plgn,
			'daftar_po'=>$this->daftar_po
		);
		return $this->db->insert($this->pelanggan, $arrayData);
	}
	
	function update($id_plgn)
	{
		$arrayData = array(
			'nama_plgn'=>$this->nama_plgn,
			'alamat_plgn'=>$this->alamat_plgn,
			'cp_plgn'=>$this->cp_plgn,
			'nik'=>$this->nik,
			'status_plgn'=>$this->status_plgn,
			'daftar_po'=>$this->daftar_po
		);
		$this->db->where('id_plgn', $id_plgn);
		return $this->db->update($this->pelanggan, $arrayData);
	}
	
	function remove($id_plgn)
	{
		$this->db->where('id_plgn', $id_plgn);
		return $this->db->delete($this->pelanggan);
	}	
	
	function detail($id_plgn)
	{
		$this->db->where('id_plgn', $id_plgn);
		$query = $this->db->get($this->pelanggan);	
		return $query->result_array();
	}
	
	function getListSearch($name){
		$this->db->like('nama_plgn',$name);
		$query = $this->db->get($this->pelanggan);
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