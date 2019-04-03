<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_mutasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    // $this->load->model('M_dosen');
    // $this->load->model('M_mahasiswa');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
    $data=array(
      'tgl'       => hari_ini(date('w')),
      'tgl_indo'  => tgl_indo(date('Y-m-d')),
      'class'     => 'lap_mutasi',
      'judul'     => 'Laporan',
      'sub_judul' => 'Mutasi',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      'konten'    =>'laporan/v_mutasi'
    );
    $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }
  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $th_akademik=$this->input->post('th_akademik');
      $semester=strtolower(substr($this->input->post('th_akademik'),10,5));
      $kd_prodi=$this->input->post('kd_prodi');
      $q=$this->M_data->getLapMutasi($th_akademik,$semester,$kd_prodi);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('laporan/v_lap_mutasi', $dt,TRUE));
      }
    }else{
      redirect('login','refresh');
    }
  }

  function print_pdf(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $th_akademik=$this->input->post('th_akademik');
      $semester=strtolower(substr($this->input->post('th_akademik'),10,5));
      $kd_prodi=$this->input->post('kd_prodi');
      $q=$this->M_data->getLapMutasi($th_akademik,$semester,$kd_prodi);
      if ($q->num_rows() > 0) {

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

					$h = 7;
					$w = 190;
					$pdf->SetFont('Times','B',18);
					$pdf->Cell($w,$h,$this->config->item('nama_pendek'),0,1,'C');
					$pdf->SetFont('Times','B',14);
					$pdf->Cell($w,$h,$this->config->item('nama_instansi'),0,1,'C');
					$pdf->SetFont('Times','',10);
					$pdf->Cell($w,4,'Alamat : '.$this->config->item('alamat_instansi'),0,1,'C');
					$pdf->Ln(8);

					//Column widths
					$h= 5;
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell($w,$h,'MUTASI MAHASISWA',0,1,'C');
					$pdf->Cell($w,$h,$th_akademik.' - '.strtoupper($semester),0,1,'C');
					$pdf->Ln(5);


					$l=10;
					$w = array(10,30,80,10,40,20);

					//Header

					$pdf->SetFont('Arial','B',11);
					$pdf->SetFillColor(204,204,204);
    				$pdf->SetTextColor(0);
					$fill = true;
					$h=8;
					$pdf->Cell($w[0],$h,'No',1,0,'C',$fill);
					$pdf->Cell($w[1],$h,'NIM',1,0,'C',$fill);
					$pdf->Cell($w[2],$h,'NAMA MAHASISWA',1,0,'C',$fill);
					$pdf->Cell($w[3],$h,'L/P',1,0,'C',$fill);
					$pdf->Cell($w[4],$h,'TANGGAL',1,0,'C',$fill);
					$pdf->Cell($w[5],$h,'STATUS',1,0,'C',$fill);
					$pdf->Ln();

					//data
					//$pdf->SetFillColor(224,235,255);
					$h = 7;
					$pdf->SetFont('Arial','',9);
					$pdf->SetFillColor(204,204,204);
    				$pdf->SetTextColor(0);
					$fill = false;
					$no=1;
					$jmlsks = 0;
					foreach($q->result() as $row){
						$tgl = tgl_indo($row->tgl_mutasi);
						$pdf->Cell($w[0],$h,$no,1,0,'C');
						$pdf->Cell($w[1],$h,$row->nim,1,0,'C');
						$pdf->Cell($w[2],$h,strtoupper($row->nama_mhs),1,0,'L');
						$pdf->Cell($w[3],$h,$row->sex,1,0,'C');
						$pdf->Cell($w[4],$h,$tgl,1,0,'C');
						$pdf->Cell($w[5],$h,$row->status,1,0,'C');

						$pdf->Ln();
						$fill = !$fill;
						$no++;
					}
					// Closing line
					$pdf->Cell(array_sum($w),0,'','T');


					$pdf->Ln(10);
					$h = 5;
					//$pdf->Cell(50,$h,'Menyetujui',0,0,'C');
					$pdf->SetX(120);
          $pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),0,1,'C');
					//$pdf->Cell(50,$h,'Ketua Program Studi,',0,0,'C');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,'Bagian Akademik,',0,1,'C');
					$pdf->Ln(20);
					//$pdf->Cell(50,$h,'_______________________',0,0,'C');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,'_____________________',0,1,'C');
					//$pdf->Cell(50,$h,'NIP : ',0,0,'L');
					$pdf->SetX(150);
					$pdf->Cell(100,$h,'NIP :',0,1,'L');
				//}

				//}
				$pdf->Output('MUTASI_MAHASISWA_'.$th_akademik.'_'.$semester.'.pdf','I');
      }
      else {
        redirect('lap_mutasi','refresh');
      }
    }else{
      redirect('login','refresh');
    }
  }

}
