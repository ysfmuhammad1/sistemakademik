<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_dosen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_data');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
    $data=array(
      'tgl'       => hari_ini(date('w')),
      'tgl_indo'  => tgl_indo(date('Y-m-d')),
      'class'     => 'lap_dosen',
      'judul'     => 'Laporan',
      'sub_judul' => 'Dosen',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      // 'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      // 'statusmhs'   => $this->M_data->getStatusMhs(),
      'pendidikan' =>$this->M_data->jenjang_pendidikan(),
      'konten'    =>'laporan/v_dosen'
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
      $kd_prodi=$this->input->post('kd_prodi');
      $pendidikan=$this->input->post('pendidikan');
      $q['data']=$this->M_data->getLapDosen($kd_prodi,$pendidikan);
      // if ($q->num_rows() >0) {
        echo ($this->load->view('laporan/v_lap_mk', $q,TRUE));

      // }
    }else{
      redirect('login','refresh');
    }
  }

  function cetak(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $kd_prodi=$this->input->post('kd_prodi');
      $pendidikan=$this->input->post('pendidikan');
      $q=$this->M_data->getLapDosen($kd_prodi,$pendidikan);
      // if ($q->num_rows() >0) {
      $pdf=new PDF();
      $pdf->setKriteria("cetak_laporan");
      $pdf->setNama("CETAK LAPORAN");
      $pdf->AliasNbPages();
      $pdf->AddPage("L","A4");
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
        $pdf->Cell(290,4,'Laporan Dosen',0,1,'C');
        $pdf->Ln(5);

        $w = array(10,30,20,20,85,10,30,70);

        //Header
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell($w[0],$h,'No',1,0,'C');
        $pdf->Cell($w[1],$h,'PRODI',1,0,'C');
        $pdf->Cell($w[2],$h,'Kode',1,0,'C');
        $pdf->Cell($w[3],$h,'NIDN',1,0,'C');
        $pdf->Cell($w[4],$h,'NAMA',1,0,'C');
        $pdf->Cell($w[5],$h,'L/P',1,0,'C');
        $pdf->Cell($w[6],$h,'HP',1,0,'C');
        $pdf->Cell($w[7],$h,'Pendidikan',1,0,'C');
        $pdf->Ln();

        //data
        //$pdf->SetFillColor(224,235,255);
        $pdf->SetFont('Arial','',9);
        $pdf->SetFillColor(204,204,204);
          $pdf->SetTextColor(0);
        $fill = false;
        $no=1;
        foreach($q->result() as $row)
        {
          $prodi = $this->M_data->nama_prodi($row->kd_prodi);
          $pdf->Cell($w[0],$h,$no,'LR',0,'C',$fill);
          $pdf->Cell($w[1],$h,$prodi,'LR',0,'L',$fill);
          $pdf->Cell($w[2],$h,$row->kd_dosen,'LR',0,'C',$fill);
          $pdf->Cell($w[3],$h,$row->nidn,'LR',0,'C',$fill);
          $pdf->Cell($w[4],$h,$row->nama_dosen,'LR',0,'L',$fill);
          $pdf->Cell($w[5],$h,$row->sex,'LR',0,'C',$fill);
          $pdf->Cell($w[6],$h,$row->hp,'LR',0,'L',$fill);
          $pdf->Cell($w[7],$h,$row->pendidikan.'-'.$row->prodi_dosen,'LR',0,'L',$fill);
          $pdf->Ln();
          $fill = !$fill;
          $no++;
        }
        // Closing line
        $pdf->Cell(array_sum($w),0,'','T');
        $pdf->Ln(10);
        $pdf->SetX(200);
        $pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),'C');
        $pdf->Ln(20);
        $pdf->SetX(200);
        $pdf->Cell(100,$h,'___________________','C');
      //}

      //}
      $pdf->Output('Lap_Dosen.pdf','I');
      // }
    }else{
      redirect('login','refresh');
    }
  }

}
