<?php

  function hari_ini($hari)
  {
    # code..
    date_default_timezone_set("Asia/Makassar");
    $pekan = array("Ahad","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
    $hari_ini=$pekan[$hari];
    return $hari_ini;
  }

  function getBulan($bln)
  {
    # code...
    switch ($bln) {
      case 1:
        # code...
        return 'Januari';
        break;
      case 2:
        # code...
        return 'Februari';
        break;
      case 3:
        # code...
        return 'Maret';
        break;
      case 4:
        # code...
        return 'April';
        break;
      case 5:
        # code...
        return 'Mei';
        break;
      case 6:
        # code...
        return 'Juni';
        break;
      case 7:
        # code...
        return 'Juli';
        break;
      case 8:
        # code...
        return 'Agustus';
        break;
      case 9:
        # code...
        return 'September';
        break;
      case 10:
        # code...
        return 'Oktober';
        break;
      case 11:
        # code...
        return 'November';
        break;
      case 12:
        # code...
        return 'Desember';
        break;
      default:
        # code...
        echo "Salah Input";
        break;
    }
  }

  function tgl_indo($date)
  {
    # code...
    $exp= explode('-',$date);
    $date="";
    if (count($exp) ==3) {
      # code...
      $bulan=getBulan($exp[1]);
      $data= $exp[2].' '.$bulan.' '.$exp[0];
    }
    return $data;
  }

  function max_sks($ip){

    if($ip>=3.00){
      $sks = 24;
    }elseif($ip>=2.50){
      $sks = 22;
    }elseif($ip>=2.00){
      $sks = 20;
    }elseif($ip>=1.50){
      $sks = 16;
    }elseif($ip>=1.00){
      $sks = 14;
    }else{
      $sks = 12;
    }
    return $sks;
    /*
    switch($ip){
      case 3.00:
        return 24;
        break;
      case 2.50:
        return 22;
        break;
      case 2.00:
        return 20;
        break;
      case 1.50:
        return 16;
        break;
      case 1.00:
        return 14;
        break;
      case 0.00:
        return 12;
        break;
    }
    */

  }

  function tgl_str($date)
  {
    # code...
    $exp = explode('-',$date);
    //    tahun       $bulan      hari
    $data= $exp[2].'-'.$exp[1].'-'.$exp[0];
      return $data;
    }

    function tgl_view($date)
    {
      # code...
      $exp=explode('-',$date);
      // $data=$exp[;]
    }

    function cari_smt()
    {
      date_default_timezone_set('Asia/Makassar');
      $bln=date('m');
      switch ($bln) {
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
          return 'genap';
          break;
        case 9:
        case 10:
        case 11:
        case 12:
        case 1:
        case 8:
          return 'ganjil';
          break;
      }
    }

    function cari_th_akademik()
    {
      date_default_timezone_set('Asia/Makassar');
      $th=date('Y');
      $smt=cari_smt();
      if ($smt=='ganjil') {
        $ket=1;
        $tha=$th.'/'.($th+1).'-Ganjil';
      }else {
        $ket=2;
        $tha=($th-1).'/'.$th.'-Genap';
      }
      // $hasil=$th.$ket;
      $hasil=$tha;
      return $hasil;
    }

 ?>
