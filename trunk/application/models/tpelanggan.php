<?php
class tpelanggan extends CI_Model{
	var $pelanggan = "t_pelanggan";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_plgn,$no_pelanggan,$nama_plgn,$alamat_plgn,$cp_plgn,$nik,$status_plgn)
	{
		$this->id_plgn= $id_plgn;
		$this->no_pelanggan= $no_pelanggan;
		$this->nama_plgn= $nama_plgn;
		$this->alamat_plgn= $alamat_plgn;
		$this->cp_plgn= $cp_plgn;
		$this->nik= $nik;
		$this->status_plgn= $status_plgn;
	}
	
	function getList($page,$uri_segment){
		$this->db->select('plg.*, count(po.no_pelanggan) as jml_po');
		$this->db->join('t_preorder as po', 'po.no_pelanggan = plg.no_pelanggan', 'left');
		$this->db->group_by("plg.id_plgn"); 
		$query = $this->db->get($this->pelanggan ." as plg", $page, $uri_segment);
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
			'no_pelanggan'=>$this->no_pelanggan,
			'nama_plgn'=>$this->nama_plgn,
			'alamat_plgn'=>$this->alamat_plgn,
			'cp_plgn'=>$this->cp_plgn,
			'nik'=>$this->nik,
			'status_plgn'=>$this->status_plgn
		);
		return $this->db->insert($this->pelanggan, $arrayData);
	}
	
	function update($id_plgn)
	{
		$arrayData = array(
			'no_pelanggan'=>$this->no_pelanggan,
			'nama_plgn'=>$this->nama_plgn,
			'alamat_plgn'=>$this->alamat_plgn,
			'cp_plgn'=>$this->cp_plgn,
			'nik'=>$this->nik,
			'status_plgn'=>$this->status_plgn
		);
		$this->db->where('id_plgn', $id_plgn);
		return $this->db->update($this->pelanggan, $arrayData);
	}
	
	function detail($id_plgn)
	{
		$this->db->where('id_plgn', $id_plgn);
		$query = $this->db->get($this->pelanggan);	
		return $query->result_array();
	}
	
	function getNoPelanggan(){
		$this->db->order_by("id_plgn", "desc");
		$this->db->limit(1);
		$query = $this->db->get($this->pelanggan);
		if($query->num_rows() > 0){
			$result = $query->result_array();
			return $result[0]['id_plgn']+1;
		} else {
			return 1;
		}	
	}
	
	function checkingPelanggan($no_pelanggan)
	{
		$this->db->where('no_pelanggan', $no_pelanggan);
		$query = $this->db->get($this->pelanggan);	
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}	
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