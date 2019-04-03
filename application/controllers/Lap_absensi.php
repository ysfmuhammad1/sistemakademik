<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_absensi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_data');
    $this->load->model('M_dosen');
    $this->load->model('M_mahasiswa');
  }

  function index()
  {
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
    $data=array(
      'tgl'       => hari_ini(date('w')),
      'tgl_indo'  => tgl_indo(date('Y-m-d')),
      'class'     => 'lap_absen',
      'judul'     => 'Laporan',
      'sub_judul' => 'Absen',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      'konten'    =>'laporan/v_absen'
    );
    $this->load->view('v_home',$data);
    }else{
      redirect('login','refresh');
    }
  }

  function cari_mata_kuliah(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $id = array(
        'th_akademik' => $this->input->post('th_akademik'),
        'kd_prodi' => $this->input->post('kd_prodi'),
        'semester' => strtolower(substr($this->input->post('th_akademik'),10,5))
      );
      $q=$this->db->get_where('tb_jadwal', $id);
      if ($q->num_rows() > 0) {
        ?>
        <option value="">--Pilih Mata Kuliah</option>
        <?php
        foreach ($q->result() as $rs) {
          $nama_mk=$this->M_data->cari_nama_mk($rs->kd_mk);
          $nama_dosen=$this->M_dosen->cari_nama_dosen($rs->kd_dosen);
          ?>
          <!-- <option value="<?php echo $rs->id_jadwal;?>"></option> -->
          <option value="<?php echo $rs->id_jadwal;?>"><?php echo $rs->kd_mk;?> - <?php echo $nama_mk;?> - <?php echo $rs->kd_dosen;?> - <?php echo $nama_dosen;?> - <?php echo $rs->hari.' - '.$rs->pukul.' - '.$rs->ruang;?></option>
          <?php
        }
      }else {
        ?>
        <option value="">--Pilih--</option>
        <?php
      }
    }else{
      redirect('login','refresh');
    }
  }

  function cari_data(){
    $cek=$this->session->userdata('logged_in');
    $level=$this->session->userdata('level');
    if(!empty($cek) && $level =='admin'){
      $th_akademik=$this->input->post('th_akademik');
      $smt=strtolower(substr($this->input->post('th_akademik'),10,5));
      $kd_prodi=$this->input->post('kd_prodi');
      $id_jadwal=$this->input->post('id_jadwal');
      $q=$this->M_data->getLapAbsen($th_akademik,$smt,$kd_prodi,$id_jadwal);
      if ($q->num_rows() > 0) {
        # code...
        $dt['data']=$q;
        echo ($this->load->view('laporan/v_lap_absen', $dt,TRUE));
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
      $smt=strtolower(substr($this->input->post('th_akademik'),10,5));
      $kd_prodi=$this->input->post('kd_prodi');
      $id_jadwal=$this->input->post('id_jadwal');
      $q=$this->M_data->getLapAbsen($th_akademik,$smt,$kd_prodi,$id_jadwal);
      if ($q->num_rows() > 0) {
        foreach($q->result() as $dt){
          $th_ak 	= $dt->th_akademik;
          $smt 	= $dt->semester;
          $kd_dosen 	= $dt->kd_dosen;
          $nama_dosen = $dt->nm_dosen;
          $kd_mk	= $dt->kd_mk;
          $nama_mk = $dt->nama_mk;
          $sks = $dt->sks;
          $hari = $dt->hari;
          $pukul = $dt->pukul;
          $ruang = $dt->ruang;
          $kaprodi=$dt->kaprodi;
        }

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
          $w = 290;
          $pdf->SetFont('Times','B',18);
          $pdf->Cell($w,$h,$this->config->item('nama_pendek'),0,1,'C');
          $pdf->SetFont('Times','B',14);
          $pdf->Cell($w,$h,$this->config->item('nama_instansi'),0,1,'C');
          $pdf->SetFont('Times','',10);
          $pdf->Cell($w,4,'Alamat : '.$this->config->item('alamat_instansi'),0,1,'C');
          $pdf->Ln(8);

          //Column widths
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell($w,$h,'ABSENSI MAHASISWA',0,1,'C');
          $pdf->Cell($w,$h,$th_ak.' - '.strtoupper($smt),0,1,'C');
          $pdf->Ln(5);

          $h = 6;

          $pdf->SetFont('Arial','',12);
          $pdf->Cell(30,$h,'Mata Kuliah',0,0,'L');
          $pdf->Cell(50,$h,': '.$kd_mk.'-'.$nama_mk,0,0,'L');
          $pdf->SetX(180);
          $pdf->Cell(35,$h,'Hari / Pukul',0,0,'L');
          $pdf->Cell(50,$h,': '.$hari.', '.$pukul,0,1,'L');

          $pdf->SetFont('Arial','',12);
          $pdf->Cell(30,$h,'Nama Dosen',0,0,'L');
          $pdf->Cell(50,$h,': '.strtoupper($nama_dosen),0,0,'L');
          $pdf->SetX(180);
          $pdf->Cell(35,$h,'Ruang ',0,0,'L');
          $pdf->Cell(50,$h,': '.strtoupper($ruang),0,1,'L');


          $l=10;
          $w = array(10,30,60,$l,$l,$l,$l,$l,$l,15,$l,$l,$l,$l,$l,$l,15,25);

          //Header

          $pdf->SetFont('Arial','B',11);
          $pdf->SetFillColor(204,204,204);
            $pdf->SetTextColor(0);
          $fill = true;
          $h=8;
          $pdf->Cell($w[0],$h,'No',1,0,'C',$fill);
          $pdf->Cell($w[1],$h,'NIM',1,0,'C',$fill);
          $pdf->Cell($w[2],$h,'NAMA MAHASISWA',1,0,'C',$fill);
          $pdf->Cell($w[3],$h,'1',1,0,'C',$fill);
          $pdf->Cell($w[4],$h,'2',1,0,'C',$fill);
          $pdf->Cell($w[5],$h,'3',1,0,'C',$fill);
          $pdf->Cell($w[6],$h,'4',1,0,'C',$fill);
          $pdf->Cell($w[7],$h,'5',1,0,'C',$fill);
          $pdf->Cell($w[8],$h,'6',1,0,'C',$fill);
          $pdf->Cell($w[9],$h,'UTS',1,0,'C',$fill);
          $pdf->Cell($w[10],$h,'8',1,0,'C',$fill);
          $pdf->Cell($w[11],$h,'9',1,0,'C',$fill);
          $pdf->Cell($w[12],$h,'10',1,0,'C',$fill);
          $pdf->Cell($w[13],$h,'11',1,0,'C',$fill);
          $pdf->Cell($w[14],$h,'12',1,0,'C',$fill);
          $pdf->Cell($w[15],$h,'13',1,0,'C',$fill);
          $pdf->Cell($w[16],$h,'UAS',1,0,'C',$fill);
          $pdf->Cell($w[17],$h,'KET',1,0,'C',$fill);
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
          foreach($q->result() as $row)
          {
            $nama_mhs = $this->M_mahasiswa->cari_nama_mhs($row->nim);
            $pdf->Cell($w[0],$h,$no,1,0,'C');
            $pdf->Cell($w[1],$h,$row->nim,1,0,'C');
            $pdf->Cell($w[2],$h,strtoupper($nama_mhs),1,0,'L');
            $pdf->Cell($w[3],$h,'',1,0,'C');
            $pdf->Cell($w[4],$h,'',1,0,'C');
            $pdf->Cell($w[5],$h,'',1,0,'C');
            $pdf->Cell($w[6],$h,'',1,0,'C');
            $pdf->Cell($w[7],$h,'',1,0,'C');
            $pdf->Cell($w[8],$h,'',1,0,'C');
            $pdf->Cell($w[9],$h,'',1,0,'C');
            $pdf->Cell($w[10],$h,'',1,0,'C');
            $pdf->Cell($w[11],$h,'',1,0,'C');
            $pdf->Cell($w[12],$h,'',1,0,'C');
            $pdf->Cell($w[13],$h,'',1,0,'C');
            $pdf->Cell($w[14],$h,'',1,0,'C');
            $pdf->Cell($w[15],$h,'',1,0,'C');
            $pdf->Cell($w[16],$h,'',1,0,'C');
            $pdf->Cell($w[17],$h,'',1,0,'C');

            $pdf->Ln();
            $fill = !$fill;
            $no++;
          }
          // Closing line
          $pdf->Cell(array_sum($w),0,'','T');


          $pdf->Ln(10);
          $h = 5;
          $pdf->Cell(50,$h,'Menyetujui',0,0,'C');
          $pdf->SetX(160);
          $pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),0,1,'C');
          $pdf->Cell(50,$h,'Ketua Program Studi,',0,0,'C');
          $pdf->SetX(160);
          $pdf->Cell(100,$h,'Dosen Pengampu,',0,1,'C');
          $pdf->Ln(20);
          $pdf->Cell(50,$h,$kaprodi,0,0,'C');
          $pdf->SetX(160);
          $pdf->Cell(100,$h,$nama_dosen,0,1,'C');
          $pdf->Cell(50,$h,'NIP : ',0,0,'L');
          $pdf->SetX(160);
          $pdf->Cell(100,$h,$kd_dosen,0,1,'C');
        //}

        //}
        $pdf->Output('ABSENSI_'.$th_ak.'_'.$smt.'_'.$kd_dosen.'.pdf','I');

      }
    }else{
      redirect('login','refresh');
    }
  }

}
