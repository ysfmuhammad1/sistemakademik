<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_nilai extends CI_Controller{

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
      'class'     => 'lap_nilai',
      'judul'     => 'Laporan',
      'sub_judul' => 'Nilai',
      'foto_user' =>  $this->M_data->cari_foto_admin($this->session->userdata('id_admin')),
      'th_akademik_jadwal' => $this->M_data->getTh_akademik_jadwal(),
      'dataprodi' =>$this->M_data->getFieldProdi(),
      'konten'    =>'laporan/v_nilai'
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

      $q=$this->M_data->getLapNilai($th_akademik,$smt,$kd_prodi,$id_jadwal);
      if ($q->num_rows() > 0) {
        $dt['data']=$q;
        echo ($this->load->view('laporan/v_lap_nilai', $dt,TRUE));
      }else {
        echo "Data tidak ditemukan".$id_jadwal;
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
      $q=$this->M_data->getLapNilai($th_akademik,$smt,$kd_prodi,$id_jadwal);

      if ($q->num_rows() >0) {
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
				}

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
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell($w,$h,'NILAI AKHIR MAHASISWA',0,1,'C');
					$pdf->Cell($w,$h,$th_ak.' - '.strtoupper($smt),0,1,'C');
					$pdf->Ln(5);

					$h = 6;

					$pdf->SetFont('Arial','',12);
					$pdf->Cell(35,$h,'Mata Kuliah',0,0,'L');
					$pdf->Cell(50,$h,': '.$kd_mk.'-'.$nama_mk,0,1,'L');
					$pdf->Cell(35,$h,'Nama Dosen',0,0,'L');
					$pdf->Cell(50,$h,': '.$kd_dosen.'-'.strtoupper($nama_dosen),0,1,'L');
					//$pdf->SetX(180);
					$pdf->Cell(35,$h,'Hari / Pukul',0,0,'L');
					$pdf->Cell(50,$h,': '.$hari.', '.$pukul,0,1,'L');
					//$pdf->SetX(180);
					$pdf->Cell(35,$h,'Ruang ',0,0,'L');
					$pdf->Cell(50,$h,': '.strtoupper($ruang),0,1,'L');


					$l=10;
					$w = array(10,30,120,10,20);

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
					$pdf->Cell($w[4],$h,'NILAI',1,0,'C',$fill);
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
						$pdf->Cell($w[3],$h,$row->sex,1,0,'C');
						$pdf->Cell($w[4],$h,$row->nilai_akhir,1,0,'C');

						$pdf->Ln();
						$fill = !$fill;
						$no++;
					}
					// Closing line
					$pdf->Cell(array_sum($w),0,'','T');


					$pdf->Ln(10);
					$h = 5;
					$pdf->Cell(50,$h,'Menyetujui',0,0,'C');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,'Parepare, '.tgl_indo(date('Y-m-d')),0,1,'C');
					$pdf->Cell(50,$h,'Ketua Program Studi,',0,0,'C');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,'Dosen Pengampu,',0,1,'C');
					$pdf->Ln(20);
					$pdf->Cell(50,$h,'_______________________',0,0,'C');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,$nama_dosen,0,1,'C');
					$pdf->Cell(50,$h,'NIP : ',0,0,'L');
					$pdf->SetX(120);
					$pdf->Cell(100,$h,$kd_dosen,0,1,'C');
				//}

				//}
				$pdf->Output('NILAI_'.$th_ak.'_'.$smt.'_'.$kd_dosen.'.pdf','I');
      }
    }else{
      redirect('login','refresh');
    }
  }

}
