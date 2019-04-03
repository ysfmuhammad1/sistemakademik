<div class="tabbable">
  <ul class="nav nav-tabs padding-18">

    <li class="active">
      <a href="#profil" data-toggle="tab">
        <i class="fa fa-user bigger-120 green"></i> Profil
      </a>
    </li>
    <li>
      <a href="#ortu" data-toggle="tab">
        <i class="fa fa-home bigger-120 red"></i>
        Orang Tua
      </a>
    </li>
    <li>
      <a href="#nilai" data-toggle="tab">
        <i class="fa fa-book bigger-120 blue"></i>
        Nilai
      </a>
    </li>
    <li>
      <a href="#transkrip" data-toggle="tab">
        <i class="fa fa-list-alt bigger-120 green"></i>
        Transkrip Nilai
      </a>
    </li>
    <li>
      <a href="#grafik" data-toggle="tab">
        <i class="fa fa-bar-chart bigger-120 red"></i>
        Grafik IPK
      </a>
    </li>
    <!--<li>
      <a href="#history" data-toggle="tab">
        <i class="fa fa-history bigger-120 blue"></i>
        History
      </a>
    </li>-->

  </ul>
</div>

<div class="tab-content">

  <div class="tab-pane in active" id="profil">
    <?php $this->load->view('mahasiswa/tab_view/profil'); ?>
  </div>
  <div class="tab-pane" id="ortu">
    <?php $this->load->view('mahasiswa/tab_view/ortu'); ?>
  </div>
  <div class="tab-pane" id="nilai">
    <?php $this->load->view('mahasiswa/tab_view/nilai'); ?>
  </div>
  <div class="tab-pane" id="transkrip">
    <?php $this->load->view('mahasiswa/tab_view/transkrip'); ?>
  </div>

  <div class="tab-pane" id="grafik">
    <?php $this->load->view('mahasiswa/tab_view/grafik'); ?>
  </div>
  <!--<div class="tab-pane" id="history">
    <?php //$this->load->view('mahasiswa/tab_view/history'); ?>
  </div>-->

</div>
