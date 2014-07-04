<?php
class tmanajemenSurat extends CI_Model{
	var $manajemenSurat = "t_manajemenSurat";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_surat,$nama_file,$status_surat,$nama_am,$keterangan)
	{
		$this->id_surat= $id_surat;
		$this->nama_file= $nama_file;
		$this->status_surat= $status_surat;
		$this->nama_am= $nama_am;
		$this->keterangan= $keterangan;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->manajemenSurat, $page, $uri_segment);
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
			'id_surat'=>$this->id_surat,
			'nama_file'=>$this->nama_file,
			'status_surat'=>$this->status_surat,
			'nama_am'=>$this->nama_am,
			'keterangan'=>$this->keterangan,
		);
		return $this->db->insert($this->manajemenSurat, $arrayData);
	}
	
	function update($id_surat)
	{
		$arrayData = array(
			'nama_file'=>$this->nama_file,
			'status_surat'=>$this->status_surat,
			'nama_am'=>$this->nama_am,
			'keterangan'=>$this->keterangan,
		);
		$this->db->where('id_surat', $id_surat);
		return $this->db->update($this->manajemenSurat, $arrayData);
	}
	
	function remove($id_surat)
	{
		$this->db->where('id_surat', $id_surat);
		return $this->db->delete($this->manajemenSurat);
	}	
	
	function detail($id_surat)
	{
		$this->db->where('id_surat', $id_surat);
		$query = $this->db->get($this->manajemenSurat);	
		return $query->result_array();
	}
	
	function checkingmanajemenSurat($nama_file)
	{
		$this->db->where('nama_file', $nama_file);
		$query = $this->db->get($this->manajemenSurat);	
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}	
	}
	
	function getListSearch($name){
		$this->db->like('nama_file',$name);
		$query = $this->db->get($this->manajemenSurat);
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