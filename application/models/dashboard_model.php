<?php

class dashboard_model extends CI_Model{
	
	public function getRange($date1, $date2){
		$begin = new DateTime( $date1 );
		$end = new DateTime( $date2 );
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		$data = array();
		foreach($daterange as $date){
	    	$data[] = $date->format("Y/m/d");
		}
		return $data;
	}
	
	public function update($table, $data)
	{	
		$this->db->where('id', $data['set']);
		unset($data['set']);

		$this->db->set($data);
		$query = $this->db->update($table);
		return $query;
	}

}
