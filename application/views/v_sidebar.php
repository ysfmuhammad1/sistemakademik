<?php //require_once 'v_setNavbar.php'; ?>
<?php
if ($class=='home') {
  # code...
  $home='class="active"';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='master') {
  # code...
  $home='';
  $master='class="active"';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='master_prodi') {
  # code...
  $home='';
  $master='class="active open"';
    $master_prodi='class="active"';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';

}elseif ($class=='master_mk') {
  # code...
  $home='';
  $master='class="active open"';
    $master_prodi='';
    $master_mk='class="active"';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='master_dosen') {
  # code...
  $home='';
  $master='class="active open"';
    $master_prodi='';
    $master_mk='';
    $master_dosen='class="active"';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='master_mhs') {
  # code...
  $home='';
  $master='class="active open"';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='class="active"';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='transaksi') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active"';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='tran_jadwal') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active open"';
    $tran_jadwal='class="active"';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='tran_krs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active open"';
    $tran_jadwal='';
    $tran_krs='class="active"';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='tran_nilai') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active open"';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='class="active"';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='tran_mutasi_mhs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active open"';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='class="active"';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='tran_wisuda') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='class="active open"';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='class="active"';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='laporan') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_mhs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='class="active"';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_dosen') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='class="active"';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';

}elseif ($class=='lap_mk') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='class="active"';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';

}elseif ($class=='lap_krs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='class=active';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_absen') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='class="active"';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_nilai') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='class="active"';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_mutasi') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='class="active"';
    $lap_wisuda='';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='lap_wisuda') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='class="active open"';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='class="active"';
  $grafik='';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='grafik') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active"';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='gra_mhs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active open"';
    $gra_mhs='class="active"';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='gra_dosen') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active open"';
    $gra_mhs='';
    $gra_dosen='class="active"';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='gra_mhs_aktf'){
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active open"';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='class="active"';
    $gra_krs='';
    $gra_wisuda='';
}elseif ($class=='gra_krs') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active open"';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='class="active"';
    $gra_wisuda='';

}elseif ($class=='gra_wisuda') {
  # code...
  $home='';
  $master='';
    $master_prodi='';
    $master_mk='';
    $master_dosen='';
    $master_mhs='';
  $transaksi='';
    $tran_jadwal='';
    $tran_krs='';
    $tran_nilai='';
    $tran_mutasi_mhs='';
    $tran_wisuda='';
  $laporan='';
    $lap_mhs='';
    $lap_dosen='';
    $lap_mk='';
    $lap_krs='';
    $lap_absen='';
    $lap_nilai='';
    $lap_mutasi='';
    $lap_wisuda='';
  $grafik='class="active open"';
    $gra_mhs='';
    $gra_dosen='';
    $gra_mhs_aktf='';
    $gra_krs='';
    $gra_wisuda='class="active"';
}
 ?>

