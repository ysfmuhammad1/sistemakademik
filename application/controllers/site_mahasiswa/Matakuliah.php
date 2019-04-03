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
    if (!empty($cek) && $level=='mahasiswa') {
      // echo "string";
      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_mk',
        'judul'       =>  'Matakuliah',
        'sub_judul'   =>  '',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        // 'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('username')),
        'data_mk'    =>  '',
        'konten'      => 'site_mahasiswa/matakuliah/v_matakuliah'
      );
      if (!empty($foto)) {
        $data['foto_user']=$foto;
      }else {
        $data['foto_user']='no_foto.jpeg';
      }
      $this->load->view('site_mahasiswa/v_home',$data);
    }else {
      redirect('login','refresh');
    }
  }
  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $kd_prodi=$this->session->userdata('kd_prodi');
      $smt=$this->input->post('smt');
      $q=$this->M_data->getAllMk($kd_prodi,$smt);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('site_mahasiswa/matakuliah/view', $dt,TRUE));
      }
    }else {
      redirect('login','refresh');
    }
  }

}
