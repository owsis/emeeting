<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Kemendesa - Emeeting Room</title>

	<?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {?>
		<!-- Jika sedang di localhost -->
		<link rel="stylesheet" href="<?php echo base_url("assets/vendors/bootstrap/bootstrap.min.css") ?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2/select2.min.css") ?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/dataTables.bootstrap4.min.css')?>"/>
	    <link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
	<?php } else {?>
		<!-- Jika akses dari server -->
		<link rel="stylesheet" href="<?php echo base_url("assets/vendors/bootstrap/bootstrap.min.css") ?>" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
		<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"  />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.10/combined/css/gijgo.min.css"  />

	<?php } ?>

	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css") ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/main_style.css") ?>" />
	<link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-kemendesa.png") ?>" />

	<?php if (!empty($additional_assets_css)) {
		foreach ($additional_assets_css as $key => $value) {
			if ($value != null or $value != '') {?>
				<link rel="stylesheet" href="<?php echo base_url('assets/' . $value) ?>" />
			<?php }
		}
	}
	?>

</head>

<body>
	<div class="container-scroller">

		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a class="navbar-brand brand-logo" href="<?=site_url("")?>" >
					<img src="<?=base_url("assets/images/logo-kemendesa.svg")?>" alt="logo" />
				</a>
				<a class="navbar-brand brand-logo-mini" href="<?=site_url("")?>" >
					<img src="<?=base_url("assets/images/logo-kemendesa.png")?>" alt="logo" />
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				
				<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
				</ul>
				<ul class="navbar-nav navbar-nav-right">
					<?php if($this->session->userdata('role')) {?>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
							<i class="mdi mdi-file-document-box"></i>
							<span class="count">7</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
							<div class="dropdown-item">
								<p class="mb-0 font-weight-normal float-left">You have 7 unread mails
								</p>
								<span class="badge badge-info badge-pill float-right">View all</span>
							</div>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="<?=base_url("assets/images/faces/face4.jpg")?>" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
										<span class="float-right font-weight-light small-text">1 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										The meeting is cancelled
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="<?=base_url("assets/images/faces/face2.jpg")?>" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
										<span class="float-right font-weight-light small-text">15 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										New product launch
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="<?=base_url("assets/images/faces/face3.jpg")?>" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
										<span class="float-right font-weight-light small-text">18 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										Upcoming board meeting
									</p>
								</div>
							</a>
						</div>
					</li> -->
					<li class="nav-item dropdown">
						<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="mdi mdi-bell"></i>
							<?php // if ($this->session->userdata('notif') > 0) {?>
								<!-- <span class="count"><?=$this->session->userdata('notif')?></span> -->
							<?php // } ?>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
							<a class="dropdown-item">
								<p class="mb-0 font-weight-normal float-left">You have 4 new notifications
								</p>
								<span class="badge badge-pill badge-warning float-right">View all</span>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-success">
										<i class="mdi mdi-alert-circle-outline mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
									<p class="font-weight-light small-text">
										Just now
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-warning">
										<i class="mdi mdi-comment-text-outline mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
									<p class="font-weight-light small-text">
										Private message
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-info">
										<i class="mdi mdi-email-outline mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
									<p class="font-weight-light small-text">
										2 days ago
									</p>
								</div>
							</a>
						</div>
					</li>
					<!-- <li class="nav-item dropdown d-none d-xl-inline-block">
						<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
						<span class="profile-text">Hello, <?php echo $this->session->userdata('namapeg') ?></span>
							<img class="img-xs rounded-circle" src="<?=base_url("assets/images/faces/face1.jpg")?>" alt="Profile image">
							<i class="mdi mdi-account-circle"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
							<a class="dropdown-item">
								<p class="mb-0 font-weight-normal float-left">User Account</p>
							</a>
							<a class="dropdown-item p-0">
								<div class="d-flex border-bottom">
									<div class="py-3 px-4 d-flex align-items-center justify-content-center">
										<i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
									</div>
									<div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
										<i class="mdi mdi-account-outline mr-0 text-gray"></i>
									</div>
									<div class="py-3 px-4 d-flex align-items-center justify-content-center">
										<i class="mdi mdi-alarm-check mr-0 text-gray"></i>
									</div>
								</div>
							</a>
							<a class="dropdown-item mt-2">
								Manage Accounts
							</a>
							<a class="dropdown-item">
								Change Password
							</a>
							<a class="dropdown-item">
								Check Inbox
							</a>
							<a class="dropdown-item" href="<?=site_url('user/logout')?>">
								<h6 class="preview-subject font-weight-medium text-dark">Sign Out</h6>
							</a>
						</div>
					</li> -->
					<li class="nav-item">
						<span class="profile-text">
							<?php if($this->session->userdata('role') == 1) {
								echo 'Hi, Administrator';
							} else {
								echo '';
							}
							?> 
						</span>
					</li>
				<?php } ?>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="icon-menu"></span>
			</button>
		</div>
	</nav>

	<div class="container-fluid page-body-wrapper">

		<?=$menu?>

		<div class="main-panel">
			<div class="content-wrapper">
				<?=(!empty($content_view)) ? $content_view : '';?>
			</div>

			<footer class="footer">
				<div class="container-fluid clearfix">
					<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
						<a href="javascript::void" target="_blank">Kemendesa</a>. All rights reserved.</span>
							<!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
								<i class="mdi mdi-heart text-danger"></i>
							</span> -->
						</div>
					</footer>
				</div>
			</div>
		</div>


		<script src="<?=base_url("assets/js/jquery-debounce.js")?>" ></script>
		<script src="<?=base_url("assets/js/main.js")?>" ></script>
		<!-- <script type="text/javascript" src="<?=base_url('assets/js/dataTables.min.js')?>"></script> -->
		<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script> -->
		<?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {?>

			<!-- Jika sedang di localhost -->
			<script src="<?=base_url("assets/vendors/jquery/jquery-3.3.1.min.js")?>"></script>
			<script src="<?=base_url("assets/js/moment.min.js")?>" ></script>
			<script src="<?=base_url("assets/vendors/bootstrap/bootstrap.min.js")?>" ></script>
			<script src="<?=base_url("assets/vendors/icheck/icheck.min.js")?>" ></script>
			<script src="<?=base_url("assets/vendors/select2/select2.min.js")?>" ></script>
			<script src="<?=base_url('assets/js/dataTables.min.js')?>"></script>
		    <script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
		<?php } else {?>

			<!-- Jika akses dari server -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

			<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"></script>

			<script
			src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.10/combined/js/gijgo.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"></script>

		<?php }

		if (!empty($additional_assets_js)) {
			foreach ($additional_assets_js as $key => $value) {
				if ($value != null or $value != '') {?>
					<script type="text/javascript" src="<?php echo base_url('assets/' . $value) ?>" ></script>
				<?php }
			}
		}

		echo (!empty($script_js)) ? $script_js : '';
		?>

	</body>

	</html>
