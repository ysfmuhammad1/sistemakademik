<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {

      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $data=array(
        'class'       =>  'home',
        'judul'       =>  'Profil',
        'sub_judul'   =>  'Edit Profil',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),

        'konten'      => 'site_mahasiswa/profil/v_profil'
      );

      if (!empty($foto)) {
        $data['foto_user']=$foto;
      }else {
        $data['foto_user']='no_foto.jpeg';
      }
      $this->load->view('site_mahasiswa/v_home',$data);

    }else {
      redirect('login','refresh');
    }
  }

  function simpan_profil()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='mahasiswa') {
      $data = array(
        'nama_mhs' => $this->input->post('nama_lengkap')
      );
      $id = array('nim' => $this->session->userdata('username'));
      $query=  $this->M_data->getData_by('tb_mahasiswa',$id);
	 // print_f($data);
      if ($query->num_rows()>0) {
        # code...
      //$this->M_data->update_byAjax('tb_mahasiswa',$data,$id);
		$this->db->update('tb_mahasiswa',$data,$id);
		//print_f($data);
      }else{
		echo"data tidak ada";
	  }
	  //var_dump($id);
    }else {
      # code...
      redirect('login','refresh');
    }
  }
  function simpan_foto()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='mahasiswa') {
      $id=$this->session->userdata('username');
      // $config['upload_path']='./assets/images/avatars';
      // $config['allowed_type']="bmp|gif|jpeg|png";
      // $config['overwrite']=true;
      // $config['filename']=$id;
      $config = array(
        'upload_path' =>  './assets/images/foto_mhs',
        'allowed_types'=>  'bmp|gif|jpg|jpeg|png',
        'overwrite'   =>  true,
        'file_name'    =>  $id
        );
      $this->load->library('upload' , $config);
      $foto=$_FILES['gambar']['name'];
      if (!empty($foto)) {
        # code...
        if ($this->upload->do_upload('gambar')) {
          # code...
          $data=$this->upload->data();
          $filename=$data['file_name'];
          $d['file_foto']=$filename;

          $config = array(
            'image_library' => 'gd2',
            'source_image'  => './assets/images/foto_mhs/'.$filename,
            'create_thumb'  => false,
            'maintain_ratio'=>  true,
            'width'         =>  300,
            'height'        =>  200
           );

          $this->load->library('image_lib' , $config);
          $this->image_lib->resize();
          //$id['id_admin']=$this->session->userdata('id_admin');
          $id = array('nim' => $this->session->userdata('username') );
          $query=$this->M_data->getData_by('tb_mahasiswa',$id);
          if ($query->num_rows()<>0) {
            # code...
            $this->M_data->updateData('tb_mahasiswa', $d, $id);
            $info="Foto Berhasil diperbaharui";
            $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
            redirect ('site_mahasiswa/profil','refresh');

          }
        }else {
          $info=$this->upload->display_errors();
          $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
          redirect ('site_mahasiswa/profil','refresh');
        }
      }else {
        $info="Silahkan Pilih Foto terlebih dahulu";
        $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
        redirect ('site_mahasiswa/profil','refresh');
      }
    }else {
      redirect ('login','refresh');
    }
  }

  function simpan_pass()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='mahasiswa') {
      $id = array('nim' => $this->session->userdata('username') );
      $old_pass = md5($this->input->post('old_pass'));
      $pass1 = md5($this->input->post('pass1'));
      $pass2 = md5($this->input->post('pass2'));
      $query=$this->M_data->getData_by('tb_mahasiswa',$id);
      $rs=$query->row();
      if ($old_pass==$rs->password) {
        # code..
          if ($query->num_rows()<>0) {
            # code...
            $data = array(
              'password' => $pass2
            );
            $id = array('nim' => $this->session->userdata('username') );
            $this->M_data->updateData('tb_mahasiswa',$data,$id);
            echo "Password Berhasil diubah";
          }
      }else{
        echo "Password Lama Yang Anda Masukkan Salah";
      }
    }else {
      redirect ('login','refresh');
    }
  }

}
