<?php
class tmanajemenSurat extends CI_Model{
	var $manajemenSurat = "t_manajemenSurat";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_surat,$no_ak,$pekerjaan,$anggaran,$progress,$aksi,$status_ak)
	{
		$this->id_surat= $id_surat;
		$this->no_ak= $no_ak;
		$this->pekerjaan= $pekerjaan;
		$this->anggaran= $anggaran;
		$this->progress= $progress;
		$this->aksi= $aksi;
		$this->status_ak= $status_ak;
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
			'no_ak'=>$this->no_ak,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_ak'=>$this->status_ak
		);
		return $this->db->insert($this->manajemenSurat, $arrayData);
	}
	
	function update($id_surat)
	{
		$arrayData = array(
			'no_ak'=>$this->no_ak,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_ak'=>$this->status_ak
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
	
	function checkingmanajemenSurat($no_ak)
	{
		$this->db->where('no_ak', $no_ak);
		$query = $this->db->get($this->manajemenSurat);	
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}	
	}
	
	function getListSearch($name){
		$this->db->like('pekerjaan',$name);
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