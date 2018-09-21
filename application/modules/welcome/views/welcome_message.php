
<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<head>     

	<!-- TITLE OF SITE --> 
	<title>Kemendesa - Emeeting Room</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="description" content="app landing page template" />
	<meta name="keywords" content="rik, landing page, gradient background, image background, video background, template, responsive, bootstrap" />
	<meta name="developer" content="TemplateOcean">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- FAV AND TOUCH ICONS   -->
	<link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-kemendesa.png") ?>" />

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="<?=base_url("assets/bootstrap/css/bootstrap.min.css")?>">

	<!-- POP UP IMAGE AND VIDEO -->
	<link rel="stylesheet" href="<?=base_url("assets/css/plagin-css/plagin.css")?>">

	<!-- FONT ICONS -->
	<link rel="stylesheet" href="<?=base_url("assets/icons/rik-icons/styles.css")?>">

	<!--   COUSTOM CSS link  -->
	<link rel="stylesheet" href="<?=base_url("assets/css/style-land.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/responsive.css")?>">

	<!-- COLOR -->
	<!-- <link rel="stylesheet" href="<?=base_url("assets/css/colors/color-1.css")?>" type="text/css" id="color-scheme" /> -->
	<link rel="stylesheet" href="<?=base_url("assets/css/colors/color-2.css")?>" type="text/css"/>
	<!-- <link rel="stylesheet" href="css/colors/color-3.css" type="text/css"/> -->

		<!--[if lt IE 9]>
			<script src="js/plagin-js/html5shiv.js"></script>
			<script src="js/plagin-js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">

		.row-img {
			display: -ms-flexbox; /* IE10 */
			display: flex;
			-ms-flex-wrap: wrap; /* IE10 */
			flex-wrap: wrap;
			padding: 0 4px;
		}

		/* Create four equal columns that sits next to each other */
		.column-img {
			-ms-flex: 25%; /* IE10 */
			flex: 25%;
			max-width: 25%;
			padding: 0 4px;
		}

		.column-img img {
			margin-top: 8px;
			vertical-align: middle;
		}

		/* Responsive layout - makes a two column-layout instead of four columns */
		@media screen and (max-width: 800px) {
			.column-img {
				-ms-flex: 50%;
				flex: 50%;
				max-width: 50%;
			}
		}

		/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.column-img {
				-ms-flex: 100%;
				flex: 100%;
				max-width: 100%;
			}
		}

		/*IMG Card Hover*/
		.services{
			margin: 20px auto;
		}
		figure.snip1174 {
			color: #fff;
			position: relative;
			float: left;
			overflow: hidden;
			background-color: #1a1a1a;
			color: #ffffff;
			text-align: left;
			margin: 10px;
			width: 100%;
			border-radius: 10px;
		}
		figure.snip1174 * {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-transition: all 0.35s ease;
			transition: all 0.35s ease;
		}
		figure.snip1174 img {
			max-width: 100%;
			-webkit-transform: scale(1.1);
			transform: scale(1.1);
			vertical-align: top;
			opacity: 0.7;
		}
		figure.snip1174 figcaption {
			position: absolute;
			padding: 0 15px;
			top: 0;
			left: 0;
		}
		figure.snip1174 h2,
		figure.snip1174 p {
			margin: 0;
			padding: 0;
		}
		figure.snip1174 a.btn-link-hover, 
		.btn-link-hover p {
			font-weight: 400;
			text-decoration: none;
			color: #fff;
		}
		figure.snip1174 h2 {
			display: inline-block;
			font-weight: 100;
			font-size: 1.8em;
		}
		figure.snip1174 p {
			font-weight: 300;
			margin-bottom: 20px;
			line-height: 1.4em;
		}
		figure.snip1174 a.btn-img-hover {
			display: inline-block;
			padding: 10px 20px;
			border: 1px solid #ffffff;
			text-decoration: none;
			color: #ffffff;
			letter-spacing: 2px;
			text-transform: uppercase;
			font-size: 0.8em;
			-webkit-transform: translateY(50%);
			transform: translateY(50%);
			opacity: 0;
		}
		figure.snip1174 a.btn-img-hover:hover {
			background-color: rgba(0, 0, 0, 0.2);
		}
		figure.snip1174.blue {
			background-color: #20638f;
		}
		figure.snip1174.yellow {
			background-color: #c87f0a;
		}
		figure.snip1174.green {
			background-color: #1e8449;
		}
		figure.snip1174.navy {
			background-color: #222f3d;
		}
		figure.snip1174.red {
			background-color: #962d22;
		}
		figure.snip1174:hover img,
		figure.snip1174.hover img {
			opacity: 0;
			-webkit-transform: scale(1);
			transform: scale(1);
		}
		figure.snip1174:hover a.btn-img-hover,
		figure.snip1174.hover a.btn-img-hover {
			-webkit-transform: translateY(0);
			transform: translateY(0);
			opacity: 1;
		}

	</style>

