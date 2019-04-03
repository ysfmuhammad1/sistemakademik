<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mutasi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getDataMutasi(){
    $this->db->select('tb_mutasi_mhs.id_mutasi,tb_mutasi_mhs.th_akademik,tb_mahasiswa.nama_mhs,tb_mutasi_mhs.tgl_update,tb_mutasi_mhs.tgl_mutasi,tb_mutasi_mhs.nim,tb_mutasi_mhs.status,tb_mahasiswa.sex');
    $this->db->join('tb_mahasiswa', 'tb_mahasiswa.nim = tb_mutasi_mhs.nim');
    $q=$this->db->get('tb_mutasi_mhs');
    return $q;
  }
  function getMaxMutasi(){
      $this->db->select_max('id_mutasi');
      $q=$this->db->get('tb_mutasi_mhs');
      // return $q;
      foreach ($q->result() as $rs) {
        # code...
        $id= (int)$rs->id_mutasi+1;
        return $id;
      }
  }

  function cari_mhs($id){
    $q=$this->db->get_where('tb_mahasiswa',$id);
    // return $q;
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $rs) {
        $data = array(
          'nama_mhs' => $rs->nama_mhs,
          'sex' =>$rs->sex
        );
      }
      return $data;
    }else {
      $data = array('' => '' );
      return $data;
    }
  }

  function cari_dataMutasi($id){
    $q=$this->db->get_where('tb_mutasi_mhs',$id);
    // return $q;
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $rs) {
        $tgl=tgl_str($rs->tgl_mutasi);
        $data = array(
          'th_akademik' => $rs->th_akademik,
          'tgl' =>$tgl,
          'nim' => $rs->nim,
          'status'  =>$rs->status,
          'ket'  =>$rs->ket
        );
      }
      return $data;
    }else {
      $data = array('' => '' );
      return $data;
    }
  }

  function cekData($id){
    $q=$this->db->get_where('tb_mutasi_mhs', $id);
    return $q;
  }
  function insertDataMutasi($data){
    $q=$this->db->insert('tb_mutasi_mhs', $data);
    return $q;
  }

  function updateDataMutasi($data,$id){
    $q=$this->db->update('tb_mutasi_mhs', $data,$id);
    return $q;
  }

}
