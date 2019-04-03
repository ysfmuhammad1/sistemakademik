<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_nilai');
    $this->load->model('M_mahasiswa');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $data=array(
        'tgl'       => hari_ini(date('w')),
        'tgl_indo'  => tgl_indo(date('Y-m-d')),
        'class'     => 'tran_nilai',
        'judul'     => 'Transaksi',
        'sub_judul' => 'Nilai Semester',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'data_nilai'=>  $this->M_nilai->getDataNilai(),
        'konten'    =>'nilai/v_form'
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
        'class'     => 'tran_nilai',
        'judul'     => 'Transaksi',
        'sub_judul' => 'Nilai Semester<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data Nilai',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        // 'data_nilai'=>  $this->M_nilai->getDataNilai(),
        'th_akademik_krs' => $this->M_nilai->getTh_akademikKRS(),
        'prodi'   => $this->M_nilai->getProdi(),
        'konten'    =>'nilai/v_tambah'
      );
      $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }

  function cariMK(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id = array(
        'tb_krs.th_akademik' => $this->input->get('th_akademik'),
        'tb_krs.semester'    => $this->input->get('semester'),
        'tb_jadwal.kd_prodi' => $this->input->get('kd_prodi')
       );
       $q=$this->M_nilai->getMK_by($id);
       if ($q->num_rows() > 0) {
         # code...
         ?>
         <option value="">--Pilih--</option>
         <?php
         foreach ($q->result() as $rs) {
           # code...
           ?>
           <option value="<?php echo $rs->kd_mk?>"><?php echo $rs->smt." - ".$rs->kd_mk." - ".$rs->nama_mk." - ".$rs->nm_dosen;?></option>
           <?php
         }
       }else {
         // var_dump($id);
         ?>
         <option value="">--Pilih--</option>
         <?php
       }
       // echo ($this->load->view('krs/view', $q ,TRUE ));
    }else{
      redirect('login','refresh');
    }
  }

  function cariNilai(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      // $id = array(
      //   'tb_krs.th_akademik' => $this->input->post('th_akademik'),
      //   'tb_krs.semester' => $this->input->post('semester'),
      //   'tb_jadwal.kd_prodi' => $this->input->post('kd_prodi'),
      //   'tb_krs.kd_mk' => $this->input->post('kd_mk')
      // );
      $smt=$this->input->post('semester');
      $kd_prodi=$this->input->post('kd_prodi');
      $kd_mk=$this->input->post('kd_mk');
      $th_ak=$this->input->post('th_akademik');
      // $data['dataNilai']='';

      $data['dataNilai']=$this->M_nilai->getNilai_by($smt,$kd_prodi,$kd_mk,$th_ak);
      echo $this->load->view('nilai/view', $data,TRUE);
    }else{
      redirect('login','refresh');
    }
  }

  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $semester=strtolower($this->input->post('semester'));
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'semester'  => $semester,
        'nim'  => $this->input->post('nim'),
        'kd_mk'  => $this->input->post('kd_mk')
     );
     $nilai= str_replace('*','+',$this->input->post('nilai'));
     $dt['nilai_akhir']=$nilai;

     $q=$this->db->get('tb_krs', $id);
     if ($q->num_rows() > 0) {
       $dt['tgl_update']=date('Y-m-d H:i:s');
       $this->db->update('tb_krs', $dt,$id);
       // echo($semester);
     }

    }else{
      redirect('login','refresh');
    }
  }

}
