<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_matakuliah');
    // $this->load->library('datatables');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {

      $data = array(
            'tgl'                 => hari_ini(date('w')),
            'tgl_indo'            => tgl_indo(date('Y-m-d')),
            'class'               => 'master_mk',
            'judul'               => 'Master',
            'sub_judul'           => 'Mata Kuliah',
            'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
            'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
            'data'                => $this->M_data->getFieldProdi(),
            'konten'              => 'matakuliah/v_form'
      );
      $sess_data['sess_kd_prodi'] = '';
      $this->session->set_userdata($sess_data);
      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
    // $cek=$this->session->userdata('logged_in');
    // $level=$this->session->userdata('level');
    // if (!empty($cek)&& $level=='admin') {
    //   # code...
    //   $data = array(
    //     'tgl'                 => hari_ini(date('w')),
    //     'tgl_indo'            => tgl_indo(date('Y-m-d')),
    //     'class'               => 'master_mk',
    //     'judul'               => 'Master',
    //     'sub_judul'           => 'Mata Kuliah',
    //     'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
    //     'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
    //     'tb_mata_kuliah'      => $this->M_data->tampilData_Mk('tb_mata_kuliah'),
    //     'konten'              => 'matakuliah/v_mk'
    //   );
    //   $this->load->view('v_home',$data);
    // }else {
    //   redirect ('login','refresh');
    //  }

  }

  function view()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $var = $this->session->userdata('sess_kd_prodi');
      if (empty($var)) {
        $id_prodi=$this->input->post('pilih_prodi');
      }else {
        $id_prodi= $var;
      }
      $sess_data['sess_kd_prodi'] = $id_prodi;
      $this->session->set_userdata($sess_data);
      // var_dump($var);
      // $id_prodi=$this->input->post('pilih_prodi');

      $data = array(
            'tgl'                 => hari_ini(date('w')),
            'tgl_indo'            => tgl_indo(date('Y-m-d')),
            'class'               => 'master_mk',
            'judul'               => 'Master',
            'sub_judul'           => 'Mata Kuliah',
            'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
            'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
            // 'nama_jurusan'        => $this->M_data->nama_prodi($id_prodi),
            'nama_jurusan'        => $this->M_data->nama_prodi($this->session->userdata('sess_kd_prodi')),
            // 'tb_mata_kuliah'      => $this->db->get('tb_mata_kuliah'),
            'tb_mata_kuliah'      => $this->M_data->tampilData_Mk($this->session->userdata('sess_kd_prodi')),
            'konten'              => 'matakuliah/v_mk'
      );
      // var_dump($id_prodi);

      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
  }

  function simpan()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $smt=intval($this->input->post('smt'));
      $ang=$smt % 2;

      $data = array(
        'kd_prodi'    => $this->input->post('kd_prodi'),
        'kd_mk'       => $this->input->post('kd_mk'),
        'nama_mk'     => $this->input->post('nama_mk'),
        'sks'         => $this->input->post('sks'),
        'smt'         => $this->input->post('smt'),
        'aktif'       => $this->input->post('aktif')
        // 'tgl_insert'  => date('Y-m-d')
      );
      if ( $ang == 0) {
        # code...
        $data['semester']='Genap';
      }else {
        # code...
        $data['semester']='Ganjil';
      }
      // var_dump($ang);
      $id = array('kd_mk' => $this->input->post('kd_mk'));
      $row=$this->M_data->getData_by('tb_mata_kuliah',$id);
      if ($row->num_rows() <> 0) {
        # code...

        $data['tgl_update'] = date('Y-m-d');
        $this->M_data->update_byAjax('tb_mata_kuliah', $data ,$id);
      }else {

        $data['tgl_insert'] = date('Y-m-d');
        $this->M_data->insert_byAjax('tb_mata_kuliah',$data );
      }
    }else {
      redirect ('login','refresh');
    }
  }

  function edit()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $id['kd_mk']=$this->input->post('id');
      $data=$this->M_data->getMK_by($id);
      echo json_encode($data);

    }else {
      redirect('login','refresh');
    }
  }

  function hapus()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $id['kd_mk']=$this->input->post('id');
      $this->M_data->hapusDataMK($id);
    }else {
      redirect('login','refresh');
    }
  }

  function json()
  {
    # code...
    header('Content-Type: application/json');
    echo $this->M_matakuliah->getData_byJSON();
  }

}
