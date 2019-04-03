<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_jadwal');
  }

  function index()
  {
    $cek =$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin'){
      $data = array(
        'tgl'         => hari_ini(date('w')),
        'tgl_indo'    => tgl_indo(date('Y-m-d')),
        'class'       => 'tran_jadwal',
        'judul'       => 'Transaksi',
        'sub_judul'   => 'Jadwal Kuliah',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        'tb_jadwal'   =>  $this->M_jadwal->getDataJadwal(),
        // 'status'      =>  $this->M_jadwal->getAllJadwal_by('28'),
        'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'konten'      => 'jadwal/v_form'
      );
      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
  }

  function tambah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level=='admin'){
      $data=array(
        'tgl'         => hari_ini(date('w')),
        'tgl_indo'    =>tgl_indo(date('Y-m-d')),
        'class'       =>'tran_jadwal',
        'judul'       => 'Transaksi',
        'sub_judul'   => 'Jadwal Kuliah<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data',
        'nama_lengkap'=> $this->session->userdata('nama_lengkap'),
        'foto_user'   => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'Hari'        => $this->M_data->getHari(),
        'Time'        => $this->M_data->getTime(),
        'Ruangan'     => $this->M_data->getRuangan(),
        'th_akademik' => cari_th_akademik(),
        'fieldprodi'  => $this->M_data->getFieldProdi(),
        'fielddosen'  => $this->M_jadwal->getDataDosen(),
        'fieldMK'     => $this->M_jadwal->getDataMK(),
        'konten'      => 'jadwal/v_tambah'
      );
      $this->load->view('v_home', $data);
    }else{
      redirect ('login','refresh');
    }
  }

  function empty(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin'){
      $this->M_jadwal->setEmpty($this->input->post('tb'));
      echo "Jadwal Telah Dikosongkan";
    }else{
      redirect('login','refresh');
    }
  }
  function matkul(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level=='admin'){
      $kd_prodi=$this->input->post('kd_prodi');
      $semester=$this->input->post('semester');
      $query= $this->M_jadwal->getDataMk_byJurusan($kd_prodi,$semester);
      if ($query->num_rows() > 0){
        foreach ($query->result() as $rs) {
          ?>
           <option value="<?php echo $rs->kd_mk?>"><?php echo $rs->nama_mk;?></option>
           <?php
        }
      }else {
        ?>
        <option value="">--Pilih Mata Kuliah--</option>
        <?php
      }
    }else{
      redirect('login','refresh');
    }
  }
  function dosen(){
    $cek = $this->session->userdata('logged_in');
    $level= $this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id=$this->input->get('kd_prodi');
      $query=$this->M_jadwal->getDataDosen_byJurusan($id);
      if($query->num_rows() > 0){
        foreach ($query->result() as $rs) {
          ?>
          <option value="<?php echo $rs->kd_dosen ?>"><?php echo $rs->nama_dosen?></option>
            <?php
        }
      }else{
        ?>
        <option>--Pilih Dosen--</option>
        <?php
      }
    }else{
      redirect ('login','refresh');
    }
  }

  function cari_jadwal(){
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id=array(
        'tb_jadwal.th_akademik' => $this->input->get('th_akademik'),
        'tb_jadwal.kd_prodi'    => $this->input->get('kd_prodi'),
        'tb_jadwal.semester'    => $this->input->get('semester'),
      );
      $d['data']=$this->M_jadwal->getDataJadwal_Dosen_Matkul($id);
      echo ($this->load->view('jadwal/table_view',$d ,TRUE));
    }else{
      redirect ('login','refresh');
    }
  }

  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level == 'admin'){

      $id=array(
        'th_akademik' => $this->input->post('th_akademik'),
        'semester'    => $this->input->post('semester'),
        'hari'        => $this->input->post('hari'),
        'pukul'       => $this->input->post('waktu'),
        'ruang'       => $this->input->post('ruangan')
      );
      $query=$this->M_jadwal->getDataJadwal_by($id);
      if($query->num_rows() > 0){
        echo "Maaf Jadwal Sudah Ada..!";
      }else{
        $id=array(
          'th_akademik' => $this->input->post('th_akademik'),
          'semester'    => $this->input->post('semester'),
          'hari'        => $this->input->post('hari'),
          'pukul'       => $this->input->post('waktu'),
          'kd_dosen'    => $this->input->post('dosen')
        );
        $query=$this->M_jadwal->getDataJadwal_by($id);
        if($query->num_rows() > 0){
          echo "Maaf Jadwal Dengan Dosen ini Sudah Ada..!";
        }else{
          $data=array(
            'th_akademik' => $this->input->post('th_akademik'),
            'semester'    => $this->input->post('semester'),
            'hari'        => $this->input->post('hari'),
            'pukul'       => $this->input->post('waktu'),
            'ruang'       => $this->input->post('ruangan'),
            'kd_dosen'    => $this->input->post('dosen'),
            'kd_prodi'    => $this->input->post('kd_prodi'),
            'kd_mk'       => $this->input->post('matakuliah'),
            'tgl_insert'  => date('Y-m-d H:i:s')
          );
          $this->M_jadwal->insertDataJadwal($data);
          echo "Jadwal Tersimpan..!";
        }
      }
    }else{
      redirect('login','refresh');
    }
  }
  function hapus(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level == 'admin'){
      $id['id_jadwal']=$this->input->post('id');
      $query=$this->M_jadwal->getDataJadwal_by($id);
      // var_dump ($id);
      if($query->num_rows() > 0){
        $this->M_jadwal->hapusDataJadwal($id);
        echo "Data Berhasil Dihapus";
      }
      else {
        echo "Data Tidak Ditemukan";
        // echo "No direct script access allowed";
      }
    }else{
      redirect('login','refresh');
    }
  }
}
