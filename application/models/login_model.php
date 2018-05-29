<?php
class login_model extends CI_Model{

	public function login($data) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($data);
		$this->db->limit(1);
		$res = $this->db->get()->result();

		return $res;
		
	}
}
?>