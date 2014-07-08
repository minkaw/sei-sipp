<?php
class taktivitas extends CI_Model{
	var $aktivitas = "t_aktivitas";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_ak,$no_ak,$tgl_ak,$pekerjaan,$anggaran,$progress,$aksi,$status_ak)
	{
		$this->id_ak= $id_ak;
		$this->no_ak= $no_ak;
		$this->tgl_ak= $tgl_ak;
		$this->pekerjaan= $pekerjaan;
		$this->anggaran= $anggaran;
		$this->progress= $progress;
		$this->aksi= $aksi;
		$this->status_ak= $status_ak;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->aktivitas, $page, $uri_segment);
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
			'id_ak'=>$this->id_ak,
			'no_ak'=>$this->no_ak,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_ak'=>$this->status_ak
		);
		return $this->db->insert($this->aktivitas, $arrayData);
	}
	
	function update($id_ak)
	{
		$arrayData = array(
			'no_ak'=>$this->no_ak,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_ak'=>$this->status_ak
		);
		$this->db->where('id_ak', $id_ak);
		return $this->db->update($this->aktivitas, $arrayData);
	}
	
	function remove($id_ak)
	{
		$this->db->where('id_ak', $id_ak);
		return $this->db->delete($this->aktivitas);
	}	
	
	function detail($id_ak)
	{
		$this->db->where('id_ak', $id_ak);
		$query = $this->db->get($this->aktivitas);	
		return $query->result_array();
	}
	
	function getNoAktivitas(){
		$this->db->order_by("id_ak", "desc");
		$this->db->limit(1);
		$query = $this->db->get($this->aktivitas);
		if($query->num_rows() > 0){
			$result = $query->result_array();
			return $result[0]['id_ak']+1;
		} else {
			return 1;
		}	
		
	}
	
	function getListSearch($name){
		$this->db->like('pekerjaan',$name);
		$query = $this->db->get($this->aktivitas);
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