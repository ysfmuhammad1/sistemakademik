<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_mahasiswa');
    $this->load->model('M_krs');
    // $this->load->model('M_dosen');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      // echo "string";
      $foto=$this->M_data->cari_foto_mhs($this->session->userdata('username'));
      $data=array(
        'class'       =>  'akademik_krs',
        'judul'       =>  'KRS',
        'sub_judul'   =>  '',
        'nama_lengkap'=>  $this->session->userdata('nama_lengkap'),
        // 'foto_user'   =>  $this->M_data->cari_foto_admin($this->session->userdata('username')),
        'data_krs'    =>  $this->M_data->th_akademik_krs_mhs($this->session->userdata('username')),
        'konten'      => 'site_mahasiswa/krs/v_krs'
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

  function cari_smt(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $th_akademik=$this->input->post('th_akademik');
      $nim=$this->session->userdata('username');
      if (!empty($th_akademik)) {
        # code...
        $semester=strtolower(substr($this->input->post('th_akademik'),10,5));
        $q=$this->M_mahasiswa->getSemester($nim,$th_akademik);
        // if ($q->num_rows() >0) {
          $d=$q;
          echo $d;
          # code...
        // }
      }
    }else {
      redirect('login','refresh');
    }
  }

  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $th_akademik=$this->input->post('th_akademik');
      // $smt=$this->input->post('smt');
      $smt=strtolower(substr($this->input->post('th_akademik'),10,5));
      $nim=$this->session->userdata('username');
      $q = $this->db->query("SELECT * FROM tb_krs WHERE th_akademik='$th_akademik' AND semester='$smt' AND nim='$nim' ");
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('site_mahasiswa/krs/view', $dt,TRUE));
      }

    }else {
      redirect('login','refresh');
    }
  }

  function cetak(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if (!empty($cek) && $level=='mahasiswa') {
      $th_akademik=$this->input->post('th_akademik');
      // $smt=$this->input->post('smt');
      $smt=strtolower(substr($this->input->post('th_akademik'),10,5));
      $nim=$this->session->userdata('username');
      $q = $this->db->query("SELECT * FROM tb_krs WHERE th_akademik='$th_akademik' AND semester='$smt' AND nim='$nim' ");
      if ($q->num_rows() > 0) {
        $nama 	= $this->session->userdata('nama_lengkap');
        $kd_prodi	= $this->session->userdata('kd_prodi');
        $prodi = $this->M_data->nama_prodi($kd_prodi);
        $id_prodi['kd_prodi']=$kd_prodi;
        $data_prodi = $this->M_data->getData_by('tb_prodi',$id_prodi);
        $nama_ka_prodi = $data_prodi->row()->kaprodi;
        $nik_ka_prodi = $data_prodi->row()->nidn;
        $semester = $this->M_krs->cari_smt_krs($th_akademik,$smt,$nim);
        $ip_lalu = $this->M_krs->cari_ipk_lalu($semester,$nim);

        $pdf=new PDF();
			  $pdf->setKriteria("cetak_laporan");
			  $pdf->setNama("CETAK LAPORAN");
			  $pdf->AliasNbPages();
			  $pdf->AddPage("P","A4");
				//foreach($data->result() as $t){
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					$pdf->SetTitle('Laporan Aplikasi');
					$pdf->SetCreator('Programmer IT with fpdf');

					$h = 10;
					$pdf->SetFont('Times','B',16);
					// $pdf->image(base_url().'assets/img/logo-black.png',95,5,20,20);
					$pdf->Ln(15);
					$pdf->Cell(190,8,$this->config->item('nama_pendek'),0,1,'C');
					$pdf->SetFont('Times','B',14);
					$pdf->Cell(190,5,$this->config->item('nama_instansi'),0,1,'C');
					$pdf->SetFont('Times','',10);
					$pdf->Cell(190,5,'Alamat : '.$this->config->item('alamat_instansi'),0,1,'C');
					$pdf->Ln(10);

					//Column widths
					$pdf->SetFont('courier','B',16);
					$pdf->Cell(198,4,'KARTU RENCANA STUDI (KRS) MAHASISWA',0,1,'C');
					$pdf->Ln(5);

					$h = 6;

					$pdf->SetFont('courier','',12);
					$pdf->Cell(30,$h,'NIM',0,0,'L');
					$pdf->Cell(50,$h,': '.$nim,0,0,'L');
					$pdf->SetX(120);
					$pdf->Cell(35,$h,'Tahun Akademik ',0,0,'L');
					$pdf->Cell(50,$h,': '.$th_akademik,0,1,'L');

					$pdf->Cell(30,$h,'Nama',0,0,'L');
					$pdf->Cell(50,$h,': '.strtoupper($nama),0,0,'L');
					$pdf->SetX(120);
					$pdf->Cell(35,$h,'Semester ',0,0,'L');
					$pdf->Cell(50,$h,': '.strtoupper($smt).'/'.$semester,0,1,'L');

					$pdf->Cell(30,$h,'PRODI',0,0,'L');
					$pdf->Cell(50,$h,': S2 - '.$prodi,0,0,'L');
					$pdf->SetX(120);
					$pdf->Cell(35,$h,'IP smt. Lalu ',0,0,'L');
					$pdf->Cell(50,$h,': '.$ip_lalu,0,1,'L');


					$w = array(8,60,10,15,20,20,55);

					//Header

					$pdf->SetFont('courier','B',10);
					$pdf->SetFillColor(204,204,204);
    				$pdf->SetTextColor(0);
					$fill = true;
					$h=8;
					$pdf->Cell($w[0],$h,'No','TB',0,'C',$fill);
					$pdf->Cell($w[1],$h,'Mata Kuliah','TB',0,'C',$fill);
					$pdf->Cell($w[2],$h,'SKS','TB',0,'C',$fill);
					$pdf->Cell($w[3],$h,'Hari','TB',0,'C',$fill);
					$pdf->Cell($w[4],$h,'Pukul','TB',0,'C',$fill);
					$pdf->Cell($w[5],$h,'Ruang','TB',0,'C',$fill);
					$pdf->Cell($w[6],$h,'Dosen','TB',0,'C',$fill);
					$pdf->Ln();

					//data
					//$pdf->SetFillColor(224,235,255);
					$h = 7;
					$pdf->SetFont('helvetica','',8);
					$pdf->SetFillColor(204,204,204);
    				$pdf->SetTextColor(0);
					$fill = false;
					$no=1;
					$jmlsks = 0;
					foreach($q->result() as $row)
					{
						$pdf->Cell($w[0],$h,$no,0,0,'C',$fill);
						$pdf->Cell($w[1],$h,'['.$row->kd_mk.'] '.$row->nama_mk,0,0,'L',$fill);
						$pdf->Cell($w[2],$h,$row->sks,0,0,'C',$fill);
						$pdf->Cell($w[3],$h,$row->hari,0,0,'L',$fill);
						$pdf->Cell($w[4],$h,$row->pukul,0,0,'C',$fill);
						$pdf->Cell($w[5],$h,$row->ruang,0,0,'C',$fill);
						$pdf->Cell($w[6],$h,$row->nm_dosen,0,0,'L',$fill);
						$pdf->Ln();
						//$fill = !$fill;
						$jmlsks = $jmlsks+$row->sks;
						$no++;
					}
					// Closing line
					$pdf->SetFont('courier','B',11);
					$pdf->Cell(array_sum($w),0,'','T');
					$pdf->Ln();
					$pdf->SetFillColor(204,204,204);
    				$pdf->SetTextColor(0);
					$fill = true;
					$pdf->Cell(85,$h,'Jumlah SKS :','TB',0,'R',$fill);
					$pdf->Cell(10,$h, $jmlsks,'TB',0,'C',$fill);
					$pdf->Cell(95,$h, '','TB',0,'C',$fill);

					$pdf->SetFont('courier','',11);
					$pdf->Ln(10);
					$h = 5;
					$pdf->Cell(50,$h,'Menyetujui',0,0,'C');
					$pdf->SetX(110);
					$pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),0,1,'C');
					$pdf->Cell(50,$h,'Ketua Program Studi,',0,0,'C');
					$pdf->SetX(110);
					$pdf->Cell(100,$h,'Mahasiswa',0,1,'C');
					$pdf->Ln(20);
					$pdf->Cell(50,$h,$nama_ka_prodi,0,0,'C');
					$pdf->SetX(110);
					$pdf->Cell(100,$h,$nama,0,1,'C');
					$pdf->Cell(50,$h,'NBM : '.$nik_ka_prodi,0,0,'C');
					$pdf->SetX(110);
					$pdf->Cell(100,$h,'NIM :'.$nim,0,1,'C');
				//}

				//}
				$pdf->Output('KRS_'.$th_akademik.'_'.$smt.'_'.$nim.'.pdf','I');

      }
    }else {
      redirect('login','refresh');
    }
  }

}
