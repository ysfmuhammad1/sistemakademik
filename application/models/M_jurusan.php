<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model{

  public function tampil_data($table)
  {
    # code...Fungsi menampilkan data
    return $this->db->get($table);
  }

  public function tampil_by($id)
  {
    # code...Fungsi menampilkan data berdasar kode jurusan
    $this->db->where('kd_prodi', $id);
    return $this->db->get('tb_prodi')->row();
  }

  public function input_data($data,$table)
  {
    # code...
    $this->db->insert($table, $data);
  }

  public function hapus_data($id,$table)
  {
    # code...
    $this->db->where($id);
    $this->db->delete($table);
  }

  public function edit_data($id,$table)
  {
    # code...
    return $this->db->get_where($table, $id);
  }

  public function update_data($id,$data,$table)
  {
    # code...
      $this->db->where($id);
      $this->db->update($table, $data);
  }


  public function validasi($mode)
  {
    # code...Fungsi validasi tambah atau ubah
    $this->load->library('form_validation');//Load library form_validation untuk proses validasi

    if ($mode == "simpan") {
      # code...
      $this->form_validation->set_rules('kd_prodi', 'Kode', 'required|numeric|max_length[2]|');
      $this->form_validation->set_rules('prodi', 'Prodi', 'required|max_length[50]|');
      $this->form_validation->set_rules('singkat', 'Singkatan', 'required|max_length[4]|');
      $this->form_validation->set_rules('kaprodi', 'Kaprodi', 'required');
      $this->form_validation->set_rules('nidn', 'NIDN', 'required|numeric');
      $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required');
    }
    if ($this->form_validation->run()) {//jika validasi benar
      return TRUE;//kembalikan hasilnya menjadi TRUE
    }else {
      return FALSE;//kembalikan hasilnya menjadi False
    }
  }
}
