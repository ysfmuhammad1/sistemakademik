<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_krs extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_dosen');
    $this->load->model('M_data');
  }

  public function th_akademik_krs_mhs($id)
  {
    $query=$this->db->query("SELECT `th_akademik` FROM `tb_krs` WHERE `nim`='$id' GROUP BY `th_akademik` ORDER BY `th_akademik`");
    return $query->result();
  }
  public function create_kategori_krs_nim($id)
  {
    $query=$this->db->query("SELECT `th_akademik` FROM `tb_krs` WHERE `nim`='$id' GROUP BY `th_akademik` ORDER BY `th_akademik`");
    $hasil="";
    foreach ($query->result() as $rs) {
      $hasil .= "'".$rs->th_akademik."'" . ",";
    }
    return $hasil;
  }

  public function create_data_krs($id)
  {
    $query=$this->db->query("SELECT th_akademik,smt FROM `tb_krs` WHERE `nim`='$id' GROUP BY `th_akademik` ORDER BY `th_akademik`");
    $hasil="[";
    foreach ($query->result() as $rs) {
      $th = $rs->th_akademik;
      $smt=$rs->smt;
      $hasil .=$this->cari_ipk($id,$smt). ",";
    }
    $hasil.="]";
    return $hasil;
  }

  public function cari_ipk($id,$smt)
  {
    $query=$this->db->query("SELECT* FROM `tb_krs` WHERE `smt`='$smt' AND `nim`='$id' AND nilai_akhir <>''");
    if ($query->num_rows() > 0) {
      # code...
      $t_sks=0;
      $t_nilai=0;
      $t_akhir=0;
      foreach ($query->result() as $rs) {
        # code...
        $t_sks += $rs->sks;
        $n_angka = $this->cari_nilai_angka($rs->nilai_akhir);
        $t_nilai += $n_angka;
        $akhir =$n_angka * $rs->sks;
        $t_akhir += $akhir;
      }
      $h= number_format($t_akhir / $t_sks,2);
    }else {
      $h=0;
    }
    return $h;
  }

  public function cari_nilai_angka($nilai)
  {
    if ($nilai=='A') {
      $h=4;
    }elseif ($nilai =='B') {
      $h=3;
    }elseif ($nilai =='C') {
      $h=2;
    }elseif ($nilai =='D') {
      $h=1;
    }elseif ($nilai == 'E'){
      $h=0;
    }else {
      $h='';
    }
    return $h;
  }

  public function cari_ip($id)
  {
    $query=$this->db->query("SELECT* FROM `tb_krs` WHERE `nim`='$id' AND nilai_akhir <>''");
    if ($query->num_rows() > 0) {
      # code...
      $t_sks=0;
      $t_nilai=0;
      $t_akhir=0;
      $h=0;
      foreach ($query->result() as $rs) {
        # code...
        $t_sks += $rs->sks;
        $n_angka = $this->cari_nilai_angka($rs->nilai_akhir);
        $t_nilai += $n_angka;
        $akhir =$n_angka * $rs->sks;
        $t_akhir += $akhir;
      }
      // $h= number_format($t_akhir / $t_sks, 2);
      $h = number_format($t_akhir/$t_sks,2);
    }else {
      $h=0;
    }
    return $rs->nilai_akhir;
  }

  public function getDataKRS(){//SELECT `th_akademik`,`tb_prodi.prodi`
    $this->db->select('th_akademik,tb_prodi.prodi,tb_krs.kd_prodi,id_krs,semester,tb_krs.id_jadwal');
    $this->db->from('tb_krs');
    $this->db->join('tb_prodi','tb_krs.kd_prodi=tb_prodi.kd_prodi');
    $this->db->group_by('th_akademik,semester,kd_prodi');
    $query =$this->db->get();
    return $query;
  }
  public function getJum_Mhs_by($id1,$id2,$id3){
    $kd['kd_prodi']=$id1;
    $kd['th_akademik']=$id2;
    $kd['semester']=$id3;
    // $query=$this->db->query("SELECT COUNT(*) AS `jml`
    //         FROM `tb_krs` WHERE `th_akademik`='$id2' AND `semester`='$id3' AND `kd_prodi`='$id1'
    //         GROUP BY th_akademik,nim");
    // return $query->row()->jml;
    $this->db->select('nim');
    $this->db->group_by('th_akademik,nim');
    $query=$this->db->get_where('tb_krs',$kd);
    return $query->num_rows();
  }

  public function getDataDetailKRS_by($id){
    $kd['id_jadwal']=$id;
    $this->db->select('tb_krs.th_akademik,tb_krs.kd_prodi,tb_prodi.prodi,id_jadwal');
    // $this->db->from('tb_krs');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi=tb_krs.kd_prodi');
    $query=$this->db->get_where('tb_krs',$kd);
    return $query;
  }

  function getKRS_Mhs($id){
    $this->db->select('tb_krs.kd_prodi,tb_prodi.prodi,tb_krs.id_krs,tb_krs.id_jadwal,tb_krs.th_akademik,tb_mahasiswa.nim,tb_mahasiswa.nama_mhs,tb_mahasiswa.status');
    $this->db->from('tb_krs');
    $this->db->join('tb_mahasiswa','tb_mahasiswa.nim=tb_krs.nim');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi=tb_krs.kd_prodi');
    $this->db->where("id_jadwal='$id'");
    $query=$this->db->get();
    return $query->result();
  }

  function getJum_SKS_by($th_akademik,$nim){
    $this->db->select_sum('sks','t_sks');
    $this->db->from('tb_krs');
    $this->db->where("th_akademik='$th_akademik' AND nim='$nim'");
    $this->db->group_by('smt');
    $query=$this->db->get();
    if($query->num_rows() > 0){
      $hasil=$query->row()->t_sks;
    }else{
      $hasil=0;
    }
      return $hasil;
  }

  function getDataTambahKRS($th_akademik,$nim){
    $id =array(
      // 'th_akademik'   => $th_akademik,
      'nim'           => $nim
    );
    $this->db->select('nama_mhs,tb_prodi.prodi,tb_mahasiswa.kd_prodi');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi=tb_mahasiswa.kd_prodi');
    $query=$this->db->get_where('tb_mahasiswa',$id);
    if($query->num_rows() >0){
      $dt= $query->row();
      $data=array(
        'nama'       =>  $dt->nama_mhs,
        'prodi'      =>  $dt->prodi,
        'kd_prodi'   =>  $dt->kd_prodi,
        'kd_prodi'   =>  $dt->kd_prodi,
        'smt'        =>  $this->M_mahasiswa->getSemester($nim,$th_akademik)
      );
    }else {
      $data=array(
        'nama'       =>  '',
        'prodi'      =>  '',
        'kd_prodi'   =>  '',
        'kd_prodi'   =>  '',
        'smt'        =>  ''
      );
    }
    return $data;
  }

  function getDataJadwalMatkul($th_ak,$semester,$kd_prodi){
    $id=array(
      'th_akademik'=>$th_ak,
      'tb_jadwal.semester'=>$semester,
      'tb_jadwal.kd_prodi'=>$kd_prodi
    );
    $this->db->select('tb_mata_kuliah.smt,id_jadwal,tb_jadwal.kd_mk, hari,pukul,ruang,tb_jadwal.kd_dosen,tb_dosen.nama_dosen');
    $this->db->join('tb_mata_kuliah','tb_mata_kuliah.kd_mk = tb_jadwal.kd_mk');
    $this->db->join('tb_dosen','tb_dosen.kd_dosen = tb_jadwal.kd_dosen');
    $query=$this->db->get_where('tb_jadwal',$id);
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $rs) {
        $nama_mk=$this->M_data->cari_nama_mk($rs->kd_mk);
        $nama_dosen=$this->M_dosen->cari_nama_dosen($rs->kd_dosen);
        $data['id_jadwal']=$rs->id_jadwal;
        $data['kd_mk']  =$rs->kd_mk;
        $data['nama_dosen'] =$nama_dosen;
        $data['hari'] =$rs->hari;
        $data['pukul']=$rs->pukul;
        $data['ruang']=$rs->ruang;
        ?>

        <option value="<?php echo $rs->id_jadwal;?>"><?php echo $rs->kd_mk." - ".$nama_mk." - Semester ".$rs->smt." - ".$nama_dosen." - ".$rs->hari." - ".$rs->pukul." - ".$rs->ruang;?></option>
        <?php
      }
    }else{
      $data['id_jadwal']='';
      $data['kd_mk']  ='';
      $data['nama_dosen'] ='';
      $data['hari'] ='';
      $data['pukul']='';
      $data['ruang']='';
      ?>
        <option value="">--Pilih--</option>
      <?php
    }
    return $data;
  }

  public function cariJum_SKS($th_akademik,$smt,$nim){
    $query=$this->db->query("SELECT SUM(sks) AS jum_sks
                              FROM `tb_krs`
                              WHERE `th_akademik`='$th_akademik'
                              AND `smt`='$smt'
                              AND `nim`='$nim'
                              GROUP BY `smt` AND `nim`");
    if($query->num_rows() > 0){
      $hasil=$query->row()->jum_sks;
    }else {
      $hasil=0;
    }
    return $hasil;
  }

  public function jadwal_all($id){
    $id_jadwal['id_jadwal'] = $id;
    $this->db->select('tb_jadwal.kd_mk,tb_jadwal.kd_dosen,ruang,pukul,hari,nama_mk,tb_mata_kuliah.sks,tb_prodi.prodi');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_mata_kuliah','tb_mata_kuliah.kd_mk = tb_jadwal.kd_mk');
    $this->db->join('tb_prodi','tb_prodi.kd_prodi = tb_jadwal.kd_prodi');
    $this->db->where("id_jadwal='$id'");
    $query=$this->db->get();
    return $query;
  }

  public function getKRS_by($id){
    $query=$this->db->get_where('tb_krs',$id);
    return $query;
  }

  public function insertDataKRS($data)
  {
    $q=$this->db->insert('tb_krs', $data);
    return $q;
  }

  public function updatetDataKRS($data,$id)
  {
    $q=$this->db->update('tb_krs', $data, $id);
    return $q;
  }

  function hapusDataKRS($id){
    $q=$this->db->delete('tb_krs',$id);
    return $q;
  }

  function dataCetak($th_akademik,$semester,$nim){
    $id = array(
      'th_akademik' => $th_akademik,
      'nim' => $nim,
      'semester' => $semester
  );
    $q=$this->db->get_where('tb_krs', $id);
    return $q;
  }

  function cari_smt_krs($th_akademik,$semester,$nim){
      $id = array(
        'th_akademik' =>  $th_akademik,
        'semester' =>  $semester,
        'nim' =>  $nim
      );
      $q=$this->db->get_where('tb_krs', $id);
      return $q->row()->smt;
  }

  function cari_ipk_lalu($smt,$nim){
    if($smt>1){

			$smt = $smt-1;
      $id['smt']=$smt;
      $id['nim']=$nim;
			// $q = $this->db->query("SELECT * FROM tb_krs WHERE smt='$smt' AND nim='$nim'");
      $q=$this->db->get_where('tb_krs', $id);
      if ($q->num_rows() > 0) {
        # code...
        $t_sks =0;
        $t_nilai=0;
        $t_akhir =0;
        foreach($q->result() as $dt){
          $t_sks = $t_sks + $dt->sks;
          $n_angka = $this->cari_nilai_angka($dt->nilai_akhir);
          $t_nilai = $t_nilai + $n_angka;
          $akhir = $n_angka*$dt->sks;
          $t_akhir = $t_akhir+$akhir;
        }
        // $h = number_format($t_akhir/$t_sks,2);
        $h=$t_sks;
      }else {
        $h=0;
      }
		}else{
			$h = 0;
		}
		return $h;
  }

  public function cari_sks_jadwal($id){
    $q = $this->db->query("SELECT * FROM tb_jadwal WHERE id_jadwal='$id'");
    foreach($q->result() as $dt){
      $mk = $dt->kd_mk;
      $q_mk = $this->db->query("SELECT sks FROM tb_mata_kuliah WHERE kd_mk='$mk'");
      foreach($q_mk->result() as $dt_mk){
        return $hasil = $dt_mk->sks;
      }
    }
    // return $hasil;
  }

  // function get_semester_mhs($nim,$thak){
  //   $id['nim'] = $nim;
  //   $q = $this->db->get_where("tb_mahasiswa",$id);
  //   $r = $q->num_rows();
  //   if($r>0){
  //     foreach($q->result() as $dt){
  //       date_default_timezone_set('Asia/Makassar');
  //       $th_now = substr($thak,0,4);//date('Y');
  //       $th_masuk = substr($dt->th_akademik,0,4);
  //       //$smt_masuk = substr($dt->th_akademik,4,1);
  //       $smt = substr($thak,4,1);
  //       $th = $th_now-$th_masuk;
  //       $smt =  ($th*2)+$smt;
  //     }
  //   }else{
  //     $smt = 1;
  //   }
  //   return $smt;
  // }

}