<script type="text/javascript">
  try{ace.settings.loadState('sidebar')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
  <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
    <i class="fa fa-calendar"></i>
    <?php echo $tgl .", ".$tgl_indo; ?>
  </div>
  <div class="" align="center">
    <img src="<?php echo base_url('assets/images/gallery/umpar.png')?>" width="80px">
    <h6><?php echo $this->config->item('nama_instansi');?></h6>
  </div>
</div><!-- /.sidebar-shortcuts -->


<ul class="nav nav-list">
  <li <?php echo $home; ?>>
    <a href="<?php echo site_url();?>home">
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> HOME  </span>
    </a>

    <b class="arrow"></b>
  </li>

  <li <?php echo $master; ?>>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-desktop"></i>
      <span class="menu-text">
        Master
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li <?php echo $master_prodi; ?>>
        <a href="<?php echo site_url('prodi');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Program Studi
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $master_mk; ?>>
        <a href="<?php echo site_url('matakuliah');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Mata Kuliah
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $master_dosen; ?>>
        <a href="<?php echo site_url();?>dosen">
          <i class="menu-icon fa fa-caret-right"></i>
          Dosen
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $master_mhs; ?>>
        <a href="<?php echo site_url();?>mahasiswa">
          <i class="menu-icon fa fa-caret-right"></i>
          Mahasiswa
        </a>

        <b class="arrow"></b>
      </li>
    </ul>
  </li>

  <li <?php echo $transaksi; ?>>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon glyphicon glyphicon-edit"></i>
      <span class="menu-text">
        Transanksi
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li <?php echo $tran_jadwal;?>>
        <a href="<?php echo site_url();?>jadwal">
          <i class="menu-icon fa fa-caret-right"></i>
          Jadwal Kuliah
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $tran_krs;?>>
        <a href="<?php echo site_url();?>krs">
          <i class="menu-icon fa fa-caret-right"></i>
          Kartu Rencana Studi (KRS)
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $tran_nilai;?>>
        <a href="<?php echo site_url();?>nilai">
          <i class="menu-icon fa fa-caret-right"></i>
          Nilai
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $tran_mutasi_mhs;?>>
        <a href="<?php echo site_url();?>mutasimhs">
          <i class="menu-icon fa fa-caret-right"></i>
          Mutasi Mahasiswa
        </a>

        <b class="arrow"></b>
      </li>

      <!-- <li <?php echo $tran_wisuda;?>>
        <a href="<?php echo site_url();?>wisuda">
          <i class="menu-icon fa fa-caret-right"></i>
          Wisuda
        </a>

        <b class="arrow"></b>
      </li> -->
    </ul>
  </li>

  <li <?php echo $laporan; ?>>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-print"></i>
      <span class="menu-text">
        Laporan
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li <?php echo $lap_mhs;?>>
        <a href="<?php echo site_url();?>lap_mahasiswa">
          <i class="menu-icon fa fa-caret-right"></i>
          Mahasiswa
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_dosen;?>>
        <a href="<?php echo site_url();?>lap_dosen">
          <i class="menu-icon fa fa-caret-right"></i>
          Dosen
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_mk;?>>
        <a href="<?php echo site_url();?>lap_matakuliah">
          <i class="menu-icon fa fa-caret-right"></i>
          Mata Kuliah
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_krs;?>>
        <a href="<?php echo site_url();?>lap_krs">
          <i class="menu-icon fa fa-caret-right"></i>
          KRS
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_absen;?>>
        <a href="<?php echo site_url();?>lap_absensi">
          <i class="menu-icon fa fa-caret-right"></i>
          Absensi
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_nilai;?>>
        <a href="<?php echo site_url();?>lap_nilai">
          <i class="menu-icon fa fa-caret-right"></i>
          Nilai
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $lap_mutasi;?>>
        <a href="<?php echo site_url();?>lap_mutasi">
          <i class="menu-icon fa fa-caret-right"></i>
          Mutasi Mahasiswa
        </a>

        <b class="arrow"></b>
      </li>

      <!-- <li <?php echo $lap_wisuda;?>>
        <a href="<?php echo site_url();?>lap_wisuda">
          <i class="menu-icon fa fa-caret-right"></i>
          Wisuda
        </a>

        <b class="arrow"></b>
      </li> -->
    </ul>
  </li>

  <!-- <li <?php echo $grafik; ?>>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-bar-chart-o"></i>
      <span class="menu-text">
        Grafik
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li <?php echo $gra_mhs; ?>>
        <a href="<?php echo site_url();?>grafik/mhs">
          <i class="menu-icon fa fa-caret-right"></i>
          Mahasiswa
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $gra_dosen; ?>>
        <a href="<?php echo site_url();?>grafik/dosen">
          <i class="menu-icon fa fa-caret-right"></i>
          Dosen
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $gra_mhs_aktf; ?>>
        <a href="<?php echo site_url();?>grafik/mhs_aktif">
          <i class="menu-icon fa fa-caret-right"></i>
          Mahasiswa Aktif
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $gra_krs; ?>>
        <a href="<?php echo site_url();?>grafik/krs">
          <i class="menu-icon fa fa-caret-right"></i>
          KRS
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $gra_wisuda; ?>>
        <a href="<?php echo site_url();?>grafik/wisuda">
          <i class="menu-icon fa fa-caret-right"></i>
          Wisuda
        </a>

        <b class="arrow"></b>
      </li>
    </ul>
  </li> -->

  <li class="">
    <a href="<?php echo site_url();?>login/logout">
      <i class="menu-icon fa fa-power-off"></i>
      <span class="menu-text"> Logout </span>
    </a>

    <b class="arrow"></b>
  </li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
  <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
