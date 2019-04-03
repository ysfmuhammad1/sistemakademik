<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {

      $foto=$this->M_data->cari_foto_dosen($this->session->userdata('username'));
      $data=array(
        'class'       =>  'home',
        'judul'       =>  'Dashboard',
        'sub_judul'   =>  '',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),

        'konten'      => 'site_dosen/v_dashboard'
      );
      if (!empty($foto)) {
        $data['foto_user']=$foto;
      }else {
        $data['foto_user']='no_foto.jpeg';
      }
      $this->load->view('site_dosen/v_home',$data);

    }else {
      redirect('login','refresh');
    }
  }

}
