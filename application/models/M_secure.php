<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_secure extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getsecure()
  {
    # code...
    $username=$this->session->userdata('username');
    if ($username!="andis") {
      # code...
      $this->session->sess_destroy();
      redirect('login');
    }
  //  $password=$this->session->userdata('password');
  }

}
