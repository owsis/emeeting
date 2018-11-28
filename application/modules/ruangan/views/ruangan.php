<!-- <div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<button class="btn btn-success btn-block" data-toggle="modal" data-target="#tambahModal">
			Tambah Ruangan Baru
			<i class="mdi mdi-plus"></i>
		</button>
	</div>
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="forms-sample" action="<?=site_url('ruangan/store')?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="name_r">Nama Ruangan</label>
						<input type="text" class="form-control" name="name_r" placeholder="Name"> 
					</div>
					<div class="form-group">
						<label for="lt_r">Lantai Ruangan</label>
						<input type="text" class="form-control" name="lantai_r" placeholder="Lantai" maxlength="1"> 
					</div>
					<div class="form-group">
						<label for="kapasitas_r">Kapasitas Ruangan</label>
						<input type="text" class="form-control" name="kapasitas_r" placeholder="Kapasitas Ruangan"> 
					</div>
					<div class="form-group">
						<label for="fasilitas_r">Fasilitas Ruangan</label> 
						<textarea class="form-control" name="fasilitas_r" rows="2"></textarea> 
					</div>
					<div class="form-group">
						<label for="admin_r">Penanggung Jawab Ruangan (PJ)</label>
						<input type="text" class="form-control" name="admin_r" placeholder="Penanggung Jawab"> 
					</div>
					<div class="form-group">
						<label for="email_r">Email PJ</label>
						<input type="text" class="form-control" name="email_r" placeholder="Email"> 
					</div>
					<div class="form-group">
						<label for="phone_r">No. Handphone PJ</label>
						<input type="text" class="form-control" name="phone_r" placeholder="No. Handphone"> 
					</div>

					<div class="form-group">
						<label>Foto Ruangan</label>
						<input type="file" name="img_r" class="file-upload-default">
						<div class="input-group col-xs-12">
							<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-info" type="button">Upload</button>
							</span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
				</div>
			</form>

		</div>
	</div>
</div> -->
<!-- End Modal -->

<div class="card-columns">
	<?php foreach ($ruangan as $ruang) {?>
		<div class="card">
			<img class="card-img-top" src="<?php echo base_url("uploaded/images/ruangan/" . $ruang->img_r); ?>" alt="Card image cap">
			<div class="card-body">
				<a href="<?=site_url('welcome/detail/'. $ruang->code_r)?>">
					<h5 class="card-title"><?=$ruang->name_r?></h5>
				</a>
				<p class="card-text">
					Lantai <?=$ruang->lantai_r?> <br>
					Kapasitas <?=$ruang->kapasitas_r?> org <br>
					Fasilitas : <?=$ruang->fasilitas_r?>
				</p>
				<div class="row">
				<!-- <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#detailModal<?=$ruang->id?>">Ubah</button> -->
				<a href="<?=site_url('ruangan/jadwal/' . $ruang->code_r)?>" class="btn btn-success">Lihat Jadwal</a>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<!-- <div class="modal fade" id="detailModal<?=$ruang->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="forms-sample" action="<?=site_url('ruangan/store')?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Ruangan <span style="text-decoration: underline;"><?=$ruang->name_r?><span></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="name_r">Nama Ruangan</label>
								<input type="text" class="form-control" name="name_r" value="<?=$ruang->name_r?>" placeholder="Name" required> 
							</div>
							<div class="form-group">
								<label for="lt_r">Lantai Ruangan</label>
								<input type="text" class="form-control" name="lantai_r" value="<?=$ruang->lantai_r?>" placeholder="Lantai" maxlength="1" required> 
							</div>
							<div class="form-group">
								<label for="kapasitas_r">Kapasitas Ruangan</label>
								<input type="text" class="form-control" name="kapasitas_r" value="<?=$ruang->kapasitas_r?>" placeholder="Kapasitas Ruangan" required> 
							</div>
							<div class="form-group">
								<label for="fasilitas_r">Fasilitas Ruangan</label> 
								<input class="form-control" name="fasilitas_r" value="<?=$ruang->fasilitas_r?>" placeholder="Fasilitas Ruangan" required/> 
							</div>
							<div class="form-group">
								<label for="admin_r">Penanggung Jawab Ruangan (PJ)</label>
								<input type="text" class="form-control" name="admin_r" value="<?=$ruang->admin_r?>" placeholder="Penanggung Jawab" required> 
							</div>
							<div class="form-group">
								<label for="email_r">Email PJ</label>
								<input type="text" class="form-control" name="email_r" value="<?=$ruang->email_r?>" placeholder="Email" required> 
							</div>
							<div class="form-group">
								<label for="phone_r">No. Handphone PJ</label>
								<input type="text" class="form-control" name="phone_r" value="<?=$ruang->phone_r?>" placeholder="No. Handphone" required> 
							</div>

							<div class="form-group">
								<label>Foto Ruangan</label>
								<input type="file" name="img_r" class="file-upload-default">
								<div class="input-group col-xs-12">
									<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
									<span class="input-group-append">
										<button class="file-upload-browse btn btn-info" type="button">Upload</button>
									</span>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success mr-2">Edit</button>
						</div>
					</form>

				</div>
			</div>
		</div> -->
		<!-- End Modal -->
	<?php } ?>
</div>
