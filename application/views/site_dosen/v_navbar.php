<div class="navbar-container ace-save-state" id="navbar-container">
  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
    <span class="sr-only">Toggle sidebar</span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>
  </button>

  <div class="navbar-header pull-left">
    <a href="<?php echo site_url('site_dosen/home');?>" class="navbar-brand">
      <small>
        <i class="fa fa-users"></i>
        <?php echo $this->config->item('nama_aplikasi'); ?>
      </small>
    </a>
  </div>

  <div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">

      <li class="light-blue dropdown-modal">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
          <img class="nav-user-photo" src="<?php echo base_url();?>assets/images/foto_dosen/<?php echo $foto_user;//echo $this->M_data->cari_foto_admin($this->session->userdata('id_admin'));?>" alt="Jason's Photo" />
          <span class="user-info">
            <small>Welcome,</small>
            <?php echo $this->session->userdata('nama_lengkap'); ?>
          </span>

          <i class="ace-icon fa fa-caret-down"></i>
        </a>

        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
          <!-- <li>
            <a href="#">
              <i class="ace-icon fa fa-cog"></i>
              Settings
            </a>
          </li> -->

          <li>
            <a href="<?php echo site_url('site_dosen/profil');?>">
              <i class="ace-icon fa fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="divider"></li>

          <li>
            <a href="<?php echo site_url();?>login/logout">
              <i class="ace-icon fa fa-power-off"></i>
              Logout
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div><!-- /.navbar-container -->
