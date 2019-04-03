<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isi_krs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_mahasiswa');
    $this->load->model('M_krs');
    $this->load->model('M_dosen');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      // echo "string";
      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $smt=$this->M_mahasiswa->getSemester($this->session->userdata('username'),cari_th_akademik());
      $ipk_lalu=$this->M_krs->cari_ipk_lalu($smt,$this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_isikrs',
        'judul'       =>  'KRS',
        'sub_judul'   =>  'Isi KRS',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        // 'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('username')),
        'th_akademik'=> cari_th_akademik(),
        'smt'=> $smt,
        'ipk_lalu'  => $ipk_lalu,
        'nim' => $this->session->userdata('username'),
        'nama_mhs'=>$this->M_mahasiswa->cari_nama_mhs($this->session->userdata('username')),
        'prodi'=>$this->M_data->nama_prodi($this->session->userdata('kd_prodi')),
        'kd_prodi'=>$this->session->userdata('kd_prodi'),
        'max_sks'=>max_sks($ipk_lalu)
        // 'konten'      => 'site_mahasiswa/isi_krs/v_isikrs'
      );

      $tgl=date('Y-m-d');
      $q=$this->M_data->getSetting('1','KRS');
      $tgl_close=$q->row()->tgl_close;
      $data['tgl_close']=$tgl_close;
      if ($tgl <= $tgl_close) {
        $data['konten']='site_mahasiswa/isi_krs/v_isikrs';
      }else {
        $data['konten']='site_mahasiswa/isi_krs/v_kosong';
      }

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

  function cari_mata_kuliah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'semester' => strtolower(substr($this->input->post('th_akademik'),10,5)),
        'kd_prodi' => $this->input->post('kd_prodi'),
      );
      $q=$this->M_data->getData_by('tb_jadwal',$id);
      if ($q->num_rows() > 0) {
        ?>
        <option value="">-Pilih Mata Kuliah-</option>
        <?php
        // echo "";
        foreach ($q->result() as $rs) {
          $nama_mk=$this->M_data->cari_nama_mk($rs->kd_mk);
          $nama_dosen=$this->M_dosen->cari_nama_dosen($rs->kd_dosen);
          ?>
          <option value="<?php echo $rs->id_jadwal;?>"><?php echo $rs->kd_mk;?> - <?php echo $nama_mk;?> - <?php echo $rs->kd_dosen;?> - <?php echo $nama_dosen;?> - <?php echo $rs->hari.' - '.$rs->pukul.' - '.$rs->ruang;?></option>
          <?php
        }
      }else {
        // echo "";
        ?>
        <option value="">Belum Ada Matakuliah</option>
        <?php
      }
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
        'semester' => strtolower(substr($this->input->post('th_akademik'),10,5)),
        'kd_prodi' => $this->input->post('kd_prodi'),
        'nim' =>$this->session->userdata('username')
      );
      $q=$this->M_data->getData_by('tb_krs',$id);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('site_mahasiswa/isi_krs/view', $dt,TRUE));
      }
    }else {
      redirect('login','refresh');
    }
  }

  function hapus(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $id['id_krs']=$this->input->post('id');
      $q=$this->M_data->getData_by('tb_krs',$id);
      if ($q->num_rows() > 0) {
        $this->M_krs->hapusDataKRS($id);
        echo "Data Terhapus";
      }
    }else {
      redirect('login','refresh');
    }
  }

  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $id_jadwal=$this->input->post('id_jadwal');
      $th_akademik=$this->input->post('th_akademik');
      $semester = strtolower(substr($this->input->post('th_akademik'),10,5));
      $smt=$this->input->post('smt');
      $nim=$this->input->post('nim');

      /**
       * validasi jumlah sks
       */
       $jml_sks=$this->M_krs->cariJum_SKS($th_akademik,$smt,$nim);
       $sks=$this->M_krs->cari_sks_jadwal($id_jadwal);
       $t_sks=$jml_sks+$sks;
       $max_sks=$this->input->post('maxsks');
       if ($t_sks > $max_sks) {
         echo "Anda tidak boleh melebihi ".$max_sks." SKS";
       }else {
         $id = array(
           'th_akademik' => $th_akademik,
           'semester' => $semester,
           'nim' => $nim,
           'smt' => $smt,
           'id_jadwal' => $id_jadwal
         );
         $data = array(
           'th_akademik' => $th_akademik,
           'semester' => $semester,
           'nim' => $nim,
           'smt' => $smt,
           'id_jadwal' => $id_jadwal,
           'kd_prodi'=>$this->input->post('kd_prodi')
         );
         $id_id_jadwal['id_jadwal']=$id_jadwal;
         $q=$this->M_data->getData_by('tb_jadwal',$id_id_jadwal);
         // foreach ($q->result() as $rs) {
         if ($q->num_rows() > 0) {

           $row=$q->row();
           $kd_mk=$row->kd_mk;
           $kd_dosen=$row->kd_dosen;

           $data['kd_mk']=$kd_mk;
           $data['kd_dosen']=$kd_dosen;
           $data['ruang']=$row->ruang;
           $data['hari']=$row->hari;
           $data['pukul']=$row->pukul;
         }else {
           echo "gagal";
         }
         // }
         $id_kd_mk['kd_mk']=$kd_mk;

         $q_mk=$this->M_data->getData_by('tb_mata_kuliah',$id_kd_mk);
         foreach ($q_mk->result() as $rs_mk) {
           $data['nama_mk']=$rs_mk->nama_mk;
           $data['sks']=$rs_mk->sks;
         }
         $data['nm_dosen']=$this->M_dosen->cari_nama_dosen($kd_dosen);
         $id2 = array(
           'th_akademik' => $th_akademik,
           'semester'=> $semester,
           'nim'=> $this->session->userdata('username'),
           'smt'  =>$smt,
           'kd_mk'=>$kd_mk
          );
          // $id['kd_mk']=$kd_mk;
         $q_krs=$this->M_data->getData_by('tb_krs',$id2);
         if ($q_krs->num_rows() > 0) {
           $data['tgl_update']=date('Y-m-d H:i:s');
           // $this->db->update('tb_krs', $data,$id);
           $this->M_krs->updatetDataKRS($data,$id2);
           // var_dump($id);
           echo "Data diperbaharui";
         }else {
           $data['tgl_insert']=date('Y-m-d H:i:s');

           $this->M_krs->insertDataKRS($data);
           // echo $id_jadwal;
           echo "Data Tersimpan";
         }
         // echo "ok";
       }



    }else {
      redirect('login','refresh');
    }
  }

}
