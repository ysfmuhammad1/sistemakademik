<?php
// بسم الله الرحمن الرحيم
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct()
  {
    # code...
    parent::__construct();
		$this->load->model('M_login');

  }

function index()
{
	# code...
	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	if ($this->form_validation->run()) {
		# code...
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$this->M_login->getlogin($u,$p);
	}else {
		# code...
		$this->load->view('v_login');

	}
}

function logout()
{
	$this->session->sess_destroy();
	redirect('login','refresh');
}

}
