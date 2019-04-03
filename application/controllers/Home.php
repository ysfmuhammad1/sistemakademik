<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
  }

/*function index()
{
  # code...
  $this->load->view('v_home1');
}
*/
  function index()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      # code...

      $krs = array(
        'form' => 'KRS'
      );
      $query =$this->M_data->getData_by('tb_setting',$krs);
      $tgl_krs="";
      if ($query->num_rows() <>0) {
        # code...t
        $rs=$query->result();
        $dt=$rs[0];
        $tgl_krs=tgl_str($dt->tgl_close);
      }

      $wisuda = array(
        'form' => 'Wisuda'
      );
      $query =$this->M_data->getData_by('tb_setting',$wisuda);
      $tgl_wisuda="";
      if ($query->num_rows() <>0) {
        # code...t
        $rs=$query->result();
        $dt=$rs[0];
        $tgl_wisuda=tgl_str($dt->tgl_close);
      }

       $data = array(
          'tgl'                 => hari_ini(date('w')),
          'tgl_indo'            => tgl_indo(date('Y-m-d')),
          'class'               => 'home',
          // 'judul'               => $this->session->userdata('nama_lengkap'),
          'judul'               => 'Dashboard',
          'sub_judul'           => '',
          'jum_admin'           => $this->M_data->juml_data('tb_admin'),
          'jum_mk'              => $this->M_data->juml_data('tb_mata_kuliah'),
          'jum_dosen'           => $this->M_data->juml_data('tb_dosen'),
          'jum_mhs'             => $this->M_data->juml_data('tb_mahasiswa'),
          'jum_jadwal'          => $this->M_data->juml_data('tb_jadwal'),
          'jum_krs'             => $this->M_data->juml_data('tb_krs'),
          'jum_mutasi_mhs'      => $this->M_data->juml_data('tb_mutasi_mhs'),
          'jum_prodi'           => $this->M_data->juml_data('tb_prodi'),
          'tgl_krs'             => $tgl_krs,
          'konten'              => 'v_konten',
          'foto_user'          => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
          'tgl_wisuda'          => $tgl_wisuda
      //   'konten'    => 'v_konten',
      //   'judul'     => 'Home',
      //   'sub_judul' => '
       );


      // $this->load->view('v_home',$data);
      $this->load->view('v_home',$data);
    }else {
      # code...
      redirect('login','refresh');
    }
  }

  function update_krs()
  {
    # code...\
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $tgl=tgl_str($this->input->post('tgl_krs'));
      $id  = array(
        'id' => 1,
        'form'=>'KRS'
        //'tgl_close'=>$tgl
      );
      $data['tgl_close']=$tgl;
      $this->M_data->updateSetting($data, $id);
      // $this->db->update('tb_setting', $dt,$id);
      // echo $tgl;
    }else {
      redirect ('login','refresh');
    }

  }

  function update_wisuda()
  {
    # code...\
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $tgl=tgl_str($this->input->post('tgl_wisuda'));
      $id  = array(
        'id' => 2,
        'form'=>'Wisuda'
        //'tgl_close'=>$tgl
      );
      $data['tgl_close']=$tgl;
      $this->M_data->updateSetting($data, $id);
      // $this->db->update('tb_setting', $dt,$id);
      // echo $tgl;
    }else {
      redirect ('login','refresh');
    }

  }
  // function index()
  // {
  //   # code...
  //     $this->M_secure->getsecure();
  //     //$username=$this->session->userdata('username');
  //     $isi['konten']    ='v_konten';
  //     $isi['judul']     ='Home';
  //     $isi['sub_judul'] ='';
  //     $this->load->view('v_home',$isi);
  // //  var_dump($this->session->userdata('level'));
  // }
  // // function index()
  // // {
  // //   $this->M_secure->getsecure();
  // //   //$username=$this->session->userdata('username');
  // //   $isi['konten']    ='v_konten';
  // //   $isi['judul']     ='Home';
  // //   $isi['sub_judul'] ='';
  // //   $this->load->view('v_home',$isi);
  // //   //$user_data=$this->session->userdata('userdata');
  // //   //echo $user_data['username'];
  // //
  // // }
}
