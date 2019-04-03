<?php //require_once 'v_setNavbar.php'; ?>
<?php
if ($class=='home') {
  # code...
  $home='class="active"';
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
    $akademik_ipk='';
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
}elseif ($class=='akademik') {
  # code...
  $home='';
  $akademik='class="active"';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
    $akademik_ipk='';
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
}elseif ($class=='akademik_isikrs') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='class="active"';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
    $akademik_ipk='';
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

}elseif ($class=='akademik_krs') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='';
    $akademik_krs='class="active"';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
    $akademik_ipk='';
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

}elseif ($class=='akademik_mk') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='class="active"';
    $akademik_jadwal='';
    $akademik_khs='';
    $akademik_ipk='';
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
}elseif ($class=='akademik_jadwal') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='class="active"';
    $akademik_khs='';
    $akademik_ipk='';
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
}elseif ($class=='akademik_khs') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='class="active"';
    $akademik_ipk='"';
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
}elseif ($class=='akademik_ipk') {
  # code...
  $home='';
  $akademik='class="active open"';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='"';
    $akademik_ipk='class="active"';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_krs='';
    $akademik_isikrs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_krs='';
    $akademik_isikrs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_krs='';
    $akademik_isikrs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_krs='';
    $akademik_isikrs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
  $akademik='';
    $akademik_isikrs='';
    $akademik_krs='';
    $akademik_mk='';
    $akademik_jadwal='';
    $akademik_khs='';
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
    <?php echo hari_ini(date('w')) .", ".tgl_indo(date('Y-m-d')); ?>
  </div>
  <div class="" align="center">
    <img src="<?php echo base_url('assets/images/gallery/umpar.png')?>" width="80px">
    <h6><?php echo $this->config->item('nama_instansi');?></h6>
  </div>
</div><!-- /.sidebar-shortcuts -->


<ul class="nav nav-list">
  <li <?php echo $home; ?>>
    <a href="<?php echo site_url();?>site_mahasiswa/home">
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>

    <b class="arrow"></b>
  </li>

  <li <?php echo $akademik; ?>>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-desktop"></i>
      <span class="menu-text">
        Akademik
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">


      <li <?php echo $akademik_mk; ?>>
        <a href="<?php echo site_url('site_mahasiswa/matakuliah');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Mata Kuliah
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $akademik_isikrs; ?>>
        <a href="<?php echo site_url('site_mahasiswa/isi_krs');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Isi KRS
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $akademik_krs; ?>>
        <a href="<?php echo site_url('site_mahasiswa/krs');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Lihat KRS
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $akademik_jadwal; ?>>
        <a href="<?php echo site_url('site_mahasiswa/jadwal');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Jadwal
        </a>

        <b class="arrow"></b>
      </li>

      <li <?php echo $akademik_khs; ?>>
        <a href="<?php echo site_url('site_mahasiswa/khs');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Lihat KHS
        </a>

        <b class="arrow"></b>
      </li>
      <li <?php echo $akademik_ipk; ?>>
        <a href="<?php echo site_url('site_mahasiswa/grafik_ipk');?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Grafik IPK
        </a>

        <b class="arrow"></b>
      </li>
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
