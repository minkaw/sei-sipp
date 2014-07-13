<?php
class tuser extends CI_Model{
	var $user = "t_user";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_user,$username,$password,$level,$status_user,$last_login,$use_user,$no_pelanggan)
	{
		$this->id_user= $id_user;
		$this->username= $username;
		$this->password= $password;
		$this->level= $level;
		$this->status_user= $status_user;
		$this->last_login= $last_login;
		$this->use_user= $use_user;
		$this->no_pelanggan= $no_pelanggan;
	}
	
	function getList($page,$uri_segment){
		$query = $this->db->get($this->user, $page, $uri_segment);
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
		$this->db->where('level', "AM");
		$this->db->where('status_user', "ON");
		$this->db->where('use_user', "0");
		$query = $this->db->get($this->user);
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
		$this->db->order_by("id_user", "desc");
		$query = $this->db->get($this->user);
		$result = $query->result_array();
	
		$arrayData = array(
			'id_user'=>($result[0]['id_user']+1),
			'username'=>$this->username,
			'password'=>$this->password,
			'level'=>$this->level,
			'status_user'=>$this->status_user,
			'last_login'=>$this->last_login,
			'use_user'=>$this->use_user,
			'no_pelanggan'=>$this->no_pelanggan
		);
		return $this->db->insert($this->user, $arrayData);
	}
	
	function update($id_user)
	{
		$arrayData = array(
			'username'=>$this->username,
			'password'=>$this->password,
			'level'=>$this->level,
			'status_user'=>$this->status_user,
			'last_login'=>$this->last_login,
			'use_user'=>$this->use_user,
			'no_pelanggan'=>$this->no_pelanggan
		);
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->user, $arrayData);
	}
	
	function detail($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get($this->user);	
		return $query->result_array();
	}
	
	function getListSearch($name){
		$this->db->like('username',$name);
		$query = $this->db->get($this->user);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	//Login
	function checkuserAdmin($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status_user', "ON");
		$this->db->where('level', "A");
		$query = $this->db->get($this->user);
		
		if($query->num_rows == 1){
			$row = $query->row_array();
			$this->update_last_login($row['id_user']);
			
			$data = array(
				'username' => $row['username'],
				'last_login' => date('d-m-Y')
			);
			$this->session->set_userdata($data);
			
		    return true;
		}
	}
	
	function checkuserAM($username,$password){
		
		$this->db->select('am.*,usr.username,usr.password,usr.level,usr.status_user');
		$this->db->from('t_accountManager as am');
		$this->db->join('t_user as usr ', ' am.id_user = usr.id_user', 'left');
		$this->db->where('usr.username', $username);
		$this->db->where('usr.password', $password);
		$this->db->where('usr.status_user', "ON");
		$this->db->where('am.status_am', "ON");
		$this->db->where('usr.level', "AM");
		$query = $this->db->get();
		if($query->num_rows == 1){
			$row = $query->row_array();
			$this->update_last_login($row['id_user']);
			
			$data = array(
				'username' => $row['username'],
				'nik' => $row['nik'],
				'last_login' => date('d-m-Y')
			);
			$this->session->set_userdata($data);
			
		    return true;
		}
	}
	
	function checkuserPelanggan($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status_user', "ON");
		$this->db->where('level', "PL");
		$query = $this->db->get($this->user);
		
		if($query->num_rows == 1){
			$row = $query->row_array();
			$this->update_last_login($row['id_user']);
			
			$data = array(
				'usernamePelanggan' => $row['username'],
				'noPelanggan' => $row['no_pelanggan'],
				'last_login' => date('d-m-Y')
			);
			$this->session->set_userdata($data);
			
		    return true;
		}
	}
	
	function update_last_login($id_user)
	{
		$arrayData = array(
			'last_login'=>date('Y-m-d')
		);
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->user, $arrayData);
	}
	
	function update_using_user($id_user)
	{
		$arrayData = array(
			'use_user'=>1
		);
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->user, $arrayData);
	}
}
?>