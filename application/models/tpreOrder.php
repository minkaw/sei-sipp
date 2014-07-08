<?php
class tpreOrder extends CI_Model{
	var $preOrder = "t_preOrder";
	var $pelanggan = "t_pelanggan";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_po,$no_po,$no_pelanggan,$tgl_po,$deadline,$status_po,$persetujuan_po)
	{
		$this->id_po= $id_po;
		$this->no_po= $no_po;
		$this->no_pelanggan= $no_pelanggan;
		$this->tgl_po= $tgl_po;
		$this->deadline= $deadline;
		$this->status_po= $status_po;
		$this->persetujuan_po= $persetujuan_po;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->preOrder, $page, $uri_segment);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	function getNoPreOrder(){
		$this->db->order_by("id_po", "desc");
		$this->db->limit(1);
		$query = $this->db->get($this->preOrder);
		if($query->num_rows() > 0){
			$result = $query->result_array();
			return $result[0]['id_po']+1;
		} else {
			return 1;
		}	
	}
	
	function create()
	{		
		$arrayData = array(
			'id_po'=>$this->id_po,
			'no_po'=>$this->no_po,
			'no_pelanggan'=>$this->no_pelanggan,
			'tgl_po'=>$this->tgl_po,
			'deadline'=>$this->deadline,
			'status_po'=>$this->status_po,
			'persetujuan_po'=>$this->persetujuan_po
		);
		return $this->db->insert($this->preOrder, $arrayData);
	}
	
	function update($id_po)
	{
		$arrayData = array(
			'no_po'=>$this->no_po,
			'no_pelanggan'=>$this->no_pelanggan,
			'tgl_po'=>$this->tgl_po,
			'deadline'=>$this->deadline,
			'status_po'=>$this->status_po,
			'persetujuan_po'=>$this->persetujuan_po
		);
		$this->db->where('id_po', $id_po);
		return $this->db->update($this->preOrder, $arrayData);
	}
	
	function remove($id_po)
	{
		$this->db->where('id_po', $id_po);
		return $this->db->delete($this->preOrder);
	}	
	
	function detail($id_po)
	{
		$this->db->where('id_po', $id_po);
		$query = $this->db->get($this->preOrder);	
		return $query->result_array();
	}
	
	function getListSearch($name){
		$this->db->like('no_po',$$name);
		$query = $this->db->get($this->preOrder);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	function checkingNoPelanggan($no_pelanggan)
	{
		$this->db->where('no_pelanggan', $no_pelanggan);
		$query = $this->db->get($this->pelanggan);	
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}	
	}
}
?>