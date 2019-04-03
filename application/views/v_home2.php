<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from endlesstheme.com/Perfect_Admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2017 03:15:55 GMT -->
<head>
    <meta charset="utf-8">
    <title>Perfect Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?php echo base_url('css/font-awesome.min.css');?>" rel="stylesheet">

	<!-- Pace -->
	<link href="<?php echo base_url('css/pace.css');?>" rel="stylesheet">

	<!-- Color box -->
	<link href="<?php echo base_url('css/colorbox/colorbox.css');?>" rel="stylesheet">

	<!-- Morris -->
	<link href="<?php echo base_url('css/morris.css');?>" rel="stylesheet"/>

	<!-- Perfect -->
	<link href="<?php echo base_url('css/app.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('css/app-skin.css');?>" rel="stylesheet">


      <!-- Le javascript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->

  	<!-- Jquery -->
  	<script src="<?php echo base_url('js/jquery-1.10.2.min.js');?>"></script>

  	<!-- Bootstrap -->
      <script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>

  	<!-- Flot -->
  	<script src='<?php echo base_url('js/jquery.flot.min.js');?>'></script>

  	<!-- Morris -->
  	<script src='<?php echo base_url('js/rapheal.min.js');?>'></script>
  	<script src='<?php echo base_url('js/morris.min.js');?>'></script>

  	<!-- Colorbox -->
  	<script src='<?php echo base_url('js/jquery.colorbox.min.js');?>'></script>

  	<!-- Sparkline -->
  	<script src='<?php echo base_url('js/jquery.sparkline.min.js');?>'></script>

  	<!-- Pace -->
  	<script src='<?php echo base_url('js/uncompressed/pace.js');?>'></script>

  	<!-- Popup Overlay -->
  	<script src='<?php echo base_url('js/jquery.popupoverlay.min.js');?>'></script>

  	<!-- Slimscroll -->
  	<script src='<?php echo base_url('js/jquery.slimscroll.min.js');?>'></script>

  	<!-- Modernizr -->
  	<script src='<?php echo base_url('js/modernizr.min.js');?>'></script>

  	<!-- Cookie -->
  	<script src='<?php echo base_url('js/jquery.cookie.min.js');?>'></script>

  	<!-- Perfect -->
  	<script src="<?php echo base_url('js/app/app_dashboard.js');?>"></script>
  	<script src="<?php echo base_url('js/app/app.js');?>"></script>


  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>

	<a href="#" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
	<div id="theme-setting">
		<div class="title">
			<strong class="no-margin">Skin Color</strong>
		</div>
		<div class="theme-box">
			<a class="theme-color" style="background:#323447" id="default"></a>
			<a class="theme-color" style="background:#efefef" id="skin-1"></a>
			<a class="theme-color" style="background:#a93922" id="skin-2"></a>
			<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
			<a class="theme-color" style="background:#635247" id="skin-4"></a>
			<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
			<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
		</div>
		<div class="title">
			<strong class="no-margin">Sidebar Menu</strong>
		</div>
		<div class="theme-box">
			<label class="label-checkbox">
				<input type="checkbox" checked id="fixedSidebar">
				<span class="custom-checkbox"></span>
				Fixed Sidebar
			</label>
		</div>
	</div><!-- /theme-setting
  style="margin-top:-80px;"
