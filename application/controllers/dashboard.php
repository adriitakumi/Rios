<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'dashboard';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$this->load->view('dashboard/dashboard', $data);
	}
}
