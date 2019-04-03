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
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      # code...

       $data = array(
          'tgl'                 => hari_ini(date('w')),
          'tgl_indo'            => tgl_indo(date('Y-m-d')),
          'class'               => 'home',
          'judul'               => 'Dashboard',
          'sub_judul'           => 'Edit Profile',
          'nama_lengkap'           => $this->session->userdata('nama_lengkap'),
          'konten'                 => 'profil/v_profil',
          'foto_user'          => $this->M_data->cari_foto_admin($this->session->userdata('id_admin'))
      //   'konten'    => 'v_konten',
      //   'judul'     => 'Home',
      //   'sub_judul' => '
       );


      // $this->load->view('v_home',$data);
      $this->load->view('v_home',$data);
    }else {
      # code...
      redirect('login','refresh');
    }
  }

  function simpan_profil()
  {
    # code...
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek)&& $level=='admin') {
      $data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap')
      );
      $id = array('id_admin' => $this->session->userdata('id_admin'));
      $query=  $this->M_data->getData_by('tb_admin',$id);
      if ($query->num_rows()<>0) {
        # code...
        $this->M_data->update_byAjax('tb_admin',$data,$id);
      }
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
    if (!empty($cek)&& $level=='admin') {
      $id=$this->session->userdata('id_admin');
      // $config['upload_path']='./assets/images/avatars';
      // $config['allowed_type']="bmp|gif|jpeg|png";
      // $config['overwrite']=true;
      // $config['filename']=$id;
      $config = array(
        'upload_path' =>  './assets/images/avatars',
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
          $d['foto']=$filename;

          $config = array(
            'image_library' => 'gd2',
            'source_image'  => './assets/images/avatars/'.$filename,
            'create_thumb'  => false,
            'maintain_ratio'=>  true,
            'width'         =>  300,
            'height'        =>  200
           );

          $this->load->library('image_lib' , $config);
          $this->image_lib->resize();
          //$id['id_admin']=$this->session->userdata('id_admin');
          $id = array('id_admin' => $this->session->userdata('id_admin') );
          $query=$this->M_data->getData_by('tb_admin',$id);
          if ($query->num_rows()<>0) {
            # code...
            $this->M_data->updateData('tb_admin', $d, $id);
            $info="Foto Berhasil diperbaharui";
            $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
            redirect ('profil','refresh');

          }
        }else {
          $info=$this->upload->display_errors();
          $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
          redirect ('profil','refresh');
        }
      }else {
        $info="Silahkan Pilih Foto terlebih dahulu";
        $this->session->set_flashdata('result_info','<center>'.$info.'</center>');
        redirect ('profil','refresh');
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
    if (!empty($cek)&& $level=='admin') {
      $old_pass = md5($this->input->post('old_pass'));
      $pass1 = md5($this->input->post('pass1'));
      $pass2 = md5($this->input->post('pass2'));
	  $id['id_admin']=$this->session->userdata('id_admin');
      $query=$this->M_data->getData_by('tb_admin',$id);
      $rs=$query->row();
      if ($old_pass==$rs->password) {
        # code..
          if ($query->num_rows()<>0) {
            # code...
            $data = array(
              'password' => $pass2
            );
            $id = array('id_admin' => $this->session->userdata('id_admin') );
            $this->M_data->updateData('tb_admin',$data,$id);
            echo "Password Berhasil diubah";
          }
      }else{
        echo "Password Lama Yang Anda Masukkan Salah";
//		var_dump($rs->password);
	//	var_dump($old_pass);
      }
    }else {
      redirect ('login','refresh');
    }
  }

}
