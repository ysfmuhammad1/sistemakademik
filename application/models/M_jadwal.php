<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function getDataJadwal()
  {
    // $this->db->select('th_akademik','semester.tb_jadwal','kd_prodi.tb_jadwal','prodi.tb_prodi');
    $this->db->select('th_akademik,semester,tb_jadwal.kd_prodi,tb_prodi.prodi');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi=tb_jadwal.kd_prodi');
    $this->db->group_by('th_akademik,semester,kd_prodi');
    $query=$this->db->get();
    return $query;
  }
  public function getAllJadwal_by($kd_prodi, $smt, $th_akademik)
  {
    // $this->db->select('')]
    $kd['kd_prodi']=$kd_prodi;
    $kd['th_akademik']=$th_akademik;
    $kd['semester']=$smt;
    $query=$this->db->get_where('tb_jadwal',$kd);
    return $query->num_rows();

  }

  function setEmpty($tb){
    $query=$this->db->truncate("$tb");
    return false;
  }

  public function getDataDosen()
  {
    $this->db->select('kd_dosen,nama_dosen');
    $this->db->from('tb_dosen');
    $query=$this->db->get();
    return $query->result();
  }
  public function getDataMK()
  {
    $this->db->select('kd_mk, nama_mk');
    $this->db->from('tb_mata_kuliah');
    $query=$this->db->get();
    return $query->result();
  }

  public function getDataMk_byJurusan($kd_prodi,$smt){
    $id = array('kd_prodi' => $kd_prodi, 'semester' => $smt);
    $query = $this->db->get_where('tb_mata_kuliah', $id);
    return $query;
  }
  public function getDataDosen_byJurusan($kd){
    $id['kd_prodi']=$kd;
    $query=$this->db->get_where('tb_dosen',$id);
    return $query;
  }

  public function getDataJadwal_by($id){
    $query=$this->db->get_where('tb_jadwal',$id);
    return $query;
  }
  public function insertDataJadwal($data){
    $query=$this->db->insert('tb_jadwal',$data);
    return $query;
  }
  public function getDataJadwal_Dosen_Matkul($id){
    $this->db->select('id_jadwal,hari,pukul,ruang,tb_mata_kuliah.kd_mk,nama_mk,nama_dosen,tb_dosen.kd_dosen');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_mata_kuliah','tb_mata_kuliah.kd_mk=tb_jadwal.kd_mk');
    $this->db->join('tb_dosen','tb_dosen.kd_dosen=tb_jadwal.kd_dosen');
    $this->db->where($id);
    $query=$this->db->get();
    return $query;
  }
  public function hapusDataJadwal($id){
    $query=$this->db->delete('tb_jadwal', $id);
    return $query;
  }
}
