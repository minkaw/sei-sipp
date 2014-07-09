<?php
class taccountManager extends CI_Model{
	var $accountManager = "t_accountManager";

	function __construct()
	{
		parent::__construct();
	}
	
<<<<<<< .mine
	function setData($nik,$no_am,$nama_am,$alamat_am,$tlp_am,$email_am,$id_user,$status_am,$daftar_plgn,$daftar_report)
=======
	function setData($nik,$no_am,$nama_am,$alamat_am,$tlp_am,$email_am,$id_user,$status_am)
>>>>>>> .r30
	{
		$this->nik= $nik;
		$this->no_am= $no_am;
		$this->nama_am= $nama_am;
		$this->alamat_am= $alamat_am;
		$this->tlp_am= $tlp_am;
		$this->email_am= $email_am;
		$this->id_user= $id_user;
		$this->status_am= $status_am;
		$this->daftar_report= $daftar_report;
	}
	
	function getList($page,$uri_segment){
		$sql="
			select am.*, count(pl.nik) as jumlah_pelanggan
			from t_accountmanager as am
			left join t_pelanggan pl on am.nik = pl.nik
			GROUP BY am.nik
			limit ".$uri_segment.", ".$page."";
		$query=$this->db->query($sql);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	function getComboList(){
		$this->db->where('status_am', "ON");
		$query = $this->db->get($this->accountManager);
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
			'no_am'=>$this->no_am,
			'nama_am'=>$this->nama_am,
			'alamat_am'=>$this->alamat_am,
			'tlp_am'=>$this->tlp_am,
			'email_am'=>$this->email_am,
			'id_user'=>$this->id_user,
<<<<<<< .mine
			'status_am'=>$this->status_am,
			'daftar_plgn'=>$this->daftar_plgn,
			'daftar_report'=>$this->daftar_report
=======
			'status_am'=>$this->status_am
>>>>>>> .r30
		);
		return $this->db->insert($this->accountManager, $arrayData);
	}
	
	function update($no_am)
	{
		$arrayData = array(
			'nik'=>$this->nik,
			'no_am'=>$this->no_am,
			'nama_am'=>$this->nama_am,
			'alamat_am'=>$this->alamat_am,
			'tlp_am'=>$this->tlp_am,
			'email_am'=>$this->email_am,
			'id_user'=>$this->id_user,
<<<<<<< .mine
			'status_am'=>$this->status_am,
			'daftar_plgn'=>$this->daftar_plgn,
			'daftar_report'=>$this->daftar_report
=======
			'status_am'=>$this->status_am
>>>>>>> .r30
		);
		$this->db->where('no_am', $no_am);
		return $this->db->update($this->accountManager, $arrayData);
	}
	
	function remove($no_am)
	{
		$this->db->where('no_am', $no_am);
		return $this->db->delete($this->accountManager);
	}	
	
	function detail($no_am)
	{
		$this->db->select('am.*,usr.username');
		$this->db->from($this->accountManager . ' as am');
		$this->db->join('t_user as usr ', ' am.id_user = usr.id_user', 'left');
		$this->db->where('no_am', $no_am);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getListSearch($name){
		$this->db->like('nama_am',$name);
		$query = $this->db->get($this->accountManager);
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