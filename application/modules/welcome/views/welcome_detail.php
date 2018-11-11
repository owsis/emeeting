
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
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Overpass:700,800" rel="stylesheet">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- BOOTSTRAP 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- FULLCALENDAR -->
	<link rel="stylesheet" href="<?=base_url('assets/css/fullcalendar.min.css')?>">

	<style type="text/css">
	/* html {
		background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
		url('<?=base_url("uploaded/images/ruangan/" . $ruang[0]->img_r)?>') no-repeat center center fixed; 
		background-size: cover;
		height: 100%;
		overflow: hidden;
		} */

		* {
			box-sizing: border-box;
		}

		body {
			font-family: 'Overpass', sans-serif;
		}
		.background-image {
			position: fixed;
			z-index: 0;
			background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('<?=base_url("uploaded/images/ruangan/" . $ruang[0]->img_r)?>') no-repeat center center fixed; 
			background-size: cover;
			width: 100%;
			height: 100%;

			-webkit-filter: blur(2px) grayscale(25%);
			-moz-filter: blur(2px) grayscale(25%);
			-o-filter: blur(2px) grayscale(25%);
			-ms-filter: blur(2px) grayscale(25%);
			filter: blur(2px) grayscale(25%);
		}

		/* Style the header */
		header {
			background-color: #666;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}

		/* Create two columns/boxes that floats next to each other */
		nav {
			float: left;
			width: 65%;
			height: 1024px; /* only for demonstration, should be removed */
			background: #229954;
			background-image: url('<?=base_url("assets/images/img5.jpg")?>'); 
			padding: 10px;

		}
		/*font*/
		h1 {
			font-size: 55px;
			color: #34495E;
			padding: 100px;
			text-shadow: 2px 2px #FDFEFE;
		}

		.h2 {
			font-size: 60px;
			/*font-family: "Times New Roman", Times, serif;*/
			color: #34495E;
			text-shadow: 2px 2px #FDFEFE;
		}
		h2 {
			font-size: 18px;
			text-transform: uppercase;
		}

		h4 {
			font-size: 30px;
			color: black;
		}
		h5 {
			font-size: 20px;
			/*font-family: "Times New Roman", Times, serif;*/
			color: white;
		}

		p {
			font-size: 35px;
			color: #34495E;
			text-shadow: 2px 2px #FDFEFE;
		}
		<!--/* Style the list inside the menu */
		nav ul {
			list-style-type: none;
			padding: 0;
		}
		-->

		article {
			float: left;
			padding: 10px;
			width: 35%;
			background-color: #FDFEFE;
			height: 1024px; /* only for demonstration, should be removed */
		}

		/* Clear floats after the columns */

		section:after {
			content: "";
			display: table;
			clear: both;

		}

		/* Style the footer */
		footer {
			background-color: #229954;
			padding: 10px;
			text-align: center;
			color: white;
		}

		/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
		@media (max-width: 600px) {
			nav, article {
				width: 100%;
				height: auto;
			}
		}

	</style>
</head>
<body>
			<!-- <div class="col-9">
				<div class="">

					<p>test col 9</p>
				</div>
				<div class="container">
					<h2 class="title"><?=strtoupper($ruang[0]->name_r)?></h2>
					<div class="subcontainer">
						<?php 
						date_default_timezone_set('Asia/Jakarta');
						echo $test;
						if ($jadwal != null) {
							foreach ($jadwal as $key) { 
								$start = strtotime($key->start);
								$end = strtotime($key->end);
								?>
								<h3 class="content">AGENDA RAPAT</h3>
								<h3 class="content">"<?=strtoupper($key->title)?>"</h3>
								<h3 class="content"><?=strtoupper($key->desc)?></h3>
								<br>
								<br>
								<h3 class="footer">WAKTU RAPAT</h3>
								<br>
								<div class="row">
									<a class="btn"><?=date('H:i', $start)?></a>
									<a class="btn"><?=date('H:i', $end)?></a>
								</div>
								<br>
								<br>
								<div class="row">
									<a class="btn-arrow"><i class="fa fa-chevron-down "></i></a>
								</div>
							<?php } 
						} else { ?>
							<br>
							<br>
							<br>
							<h3 class="content nothing">BELUM ADA JADWAL SAAT INI <?=date("Y-m-d H:i:s")?></h3>
						<?php } ?>



					</div>
				</div>
			</div> -->

			<section>
				<nav>
					<ul>
						<?php if ($jadwal != null) {
							foreach ($jadwal as $key) { 
								$start = strtotime($key->start);
								$end = strtotime($key->end);
								?>
								<center>
									<h1>AGENDA HARI INI</h1>
									<h2 class="h2">"<?=strtoupper($key->title)?>"</h2>
									<p><?=strtoupper($key->desc)?></p>
									<button style="height:80px;width:200px;font-size:50px">
										<?=date('H:i', $start)?>
									</button>
									<span style="margin: 0 30px;">&nbsp;</span>
									<button style="height:80px;width:200px;font-size:50px">
										<?=date('H:i', $end)?>
									</button>
								</center>
							<?php }
						} else { ?>
							<center>
								<h1>BELUM ADA JADWAL UNTUK SAAT INI</h1>
							</center>
						<?php } ?>
					</ul>
				</nav>

				<article>
					<center>
						<img src="<?=base_url('assets/images/logo-kemendesa.png')?>" alt="Girl in a jacket" width="150" height="150">
						<h4>E-MEETING ROOM</h4>
						<h3><?=strtoupper($ruang[0]->name_r)?></h3>
						<!-- <iframe frameborder="0" style="height: 560px; overflow:scroll; width: 100%" src="http://emeeting.kemendesa.go.id/index.php/profil/detail_reservation/33" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe> -->
						<div id="calendar" style="width: 450px; margin: 10px auto; font-size: 10px;"></div>
					</article>
				</section>

				<footer>
					<marquee><h5>Kementerian Desa, Pembangunan Daerah Tertinggal Dan Transmigrasi - E-Meeting Room http://eoffice.kemendesa.go.id/emeeting/welcome/detail/<?=$ruang[0]->code_r?></h5></marquee>
				</footer>




		<!-- <section class="Section-separator">

			<div class="container">

				<h2><?=$ruang[0]->name_r?></h2>
				<table fa-chevron-down class="table">
					<tr>
						<th>#</th>
						<th>Judul Rapat</th>
						<th>Deskripsi Rapat</th>
						<th>Mulai Dari -</th>
						<th>Sampai</th>
					</tr>
					<?php foreach ($jadwal as $key) { 
						date_default_timezone_set('Asia/Jakarta');
						$start = strtotime($key->start);
						$end = strtotime($key->end);
					?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$key->title?></td>
							<td><?=$key->desc?></td>
							<td><?=date('d M Y H:i', $start)?></td>
							<td><?=date('d M Y H:i', $end)?></td>
						</tr>
					<?php } ?>
				</table>
			</div>

		</section> -->
		<script src="<?=base_url("assets/vendors/jquery/jquery-3.3.1.min.js")?>"></script>
		<script src="<?=base_url("assets/js/moment.min.js")?>" ></script>
		<script type="text/javascript" src="<?=base_url('assets/js/fullcalendar.min.js')?>"></script>
		<script type="text/javascript">
			setTimeout( function() {
				location.reload()
			}, 60 * 1000)

			$(document).ready(function() {

		var data_js = <?php echo $get_data ?>;

		$('#calendar').fullCalendar({
			contentHeight: 450,
			lang: 'id',
			header: {
				left: 'today',
				center: 'title',
				right: 'prev,next',
			},
			events: data_js,
			
		});

	});
		</script>

	</body>

	</html>