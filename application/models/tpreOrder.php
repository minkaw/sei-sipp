<?php
class tpreOrder extends CI_Model{
	var $preOrder = "t_preOrder";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_po,$no_po,$tgl_po,$jml_po,$totHrg_po,$deadline,$status_po,$daftar_prod)
	{
		$this->id_po= $id_po;
		$this->no_po= $no_po;
		$this->tgl_po= $tgl_po;
		$this->jml_po= $jml_po;
		$this->totHrg_po= $totHrg_po;
		$this->deadline= $deadline;
		$this->status_po= $status_po;
		$this->daftar_prod= $daftar_prod;
	}
	
	function create()
	{		
		$arrayData = array(
			'id_po'=>$this->id_po,
			'no_po'=>$this->no_po,
			'tgl_po'=>$this->tgl_po,
			'jml_po'=>$this->jml_po,
			'totHrg_po'=>$this->totHrg_po,
			'deadline'=>$this->deadline,
			'status_po'=>$this->status_po,
			'daftar_prod'=>$this->daftar_prod
		);
		return $this->db->insert($this->preOrder, $arrayData);
	}
	
	function update($no_po)
	{
		$arrayData = array(
			'id_po'=>$this->id_po,
			'no_po'=>$this->no_po,
			'tgl_po'=>$this->tgl_po,
			'jml_po'=>$this->jml_po,
			'totHrg_po'=>$this->totHrg_po,
			'deadline'=>$this->deadline,
			'status_po'=>$this->status_po,
			'daftar_prod'=>$this->daftar_prod
		);
		$this->db->where('no_po', $no_po);
		return $this->db->update($this->preOrder, $arrayData);
	}
	
	function remove($no_po)
	{
		$this->db->where('no_po', $no_po);
		return $this->db->delete($this->preOrder);
	}	
	
	function detail($no_po)
	{
		$this->db->where('id_po', $id_po);
		$query = $this->db->get($this->preOrder);	
		return $query->result_array();
	}
	
	function getListSearch($npoe){
		$this->db->like('tgl_po',$npoe);
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
}
?>