<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

  var $table='tb_mahasiswa';
  var $field_tampil= array(null,'th_akademik','kd_prodi','nim','nama_mhs','sex','hp','status',null );
  var $field_cari = array('th_akademik','kd_prodi','nim','nama_mhs','sex','hp','status');
  var $order = array('th_akademik');
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function all_mhs()
  {
    // $query=$this->db->query('SELECT `nim` FROM `tb_mahasiswa`');
    $query=$this->db->select('nim')->get('tb_mahasiswa');
    return $query;
  }
  public function getDataMahasiswa($id)
  {

    $query=$this->db->query("SELECT* FROM `tb_mahasiswa` WHERE `kd_prodi`='$id'");
    return $query;
  }

  public function getMahasiswa_by($id)
  {
    $nim['nim']=$id;
    $query=$this->db->get_where('tb_mahasiswa', $nim);
    return $query;
  }

  public function hapusDadaMahasiswa($id)
  {
    $nim['nim']=$id;
    $query=$this->db->delete('tb_mahasiswa',$nim);
    return $query;
  }

  public function last_nim($id)
  {
    $query=$this->db->query("SELECT  MAX(RIGHT(nim,4)) AS kode FROM `tb_mahasiswa` WHERE `kd_prodi`='$id'");
    if ($query->num_rows() > 0) {
      $row=$query->row();
      $hasil=(int)$row->kode;
    }else {
      $hasil=0;
    }
    return $hasil;
  }

  public function all_mhs_aktif()
  {
    $this->db->where('status', 'aktif');
    $this->db->order_by('nim');
    $query=$this->db->get('tb_mahasiswa');
    return $query;
  }
  public function insertDataMhs($data)
  {
    // $nim['nim']=$id;
    $query=$this->db->insert('tb_mahasiswa', $data);
    return $query;
  }

  public function updateDataMhs($data,$id)
  {
    $nim['nim']=$id;
    $query=$this->db->update('tb_mahasiswa', $data, $nim);
  }

  public function editDataMhs($id)
  {
    $query=$this->getMahasiswa_by($id);
    if ($query->num_rows() > 0) {
      return $query->row();
    }else {
      return false;
    }
  }

  public function getSemester($nim,$th_akademik){
    // $id['th_akademik']=$th_akademik;
    $id['nim']=$nim;
    $q=$this->db->get_where('tb_mahasiswa',$id);
    if($q->num_rows() > 0){
      $dt=$q->row();
      date_default_timezone_set("Asia/Makassar");
      $th_now=substr($th_akademik,0,4);
      // $th_now=date('Y');
      $th_masuk=substr($dt->th_akademik,0,4);
      $semester=substr($th_akademik,10,5); //2017/2018-Genap
      if ($semester=='Genap') {
        $smt=2;
      }else{
        $smt=1;
      }
      $th=$th_now - $th_masuk;
      $smt= ($th*2)+$smt;
    }else{
      $smt=1;
    }
    return $smt;
  }

  private function _getDataTables_query($id)
  {
    // $this->db->where('kd_prodi', $id);
    $this->db->from($this->table);
    $i=0;
    foreach ($this->field_cari as $item) {
      if ($_POST['search']['value']) {
        if ($i===0) {
            $this->db->group_start();
            $this->db->like($item,$_POST['search']['value']);
        }else {
            $this->db->or_like($item,$_POST['search']['value']);
        }
        if (count($this->field_cari) -1 ==$i) {
          $this->db->group_end();
        }
        $i++;
      }

    }
    if (isset($_POST['order'])) {
      $this->db->order_by($this->field_tampil[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }elseif (isset($this->order)) {
      # code...
      $order=$this->order;
      $this->db->order_by(key($order),$order[key($order)]);
    }
  }

  function getDataTables($id)
  {
    $this->_getDataTables_query($id);
    if ($_POST['length'] !=-1) {
      $this->db->limit($_POST['length'], $_POST['start']);
      $this->db->where('kd_prodi', $id);
      $query=$this->db->get();
      return $query->result();
    }
  }

  function count_filtered($id)
  {
    $this->_getDataTables_query($id);
    $this->db->where('kd_prodi', $id);
    $query=$this->db->get();
    return $query->num_rows();
  }

  function count_all($id)
  {
    $this->db->where('kd_prodi', $id);
    $query=$this->db->get($this->table);
    return $this->db->count_all_results();
  }

  function ajax_list()
  {
    $list=$this->M_mahasiswa->getDataTables($this->session->userdata('sess_kd_prodi'));
    $data = array();
    $no=$_POST['start'];

    foreach ($list as $rs) {
      # code...
      $no++;
      $row=array();
      $row[]='<center>'.$no.'</center>';
      $row[]='<center>'.$rs->th_akademik.'</center>';
      $row[]='<center>'.$rs->kd_prodi.'</center>';
      $row[]='<center>'.$rs->nim.'</center>';
      $row[]=$rs->nama_mhs;
      $row[]='<center>'.$rs->sex.'</center>';
      $row[]='<center>'.$rs->hp.'</center>';
      $row[]='<center>'.$rs->status.'</center>';
      $row[]='
      <center>
        <div class="hidden-sm hidden-xs action-buttons">
          <a href="'.site_url("mahasiswa/edit/$rs->nim").'" class="green" >
            <i class="fa fa-pencil bigger-130"></i>Edit
          </a>
          <a href="#" class="red" onclick="javascript:hapusData('.$rs->nim.')">
            <i class="fa fa-trash bigger-130"></i>Hapus
          </a>
        </div>
        <div class="hidden-md hidden-lg">
          <div class="inline pos-rel">
            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto" aria-expanded="false">
              <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
            </button>

            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
              <li>
                <a href="'.site_url("mahasiswa/edit/$rs->nim").'" class="tooltip-success"  data-rel="tooltip" title="" data-original-title="Edit">
                  <span class="green">
                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                  </span>
                </a>
              </li>

              <li>
                <a href="#" class="tooltip-error" onclick="javascript:hapusData('.$rs->nim.')" data-rel="tooltip" title="" data-original-title="Delete">
                  <span class="red">
                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </center>
                      ';
      $data[]=$row;
    }
    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" =>$this->M_mahasiswa->count_all($this->session->userdata('sess_kd_prodi')),
      "recordsFiltered" =>$this->M_mahasiswa->count_filtered($this->session->userdata('sess_kd_prodi')),
      "data"  =>$data,
    );
    return $output;
  }

  function cari_nama_mhs($id){
    $nim['nim']=$id;
    $this->db->select('nama_mhs');
    $q=$this->db->get_where('tb_mahasiswa', $nim);
    if ($q->num_rows() >0) {
      $row=$q->row();
      return $row->nama_mhs;
    }
  }
  function cari_kd_prodi_mhs($nim){
    $id['nim']=$nim;
    $this->db->select('kd_prodi');
    $q=$this->db->get_where('tb_mahasiswa', $id);
    if ($q->num_rows() >0) {
      $row=$q->row();
      return $row->kd_prodi;
    }
  }
}
