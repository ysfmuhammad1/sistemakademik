<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
  }

  public function getDataDosen($id)
  {
    # code...
    // $query=$this->db->get('tb_dosen',$id);
    $query=$this->db->query("SELECT* FROM `tb_dosen` WHERE `kd_prodi`='$id'");
    return $query;
  }

  public function insertDataDosen($data)
  {
    # code...
    $query=$this->db->insert('tb_dosen', $data);
    return $query;
  }

  public function updateDataDosen($data,$id)
  {
    $kd['kd_dosen']=$id;
    $query=$this->db->update('tb_dosen', $data ,$kd);
    return $query;
  }

  public function getDosen_by($id)
  {
    # code...
    $kd = array('kd_dosen' => $id);
    // $kd['kd_dosen']=$id;
    $query=$this->db->get_where('tb_dosen',$kd);
    return $query;
  }

  public function hapusDataDosen($id)
  {
    # code...
    $kd['kd_dosen']=$id;
    $query=$this->db->delete('tb_dosen',$kd);
    return $query;
  }

  public function last_kd_dosen($id)
  {
    $query=$this->db->query("SELECT MAX(right(kd_dosen,4)) AS kode FROM `tb_dosen` WHERE `kd_prodi`='$id'");
    if ($query->num_rows() <> 0) {
      # code...
      $row=$query->row();
      $hasil=(int)$row->kode;
    }else {
      $hasil =0;
    }
    return $hasil;
  }

  public function editData($id)
  {
    # code...
    $query=$this->getDosen_by($id);
    if ($query->num_rows() <> 0) {
      # code...
      foreach ($query->result() as $rs) {
        $data = array(
          'kd_dosen' => $rs->kd_dosen,
          'kd_prodi' => $rs->kd_prodi,
          'nidn' => $rs->nidn,
          'nama_dosen' => $rs->nama_dosen,
          'sex' => $rs->sex,
          'tempat_lahir' => $rs->tempat_lahir,
          'tgl_lahir' => tgl_str($rs->tgl_lahir),
          'alamat' => $rs->alamat,
          'hp' => $rs->hp,
          'pendidikan' => $rs->pendidikan,
          'prodi_dosen' => $rs->prodi_dosen,
          'status_dosen' => $rs->status_dosen

        );
      }
      return $data;
    }else {
      foreach ($query->result() as $rs) {
        $data = array(
          '' => ''
        );
      }
      return null;
    }
  }

  public function cari_nama_dosen($id)
  {
    $query=$this->db->query("SELECT `nama_dosen` FROM `tb_dosen` WHERE `kd_dosen`='$id'");
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $hasil = $row->nama_dosen;
    }else {
      $hasil ="";
    }
    return $hasil;
  }

}
