<?php
class tpenjualan extends CI_Model{
	var $penjualan = "t_penjualan";
	var $preOrder = "t_preorder";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_penj,$id_po,$no_penj,$tgl_penj,$status_penjualan)
	{
		$this->id_penj= $id_penj;
		$this->id_po= $id_po;
		$this->no_penj= $no_penj;
		$this->tgl_penj= $tgl_penj;
		$this->status_penjualan= $status_penjualan;
	}
	
	function getList($page,$uri_segment){
		$this->db->select('po.*, pj.no_penj, pj.tgl_penj, pj.status_penjualan');
		$this->db->join($this->penjualan .' as pj', 'pj.id_po = po.id_po', 'left outer');
		$this->db->where('po.status_po', 'Finish');
		$query = $this->db->get($this->preOrder .' as po', $page, $uri_segment);
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
			'id_penj'=>$this->id_penj,
			'id_po'=>$this->id_po,
			'no_penj'=>$this->no_penj,
			'tgl_penj'=>$this->tgl_penj,
			'status_penjualan'=>$this->status_penjualan
		);
		return $this->db->insert($this->penjualan, $arrayData);
	}
	
	function update($id_penj)
	{
		$arrayData = array(
			'no_penj'=>$this->no_penj,
			'id_po'=>$this->id_po,
			'tgl_penj'=>$this->tgl_penj,
			'status_penjualan'=>$this->status_penjualan
		);
		$this->db->where('id_penj', $id_penj);
		return $this->db->update($this->penjualan, $arrayData);
	}
	
	function remove($id_penj)
	{
		$this->db->where('id_penj', $id_penj);
		return $this->db->delete($this->penjualan);
	}	
	
	function detail($id_po)
	{
		$this->db->where('id_po', $id_po);
		$query = $this->db->get($this->penjualan);	
		return $query->result_array();
	}
	
	function getNoPenjualan(){
		$this->db->order_by("id_penj", "desc");
		$this->db->limit(1);
		$query = $this->db->get($this->penjualan);
		if($query->num_rows() > 0){
			$result = $query->result_array();
			return $result[0]['id_penj']+1;
		} else {
			return 1;
		}	
	}
	
	function getListSearch($name){
		$this->db->like('no_penj',$name);
		$query = $this->db->get($this->penjualan);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}	
	}
	
	function graphPenjualan()
	{
		$sql="
			select tgl_penj, count(no_penj) as jml_penj from t_penjualan
			where status_penjualan = '1'
			group by tgl_penj
		";
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
	
	
}
?>