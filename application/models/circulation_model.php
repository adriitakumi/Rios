<?php
class circulation_model extends CI_Model{

	// Count all record of table "contact_info" in database.
	public function record_count() 
	{
       	return $this->db->count_all("members");
    }
 
    public function fetch_members($limit, $start = 0) 
    {
       	$query = $this->db->get("members", $limit, $start);
       	return $query->result();
   	}

   	public function update($table, $data)
	{	
		$this->db->where('id', $data['set']);
		unset($data['set']);

		$this->db->set($data);
		$query = $this->db->update($table);
		return $query;
	}

	public function deleteRow($tables, $where)
	{	
		$this->db->where($where);
		$query = $this->db->delete($tables);
		return $query;
	}


}
?>