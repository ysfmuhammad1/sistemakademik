<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_dosen');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      // echo "string";
      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_jadwal',
        'judul'       =>  'Jadwal',
        'sub_judul'   =>  '',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        // 'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('username')),
        'data_krs'    =>  $this->M_data->th_akademik_krs_mhs($this->session->userdata('username')),
        'konten'      => 'site_mahasiswa/jadwal/v_jadwal'
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
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'semester'  =>strtolower(substr($this->input->post('th_akademik'),10,5)),
        'nim' =>$this->session->userdata('username')
       );
       $q=$this->M_data->getData_by('tb_krs',$id);
       if ($q->num_rows() > 0) {
         $dt['data']=$q;
         echo ($this->load->view('site_mahasiswa/jadwal/view', $dt,TRUE));
       }
    }else {
      redirect('login','refresh');
    }
  }

}
