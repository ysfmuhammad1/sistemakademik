<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{


function getlogin($usr,$pass)
{
  $con=mysqli_connect("localhost","root","","db_sistemakademik");
  # code...
  // $u=$usr;
  // $p=md5($pass);
   $u=mysqli_real_escape_string($con,$usr);
   $p=md5(mysqli_real_escape_string($con,$pass));
   $query=$this->db->get_where('tb_admin', array('username' => $u,'password'=> $p ));
  if ($query->num_rows()<>0) {
    # code...
    $data = array('last_login' => date('Y-m-d H:i:s'));
    // $id['id_admin']='1';
    // $id='id_admin'=$query->result()->id_admin;
    foreach ($query->result() as $rs) {

      $sess_data = array(
        'logged_in' => 'Login Sukses',
        'id_admin'  => $rs->id_admin,
        'username' => $rs->username,
        'password' => $rs->password,
        'nama_lengkap' => $rs->nama_lengkap,
        'level' => $rs->level
      );
      $this->session->set_userdata($sess_data);
      $id['id_admin']=$this->session->userdata('id_admin');
      $this->db->update('tb_admin', $data, $id);

    }
    redirect('home');
  }else {
    // $u=$this->db->escape($usr);
    $u=mysqli_real_escape_string($con,$usr);
    $p=md5(mysqli_real_escape_string($con,$pass));
    // $p=md5($this->db->escape($pass));
    $s= array('Aktif', 'Status');

    $this->db->where('nim',$u);
    $this->db->where('password',$p);
    // $id = array('nim' => $u, 'password'=>$p);
    $this->db->where_in('status',$s);
    $query2=$this->db->get('tb_mahasiswa');
    if ($query2->num_rows() <> 0) {
      foreach ($query2->result() as $rs) {
        $sess_data2 = array(
          'logged_in' => 'falksehta4wtgjvd',
          'username'=> $rs->nim,
          'nama_lengkap'  => $rs->nama_mhs,
          'kd_prodi'  => $rs->kd_prodi,
          'status'  => $rs->status,
          'level' => 'mahasiswa'
        );
        $this->session->set_userdata($sess_data2);
      }
      // var_dump($sess_data2);
      redirect('site_mahasiswa/home');
    }else {
      $u=mysqli_real_escape_string($con,$usr);
      $p=md5(mysqli_real_escape_string($con,$pass));
      $s= 'Aktif';
      $query3=$this->db->get_where('tb_dosen',array('kd_dosen' =>$u , 'password'=>$p, 'status_dosen'=>$s));
      if ($query3->num_rows() > 0) {
        foreach ($query3->result() as $rs) {
          $sess_data3 = array(
            'logged_in' => 'fkjasjfowtr34p98t4',
            'username'=> $rs->kd_dosen,
            'nama_lengkap'=>$rs->nama_dosen,
            'kd_prodi'  =>$rs->kd_prodi,
            'status'  =>$rs->status_dosen,
            'level' =>'dosen'
          );
          $this->session->set_userdata($sess_data3);
        }
        redirect('site_dosen/home');
      }else {

        $this->session->set_flashdata('result_login','<br>Username atau Password anda SALAH atau Akun Anda di Blokir, Silahkan hubungi Administrator');
        redirect('login');
      }

    }

  }
}

}
