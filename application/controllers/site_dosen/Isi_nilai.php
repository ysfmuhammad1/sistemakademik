<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isi_nilai extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_dosen');
    $this->load->model('M_nilai');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {

      $foto=$this->M_data->cari_foto_dosen($this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_isinilai',
        'judul'       =>  'Nilai',
        'sub_judul'   =>  'Isi Nilai',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        'data_krs'  => $this->M_data->th_akademik_krs_dosen($this->session->userdata('username')),
        'konten'      => 'site_dosen/isi_nilai/v_nilai'
      );

      if (!empty($foto)) {
        $data['foto_user']=$foto;
      }else {
        $data['foto_user']='no_foto.jpeg';
      }
      $this->load->view('site_dosen/v_home',$data);

    }else {
      redirect('login','refresh');
    }
  }

  function cari_mata_kuliah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'semester'  => strtolower(substr($this->input->post('th_akademik'),10,5)),
        'kd_dosen'  => $this->session->userdata('username')
      );
      $this->db->group_by('kd_mk');
      $q=$this->M_data->getData_by('tb_krs',$id);
      if ($q->num_rows() >0) {
        # code...
        ?>
        <option value="">-Pilih Matakuliah-</option>
        <?php
        foreach ($q->result() as $rs) {
          $nama_mk=$this->M_data->cari_nama_mk($rs->kd_mk);
          $nama_dosen=$this->M_dosen->cari_nama_dosen($rs->kd_dosen);
          ?>
          <option value="<?php echo $rs->kd_mk;?>"><?php echo $rs->kd_mk;?> - <?php echo $nama_mk;?> - <?php echo $rs->kd_dosen;?> - <?php echo $nama_dosen;?> - <?php echo $rs->hari.' - '.$rs->pukul.' - '.$rs->ruang;?></option>
          <?php
        }
      }else {
        ?>
        <option value="">-Belum ada matakuliah-</option>
        <?php
      }
    }else {
      redirect('login','refresh');
    }
  }

  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'kd_dosen'  => $this->session->userdata('username'),
        'kd_mk' => $this->input->post('id_jadwal')
      );
      $q=$this->M_data->getData_by('tb_krs',$id);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('site_dosen/isi_nilai/view', $dt,TRUE));
      }
    }else {
      redirect('login','refresh');
    }
  }

  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='dosen') {

      $id['id_krs'] = $this->input->post('id');

      $nilai = str_replace('*','+',$this->input->post('nilai'));
      $data['nilai_akhir'] = $nilai;

      $q = $this->M_data->getData_by("tb_krs",$id);
      if($q->num_rows()>0){
        $this->db->update('tb_krs',$data,$id);
        // $this->
        echo "Nilai Sukses disimpan";
      }else{
        echo "tidak ada aksi";
      }

    }else {
      redirect('login','refresh');
    }
  }

}
