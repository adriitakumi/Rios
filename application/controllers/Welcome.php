<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function userprofile()
	{
		$data = array();
		$data['active'] = 'user';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('user', $data);
	}

	public function tables()
	{
		$data = array();
		$data['active'] = 'tables';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('table', $data);
	}

	public function typo()
	{
		$data = array();
		$data['active'] = 'typo';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('typography', $data);
	}

	public function icons()
	{
		$data = array();
		$data['active'] = 'icons';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('icons', $data);
	}

	public function maps()
	{
		$data = array();
		$data['active'] = 'maps';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('maps', $data);
	}

	public function notifs()
	{
		$data = array();
		$data['active'] = 'notifs';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$this->load->view('notifications', $data);
	}
}
