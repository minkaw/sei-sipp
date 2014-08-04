<?php
class treportMonitoring extends CI_Model{
	var $reportMonitoring = "t_reportMonitoring";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($nik,$id_report,$no_report,$tgl_report,$pekerjaan,$anggaran,$progress,$aksi,$status_report)
	{
		$this->nik= $nik;
		$this->id_report= $id_report;
		$this->no_report= $no_report;
		$this->tgl_report= $tgl_report;
		$this->pekerjaan= $pekerjaan;
		$this->anggaran= $anggaran;
		$this->progress= $progress;
		$this->aksi= $aksi;
		$this->status_report= $status_report;
	}
	
	function getList($nik,$page,$uri_segment){
		$this->db->where('nik', $nik);
		$query = $this->db->get($this->reportMonitoring, $page, $uri_segment);
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
			'nik'=>$this->nik,
			'id_report'=>$this->id_report,
			'no_report'=>$this->no_report,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_report'=>$this->status_report
		);
		return $this->db->insert($this->reportMonitoring, $arrayData);
	}
	
	function update($id_report)
	{
		$arrayData = array(
			'nik'=>$this->nik,
			'no_report'=>$this->no_report,
			'pekerjaan'=>$this->pekerjaan,
			'anggaran'=>$this->anggaran,
			'progress'=>$this->progress,
			'aksi'=>$this->aksi,
			'status_report'=>$this->status_report
		);
		$this->db->where('id_report', $id_report);
		return $this->db->update($this->reportMonitoring, $arrayData);
	}
	
	function detail($id_report)
	{
		$this->db->where('id_report', $id_report);
		$query = $this->db->get($this->reportMonitoring);	
		return $query->result_array();
	}
	
	function getNoreportMonitoring(){
		$this->db->order_by("id_report", "desc");
		$this->db->limit(1);
		$query = $this->db->get($this->reportMonitoring);
		if($query->num_rows() > 0){
			$result = $query->result_array();
			return $result[0]['id_report']+1;
		} else {
			return 1;
		}	
		
	}
	
	function getListSearch($name){
		$this->db->like('pekerjaan',$name);
		$query = $this->db->get($this->reportMonitoring);
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