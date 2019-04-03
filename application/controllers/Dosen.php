<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller{

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
    if (!empty($cek) && $level=='admin') {
      $data = array(
        'tgl'                 => hari_ini(date('w')),
        'tgl_indo'            => tgl_indo(date('Y-m-d')),
        'class'               => 'master_dosen',
        'judul'               => 'Master',
        'sub_judul'           => 'Dosen',
        'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
        'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'data'                => $this->M_data->getFieldProdi(),
        'konten'              => 'dosen/v_form'
      );
      $sess_data['sess_kd_prodi']='';
      $this->session->set_userdata($sess_data);
      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
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

      $singkat=$this->M_data->singkat_prodi($id_prodi);
      if (!empty($singkat)) {
        # code...
        $sess_data['sess_kd_prodi'] = $id_prodi;
        $sess_data['sess_singkat_prodi'] = $singkat;
        $this->session->set_userdata($sess_data);
      }
      $data = array(
        'tgl'                 => hari_ini(date('w')),
        'tgl_indo'            => tgl_indo(date('Y-m-d')),
        'class'               => 'master_dosen',
        'judul'               => 'Master',
        'sub_judul'           => 'Dosen',
        'nama_lengkap'        => $this->session->userdata('nama_lengkap'),
        'foto_user'           => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'nama_prodi'          => $this->M_data->nama_prodi($this->session->userdata('sess_kd_prodi')),
        'tb_dosen'            => $this->M_dosen->getDataDosen($this->session->userdata('sess_kd_prodi')),
        'jenjang_pendidikan'  => $this->M_data->jenjang_pendidikan(),
        'konten'              => 'dosen/v_dosen'
      );
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
    if (!empty($cek) &&  $level == 'admin') {
      # code...
      $tgl_lahir=  tgl_str($this->input->post('tgl_lahir'));
      $data = array(
        'kd_dosen'      => $this->input->post('kd_dosen'),
        'kd_prodi'      => $this->input->post('kd_prodi'),
        'nidn'          => $this->input->post('nidn'),
        'nama_dosen'    => $this->input->post('nama_dosen'),
        'sex'           => $this->input->post('sex'),
        'tempat_lahir'  => $this->input->post('tempat_lahir'),
        'tgl_lahir'     => $tgl_lahir,
        'alamat'        => $this->input->post('alamat'),
        'pendidikan'    => $this->input->post('pendidikan'),
        'hp'            => $this->input->post('hp'),
        'prodi_dosen'   => $this->input->post('prodi_dosen'),
        'password'      => md5($this->input->post('nidn')),
        // 'tgl_insert'    => 'Now()',
        'status_dosen'  => $this->input->post('status_dosen')
      );
      $id = $this->input->post('kd_dosen');
      $row=$this->M_dosen->getDosen_by($id);
      // $row=$this->M_data->getData_by('tb_dosen', $id);
      if ($row->num_rows() <> 0) {
        # code...
        $data['tgl_update']= date('Y-m-d H:i:s');
        $this->M_dosen->updateDataDosen($data,$id);
      }else {
        $data['tgl_insert']= date('Y-m-d H:i:s');
        $this->M_dosen->insertDataDosen($data);
        echo "Data Tersimpan..!";
        // var_dump($data);
      }
    }else {
      redirect('login' , 'refresh');
    }
  }

  function hapus()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $data = $this->input->post('id');
      // var_dump($data);
      $query=$this->M_dosen->getDosen_by($data);
      if ($query->num_rows() <> 0) {
        # code...
        $this->M_dosen->hapusDataDosen($data);
      }
    }else {
      redirect('login','refresh');
    }
  }

  function create_kd()
  {
    # code...]
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      # code...
      $kd_prodi=$this->session->userdata('sess_kd_prodi');
      $singkat=$this->session->userdata('sess_singkat_prodi');
      $last_kd=$this->M_dosen->last_kd_dosen($kd_prodi);
      $th=substr(date('Y'),2,2);
      if ($last_kd <> 0) {
        # code...
        $last_no=$last_kd+1;
        $data['kode']=$singkat.$th.'DS'.sprintf("%04s",$last_no);
        // $data = array('kode' => $singkat.$th.'DS'.sprintf("%04s",$last_no));
        echo json_encode($data);
      }else {
        // $data = array('kode' => $singkat.$th.'DS0001' );
        $data['kode']=$singkat.$th.'DS0001';
        echo json_encode($data);
      }
    }else {
      redirect('login','refresh');
    }
  }
  function edit()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      $id=$this->input->post('id');
      $data=$this->M_dosen->editData($id);
      echo json_encode($data);
    }else {
      redirect('login','refresh');
    }
  }

}
