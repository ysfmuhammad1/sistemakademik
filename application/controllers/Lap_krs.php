<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_krs extends CI_Controller{

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
    if(!empty($cek) && $level =='admin'){
    $data=array(
      'tgl'       => hari_ini(date('w')),
      'tgl_indo'  => tgl_indo(date('Y-m-d')),
      'class'     => 'lap_krs',
      'judul'     => 'Laporan',
      'sub_judul' => 'KRS',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      'konten'    =>'laporan/v_krs'
    );

    $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }

}