-->

  <div style="margin-top:-80px;" id="wrapper" class="preload">
		<div id="top-nav" class="fixed skin-6">
			<a href="#" class="brand">
				<span>Perfect</span>
				<span class="text-toggle"> Admin</span>
			</a><!-- /brand -->
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-envelope fa-lg"></i>
						<span class="notification-label bounceIn animation-delay4">7</span>
					</a>
					<ul class="dropdown-menu message dropdown-1">
						<li><a>You have 4 new unread messages</a></li>
						<li>
							<a class="clearfix" href="#">
								<img src="<?php echo base_url();?>img/user.jpg" alt="User Avatar">
								<div class="detail">
									<strong>John Doe</strong>
									<p class="no-margin">
										Lorem ipsum dolor sit amet...
									</p>
									<small class="text-muted"><i class="fa fa-check text-success"></i> 27m ago</small>
								</div>
							</a>
						</li>
						<li>
							<a class="clearfix" href="#">
								<img src="<?php echo base_url();?>img/user2.jpg" alt="User Avatar">
								<div class="detail">
									<strong>Jane Doe</strong>
									<p class="no-margin">
										Lorem ipsum dolor sit amet...
									</p>
									<small class="text-muted"><i class="fa fa-check text-success"></i> 5hr ago</small>
								</div>
							</a>
						</li>
						<li>
							<a class="clearfix" href="#">
								<img src="<?php echo base_url();?>img/user.jpg" alt="User Avatar">
								<div class="detail">
									<strong>Bill Doe</strong>
									<p class="no-margin">
										Lorem ipsum dolor sit amet...
									</p>
									<small class="text-muted"><i class="fa fa-reply"></i> Yesterday</small>
								</div>
							</a>
						</li>
						<li>
							<a class="clearfix" href="#">
								<img src="<?php echo base_url();?>img/user2.jpg" alt="User Avatar">
								<div class="detail">
									<strong>Baby Doe</strong>
									<p class="no-margin">
										Lorem ipsum dolor sit amet...
									</p>
									<small class="text-muted"><i class="fa fa-reply"></i> 9 Feb 2013</small>
								</div>
							</a>
						</li>
						<li><a href="#">View all messages</a></li>
					</ul>
				</li>
				<li class="dropdown hidden-xs">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks fa-lg"></i>
						<span class="notification-label bounceIn animation-delay5">4</span>
					</a>
					<ul class="dropdown-menu task dropdown-2">
						<li><a href="#">You have 4 tasks to complete</a></li>
						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Bug Fixes</span>
									<small class="pull-right text-muted">78%</small>
								</div>
								<div class="progress">
									<div class="progress-bar" style="width:78%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Software Updating</span>
									<small class="pull-right text-muted">54%</small>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" style="width:54%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Database Migration</span>
									<small class="pull-right text-muted">23%</small>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-warning" style="width:23%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Unit Testing</span>
									<small class="pull-right text-muted">92%</small>
								</div>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-danger " style="width:92%"></div>
								</div>
							</a>
						</li>
						<li><a href="#">View all tasks</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-bell fa-lg"></i>
						<span class="notification-label bounceIn animation-delay6">5</span>
					</a>
					<ul class="dropdown-menu notification dropdown-3">
						<li><a href="#">You have 5 new notifications</a></li>
						<li>
							<a href="#">
								<span class="notification-icon bg-warning">
									<i class="fa fa-warning"></i>
								</span>
								<span class="m-left-xs">Server #2 not responding.</span>
								<span class="time text-muted">Just now</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="notification-icon bg-success">
									<i class="fa fa-plus"></i>
								</span>
								<span class="m-left-xs">New user registration.</span>
								<span class="time text-muted">2m ago</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="notification-icon bg-danger">
									<i class="fa fa-bolt"></i>
								</span>
								<span class="m-left-xs">Application error.</span>
								<span class="time text-muted">5m ago</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="notification-icon bg-success">
									<i class="fa fa-usd"></i>
								</span>
								<span class="m-left-xs">2 items sold.</span>
								<span class="time text-muted">1hr ago</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="notification-icon bg-success">
									<i class="fa fa-plus"></i>
								</span>
								<span class="m-left-xs">New user registration.</span>
								<span class="time text-muted">1hr ago</span>
							</a>
						</li>
						<li><a href="#">View all notifications</a></li>
					</ul>
				</li>
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong>John Doe</strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="#">
								<img src="<?php echo base_url();?>img/user.jpg" alt="User Avatar">
								<div class="detail">
									<strong>John Doe</strong>
									<p class="grey">John_Doe@email.com</p>
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="profile.html" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
						<li><a tabindex="-1" href="gallery.html" class="main-link"><i class="fa fa-picture-o fa-lg"></i> Photo Gallery</a></li>
						<li><a tabindex="-1" href="#" class="theme-setting"><i class="fa fa-cog fa-lg"></i> Setting</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="<?php echo base_url('home/logout');?>"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->

		<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->
				<div class="user-block clearfix">
					<img src="<?php echo base_url();?>img/user.jpg" alt="User Avatar">
					<div class="detail">
						<strong>John Doe</strong><span class="badge badge-danger m-left-xs bounceIn animation-delay4">4</span>
						<ul class="list-inline">
							<li><a href="profile.html">Profile</a></li>
							<li><a href="inbox.html" class="no-margin">Inbox</a></li>
						</ul>
					</div>
				</div><!-- /user-block -->

				<div class="main-menu">
					<ul>
						<li class="active">
							<a href="index.html">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Dashboard
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="openable open">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i>
								</span>
								<span class="text">
									Page
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="#"><span class="submenu-label">Sign in</span></a></li>
								<li><a href="register.html"><span class="submenu-label">Sign up</span></a></li>
								<li><a href="lock_screen.html"><span class="submenu-label">Lock Screen</span></a></li>
								<li><a href="profile.html"><span class="submenu-label">Profile</span></a></li>
								<li><a href="blog.html"><span class="submenu-label">Blog</span></a></li>
								<li><a href="single_post.html"><span class="submenu-label">Single Post</span></a></li>
								<li><a href="landing.html"><span class="submenu-label">Landing</span></a></li>
								<li><a href="search_result.html"><span class="submenu-label">Search Result</span></a></li>
								<li><a href="chat.html"><span class="submenu-label">Chat Room</span></a></li>
								<li><a href="movie.html"><span class="submenu-label">Movie Gallery</span></a></li>
								<li><a href="pricing.html"><span class="submenu-label">Pricing</span></a></li>
								<li><a href="invoice.html"><span class="submenu-label">Invoice</span></a></li>
								<li><a href="faq.html"><span class="submenu-label">FAQ</span></a></li>
								<li><a href="contact.html"><span class="submenu-label">Contact</span></a></li>
								<li><a href="error404.html"><span class="submenu-label">Error404</span></a></li>
								<li><a href="error500.html"><span class="submenu-label">Error500</span></a></li>
								<li><a href="blank.html"><span class="submenu-label">Blank</span></a></li>
							</ul>
						</li>
						<li class="openable">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-tag fa-lg"></i>
								</span>
								<span class="text">
									Component
								</span>
								<span class="badge badge-success bounceIn animation-delay5">9</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="ui_element.html"><span class="submenu-label">UI Features</span></a></li>
								<li><a href="button.html"><span class="submenu-label">Button & Icons</span></a></li>
								<li><a href="tab.html"><span class="submenu-label">Tab</span></a></li>
								<li><a href="nestable_list.html"><span class="submenu-label">Nestable List</span></a></li>
								<li><a href="calendar.html"><span class="submenu-label">Calendar</span></a></li>
								<li><a href="table.html"><span class="submenu-label">Table</span></a></li>
								<li><a href="widget.html"><span class="submenu-label">Widget</span></a></li>
								<li><a href="form_element.html"><span class="submenu-label">Form Element</span></a></li>
								<li><a href="form_wizard.html"><span class="submenu-label">Form Wizard</span></a></li>
							</ul>
						</li>

						<li>
							<a href="timeline.html">
								<span class="menu-icon">
									<i class="fa fa-clock-o fa-lg"></i>
								</span>
								<span class="text">
									Timeline
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="gallery.html">
								<span class="menu-icon">
									<i class="fa fa-picture-o fa-lg"></i>
								</span>
								<span class="text">
									Gallery
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="inbox.html">
								<span class="menu-icon">
									<i class="fa fa-envelope fa-lg"></i>
								</span>
								<span class="text">
									Inbox
								</span>
								<span class="badge badge-danger bounceIn animation-delay6">4</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="email_selection.html">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Email Template
								</span>
								<small class="badge badge-warning bounceIn animation-delay7">New</small>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="openable">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-magic fa-lg"></i>
								</span>
								<span class="text">
									Multi-Level menu
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li class="openable">
									<a href="#">
										<span class="submenu-label">menu 2.1</span>
										<span class="badge badge-danger bounceIn animation-delay1 pull-right">3</span>
									</a>
									<ul class="submenu third-level">
										<li><a href="#"><span class="submenu-label">menu 3.1</span></a></li>
										<li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>
										<li class="openable">
											<a href="#">
												<span class="submenu-label">menu 3.3</span>
												<span class="badge badge-danger bounceIn animation-delay1 pull-right">2</span>
											</a>
											<ul class="submenu fourth-level">
												<li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>
												<li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="openable">
									<a href="#">
										<span class="submenu-label">menu 2.2</span>
										<span class="badge badge-success bounceIn animation-delay2 pull-right">3</span>
									</a>
									<ul class="submenu third-level">
										<li class="openable">
											<a href="#">
												<span class="submenu-label">menu 3.1</span>
												<span class="badge badge-success bounceIn animation-delay1 pull-right">2</span>
											</a>
											<ul class="submenu fourth-level">
												<li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>
												<li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>
											</ul>
										</li>
										<li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>
										<li><a href="#"><span class="submenu-label">menu 3.3</span></a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>

					<div class="alert alert-info">
						Welcome to Perfect Admin. Do not forget to check all my pages.
					</div>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>

		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li class="active">Dashboard</li>
				</ul>
			</div><!-- /breadcrumb-->
			<div class="main-header clearfix">
				<div class="page-title">
					<h3 class="no-margin">Dashboard</h3>
					<span>Welcome back Mr.John Doe</span>
				</div><!-- /page-title -->

				<ul class="page-stats">
			    	<li>
			    		<div class="value">
			    			<span>New visits</span>
			    			<h4 id="currentVisitor">4256</h4>
			    		</div>
						<span id="visits" class="sparkline"></span>
			    	</li>
			    	<li>
			    		<div class="value">
			    			<span>My balance</span>
			    			<h4>$<strong id="currentBalance">32153</strong></h4>
			    		</div>
			    		<span id="balances" class="sparkline"></span>
			    	</li>
			    </ul><!-- /page-stats -->
			</div><!-- /main-header -->

			<div class="grey-container shortcut-wrapper">
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-bar-chart-o"></i>
					</span>
					<span class="text">Statistic</span>
				</a>
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-envelope-o"></i>
						<span class="shortcut-alert">
							5
						</span>
					</span>
					<span class="text">Messages</span>
				</a>
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-user"></i>
					</span>
					<span class="text">New Users</span>
				</a>
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-globe"></i>
						<span class="shortcut-alert">
							7
						</span>
					</span>
					<span class="text">Notification</span>
				</a>
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-list"></i>
					</span>
					<span class="text">Activity</span>
				</a>
				<a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-cog"></i></span>
					<span class="text">Setting</span>
				</a>
			</div><!-- /grey-container -->

			<div class="padding-md">
				<div class="row">
					<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-body" id="trafficWidget">
								<div id="placeholder" class="graph" style="height:250px"></div>
							</div>
							<div class="panel-footer">
								<div class="row row-merge">

									<div class="col-xs-3 text-center border-right">
										<h4 class="no-margin">5421</h4>
										<small class="text-muted">Orders</small>
									</div>
									<div class="col-xs-3 text-center border-right">
										<h4 class="no-margin">3021</h4>
										<small class="text-muted">Tickets</small>
									</div>
									<div class="col-xs-3 text-center">
										<h4 class="no-margin">7098</h4>
										<small class="text-muted">Customers</small>
									</div>
								</div><!-- ./row -->
							</div>
							<div class="loading-overlay">
								<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
							</div>
						</div><!-- /panel -->

						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-default panel-stat1 bg-success">

								</div><!-- /panel -->
							</div><!-- /.col -->
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-default panel-stat2 bg-warning">

								</div><!-- /panel -->
							</div><!-- /.col -->

						</div><!-- /.row -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Work Progress

								<span class="badge badge-info pull-right">
									4 left
								</span>
							</div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Task</th>
										<th>Progress</th>
										<th></th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Bug Fixes</td>
										<td>
											<div class="progress progress-striped active" style="height:8px; margin:5px 0 0 0;">
												<div class="progress-bar" style="width: 45%">
													<span class="sr-only">45% Complete</span>
												</div>
											</div>
										</td>
										<td>45%</td>
										<td><span class="badge badge-info">2hr</span></td>
									</tr>
									<tr>
										<td>Mobile Development</td>
										<td>
											<div class="progress progress-striped active" style="height:8px; margin:5px 0 0 0;">
												<div class="progress-bar progress-bar-success" style="width: 61%">
													<span class="sr-only">61% Complete</span>
												</div>
											</div>
										</td>
										<td>61%</td>
										<td><span class="badge badge-info">1hr</span></td>
									</tr>
									<tr>
										<td>Unit Testing</td>
										<td>
											<div class="progress progress-striped active" style="height:8px; margin:5px 0 0 0;">
												<div class="progress-bar progress-bar-danger" style="width: 97%">
													<span class="sr-only">97% Complete</span>
												</div>
											</div>
										</td>
										<td>97%</td>
										<td><span class="badge badge-info">5m</span></td>
									</tr>
									<tr>
										<td>New frontend layout</td>
										<td>
											<div class="progress progress-striped active" style="height:8px; margin:5px 0 0 0;">
												<div class="progress-bar progress-bar-warning" style="width: 18%">
													<span class="sr-only">18% Complete</span>
												</div>
											</div>
										</td>
										<td>18%</td>
										<td><span class="badge badge-info">12hr</span></td>
									</tr>
								</tbody>
							</table>
						</div><!-- /panel -->
						<div class="row">
							<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading clearfix">

									<div class="panel-body no-padding collapse in" id="toDoListWidget">
										<ul class="list-group task-list no-margin collapse in">
											<li class="list-group-item selected">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish" checked>
													 <span class="custom-checkbox"></span>
												</label>
												SEO Optimisation
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Unit Testing
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Mobile Development
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
												<span class="badge badge-success m-right-xs">3</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Database Migration
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												New Frontend Layout <span class="label label-warning m-left-xs">PENDING</span>
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Bug Fixes <span class="label label-danger m-left-xs">IMPORTANT</span>
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
										</ul><!-- /list-group -->
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
							<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading clearfix">
										<span class="pull-left">Feeds</span>
										<ul class="tool-bar">
											<li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
											<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
										</ul>
									</div>

									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
						</div><!-- ./row -->
					</div><!-- /.col -->
					<div class="col-lg-4">
						<div class="panel bg-info fadeInDown animation-delay4">
							<div class="panel-body">
								<div id="lineChart" style="height: 150px;"></div>
								<div class="pull-right text-right">
									<strong class="font-14">Balance $3210</strong><br/>
									<span><i class="fa fa-shopping-cart"></i> Total Sales 867</span>
									<div class="seperator"></div>
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-4">
										Sales in June
										<strong class="block">$664</strong>
									</div><!-- /.col -->
									<div class="col-xs-4">
										Sales in July
										<strong class="block">$731</strong>
									</div><!-- /.col -->
									<div class="col-xs-4">
										Sales in August
										<strong class="block">$912</strong>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->

						<div class="panel bg-success fadeInDown animation-delay5">
							<div class="panel-body">
								<div id="barChart" style="height: 150px;"></div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-6">
										<h4 class="no-margin">Total Earnings</h4>
									</div><!-- /.col -->

								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->


						<div class="panel panel-default">
							<div class="panel-body">
								<div id="donutChart" style="height: 250px;"></div>
  								<div class="panel-group" id="accordion">
  									<div class="panel panel-default">
  										<div class="panel-heading">

  										</div>
  										<div id="collapseOne" class="panel-collapse collapse">

  										</div>
  									</div><!-- panel -->
  									<div class="panel panel-default">
  										<div class="panel-heading">
  										</div>
  										<div id="collapseTwo" class="panel-collapse collapse">
  										</div>
  									</div><!-- panel -->
  									<div class="panel panel-default">
  										<div class="panel-heading">
  										</div>
  										<div id="collapseThree" class="panel-collapse collapse">

  										</div>
  									</div><!-- panel -->
  								</div><!-- panel-group -->
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		<footer>
			<div class="row">
				<div class="col-sm-6">
					<span class="footer-brand">
						<strong class="text-danger">Perfect</strong> Admin
					</span>
					<p class="no-margin">
						&copy; 2013 <strong>Perfect Admin</strong>. ALL Rights Reserved.
					</p>
				</div><!-- /.col -->
			</div><!-- /.row-->
		</footer>


		<!--Modal-->
		<div class="modal fade" id="newFolder">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				        <form>
							<div class="form-group">
								<label for="folderName">Folder Name</label>
								<input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div><!-- /wrapper -->

	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>


  </body>
  <!-- Logout confirmation -->
  <div class="custom-popup width-100" id="logoutConfirm">
    <div class="padding-md">
      <h4 class="m-top-none"> Do you want to logout?</h4>
    </div>

    <div class="text-center">
      <a class="btn btn-success m-right-sm" href="<?php echo base_url();?>home/logout">Logout</a>
      <a class="btn btn-danger logoutConfirm_close">Cancel</a>
    </div>
  </div>

</html>
