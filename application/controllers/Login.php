<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
	    	redirect('dashboard', 'refresh');
	    }else{
			$data = array();
			$data['title'] = 'Login';
			$this->load->view('login', $data);
	    }
	}

	public function verify_login(){
		$this->load->model('login_model');
		$data = $this->input->post();
		$res = $this->login_model->login($data);
		if(count($res) == 1){

			//SESSION
			$userdata = array(
		        'username'  => $res[0]->username,
		        'first_name'     => $res[0]->first_name,
		        'last_name'     => $res[0]->last_name,
		        'address'     => $res[0]->address,
		        'contact_no'     => $res[0]->contact_no,
		        'user_role'     => $res[0]->user_role,
		        'date_created'     => $res[0]->date_created,
		        'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);

			redirect('dashboard', 'refresh');

		}else{
			$this->session->set_flashdata('fd', 'INCORRECT USERNAME OR PASSWORD.');
			redirect('/', 'refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
}
