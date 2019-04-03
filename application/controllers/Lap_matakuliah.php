<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_matakuliah extends CI_Controller{

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
    if(!empty($cek) && $level =='admin'){
    $data=array(
      'tgl'       => hari_ini(date('w')),
      'tgl_indo'  => tgl_indo(date('Y-m-d')),
      'class'     => 'lap_mk',
      'judul'     => 'Laporan',
      'sub_judul' => 'Mata Kuliah',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      'konten'    =>'laporan/v_matakuliah'
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
      $smt=$this->input->post('smt');
      $kd_prodi=$this->input->post('kd_prodi');
      $q['data']=$this->M_data->getLapMk($kd_prodi,$smt);
      // if ($q->num_rows() >0) {
        # code...
        echo ($this->load->view('laporan/v_lap_mk', $q, TRUE));
      // }
    }else{
      redirect('login','refresh');
    }
  }

  function cetak(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $smt=$this->input->post('smt');
      $kd_prodi=$this->input->post('kd_prodi');
      $q=$this->M_data->getLapMk($kd_prodi,$smt);
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
          $pdf->SetFont('Times','B',14);
          $pdf->SetX(6);
          $pdf->Cell(198,4,$this->config->item('nama_instansi'),0,1,'L');
          $pdf->SetX(6);
          $pdf->SetFont('Times','',10);
          $pdf->Cell(198,4,'Alamat : '.$this->config->item('alamat_instansi'),0,1,'L');
          $pdf->Ln(5);

          //Column widths
          $pdf->SetFont('Arial','B',14);
          $pdf->SetX(6);
          $pdf->Cell(210,4,'DAFTAR MATA KULIAH',0,1,'C');
          $pdf->Ln(5);

          $w = array(10,30,30,100,10,10);

          //Header
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell($w[0],$h,'No',1,0,'C');
          $pdf->Cell($w[1],$h,'PRODI',1,0,'C');
          $pdf->Cell($w[2],$h,'KODE',1,0,'C');
          $pdf->Cell($w[3],$h,'NAMA MATA KULIAH',1,0,'C');
          $pdf->Cell($w[4],$h,'SKS',1,0,'C');
          $pdf->Cell($w[5],$h,'SMT',1,0,'C');
          $pdf->Ln();

          //data
          //$pdf->SetFillColor(224,235,255);
          $pdf->SetFont('Arial','',9);
          $pdf->SetFillColor(204,204,204);
            $pdf->SetTextColor(0);
          $fill = false;
          $no=1;
          $t_sks = 0;
          foreach($q->result() as $row)
          {
            $prodi = $this->M_data->nama_prodi($row->kd_prodi);
            $pdf->Cell($w[0],$h,$no,'LR',0,'C',$fill);
            $pdf->Cell($w[1],$h,$prodi,'LR',0,'L',$fill);
            $pdf->Cell($w[2],$h,$row->kd_mk,'LR',0,'C',$fill);
            $pdf->Cell($w[3],$h,$row->nama_mk,'LR',0,'L',$fill);
            $pdf->Cell($w[4],$h,$row->sks,'LR',0,'C',$fill);
            $pdf->Cell($w[5],$h,$row->smt,'LR',0,'C',$fill);
            $pdf->Ln();
            $fill = !$fill;
            $no++;
            $t_sks = $t_sks+$row->sks;
          }
          // Closing line
          $pdf->Cell(array_sum($w),0,'','T');
          $pdf->Ln();
          $pdf->Cell(170,$h,'Total SKS',0,0,'C');
          $pdf->Cell(10,$h,$t_sks,0,0,'C');

          $pdf->Ln(10);
          $pdf->SetX(150);
          $pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),'C');
          $pdf->Ln(20);
          $pdf->SetX(150);
          $pdf->Cell(100,$h,'___________________','C');
        //}

        //}
        $pdf->Output('Lap_Mata_Kuliah.pdf','I');
      }
    }else{
      redirect('login','refresh');
    }
  }

}
