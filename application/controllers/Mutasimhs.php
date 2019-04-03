<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasimhs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_nilai');
    $this->load->model('M_mutasi');
    $this->load->model('M_data');
    // $this->load->model('M_mahasiswa');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $data=array(
        'tgl'       => hari_ini(date('w')),
        'tgl_indo'  => tgl_indo(date('Y-m-d')),
        'class'     => 'tran_mutasi_mhs',
        'judul'     => 'Transaksi',
        'sub_judul' => 'Mutasi Mahasiswa',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'data_mutasi'=>  $this->M_mutasi->getDataMutasi(),
        'konten'    =>'mutasi/v_form'
      );
      $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }
  function tambah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $data=array(
        'tgl'       => hari_ini(date('w')),
        'tgl_indo'  => tgl_indo(date('Y-m-d')),
        'class'     => 'tran_mutasi_mhs',
        'judul'     => 'Transaksi',
        'sub_judul' => 'Mutasi Mahasiswa<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'id'=> $this->M_mutasi->getMaxMutasi(),
        'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
        'data_status'    => $this->M_data->getStatusMhs(),
        'konten'    =>'mutasi/v_tambah'
      );
      $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }

  function cari_mhs(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $nim['nim']=$this->input->post('nim');
      $q=$this->M_mutasi->cari_mhs($nim);
      echo json_encode($q);
    }else{
      redirect('login','refresh');
    }
  }

  function cari(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id['id_mutasi']=$this->input->post('id');
      $q=$this->M_mutasi->cari_dataMutasi($id);
      echo json_encode($q);
    }else{
      redirect('login','refresh');
    }
  }
  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      date_default_timezone_set('Asia/Makassar');
      $id['id_mutasi']=$this->input->post('id');
      $tgl=tgl_str($this->input->post('tgl'));
      $semester=strtolower(substr($this->input->post('th_akademik'),10,5));
      $data = array(
        'nim' => $this->input->post('nim'),
        'th_akademik' => $this->input->post('th_akademik'),
        'status' => $this->input->post('status'),
        'ket' => $this->input->post('ket'),
        'tgl_mutasi' => $tgl,
        'semester' => $semester
      );
      $q=$this->M_mutasi->cekData($id);
      if ($q->num_rows() > 0) {
        //update
        $data['tgl_update']=date('Y-m-d H:i:s');
        $this->M_mutasi->updateDataMutasi($data,$id);
      }else {
        //insert
        $data['tgl_insert']=date('Y-m-d H:i:s');
        $this->M_mutasi->insertDataMutasi($data);
      }
      $m_nim['nim']=$this->input->post('nim');
      $m_status['status']=$this->input->post('status');
      $this->db->update('tb_mahasiswa', $m_status,$m_nim);
      echo "Data Tersimpan";
      // var_dump($data);
    }else{
      redirect('login','refresh');
    }
  }
  
  function edit(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      // $d['id']=$this->uri->segment(3);
      $id=$this->uri->segment(3);
      // $d['konten']='mutasi/v_form';
      $d = array(
        'tgl'       => hari_ini(date('w')),
        'tgl_indo'  => tgl_indo(date('Y-m-d')),
        'class'     => 'tran_mutasi_mhs',
        'judul'     => 'Transaksi',
        'sub_judul' => 'Mutasi Mahasiswa<small><i class="ace-icon fa fa-angle-double-right"></i></small>Edit Data',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'id'  =>$id,
        'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
        'data_status'    => $this->M_data->getStatusMhs(),
        'konten'    =>'mutasi/v_tambah'
      );
      $this->load->view('v_home', $d);
    }else{
      redirect('login','refresh');
    }
  }

  function hapus(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id['id_mutasi']=$this->input->post('id');
      $q=$this->M_mutasi->cekData($id);
      if ($q->num_rows() > 0) {
        $this->db->delete('tb_mutasi_mhs',$id);
        echo "Data Terhapus";
      }else {
        echo "Data tidak ditemukan";
      }
    }else{
      redirect('login','refresh');
    }
  }

}
