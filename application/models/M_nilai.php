<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_data');
    //Codeigniter : Write Less Do More
  }

  function getDataNilai(){
    $this->db->select('th_akademik,semester,kd_mk,nim,kd_prodi,id_jadwal');
    $this->db->group_by('th_akademik,kd_prodi');
    $q=$this->db->get('tb_krs');
    return $q;
  }

  function getJum_NilMhs_by($kd_mk,$th_akademik,$semester,$nim,$id_jadwal){
    $id = array(
      'id_jadwal'   => $id_jadwal,
      // 'nim'         => $nim,
      // 'kd_mk'       => $kd_mk,
      'th_akademik' => $th_akademik,
      'semester'    => $semester
    );
    // $this->db->select('nim');
    $this->db->group_by('kd_mk,nim,th_akademik');
    $q=$this->db->get_where('tb_krs',$id);
      return $q->num_rows();
  }

  function getTh_akademikKRS(){
    $this->db->select('th_akademik');
    $this->db->group_by('th_akademik');
    $q=$this->db->get('tb_krs');
    return $q;
  }

  function getProdi(){
    $this->db->select('tb_krs.kd_prodi,prodi');
    $this->db->join('tb_prodi', 'tb_prodi.kd_prodi = tb_krs.kd_prodi');
    $this->db->group_by('kd_prodi');
    $q=$this->db->get('tb_krs');
    return $q;
  }

  function getMK_by($id){
    $this->db->select('tb_krs.kd_mk,tb_krs.nama_mk,tb_krs.id_krs,tb_krs.sks,tb_krs.kd_dosen,tb_krs.nm_dosen,tb_krs.smt');
    $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_krs.id_jadwal');
    $this->db->group_by('tb_krs.semester,tb_krs.kd_mk,tb_krs.kd_dosen');
    $this->db->order_by('tb_krs.kd_mk,tb_krs.semester');
    $q=$this->db->get_where('tb_krs',$id);
    return $q;
  }

  function getNilai_by($smt,$kd_prodi,$kd_mk,$th_ak){
    $q = $this->db->query("SELECT a.id_krs,a.nim,a.nilai_akhir
              FROM tb_krs as a
              JOIN tb_jadwal as b
              ON a.id_jadwal = b.id_jadwal
              WHERE a.th_akademik ='$th_ak' AND a.semester='$smt' AND b.kd_prodi='$kd_prodi' AND a.kd_mk='$kd_mk'
              ORDER BY a.nim");
    // $this->db->select('tb_krs.id_krs,tb_krs.nim,tb_krs.nilai_akhir');
    // $this->db->join('tb_jadwal', 'tb_krs.id_jadwal = tb_jadwal.id_jadwal');
    // $this->db->order_by('tb_krs.nim');
    // $q=$this->db->get_where('tb_krs', $id);
    return $q;
  }
  function nilai(){
    $nilai = array('A','AB','B','BC','C');
    return $nilai;
  }
}
