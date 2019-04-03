<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matakuliah extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getData_byJSON()
  {
    # code...

    // $this->datatables->add_column('no','<center>1</center>','no');
    $this->datatables->select('prodi, kd_mk, nama_mk, sks, smt, aktif');
    $this->datatables->from('tb_mata_kuliah');
    $this->datatables->join('tb_prodi','tb_mata_kuliah.kd_prodi=tb_prodi.kd_prodi');
    $this->datatables->add_column('no','<center>1</center>','no');
    $this->datatables->add_column('aksi','
                  <center>
                    <div class=" action-buttons">
                      <a href="#modal-simpan" class="green" onclick="javascript:editData($1)" data-toggle="modal">
                        <i class="fa fa-pencil bigger-130"></i>
                      </a>
                      <a href="#" class="red" onclick="javascript:hapusData($1)">
                        <i class="fa fa-trash bigger-130"></i>
                      </a>
                    </div>
                  </center>
                  ','kd_mk');
    return $this->datatables->generate();
  }

}
