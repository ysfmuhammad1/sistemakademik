<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_krs');
    $this->load->model('M_mahasiswa');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level=='admin'){
      $data=array(
        'tgl'         =>  hari_ini(date('w')),
        'tgl_indo'    =>  tgl_indo(date('Y-m-d')),
        'class'       =>  'tran_krs',
        'judul'       =>  'Transaksi',
        'sub_judul'   =>  'Kartu Rencana Studi (KRS)',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'data_krs'    =>  $this->M_krs->getDataKRS(),
        'konten'      => 'krs/v_form'
      );
      $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }
  function tambah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level=='admin'){
      $data=array(
        'tgl'             =>  hari_ini(date('w')),
        'tgl_indo'        =>  tgl_indo(date('Y-m-d')),
        'class'           =>  'tran_krs',
        'judul'           =>  'Transaksi',
        'sub_judul'       =>  'Kartu Rencana Studi (KRS)<small><i class="ace-icon fa fa-angle-double-right"></i></small>Tambah Data',
        'nama_lengkap'    =>  $this->session->userdata('nama_lengkap'),
        'foto_user'       =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        'th_akademik_jadwal'  =>  $this->M_data->getTh_akademik_jadwal(),
        'data_mhs'         => $this->M_mahasiswa->all_mhs(),
        // 'data_tambah'     => $this->M_krs->getDataTambahKRS(),
        'konten'          =>  'krs/v_tambah'
      );
      $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }

  function view_detail(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level=='admin'){
      $query=$this->M_krs->getDataDetailKRS_by($this->uri->segment(3));
      if($query->num_rows() > 0){
        $dt=$query->row();
        $th_akademik=$dt->th_akademik;
        $kd_prodi=$dt->kd_prodi;
        $prodi=$dt->prodi;
        $key=$dt->id_jadwal;
        $data=array(
          'tgl'             =>  hari_ini(date('w')),
          'tgl_indo'        =>  tgl_indo(date('Y-m-d')),
          'class'           =>  'tran_krs',
          'judul'           =>  'Transaksi',
          'sub_judul'       =>  'Kartu Rencana Studi (KRS)<small><i class="ace-icon fa fa-angle-double-right"></i></small>Detail',
          'nama_lengkap'    =>  $this->session->userdata('nama_lengkap'),
          'foto_user'       =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
          'judul_tabel'     => 'Detail Pengambilan KRS Tahun Akademik <strong>'.$th_akademik."</strong> Program Studi <strong>".$prodi."</strong>",
          'data_detailKRS'  => $this->M_krs->getKRS_Mhs($key),
          'konten'          =>  'krs/v_view_detail'
        );
        $this->load->view('v_home',$data);
      }
    }else{
      redirect ('login','refresh');
    }
  }

  function cari_nim(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $data=$this->M_krs->getDataTambahKRS($this->input->post('th_akademik'),$this->input->post('nim'));
      echo  (json_encode($data));
    }else{
      redirect('login','refresh');
    }
  }
  function carimatkul(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $data=$this->M_krs->getDataJadwalMatkul($this->input->get('th_akademik'),$this->input->get('semester'),$this->input->get('kd_prodi'));
    }else{
      redirect('login','refresh');
    }
  }

  function validasi_print_krs(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){

      $th_akademik=$this->input->post('th_akademik');
      $nim=$this->input->post('nim');
      $semester=$this->input->post('semester');
      $q=$this->M_krs->dataCetak($th_akademik,$semester,$nim);

      if ($q->num_rows() > 0) {
        # code...
      $sesdata = array(
        'th_akademik' => $th_akademik,
        'nim' => $nim,
        'semester' => $semester
      );
      $this->session->set_userdata($sesdata);
        echo "Sukses";
      }else {
        echo "Gagal";
      }
    }else{
      redirect('login','refresh');
    }
  }

  function print_krs(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $th_akademik=$this->session->userdata('th_akademik');
      $semester=$this->session->userdata('semester');
      $th_akademik=$this->session->userdata('th_akademik');
      $nim=$this->session->userdata('nim');

      //nama, kd_prodi,semester,ipk semester lalu,

      $carimhs =$this->M_mahasiswa->cari_nama_mhs($nim);
      $kdProdi=$this->M_mahasiswa->cari_kd_prodi_mhs($nim);
      $cariProdi=$this->M_data->nama_prodi($kdProdi);
      $cariSemester=$this->M_krs->cari_smt_krs($th_akademik,$semester,$nim);
      $iplalu=$this->M_krs->cari_ipk_lalu($cariSemester,$nim);

      $q=$this->M_krs->dataCetak($th_akademik,$semester,$nim);

      if ($q->num_rows() > 0) {
        $pdf= new PDF();

        $pdf->setKriteria('cetak_laporan');
        $pdf->setNama('CETAK KRS');
        $pdf->AliasNbPages();
        $pdf->AddPage("P","Legal");

        $pdf->SetTitle("Kartu Rencana Studi");
        $pdf->SetCreator("PPS UM-Parepare");

        $h=10;

        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(198,7, $this->config->item('nama_pendek'),0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(198,7, $this->config->item('nama_instansi'),0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(198,4, $this->config->item('alamat_instansi'),0,1,'C');

        $pdf->Ln(8);

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(198,4, "KARTU RENCANA STUDI (KRS) MAHASISWA",0,1,'C');
        $pdf->Ln(5);

        $h=6;

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,$h, "NIM",0,0,'L');
        $pdf->Cell(50,$h, ": ".$nim,0,0,'L');
        $pdf->SetX(120);
        $pdf->Cell(35,$h,"Tahun Akademik",0,0,'L');
        $pdf->Cell(50,$h,": ".$th_akademik,0,1,'L');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,$h, "Nama",0,0,'L');
        $pdf->Cell(50,$h, ": ".strtoupper($carimhs),0,0,'L');
        $pdf->SetX(120);
        $pdf->Cell(35,$h,"Semester",0,0,'L');
        $pdf->Cell(50,$h,": ".$semester."/".$cariSemester,0,1,'L');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(30,$h, "Prodi",0,0,'L');
        $pdf->Cell(50,$h, ": S2 - ".$cariProdi,0,0,'L');
        $pdf->SetX(120);
        $pdf->Cell(35,$h,"IPK Semester Lalu",0,0,'L');
        $pdf->Cell(50,$h,": ".$iplalu,0,1,'L');

        $w=array(10,75,10,15,20,20,40);

        //header

        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(204,204,204);
        $pdf->SetTextColor(0);
        $fill=true;
        $h=8;
        $pdf->Cell($w[0],$h,'No','TB',0,'C',$fill);
        $pdf->Cell($w[1],$h,'Mata Kuliah','TB',0,'C',$fill);
        // $pdf->Cell($w[2],$h,'Mata Kuliah','TB',0,'C',$fill);
        $pdf->Cell($w[2],$h,'SKS','TB',0,'C',$fill);
        $pdf->Cell($w[3],$h,'Hari','TB',0,'C',$fill);
        $pdf->Cell($w[4],$h,'Pukul','TB',0,'C',$fill);
        $pdf->Cell($w[5],$h,'Ruang','TB',0,'C',$fill);
        $pdf->Cell($w[6],$h,'Dosen','TB',0,'C',$fill);
        $pdf->Ln();
        //data

        $h=7;
        $pdf->SetFont('Arial','',9);
        $pdf->SetFillColor(204,204,204);
        $pdf->SetTextColor(0);
        $fill=false;
        $no=1;
        $jmlsks=0;
        foreach ($q->result() as $rs) {
          $pdf->cell($w[0],$h,$no,0,0,'C',$fill);
          $pdf->cell($w[1],$h,$rs->kd_mk.'-'.$rs->nama_mk,0,0,'L',$fill);
          $pdf->cell($w[2],$h,$rs->sks,0,0,'C',$fill);
          $pdf->cell($w[3],$h,$rs->hari,0,0,'C',$fill);
          $pdf->cell($w[4],$h,$rs->pukul,0,0,'C',$fill);
          $pdf->cell($w[5],$h,$rs->ruang,0,0,'C',$fill);
          $pdf->cell($w[6],$h,$rs->nm_dosen,0,0,'L',$fill);
          $pdf->Ln();
          $fill=!$fill;
          $jmlsks=$jmlsks=$rs->sks;
          $no++;
        }

        //closing line

        $pdf->Cell(array_sum($w),0,'','T');
        $pdf->Ln();
        $pdf->Cell(85,$h,'Jumlah SKS :',0,0,'R');
        $pdf->Cell(10,$h, $jmlsks,0,0,'C');

        $pdf->Ln(10);
        $h = 5;
        $pdf->Cell(50,$h,'Menyetujui',0,0,'C');
        $pdf->SetX(110);
        $pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),0,1,'C');
        $pdf->Cell(50,$h,'Dosen Pembimbing,',0,0,'C');
        $pdf->SetX(110);
        $pdf->Cell(100,$h,'Mahasiswa',0,1,'C');
        $pdf->Ln(20);
        $pdf->Cell(50,$h,'_______________________',0,0,'C');
        $pdf->SetX(110);
        $pdf->Cell(100,$h,$carimhs,0,1,'C');
        $pdf->Cell(50,$h,'NIP : ',0,0,'L');
        $pdf->SetX(110);
        $pdf->Cell(100,$h,'NIM :'.$nim,0,1,'C');

        $pdf->Output('KRS_'.$th_akademik.'_'.$cariSemester.'_'.$nim.'.pdf','I');
      }else {
        echo "Gagal";
      }

    }else{
      redirect('login','refresh');
    }
  }

  function simpan(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id_jadwal=$this->input->post('id_jadwal');
      $th_akademik=$this->input->post('th_akademik');
      $nim=$this->input->post('nim');
      $semester=$this->input->post('semester');
      $smt=$this->input->post('smt');
      $kd_prodi=$this->input->post('kd_prodi');
      $prodi=$this->input->post('prodi');

      $jml_sks=$this->M_krs->cariJum_SKS($th_akademik,$smt,$nim);
      $sks=$this->M_data->cari_sks_jadwal($id_jadwal);
      $t_sks=$jml_sks + $sks;
      $maxsks=$this->input->post('maxsks');
      if ($t_sks > $maxsks) {
        echo "Maaf SKS melebihi batas Maksimal ".$maxsks." SKS";
      }else {

        $id=array(
          'th_akademik'     => $th_akademik,
          'nim'             => $nim,
          'semester'        => $semester,
          'smt'             => $smt,
          'id_jadwal'       => $id_jadwal
        );
        $q=$this->M_krs->jadwal_all($id_jadwal);
        $row=$q->row();
        $kd_mk=$row->kd_mk;
        $kd_dosen=$row->kd_dosen;
        $ruang=$row->ruang;
        $pukul=$row->pukul;
        $hari=$row->hari;
        $data=array(
          'th_akademik'     => $th_akademik,
          'nim'             => $nim,
          'semester'        => $semester,
          'smt'             => $smt,
          'id_jadwal'       => $id_jadwal,
          'kd_prodi'        => $kd_prodi,
          // 'prodi'           => $row->prodi,
          'kd_mk'           => $kd_mk,
          'kd_dosen'        => $kd_dosen,
          'ruang'           => $ruang,
          'hari'            => $hari,
          'pukul'           => $pukul,
          'nama_mk'         => $this->M_data->cari_nama_mk($kd_mk),
          'nm_dosen'        => $this->M_dosen->cari_nama_dosen($kd_dosen),
          'sks'             => $row->sks
          // 'tgl_update'      => date('Y-m-d H:i:s')
        );
        $kd = array(
          'th_akademik'     => $th_akademik,
          'nim'             => $nim,
          'semester'        => $semester,
          'smt'             => $smt,
          'kd_mk'           => $kd_mk
        );

        $q_krs=$this->M_krs->getKRS_by($kd);
        if ($q_krs->num_rows() > 0) {
          $data['tgl_update']=date('Y-m-d H:i:s');
          $this->M_krs->updatetDataKRS($data,$id);
          $sks_now=$this->M_krs->cariJum_SKS($th_akademik,$smt,$nim);
          echo "Data diperbaharui. Total SKS ".$sks_now;
        }else {
          $data['tgl_insert']=date('Y-m-d H:i:s');
          $this->M_krs->insertDataKRS($data);
          $sks_now=$this->M_krs->cariJum_SKS($th_akademik,$smt,$nim);
          echo "Data disimpan. Total SKS ".$sks_now;
        }
      }
      // var_dump($sks);
    }else{
      redirect('login','refresh');
    }
  }

  function cariKRS(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id = array(
        'th_akademik' => $this->input->get('th_akademik'),
        'semester'    => $this->input->get('semester'),
        'nim'         => $this->input->get('nim')
       );
       $q['data']=$this->M_krs->getKRS_by($id);
       echo ($this->load->view('krs/view', $q ,TRUE ));
    }else{
      redirect('login','refresh');
    }
  }

  function hapus(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id['id_krs'] =$this->input->post('id');
      $this->M_krs->hapusDataKRS($id);
      echo "Data Terhapus";
    }else{
      redirect('login','refresh');
    }
  }

}
