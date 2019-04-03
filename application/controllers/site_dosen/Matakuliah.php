<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller{

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
        'class'       =>  'akademik_mk',
        'judul'       =>  'Matakuliah',
        'sub_judul'   =>  '',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),

        'konten'      => 'site_dosen/matakuliah/v_mk'
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

  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {
      $kd_prodi=$this->session->userdata('kd_prodi');
      $smt=$this->input->post('smt');
      $q=$this->M_data->getAllMk($kd_prodi,$smt);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('site_dosen/matakuliah/view', $dt,TRUE));
      }
    }else {
      redirect('login','refresh');
    }
  }

}
