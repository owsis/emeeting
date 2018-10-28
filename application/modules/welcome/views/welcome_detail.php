
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

	<style type="text/css">
	/* html {
		background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
		url('<?=base_url("uploaded/images/ruangan/" . $ruang[0]->img_r)?>') no-repeat center center fixed; 
		background-size: cover;
		height: 100%;
		overflow: hidden;
	} */

	body {
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-family: 'Overpass', sans-serif;
	}
	.background-image {
		position: fixed;
		margin-left: -5px;
		margin-right: -5px;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		z-index: 1;
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
	.container {
		position: fixed;
		left: 0;
		right: 0;
		z-index: 9999;
		margin-left: 20px;
		margin-right: 20px;
		background: rgba(225, 225, 225, .5);
		padding: 1px;
		margin: 80px 80px;
		height: 500px;
	}
	.subcontainer {
		margin: 10px;
		padding: 10px;
	}
	.title {
		text-align: center;
		font-size: 60px;
		font-weight: 800;
		color: #fff;
	}
	.content {
		text-align: center;
		text-align: center;
		font-size: 20px;
		font-weight: 700;
		color: #fff;
		line-height: .5rem;
	}
	.nothing {
		font-size: 30px;
	}
	.footer {
		text-align: center;
		text-align: center;
		font-size: 20px;
		font-weight: 700;
		color: #fff;
	}
	.btn {
		padding: 15px 50px;
		margin: 0 20px;
		background-color: #E91E63;
		border-radius: 50px;
		color: #fff;
		font-size: 18px;
	}
	.btn-arrow {
		padding: 10px 15px;
		margin: 10px;
		background-color: rgba(1,1,1, .5);
		vertical-align: center;
		color: #fff;
		border-radius: 50px;
	}

	@media only screen and (max-width: 768px) {
		/* For mobile phones: */
		.container {
			position: fixed;
			left: 0;
			right: 0;
			z-index: 9999;
			margin: 40px 10px;
			background: rgba(225, 225, 225, .5);
			padding: 1px;
			height: 500px;
		}
		.subcontainer {
			margin: 5px;
			padding: 10px;
		}
		.title {
			text-align: center;
			font-size: 40px;
			font-weight: 800;
			color: #fff;
		}
		.nothing {
			font-size: 20px;
		}
	}
</style>
</head>
<body>
<div class="row">
	<div style="width: 66%">
	<div class="background-image"></div>
	<div class="container">
		<h2 class="title"><?=strtoupper($ruang[0]->name_r)?></h2>
		<div class="subcontainer">
			<?php 
			if ($jadwal != null) {
				foreach ($jadwal as $key) { 
					date_default_timezone_set('Asia/Jakarta');
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
				<h3 class="content nothing">BELUM ADA JADWAL SAAT INI</h3>
			<?php } ?>


			
		</div>
	</div>
	</div>
	<div style="width: 33%">
		<p>test</p>
	</div>
	
</div>
	

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
		<script type="text/javascript">
			setTimeout( function() {
				location.reload()
			}, 5 * 1000)
		</script>

	</body>

	</html>