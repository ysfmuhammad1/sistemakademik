<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_mahasiswa extends CI_Controller{

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
        'class'     => 'lap_mhs',
        'judul'     => 'Laporan',
        'sub_judul' => 'Mahasiswa',
        'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
        // 'data_nilai'=>  $this->M_nilai->getDataNilai(),
        'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
        'dataprodi' =>$this->M_data->getFieldProdi(),
        'statusmhs'   => $this->M_data->getStatusMhs(),
        'konten'    =>'laporan/v_mahasiswa'
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
      $th_akademik = $this->input->post('th_akademik');
      $kd_prodi = $this->input->post('kd_prodi');
      $status = $this->input->post('status');
      $q['data']=$this->M_data->getLapMhs($kd_prodi,$status,$th_akademik);
      // if ($q->num_rows() >0) {
        // var_dump($q);
        echo ($this->load->view('laporan/v_lap_mhs', $q,TRUE));
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
      $status=$this->input->post('status');
      $th_akademik=$this->input->post('th_akademik');
      $q=$this->M_data->getLapMhs($kd_prodi,$status,$th_akademik);
      if ($q->num_rows() > 0) {
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
          $pdf->Cell(290,4,'Laporan Mahasiswa',0,1,'C');
          $pdf->Ln(5);

          $w = array(10,25,30,30,80,10,30,35,25);

          //Header
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell($w[0],$h,'No',1,0,'C');
          $pdf->Cell($w[1],$h,'Th Akademik',1,0,'C');
          $pdf->Cell($w[2],$h,'PRODI',1,0,'C');
          $pdf->Cell($w[3],$h,'NIM',1,0,'C');
          $pdf->Cell($w[4],$h,'NAMA',1,0,'C');
          $pdf->Cell($w[5],$h,'L/P',1,0,'C');
          $pdf->Cell($w[6],$h,'HP',1,0,'C');
          $pdf->Cell($w[7],$h,'Kota',1,0,'C');
          $pdf->Cell($w[8],$h,'Status',1,0,'C');
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
            $pdf->Cell($w[1],$h,$row->th_akademik,'LR',0,'C',$fill);
            $pdf->Cell($w[2],$h,$prodi,'LR',0,'L',$fill);
            $pdf->Cell($w[3],$h,$row->nim,'LR',0,'C',$fill);
            $pdf->Cell($w[4],$h,$row->nama_mhs,'LR',0,'L',$fill);
            $pdf->Cell($w[5],$h,$row->sex,'LR',0,'C',$fill);
            $pdf->Cell($w[6],$h,$row->hp,'LR',0,'L',$fill);
            $pdf->Cell($w[7],$h,$row->kota,'LR',0,'L',$fill);
            $pdf->Cell($w[8],$h,$row->status,'LR',0,'C',$fill);
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
        $pdf->Output('Lap_Mahasiswa.pdf','I');

      }
      else {
        redirect('lap_mahasiswa','refresh');
      }
    }else{
      redirect('login','refresh');
    }
  }

}
