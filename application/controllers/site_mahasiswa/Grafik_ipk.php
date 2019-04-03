<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_ipk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_data');
    $this->load->model('M_krs');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      // echo "string";
      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_ipk',
        'judul'       =>  'Grafik',
        'sub_judul'   =>  'IPK',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        // 'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('username')),
        'kategori'  => $this->M_krs->create_kategori_krs_nim($this->session->userdata('username')),
        'data'  =>$this->M_krs->create_data_krs($this->session->userdata('username')),
        'konten'      => 'site_mahasiswa/grafik/v_grafik'
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

}
