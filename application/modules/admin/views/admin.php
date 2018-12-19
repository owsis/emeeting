<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<button class="btn btn-success btn-block" data-toggle="modal" data-target="#tambahModal">
			Tambah Ruangan Baru
			<i class="mdi mdi-plus"></i>
		</button>
	</div>
</div>
<!-- <p><?=$test?></p> -->

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="forms-sample" action="<?=site_url('admin/add_ruangan')?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ui-front">

					<div class="form-group">
						<label for="name_r">Nama Ruangan</label>
						<input type="text" class="form-control" name="name_r" placeholder="Name" required> 
					</div>
					<div class="form-group">
						<label for="lt_r">Lantai Ruangan</label>
						<input type="text" class="form-control" name="lantai_r" placeholder="Lantai" maxlength="1" required> 
					</div>
					<div class="form-group">
						<label for="kapasitas_r">Kapasitas Ruangan</label>
						<input type="text" class="form-control" name="kapasitas_r" placeholder="Kapasitas Ruangan" required> 
					</div>
					<div class="form-group">
						<label for="fasilitas_r">Fasilitas Ruangan</label> 
						<textarea class="form-control" name="fasilitas_r" rows="2"></textarea> 
					</div>
					<div class="form-group">
						<label for="admin_r">Penanggung Jawab Ruangan (PJ)</label>
						<input id="nunker" type="text" class="form-control" name="nunker_r" placeholder="Penanggung Jawab" required> 
						<input id="kunker" type="hidden" name="kunker_r" required />
					</div>
					<!-- <div class="form-group">
						<label for="email_r">Email1 PJ</label>
						<input type="text" class="form-control" name="email1_r" placeholder="Email 1" required=""> 
					</div>
					<div class="form-group">
						<label for="email_r">Email2 PJ</label>
						<input type="text" class="form-control" name="email2_r" placeholder="Email 2"> 
					</div>
					<div class="form-group">
						<label for="phone_r">No. Handphone PJ</label>
						<input type="text" class="form-control" name="phone_r" placeholder="No. Handphone" required> 
					</div> -->

					<div class="form-group">
						<label>Foto Ruangan</label>
						<input type="file" name="img_r" class="file-upload-default" required>
						<div class="input-group col-xs-12">
							<input type="text" class="form-control file-upload-info" disabled placeholder="Maks. 2Mb" required>
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-info" type="button">Upload</button>
							</span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success mr-2">Tambah</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- End Modal -->

<div class="card-columns">
	<?php foreach ($ruangan as $ruang) {?>
		<div class="card">
			<img class="card-img-top" src="<?php echo base_url("uploaded/images/ruangan/" . $ruang->img_r); ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?=$ruang->name_r?></h5>
				<p class="card-text">
					Lantai <?=$ruang->lantai_r?> <br>
					Kapasitas <?=$ruang->kapasitas_r?> org <br>
					Fasilitas : <?=$ruang->fasilitas_r?>
				</p>
				<div class="row">
					<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#detailModal<?=$ruang->id?>">Ubah</button>
					<!-- <a href="<?=site_url('ruangan/jadwal/' . $ruang->code_r)?>" class="btn btn-success">Lihat Jadwal</a> -->
				</div>
			</div>
		</div>

		<!-- Edit Modal -->
		<div class="modal fade" id="detailModal<?=$ruang->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="forms-sample" action="<?=site_url('admin/update_ruangan/'. $ruang->id)?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Ruangan <span style="text-decoration: underline;"><?=$ruang->name_r?><span></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="name_r">Nama Ruangan</label>
									<input type="text" class="form-control" name="name_r-edit" value="<?=$ruang->name_r?>" placeholder="Name" required> 
								</div>
								<div class="form-group">
									<label for="lt_r">Lantai Ruangan</label>
									<input type="text" class="form-control" name="lantai_r-edit" value="<?=$ruang->lantai_r?>" placeholder="Lantai" maxlength="1" required> 
								</div>
								<div class="form-group">
									<label for="kapasitas_r">Kapasitas Ruangan</label>
									<input type="text" class="form-control" name="kapasitas_r-edit" value="<?=$ruang->kapasitas_r?>" placeholder="Kapasitas Ruangan" required> 
								</div>
								<div class="form-group">
									<label for="fasilitas_r">Fasilitas Ruangan</label> 
									<input class="form-control" name="fasilitas_r-edit" value="<?=$ruang->fasilitas_r?>" placeholder="Fasilitas Ruangan" required/> 
								</div>
								<div class="form-group">
									<label for="admin_r">Penanggung Jawab Ruangan (PJ)</label>
									<input id="nunker-edit" type="text" class="form-control" placeholder="Penanggung Jawab" name="nunker_r-edit" value="<?=$ruang->nunker_r?>" required> 
									<input id="kunker-edit" type="hidden" name="kunker_r-edit">
								</div>
								<!-- <div class="form-group">
									<label for="email_r">Email1 PJ</label>
									<input type="text" class="form-control" name="email1_r" value="<?=$ruang->email1_r?>" placeholder="Email" required> 
								</div>
								<div class="form-group">
									<label for="email_r">Email2 PJ</label>
									<input type="text" class="form-control" name="email2_r" value="<?=$ruang->email2_r?>" placeholder="Email" required> 
								</div> -->
								<!-- <div class="form-group">
									<label for="phone_r">No. Handphone PJ</label>
									<input type="text" class="form-control" name="phone_r" value="<?=$ruang->phone_r?>" placeholder="No. Handphone" required> 
								</div> -->

								<div class="form-group">
									<label>Foto Ruangan</label>
									<input type="file" name="img_r-edit" class="file-upload-default">
									<br>
									<img src="<?php echo base_url("uploaded/images/ruangan/" . $ruang->img_r); ?>" style="height: 200px; border-radius: 4px; margin: 5px auto;">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" disabled placeholder="Maks. 2Mb">
										<span class="input-group-append">
											<button class="file-upload-browse btn btn-info" type="button">Upload</button>
										</span>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<a href="<?=site_url('admin/delete_ruangan/' . $ruang->id)?>" class="btn btn-danger">Hapus</a>
								<button type="submit" class="btn btn-success mr-2">Ubah</button>
							</div>
						</form>

					</div>
				</div>
			</div>
			<!-- Edit Modal -->
		<?php } ?>
	</div>
