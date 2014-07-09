<?php
class tmanajemenSurat extends CI_Model{
	var $manajemenSurat = "t_manajemenSurat";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_surat,$no_pelanggan,$nama_file,$status_surat,$no_am,$keterangan)
	{
		$this->id_surat= $id_surat;
		$this->no_pelanggan= $no_pelanggan;
		$this->nama_file= $nama_file;
		$this->status_surat= $status_surat;
		$this->no_am= $no_am;
		$this->keterangan= $keterangan;
	}
	
	function getList($page,$uri_segment){
		$this->db->select('ms.*, am.nama_am');
		$this->db->join('t_accountManager as am', 'am.no_am = ms.no_am', 'left');
		$query = $this->db->get($this->manajemenSurat ." as ms", $page, $uri_segment);
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
			'no_pelanggan'=>$this->no_pelanggan,
			'nama_file'=>$this->nama_file,
			'status_surat'=>$this->status_surat,
			'no_am'=>$this->no_am,
			'keterangan'=>$this->keterangan
		);
		return $this->db->insert($this->manajemenSurat, $arrayData);
	}
	
	function update($id_surat)
	{
		$arrayData = array(
			'status_surat'=>$this->status_surat,
			'no_am'=>$this->no_am,
			'keterangan'=>$this->keterangan
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