</head>
<body class="">



		<!-- Start: Navbar Area
			============================= -->
			<header id="header" class="okayNav-header navbar-fixed-top main-navbar-top">
				<div class="container">
					<div class="row">

						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">

							<!-- TEMPLATE LOGO LIGHT -->
							<a class="navbar-brand light-logo" href=""><img src="<?=base_url("assets/images/logo-kemendesa.svg")?>" alt="" class="img-responsive"></a>

						</div> <!-- End: .col-xs-3 -->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-6">

							<!-- <nav role="navigation" class="pull-right" id="js-navbar-menu">
								<ul id="navbar-nav" class="navbar-nav">
									<li><a class="btn-nav" href="#features">Features</a></li>
									<li><a class="btn-nav" href="#how-it-works">How it works</a></li>
									<li><a class="btn-nav" href="#describe">Describe</a></li>
									<li><a class="btn-nav" href="#subscribe">Subscribe</a></li>
									<li><a class="btn-nav" href="#screenshots">Screenshots</a></li>
									<li><a class="btn-nav" href="#download">Download App</a></li>
								</ul>
							</nav> -->
							<div class="pull-right" style="margin-top: 8px">
								<a href="<?=site_url('user')?>" class="btn btn-border">LOGIN</a>
							</div>
							
						</div> <!-- End: .col-xs-9 -->
					</div> <!-- End: .row -->
				</div> <!-- End: .container -->
			</header><!-- /header -->
		<!-- End: Navbar Area
			============================= -->



		<!-- Start: Header Section
			================================ -->
			<section class="features-section-4 section header-js section" id="header" style="background: url('<?=base_url("assets/images/ruangan/ditjen_pkp2trans_lt1.jpg")?>'); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-color: #ffffff; background-repeat: no-repeat; background-position: 50% 50%; background-attachment: initial;">
				<div class="overlay-color">
					<div class="container">
						<div class="row section-separator light-text">

							<div class="part-1 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
								<div class="part-inner text-center mr-small">

									<!-- Main Logo -->
									<a href="index.html" class="logo-link">
										<img src="<?php echo base_url("assets/images/logo-kemendesa.png") ?>" alt="" class="img-responsive logo" width="200">
									</a>

									<!--  Header SubTitle Goes here -->
									<h1 class="title">E-Meeting Room</h1> 

									<!-- Button Area -->
									<div class="button-form col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
										<a href="<?=site_url('user')?>" class="btn-fill btn">LOGIN</a>
									</div>									

								</div>
							</div> <!-- End: .part-1 -->

							

						</div> <!-- End: .row -->
					</div> <!-- End: .container -->
				</div> <!-- End: .overlay-color -->
			</section>
		<!-- End: Header Section
			================================ -->



		<!-- Start: Features Section 1
			================================== -->
			<section class="features-section-1 section" id="features">
				<div class="container">
					<div class="row section-separator">

						<!-- Start: Section Heading -->
						<div class="section-header col-md-10 col-md-offset-1">
							<h2 class="section-heading">Jadwal Pertemuan / Rapat</h2>
							<p class="sub-title">Jadwal berdasarkan ruangan / tempat rapat</p>
						</div>
						<!-- End: Section Heading -->

						<div class="part-1 col-xs-12">
							<div class="row">

								<!-- Photo Grid -->
								<div class="row-img"> 
									<div class="col-md-4">
										<?php foreach ($ruangan as $ruang) {?>
											<figure class="snip1174 navy">
												<img src="<?php echo base_url("assets/images/ruangan/" . $ruang->img_r); ?>" style="width:100%">
												<figcaption>
													<a href="" class="btn-link-hover">
														<h2><?=$ruang->name_r?></h2>
														<p>terdapat 3 jadwal dihari ini</p>
													</a>
													<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
												</figcaption>
											</figure>
										<?php } ?>
									</div>

									<div class="col-md-4">
										<figure class="snip1174 navy">
											<img src="<?php echo base_url("assets/images/ruangan/pktrans.JPG") ?>" style="width:100%">
											<figcaption>
												<h2>Ruang PKTRANS</h2>
												<p>terdapat 3 jadwal dihari ini</p>
												<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
											</figcaption>
										</figure>

										<figure class="snip1174 navy">
											<img src="<?php echo base_url("assets/images/ruangan/ditjen_pkp_lt4.jpg") ?>" style="width:100%">
											<figcaption>
												<h2>Ruang PKTRANS</h2>
												<p>terdapat 3 jadwal dihari ini</p>
												<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
											</figcaption>
										</figure>
									</div>  
									<div class="col-md-4">
										<figure class="snip1174 navy">
											<img src="<?php echo base_url("assets/images/ruangan/ditjen_pkp2trans_lt3.JPG") ?>" style="width:100%">
											<figcaption>
												<h2>Ruang PKTRANS</h2>
												<p>terdapat 3 jadwal dihari ini</p>
												<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
											</figcaption>
										</figure>
										<figure class="snip1174 navy">
											<img src="<?php echo base_url("assets/images/ruangan/oproom.jpg") ?>" style="width:100%">
											<figcaption>
												<h2>Ruang PKTRANS</h2>
												<p>terdapat 3 jadwal dihari ini</p>
												<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
											</figcaption>
										</figure>
										<figure class="snip1174 navy">
											<img src="<?php echo base_url("assets/images/ruangan/eksekutive_lt_2.jpg") ?>" style="width:100%">
											<figcaption>
												<h2>Ruang PKTRANS</h2>
												<p>terdapat 3 jadwal dihari ini</p>
												<a href="#" class="btn-img-hover">Lihat Detail Jadwal</a>
											</figcaption>
										</figure>
									</div>
								</div>

							</div> <!-- End: .row -->
						</div> <!-- End: .part-1 -->

					</div> <!-- End: .row -->
				</div> <!-- End: .container -->
			</section>
		<!-- End: Features Section 1
			================================== -->




		<!-- Start: Features Section 2
			================================== -->
			<section class="features-section-2 section" id="how-it-works">
				<div class="overlay-color-full">
					<div class="container">
						<div class="row section-separator light-text">

							<!-- Start: Section Heading -->
							<div class="section-header col-md-10 col-md-offset-1">
								<h2 class="section-heading">KEMENDESA</h2>
								<p class="sub-title">Kementerian Desa, Pembangunan Daerah Tertinggal 
								Dan Transmigrasi Republik Indonesia</p>
							</div>
							<!-- End: Section Heading -->

							<div class="part-1 col-xs-12">
								<div class="row">

									<div class="features-item text-center col-sm-3 col-xs-12">

										<div class="icon-outer">
											<i class="icon features-icon gradient-text-full icon-icon-house-alt"></i>
										</div>

										<h4 class="title m-t-30">Get started with app</h4>

									</div>
									<div class="features-item text-center col-sm-3 col-xs-12">

										<div class="icon-outer">
											<i class="icon features-icon gradient-text-full icon-icon-like"></i>
										</div>

										<h4 class="title m-t-30">Customize as you need</h4>

									</div>
									<div class="features-item text-center col-sm-3 col-xs-12">

										<div class="icon-outer">
											<i class="icon features-icon gradient-text-full icon-icon-cloud-download-alt"></i>
										</div>

										<h4 class="title m-t-30">Upload your photos</h4>

									</div>
									<div class="features-item text-center col-sm-3 col-xs-12">

										<div class="icon-outer">
											<i class="icon features-icon gradient-text-full icon-icon-lock-alt"></i>
										</div>

										<h4 class="title m-t-30">Your photos will be scure</h4>

									</div>

								</div> <!-- End: .row -->
							</div> <!-- End: .part-1 -->

						</div> <!-- End: .row -->
					</div> <!-- End: .container -->
				</div>
			</section>
		<!-- End: Features Section 2
			================================== -->


		<!-- Start: Section Separator
			================================== -->
			<section class="Section-separator">
				<div class="container">

					<hr class="section-separator-line"> <!-- Separatior Two Section -->

				</div> <!-- End: .container -->
			</section>
		<!-- End: Section Separator
			================================== -->



		<!-- Start: Features Section 3
			================================== -->
			
		<!-- End: Features Section 3
			================================== -->




		<!-- Start: Features Section 4
			================================== -->
			
		<!-- End: Features Section 4
			================================== -->




		<!-- Start: Features Section 3
			================================== -->
			
		<!-- End: Features Section 3
			================================== -->




		<!-- Start: Features Section 5
			================================== -->
			
		<!-- End: Features Section 5
			================================== -->




		<!-- Start: Footer Section 1
			================================== -->
			<footer class="footer-section-1" id="footer">
				<div class="container">
					<div class="row section-separator">

						<div class="each-item col-sm-5">
							<div class="inner text-right">

								<p class="sub-title">Any question?</p>
								<a href="#" data-toggle="modal" data-target="#contact-form">
									<h5 class="title">Contact us now!</h5>
								</a>

							</div>
						</div>
						<div class="each-item col-sm-2">
							<div class="inner text-center">

								<a href="index.html" class="logo-link">
									<img src="images/logo-color.png" alt="" class="img-responsive logo">
								</a>

							</div>
						</div>
						<div class="each-item col-sm-5">
							<div class="inner text-left">

								<p class="sub-title">Follow us on</p>
								<ul class="nav social-icon">
									<li><a href="#"><i class="icon icon-social-facebook"></i></a></li>
									<li><a href="#"><i class="icon icon-social-twitter"></i></a></li>
									<li><a href="#"><i class="icon icon-social-pinterest"></i></a></li>
									<li><a href="#"><i class="icon icon-social-instagram"></i></a></li>
								</ul>

							</div>
						</div>

					</div><!-- End: .section-separator  -->
				</div> <!-- End: .container  -->
			</footer>
		<!-- End: Footer Section 1
			================================== -->




		<!-- Start: Contact Form
			================================== -->
			<div id="contact-form" class="contact-form modal fade" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="modal-content">

						<!-- Modal Close Button -->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

						<form id="contact-form-2" method="post" class="single-form" action="php/sendmail-4-input.php">

							<div class=" col-xs-12">
								<p class="email-loading"><img src="<?=base_url("assets/images/loading.gif")?>" alt="">&nbsp;&nbsp;&nbsp;Sending...</p>
								<p class="email-success"><i class="icon icon-icon-check-alt2"></i> Your quote has successfully been sent.</p>
								<p class="email-failed"><i class="icon icon-icon-close-alt2"></i> Something went wrong!</p>
							</div>

							<div class="col-xs-12 text-center">
								<h4 class="title">Get 1 Month FREE Trial Now</h4>
							</div>

							<div class="col-xs-12">
								<!-- Name -->
								<input name="name" class="contact-name form-control" type="text" placeholder="Name*" required="">
							</div>
							<div class="col-xs-12">
								<!-- Email -->
								<input name="email" class="contact-email form-control" type="email" placeholder="Email*" required="">
							</div>
							<div class="col-xs-12">
								<!-- Subject -->
								<input name="subject" class="contact-subject form-control" type="text" placeholder="Subject">
							</div>
							<div class="col-xs-12">
								<textarea class="contact-message form-control" rows="3" placeholder="Message*"></textarea>  
							</div>

							<!-- Subject Button -->
							<div class="btn-form text-center col-xs-12">
								<button class="btn btn-fill">SEND MESSAGE</button>
							</div>
						</form>

					</div><!-- End: .modal-content -->
				</div><!-- End: .modal-dialog -->
			</div><!-- End: .modal -->
		<!-- End: Contact Form
			================================== -->




		<!-- SCRIPTS 
			========================================-->
			<script src="<?=base_url("assets/js/plagin-js/jquery-1.11.3.js")?>"></script>
			<script src="<?=base_url("assets/bootstrap/js/bootstrap.min.js")?>"></script>
			<script src="<?=base_url("assets/js/plagin-js/plagin.js")?>"></script>

		<!-- Custom Script 
			==========================================-->
			<script src="<?=base_url("assets/js/custom-scripts.js")?>"></script>



		<!-- CUSTOMIZER :: FOR DEMO ONLY 
			==========================================-->
			<script src="../../demo-style/js/main.js"></script>

			<script type="text/javascript">
				$(document).ready(customizer.init({
					colors: {
						title: 'COLORS:',
						options: [
						['color-1', 'css/colors/color-1.css', '', true],
						['color-2', 'css/colors/color-2.css', ''],
						['color-3', 'css/colors/color-3.css', '']
						]
					}
				}, '../../demo-style/css/main.css'));
			</script>

		</body>

		</html>