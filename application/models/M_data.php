<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

// fungsi menampilkan field prodi di tb_prodi
  public function getFieldProdi()
  {
    # code...
    // $this->db->order_by('kd_prodi');
    // $query=$this->db->get('tb_prodi');
    $query=$this->db->query('SELECT prodi, kd_prodi FROM `tb_prodi` ORDER BY `kd_prodi` ASC');
    return $query->result();
  }
//fungsi menampilkan edit data prodi
  public function getProdi_by($id)
  {
    # code...
    $query=$this->db->get_where('tb_prodi', $id);
    $row=$query->num_rows();
    if ($row <> 0) {
      # code...
      foreach ($query->result() as $rs) {
        # code...
        $data = array(
          'kd_prodi' => $rs->kd_prodi ,
          'prodi' => $rs->prodi ,
          'singkat' => $rs->singkat ,
          'akreditasi' => $rs->akreditasi ,
          'kaprodi' => $rs->kaprodi,
          'nidn' => $rs->nidn
        );
      }
      return $data;
      // return json_encode($data);
    }else {
      $data = array(
        'kd_prodi' => "" ,
        'prodi' => "" ,
        'singkat' => "" ,
        'akreditasi' => "" ,
        'kaprodi' => "",
        'nidn' => ""
      );
      // return json_encode($data);
       return null;
    }

  }

  public function hapusProdi_by($id)
  {
    $query=$this->db->delete('tb_prodi',$id);
    echo "Data Terhapus";
    return $query;
  }

  public function nama_prodi($id)
  {
    # code...
    $query=$this->db->query("SELECT `prodi` FROM `tb_prodi` WHERE `kd_prodi`='$id'");
    // return $query->result();
    if ($query->num_rows() <> 0) {
      # code...
      $row=$query->row();
      $hasil = $row->prodi;
    }else {
      $hasil='';
    }
    return $hasil;
  }

  public function nama_kaprodi($id)
  {
    # code...
    $query=$this->db->query("SELECT `kaprodi`,`nidn` FROM `tb_prodi` WHERE `kd_prodi`='$id'");
    // return $query->result();
    if ($query->num_rows() <> 0) {
      # code...
      $row=$query->row();
      $hasil['kaprodi'] = $row->kaprodi;
      $hasil['nidn']= $row->nidn;
    }else {
      $hasil='';
    }
    return $hasil;
  }

  public function singkat_prodi($id)
  {
    # code...
    $query=$this->db->query("SELECT * FROM `tb_prodi` WHERE `kd_prodi`='$id'");
    // return $query->result();
    if ($query->num_rows() <> 0) {
      # code...
      $row=$query->row();
      $hasil = $row->singkat;
    }else {
      $hasil='';
    }
    return $hasil;
  }

  //fungsi menampilkan tb matakuliah join Prodi
  public function tampilData_Mk($id)
  {
    # code...
    // $query=$this->db->query('SELECT* FROM `tb_mata_kuliah` INNER JOIN `tb_prodi` ON tb_mata_kuliah.kd_prodi=tb_prodi.kd_prodi');
    // $this->form_validation->set_rules('pilih_prodi', 'Prodi', 'required');
    // if ($this->form_validation->run()) {
      # code...
      // $id_prodi = array('kd_prodi' => $id);
      $query=$this->db->query("SELECT * FROM `tb_mata_kuliah` WHERE `kd_prodi`='$id'");
      // $where['kd_prodi']=$id;
      // $this->db->order_by('kd_mk');
      // $query=$this->db->get_where('tb_mata_kuliah',$id);
      return $query;
    // }else {
    //   return $this->session->set_flashdata('fl_prodi','Pilih Prodi Terlebih dahulu..!!!');
    // }
  }

  public function getMK_by($id)
  {
    # code...
    $query=$this->db->get_where('tb_mata_kuliah', $id);
    $row=$query->num_rows();
    if ($row <> 0) {
      # code...
      foreach ($query->result() as $rs) {
        # code...
        $data = array(
          // 'kd_prodi' => $rs->kd_prodi ,
          'kd_mk' => $rs->kd_mk ,
          'nama_mk' => $rs->nama_mk ,
          'smt' => $rs->smt ,
          'sks' => $rs->sks,
          'aktif' => $rs->aktif
        );
      }
      return $data;
      // return json_encode($data);
    }else {
      $data = array(
        // 'kd_prodi' => "" ,
        'kd_mk' => '' ,
        'nama_mk' => '' ,
        'smt' => '' ,
        'sks' => '',
        'aktif' => ''
      );
      // return json_encode($data);
       return null;
    }
  }

  public function hapusDataMK($id)
  {
    $query=$this->db->delete('tb_mata_kuliah', $id);
    echo "Data Terhapus";
    return $query;
  }

  public function cari_nama_mk($id)
  {
    $query=$this->db->query("SELECT `nama_mk` FROM `tb_mata_kuliah` WHERE `kd_mk`='$id'");
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $hasil = $row->nama_mk;
    }else {
      $hasil ="";
    }
    return $hasil;
  }

  public function cari_sks_jadwal($id_jadwal){
    $query=$this->db->query("SELECT `kd_mk` FROM `tb_jadwal` WHERE `id_jadwal`='$id_jadwal'");
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $kd_mk = $row->kd_mk;
      $query_mk=$this->db->query("SELECT `sks` FROM `tb_mata_kuliah` WHERE `kd_mk`='$kd_mk'");
      $row=$query_mk->row();
      $hasil=$row->sks;
    }else {
      $hasil =0;
    }
    return $hasil;
  }

  public function tampilData($table)
  {
    # code...
    $query=$this->db->get($table);
    return $query;
  }


  public function juml_data($table)
  {
    # code...
    $query=$this->db->get($table);
    $jumlah=$query->num_rows();
    return $jumlah;
  }

  public function getData_by($table,$where)
  {
    # code...
    $query=$this->db->get_where($table,$where);
    return $query;
  }

  public function updateData($table,$data,$where)
  {
    # code...
    $query=$this->db->update($table, $data, $where);
    return $query;
  }

  public function updateSetting($data, $where)
  {
    # code...
    $query=$this->db->update('tb_setting', $data, $where);
    echo "Tanggal berhasil diperbaharui";
    return $query;
  }
  public function update_byAjax($table, $data, $where)
  {
    # code...
    $query=$this->db->update($table, $data, $where);
    echo "Data Tersimpan";
    return $query;
  }

  public function insert_byAjax($table, $data)
  {
    # code...
    // $row=$this->M_data->getData_by($table,$id);
    // if ($row->num_rows() <> 0) {
    //   # code...
    //   echo "Data sudah ada.!!";
    // }else {
    //   # code...
    //
    // }
    $query=$this->db->insert($table, $data);
    echo "Data Tersimpan";
    return $query;

  }

  public function cari_foto_admin($id)
  {
    # code...
    $where = array('id_admin' => $id );
    $query=$this->db->get_where('tb_admin',$where);
    $r=$query->row();
    return $r->foto;
  }

  public function cari_foto_mhs($id)
  {
    # code...
    $nim = array('nim' => $id );
    $query=$this->db->get_where('tb_mahasiswa',$nim);
    $r=$query->row();
    return $r->file_foto;
  }

  public function cari_foto_dosen($id)
  {
    # code...
    $nim = array('kd_dosen' => $id );
    $query=$this->db->get_where('tb_dosen',$nim);
    $r=$query->row();
    return $r->file_foto;
  }

  public function jenjang_pendidikan()
  {
    # code...
    return array('S1','S2','S3','D3','D4','Profesor');
  }

  public function getHari()
  {
    return $arrayName = array('Ahad/29/10/2017','Sabtu/04/11/2017','Ahad/05/11/2017','Sabtu/11/11/2017','Ahad/12/11/2017','Sabtu/18/11/2017'
  ,'Ahad/19/11/2017','Sabtu/25/11/2017','Ahad/26/11/2017','Sabtu/02/12/2017','Ahad/03/12','Sabtu/09/12/2017','Ahad/10/12/2017','Sabtu/16/12/2017',
'Ahad/17/12/2017','Sabtu/23/12/2017','Ahad/24/12/2017','Sabtu/30/12/2017','Ahad/31/12/2017','Sabtu/06/01/2018','Ahad/07/01/2018','Sabtu/13/01/2018',
'Ahad/14/01/2018','Sabtu/20/01/2018');
  }

  public function getTime(){
    return array('08.30-17.30');
  }

  public function getRuangan(){
    return array('E.1','E.2','E.3','E.4','E.5','E.6','E.7','E.8','E.9','E.10','E.11','E.12','E.13','E.14','E.15','E.16','E.17','E.18');
  }

  public function getTh_akademik_jadwal(){
    $this->db->select('th_akademik');
    $this->db->distinct(true);
    $this->db->from('tb_jadwal');
    $this->db->group_by('th_akademik');
    $this->db->order_by('th_akademik');
    $query=$this->db->get();
    return $query;
  }

  function getStatusMhs(){
    $arrayName = array('Aktif', 'Cuti', 'DO', 'Meninggal', 'Lulus');
    return $arrayName;
  }

  // function listSmt(){
  //
  // }

  function getLapMhs($kd_prodi,$status,$th_akademik){
    if (!empty($status)) {
      $id['status']=$status;
    }
    if (!empty($kd_prodi)) {
      $id['kd_prodi']=$kd_prodi;
    }
    $id['th_akademik']=$th_akademik;
    // $this->db->select('');
    $q=$this->db->get_where('tb_mahasiswa', $id);
    return $q;
  }

  function getLapDosen($kd_prodi,$pendidikan){
    if (!empty($kd_prodi)) {
      $id['kd_prodi']=$kd_prodi;
    }
    if (!empty($pendidikan)) {
      $id['pendidikan']=$pendidikan;
    }
    if (!empty($pendidikan) || !empty($kd_prodi)) {
      $q=$this->db->get_where('tb_dosen', $id);
    }else {
      $q=$this->db->get('tb_dosen');
    }
    return $q;
  }
  function getLapMk($kd_prodi,$smt){
    if (!empty($smt)) {
      $id['smt']=$smt;
    }
    $id['kd_prodi']=$kd_prodi;
    $q=$this->db->get_where('tb_mata_kuliah', $id);
    return $q;
  }

  function getLapAbsen($th_akademik,$smt,$kd_prodi,$id_jadwal){
    $id = array(
      'th_akademik' => $th_akademik,
      'semester'=>$smt,
      'kd_prodi'=>$kd_prodi,
      'id_jadwal'=>$id_jadwal
   );
   $jadwal['id_jadwal']=$id_jadwal;
    $this->db->join('tb_mahasiswa', 'tb_mahasiswa.nim = tb_krs.nim');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi = tb_krs.kd_prodi');
    $q=$this->db->get_where('tb_krs', $jadwal);
    return $q;
  }
  function getLapNilai($th_akademik,$smt,$kd_prodi,$id_jadwal){
    $id['id_jadwal']=$id_jadwal;
    $this->db->join('tb_mahasiswa', 'tb_mahasiswa.nim = tb_krs.nim');
    $q=$this->db->get_where('tb_krs', $id);
    return $q;
  }
  function getLapMutasi($th_akademik,$semester,$kd_prodi){
    $id = array(
      'a.th_akademik' => $th_akademik,
      'a.semester' => $semester,
      'b.kd_prodi' => $kd_prodi
    );
    $this->db->select('a.id_mutasi,a.th_akademik,a.semester,a.tgl_mutasi,a.nim,a.status,a.ket,b.nama_mhs,b.sex,b.kd_prodi');
    $this->db->join('tb_mahasiswa as b', 'b.nim = a.nim');
    $q=$this->db->get_where('tb_mutasi_mhs as a', $id);
    // $query = "SELECT a.id_mutasi,a.th_akademik,a.semester,a.tgl_mutasi,a.nim,a.status,a.ket,
    //       b.nama_mhs,b.sex,b.kd_prodi
    //       FROM tb_mutasi_mhs as a
    //       JOIN tb_mahasiswa as b
    //       ON a.nim=b.nim
    //     WHERE a.th_akademik='$th_akademik' AND a.semester='$semester' AND b.kd_prodi='$kd_prodi'";
    //
    // $q = $this->db->query($query);
    return $q;
  }
  function getAllMk($kd_prodi,$smt){
    $id['kd_prodi']=$kd_prodi;
    if (!empty($smt)) {
      $id['smt']=$smt;
    }
    $id['aktif']='Ya';
    $q=$this->db->get_where('tb_mata_kuliah', $id);
    return $q;
  }
  public function th_akademik_krs_mhs($nim){
    $q = $this->db->query("SELECT th_akademik FROM tb_krs WHERE nim='$nim' GROUP BY th_akademik ORDER BY th_akademik");
    return $q;
  }

  function getSetting($id_setting,$form){
    $id['id']=$id_setting;
    $id['KRS']=$form;
    $q=$this->db->get('tb_setting', $id);
    return $q;
  }

  function th_akademik_krs_dosen($key){
    $q = $this->db->query("SELECT th_akademik FROM tb_krs WHERE kd_dosen='$key' GROUP BY th_akademik ORDER BY th_akademik");
    return $q;
  }

  public function cari_jml_mhs_mk($thak,$kdmk,$kddosen){
    $q = $this->db->query("SELECT * FROM tb_krs WHERE th_akademik='$thak' AND kd_mk='$kdmk' AND kd_dosen='$kddosen'");
    $r = $q->num_rows();
    /*
    if($r>0){
      foreach($q->result() as $dt){
        $h = $dt->t_sks;
      }
    }else{
      $h = 0;
    }
    */
    return $r;
  }
  public function cari_data_mhs_lengkap($key){
    $q = $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$key'");
    foreach($q->result() as $dt){
      $hasil = array('nama'=>$dt->nama_mhs,'sex'=>$dt->sex);
    }
    return $hasil;
  }
}
