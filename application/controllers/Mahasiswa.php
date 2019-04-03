<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_data');
    $this->load->model('M_mahasiswa');
    $this->load->model('M_krs');
    $this->load->model('M_matakuliah');
    $this->load->model('M_dosen');
    //Codeigniter : Write Less Do More
  }

  function test()
  {
    $id=$this->input->post('t');
    var_dump($id);
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      # code...
      $data = array(
        'tgl'             => hari_ini(date('w')),
        'tgl_indo'        => tgl_indo(date('Y-m-d')),
        'class'           => 'master_mhs',
        'judul'           => 'Master',
        'sub_judul'       => 'Mahasiswa',
        'nama_lengkap'    => $this->session->userdata('nama_lengkap'),
        'foto_user'       => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'data'            => $this->M_data->getFieldProdi(),
        'all_mhs'         => $this->M_mahasiswa->all_mhs(),
        'konten'          => 'mahasiswa/v_form'
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
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {

      $var=$this->session->userdata('sess_kd_prodi');
      if (empty($var)) {
        $id_prodi=$this->input->post('pilih_prodi');
      }else {
        $id_prodi=$var;
      }

      $singkat=$this->M_data->singkat_prodi($id_prodi);
      if (!empty($singkat)) {
        # code...
        $sess_data['sess_kd_prodi'] = $id_prodi;
        $sess_data['sess_singkat_prodi'] = $singkat;
        $this->session->set_userdata($sess_data);
      }
      $data = array(
        'tgl'             => hari_ini(date('w')),
        'tgl_indo'        => tgl_indo(date('Y-m-d')),
        'class'           => 'master_mhs',
        'judul'           => 'Master',
        'sub_judul'       => 'Mahasiswa',
        'nama_lengkap'    => $this->session->userdata('nama_lengkap'),
        'foto_user'       => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'tb_mahasiswa'    => $this->M_mahasiswa->getDataMahasiswa($this->session->userdata('sess_kd_prodi')),
        'nama_prodi'      => $this->M_data->nama_prodi($this->session->userdata('sess_kd_prodi')),
        'konten'          => 'mahasiswa/view'
      );
      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
  }

  function cari()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      $id=$this->input->post('nim');
      // var_dump($id);
      $query=$this->M_mahasiswa->getMahasiswa_by($id);
      $mhs=$query->row();
      // $dt['data']=$mhs;
      $dt = array(
        'data'        => $mhs,
        'nama_prodi'  => $this->M_data->nama_prodi($mhs->kd_prodi)
      );
      echo  ($this->load->view('mahasiswa/table',$dt,TRUE));
    }else {
      redirect('login','refresh');
    }
  }

  function tambah()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level =='admin') {
      $th_akademik=cari_th_akademik();
      // $th_akademik=substr(cari_th_akademik(),0,4);
      $kd_prodi=$this->session->userdata('sess_kd_prodi');
      $nama_prodi=$this->M_data->nama_prodi($this->session->userdata('sess_kd_prodi'));
      $singkat=$this->session->userdata('sess_singkat_prodi');
      $nim=$this->create_nim();
      $data = array(
        'tgl'               => hari_ini(date('w')),
        'tgl_indo'          => tgl_indo(date('Y-m-d')),
        'class'             => 'master_mhs',
        'judul'             => 'Master',
        'sub_judul'         => 'Mahasiswa<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data',
        'nama_lengkap'      => $this->session->userdata('nama_lengkap'),
        'foto_user'         => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),

        'nama_prodi'        => $nama_prodi,
        'th_akademik'       => $th_akademik,
        'kd_prodi'          => $kd_prodi,
        'nim'               => $nim,
        'singkat'           => $singkat,
        'status_mhs'        => '',
        'nama_mhs'          => '',
        'tempat_lahir'      => '',
        'tgl_lahir'         => '',
        'sex'               => '',
        'alamat'            => '',
        'kota'              => '',
        'hp'                => '',
        'email'             => '',
        'konver'            => '',
        'nama_ayah'         => '',
        'nama_ibu'          => '',
        'alamat_ortu'       => '',
        'hp_ortu'           => '',
        'mhs_aktif'         => $this->M_mahasiswa->all_mhs_aktif(),
        'th_akademik_nilai' => $this->M_krs->th_akademik_krs_mhs($nim),
        'konten'            => 'mahasiswa/v_tambah'
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
    if (!empty($cek) && $level=='admin') {
      $konver=$this->input->post('konversi');
      if (!empty($konver)) {
        # code...
        $nim= $this->input->post('konversi').$this->input->post('nim');
      }else {
        $nim= $this->input->post('nim');
      }
      $tgl_lahir=tgl_str($this->input->post('tgl_lahir'));
      $data = array(
        'th_akademik'     => $this->input->post('th_akademik'),
        // 'nim'             => $nim,
        'kd_prodi'        => substr($this->input->post('kd_prodi'),0,2),
        'nama_mhs'        => $this->input->post('nama_mhs'),
        'sex'             => $this->input->post('sex'),
        'tempat_lahir'    => $this->input->post('tempat_lahir'),
        'tgl_lahir'       => $tgl_lahir,
        'alamat'          => $this->input->post('alamat'),
        'kota'            => $this->input->post('kota'),
        'email'           => $this->input->post('email'),
        'hp'              => $this->input->post('hp'),
        'status'          => 'Aktif',
        'password'        => md5($nim)
      );
      $query=$this->M_mahasiswa->getMahasiswa_by($nim);
      if ($query->num_rows() > 0) {
        $data['tgl_update']=date('Y-m-d H:i:s');
        $this->M_mahasiswa->updateDataMhs($data,$nim);
        echo "Data Diperbaharui";
      }else {
        $data['nim']=$nim;
        $data['tgl_insert']=date('Y-m-d H:i:s');
        $this->M_mahasiswa->insertDataMhs($data);
        echo "Data Tersimpan";
      }
    }else {
      redirect('login','refresh');
    }
  }

  function edit()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='admin') {
      // $id=$this->input->post('id');
      $id=$this->uri->segment(3);
      $dt=$this->M_mahasiswa->editDataMhs($id);
      // echo ($data);
      // echo json_encode($data);
      $nama_prodi=$this->M_data->nama_prodi($this->session->userdata('sess_kd_prodi'));
      $data = array(
        'tgl'               => hari_ini(date('w')),
        'tgl_indo'          => tgl_indo(date('Y-m-d')),
        'class'             => 'master_mhs',
        'judul'             => 'Master',
        'sub_judul'         => 'Mahasiswa<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data',
        'nama_lengkap'      => $this->session->userdata('nama_lengkap'),
        'foto_user'         => $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'konten'            => 'mahasiswa/v_tambah',

        'nama_prodi'        => $nama_prodi,
        'nama_mhs'          => $dt->nama_mhs,
        'th_akademik'       => $dt->th_akademik,
        'kd_prodi'          => $dt->kd_prodi,
        'nim'               => $dt->nim,
        'status_mhs'        => $dt->status,
        'tempat_lahir'      => $dt->tempat_lahir,
        'tgl_lahir'         => tgl_str($dt->tgl_lahir),
        'sex'               => $dt->sex,
        'alamat'            => $dt->alamat,
        'kota'              => $dt->kota,
        'hp'                => $dt->hp,
        'konver'            => 2,
        'foto'              => $dt->file_foto,
        'data_chart'        => $this->M_krs->create_data_krs($id),
        'kategori'          => $this->M_krs->create_kategori_krs_nim($id),

        'mhs_aktif'         => $this->M_mahasiswa->all_mhs_aktif(),
        'th_akademik_nilai' => $this->M_krs->th_akademik_krs_mhs($id),
        'email'             => $dt->email,
        'nama_ayah'         => $dt->nama_ayah,
        'nama_ibu'          => $dt->nama_ibu,
        'alamat_ortu'       => $dt->alamat_ortu,
        'hp_ortu'           => $dt->hp_ortu
      );
      $this->load->view('v_home', $data);
    }else {
      redirect('login','refresh');
    }
  }

  function create_nim()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level =='admin') {
        $th=substr(cari_th_akademik(),0,4);
        $nim1=substr($th,0,1);
        $nim2=substr($th,2,2);
        $nim3=$this->session->userdata('sess_kd_prodi');

        $last_kd=$this->M_mahasiswa->last_nim($nim3);
        if ($last_kd > 0) {
          $no_akhir=$last_kd+1;
          // $d['kode']=
          $nim4=sprintf("%04s",$no_akhir);
          // $nim4=$no_akhir;
        }else {
          $nim4='0001';
        }
        return $nim=$nim1.$nim2.$nim3.$nim4;
     // $th=substr($th);
    }else {
      redirect('login','refresh');
    }
  }

  function hapus()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      # code...
      $qr=$this->M_mahasiswa->getMahasiswa_by($this->input->post('id'));
      if ($qr->num_rows() >0) {
        $this->M_mahasiswa->hapusDadaMahasiswa($this->input->post('id'));
      }
    }else {
      redirect('login', 'refresh');
    }
  }

  function simpan_ortu()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      $id=$this->input->post('nim');
      $dt=$this->M_mahasiswa->editDataMhs($id);
      // var_dump($dt);
      if ($dt != null) {
      $id=$this->input->post('nim');
          $data = array(
            'nama_ayah'     => $this->input->post('nama_ayah'),
            'nama_ibu'      => $this->input->post('nama_ibu'),
            'alamat_ortu'   => $this->input->post('alamat_ortu'),
            'hp_ortu'       => $this->input->post('hp_ortu')
          );
          $query=$this->M_mahasiswa->getMahasiswa_by($id);
          if ($query->num_rows() > 0) {
            $data['tgl_update']=date('Y-m-d H:i:s');
            $this->M_mahasiswa->updateDataMhs($data,$id);
            // var_dump($data);
          }else {
            $data['tgl_insert']=date('Y-m-d H:i:s');
            $this->M_mahasiswa->insertDataMhs($data);
            // var_dump($data);
          }
      }else {
        echo "Lengkapi Data Mahasiswa Terlebih dahulu";
      }
    }else {
      redirect ('login','refresh');
    }
  }

  function cari_nilai()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      $id['nim']=$this->input->post('nim');
      $id['th_akademik']=$this->input->post('thak');
      if ($id['th_akademik'] !=null) {
        # code...
        // var_dump($id);
        $data=$this->db->get_where('tb_krs',$id);
        if ($data != null) {
          foreach ($data->result() as $rs) {
            $angka=$this->M_krs->cari_nilai_angka($rs->nilai_akhir);
            $sks=$rs->sks;
            $dt[] = array(
              'kd_mk'       => $rs->kd_mk,
              'kd_dosen'    => $rs->kd_dosen,
              'nilai_akhir' => $rs->nilai_akhir,
              'smt'         => $rs->smt,
              'nama_mk'     => $rs->nama_mk,
              'nama_dosen'  => $this->M_dosen->cari_nama_dosen($rs->kd_dosen),
              'angka'       => $angka,
              'sks'         => $sks,
              'angka'       => $angka,
              'ip'          => $this->M_krs->cari_ipk($id['nim'],$rs->smt),
              'nilai'       => $angka * $sks
            );
            // var_dump($dt);
          }
        }
        // var_dump($angka);
        $d['data']=$dt;
        // $d['ip'] =$this->M_krs->cari_ipk($id['nim']);
        // var_dump($d);
        echo ($this->load->view('mahasiswa/view_nilai', $d, TRUE));
      }
    }else {
      redirect('login','refresh');
    }
  }

  function cari_transkrip()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level == 'admin') {
      $id['nim']=$this->input->post('nim');
        # code...
        // var_dump($id);
        $data=$this->db->get_where('tb_krs',$id);
        if ($data->num_rows() > 0) {

          if ($data != null) {
            foreach ($data->result() as $rs) {
              $angka=$this->M_krs->cari_nilai_angka($rs->nilai_akhir);
              $sks=$rs->sks;
              $dt[] = array(
                'kd_mk'       => $rs->kd_mk,
                'kd_dosen'    => $rs->kd_dosen,
                'nilai_akhir' => $rs->nilai_akhir,
                'smt'         => $rs->smt,
                'nama_mk'     => $rs->nama_mk,
                'nama_dosen'  => $this->M_dosen->cari_nama_dosen($rs->kd_dosen),
                'angka'       => $angka,
                'sks'         => $sks,
                'angka'       => $angka,
                'ip'          => $this->M_krs->cari_ipk($id['nim'],$rs->smt),
                'nilai'       => $angka * $sks
              );
              // var_dump($dt);
            }
            // var_dump($angka);
            $d['data']=$dt;
            // $d['ip'] =$this->M_krs->cari_ipk($id['nim']);
            // var_dump($d);
            echo ($this->load->view('mahasiswa/tab_view/view_transkrip', $d, TRUE));
          }
        }

    }else {
      redirect('login','refresh');
    }
  }

  function ajax_serverside()
  {
    $data=$this->M_mahasiswa->ajax_list();
    echo json_encode($data);

  }

}
