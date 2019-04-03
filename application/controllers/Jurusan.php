<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_jurusan');
    $this->M_secure->getsecure();
  }

  function index()
  {
    $isi = array(
      'konten'    => 'jurusan/v_jurusan.php',
      'judul'     => 'Master',
      'sub_judul' => 'Jurusan',
      'data'      => $this->M_jurusan->tampil_data('tb_prodi'));
    $this->load->view('v_home',$isi);
  }
  public function tambah()
  {
    # code...
    //$this->M_secure->getsecure();
    $isi = array(
      'konten'    => 'jurusan/v_tambah.php',
      'judul'     => 'Master',
      'sub_judul' => 'Tambah Jurusan');
    $this->load->view('v_home',$isi);
  }
  public function act_tambah()
  {
    # code...
    $data = array(
      'kd_prodi'  => $this->input->post('kd_prodi'),
      'prodi'     => $this->input->post('prodi'),
      'singkat'   => $this->input->post('singkat'),
      'kaprodi'   => $this->input->post('kaprodi'),
      'nidn'      => $this->input->post('nidn'),
      'akreditasi'=> $this->input->post('akreditasi'),
      'tgl_insert'=> date('Y-m-d H:i:s',time())
    );
    $this->M_jurusan->input_data($data,'tb_prodi');
    redirect('jurusan');
  }

  public function hapus($kd)
  {
    # code...

    $id = array('kd_prodi' => $kd);
    $this->M_jurusan->hapus_data($id,'tb_prodi');
    redirect('jurusan');
  }

  public function edit($kd)
  {
    # code...
    $id = array('kd_prodi' => $kd);

    $isi = array(
      'konten'    => 'jurusan/v_edit.php',
      'judul'     => 'Master',
      'sub_judul' => 'Edit Jurusan',
      'data'      =>  $this->M_jurusan->edit_data($id,'tb_prodi')->result()
    );
    $this->load->view('v_home',$isi);
  }
  public function act_edit()
  {
    # code...
    $kd=$this->input->post('kd_prodi');
    $data = array(
      'kd_prodi'  => $kd,
      'prodi'     => $this->input->post('prodi'),
      'singkat'   => $this->input->post('singkat'),
      'kaprodi'   => $this->input->post('kaprodi'),
      'nidn'      => $this->input->post('nidn'),
      'akreditasi'=> $this->input->post('akreditasi'),
      'tgl_update'=> date('Y-m-d H:i:s',time())
    );
    $id = array('kd_prodi' => $kd);
    $this->M_jurusan->update_data($id,$data,'tb_prodi');
    redirect('jurusan');
  }

}
