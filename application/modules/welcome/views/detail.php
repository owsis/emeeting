
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

	<style type="text/css">
	.bgimage {
		width:100%;
		height:500px;
		background: url('https://images.unsplash.com/photo-1438109491414-7198515b166b?q=80&fm=jpg&s=cbdabf7a79c087a0b060670a6d79726c');
		background-repeat: no-repeat;
		background-position: center;
		background-size:cover;
		background-attachment: fixed;
	}
	.bgimage h5 {
		color:white;
		text-shadow:2px 2px #333;
	}
</style>
</head>
<body class="">


		<!-- Start: Features Section 1
			================================== -->
			<?php foreach ($ruang as $key) { ?>

				<section style="
				width:100%;
				height:300px;
				background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?=base_url("uploaded/images/ruangan/" . $key->img_r);?>');
				background-repeat: no-repeat;
				background-position: center;
				background-size:cover;
				background-attachment: fixed;
				">
				<div class="container-fluid">
					<div class="row">
					</div>
				</div>
			</section>
		<?php } ?>

		<section class="Section-separator">

			<div class="container">

				<h2><?=$ruang[0]->name_r?></h2>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Judul Rapat</th>
						<th>Deskripsi Rapat</th>
						<th>Mulai Dari -</th>
						<th>Sampai</th>
					</tr>
					<?php foreach ($jadwal as $key) { ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$key->title?></td>
							<td><?=$key->desc?></td>
							<td><?=$key->start?></td>
							<td><?=$key->end?></td>
						</tr>
					<?php } ?>
				</table>
			</div>

		</section>


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
			<script type="text/javascript">
				setTimeout( function() {
					location.reload()
				}, 5 * 1000)
			</script>


		<!-- CUSTOMIZER :: FOR DEMO ONLY 
			==========================================-->

		</body>

		</html>