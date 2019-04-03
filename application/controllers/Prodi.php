<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller{

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
    if (!empty($cek)&& $level=='admin') {
      $data = array(
         'tgl'                 => hari_ini(date('w')),
         'tgl_indo'            => tgl_indo(date('Y-m-d')),
         'class'               => 'master_prodi',
         'judul'               => 'Master',
         'sub_judul'           => 'Program Studi',
         'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
         'konten'              => 'prodi/v_prodi',
         'tb_prodi'            => $this->M_data->tampilData('tb_prodi'),
         'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin'))
      );
      $this->load->view('v_home',$data);
    }else {
      redirect('login','refresh');
    }
  }
  function simpan()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $this->form_validation->set_rules('kd_prodi', 'Kode Prodi', 'numeric');
      $this->form_validation->set_rules('nidn', 'NIDN', 'numeric');
      if ($this->form_validation->run()) {
        # code...
        $id['kd_prodi']=$this->input->post('kd_prodi');
        $row=$this->M_data->getData_by('tb_prodi',$id);
        if ($row->num_rows()<>0 ) {
          # code...
          $data = array(
            'kd_prodi'  => $this->input->post('kd_prodi') ,
            'prodi'     => $this->input->post('prodi'),
            'singkat'   => $this->input->post('singkat'),
            'kaprodi'   => $this->input->post('kaprodi'),
            'nidn'      => $this->input->post('nidn'),
            'akreditasi'=> $this->input->post('akreditasi'),
            'tgl_update'=> date('Y-m-d')
          );
          $this->M_data->update_byAjax('tb_prodi',$data,$id);
        }else {
          # code...
          $data = array(
            'kd_prodi'  => $this->input->post('kd_prodi') ,
            'prodi'     => $this->input->post('prodi'),
            'singkat'   => $this->input->post('singkat'),
            'kaprodi'   => $this->input->post('kaprodi'),
            'nidn'      => $this->input->post('nidn'),
            'akreditasi'=> $this->input->post('akreditasi'),
            'tgl_insert'=> date('Y-m-d')
          );
          $this->M_data->insert_byAjax('tb_prodi',$data);
        }

      }else {
        echo validation_errors();
      }
    }
  }

  function edit()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $id['kd_prodi']=$this->input->post('id');
      $data=$this->M_data->getProdi_by($id);
      echo json_encode($data);
    }else {
      redirect ('login','refresh');
    }
  }

  function hapus()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $id['kd_prodi']=$this->input->post('id');
      $this->M_data->hapusProdi_by($id);
    }else {
      redirect ('login','refresh');
    }
  }

}
