
<h2 class="section-heading">E-Meeting Room</h2>
<div class="row">
	<!-- <p>test</p> -->

	<!-- Photo Grid -->
	<div class="row-img">
		<?php foreach ($ruangan as $ruang) { ?>

		<div class="col-md-4 col-lg-4 col-sm-4">
			<figure class="snip1174 navy">
				<img src="<?php echo base_url("uploaded/images/ruangan/" . $ruang->img_r); ?>" style="width:100%">
				<figcaption>
					<a href="javascript::void" class="btn-link-hover">
						<h2 style="line-height: 28px">
							<?=$ruang->name_r?>
						</h2>
						<p style="font-weight: 400;">Lantai
							<?=$ruang->lantai_r?>, untuk
							<?=$ruang->kapasitas_r?> org</p>
					</a>
					<a href="<?=site_url('welcome/detail/' . $ruang->code_r)?>" class="btn-img-hover">Lihat Detail Jadwal</a>
				</figcaption>
			</figure>
		</div>


		<?php } ?>

	</div>

</div> <!-- End: .row -->
		