<?php
class global_model extends CI_Model{

	public function insert($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function getRecords($table, $where = null)
	{
		if($where){
			$this->db->where($where);
		}
		return $this->db->get($table)->result();
	}

	public function update($table, $set, $where)
	{
		$this->db->set($set);
		$this->db->where($where);
		return $this->db->update($table);
	}

	public function count($table, $where=null)
	{
		if($where){
			$this->db->where($where);
		}
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	public function getRow($table, $set, $value)
	{
		$this->db->where($set, $value);
		$query = $this->db->get($table)->row();
		return $query;
	}

	public function deleteRow($table, $where)
	{	
		$this->db->where($where);
		$query = $this->db->delete($table);
		return $query;
	}


}
?>