
<?php $data = $this->session; ?>

<h1 class="section-heading">E-Meeting Room</h1>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title text-primary mb-5">Selamat Datang, <?=$data->userdata('name')?></h1>
				<div class="row">
					<div class="col-md-9">
						<address>
							<p>NIP</p>
							<p class="font-weight-bold"><?=$data->userdata('nip')?></p>
							<p>Nama Lengkap</p>
							<p class="font-weight-bold"><?=$data->userdata('name')?>,&nbsp;<?=$data->userdata('glblk')?></p>
							<p>Jabatan</p>
							<p class="font-weight-bold"><?=$data->userdata('njab')?></p>
						</address>
					</div>
					<div class="col-md-3">
						<div style="width: 200px; height: 200px;">
							<h6>Foto Profil</h6>
							<?php if($data->userdata('photo') == '') {?>
								<img src="<?=base_url("assets/images/logo-kemendesa.png")?>" style="width: 200px; height: 200px;">
							<?php } else {?>
								<img src="<?=$data->userdata('photo')?>" style="width: 200px; height: 200px;">
							<?php } ?>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<table id="dashboard-jadwal" class="table" style="width:100%">
					<thead>
						<tr>
							<th>Dok. Agenda Rapat</th>
							<th>Dok. Absensi</th>
							<th>NIP</th>
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Ruangan</th>
							<th>Mulai Rapat</th>
							<th>Selesai Rapat</th>
							<th>Jumlah Peserta</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($jadwal->result() as $val) {?>
							<tr>
								<?php if(!isset($val->doc_rapat)) {?>
									<td>
										<button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#uploadRapat">UPLOAD</button>
									</td>
								<?php } else { ?>
									<td><?=$val->doc_rapat?></td>
								<?php } ?>
								<?php if(!isset($val->doc_absensi)) {?>
									<td>
										<button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#uploadAbsensi">UPLOAD</button>
									</td>
								<?php } else { ?>
									<td><?=$val->doc_absensi?></td>
								<?php } ?>
								<td><?=$val->nip?></td>
								<td><?=$val->title?></td>
								<td><?=$val->desc?></td>
								<td><?=$val->code_r?></td>
								<td><?=$val->start?></td>
								<td><?=$val->end?></td>
								<td><?=$val->jumlah_peserta?></td>
								
							</tr>

							<!-- MODAL UPLOAD RAPAT -->
							<div class="modal fade" id="uploadRapat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<form class="form-horizontal" action="<?=site_url('dashboard/upload_doc_rapat/' . $val->id)?>" method="POST" enctype="multipart/form-data" id="form_update">
											<input type="hidden" name="calendar_id" value="0">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Agenda Dokumen Rapat</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
											<div class="modal-body">

												<input type="hidden" name="id" class="form-control" readonly required>
												<div class="form-group">
													<div class="alert alert-danger" style="display: none;"></div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Judul<span class="required"> * </span></label>
													<div class="col-sm-10">
														<input type="text" name="nip" class="form-control" value="<?=$val->title?>"readonly required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Deskripsi<span class="required"> * </span></label>
													<div class="col-sm-10">
														<input type="text" name="nip" class="form-control" value="<?=$val->desc?>"readonly required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Dokumen Rapat</label>
													<input type="file" name="doc_rapat" class="file-upload-default" id="upload-rapat">
													<div class="input-group col-sm-10">
														<input type="text" class="form-control file-upload-info" disabled placeholder="Dokumen Rapat maks. 2Mb">
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-info" type="button">Cari</button>
														</span>
													</div>
													<p class="text-danger col-sm-6" id="size-file-rapat" style="visibility: hidden;">Maksimal ukuran file 2Mb</p>
												</div>

											</div>
											<div class="modal-footer" id="modal-footer">
												<!-- <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a> -->
												<a href="" class="btn btn-danger" data-dismiss="modal">Batalkan</a>
												<button id="submitRapat" type="submit" class="btn btn-success">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!-- MODAL UPLOAD ABSENSI -->
							<div class="modal fade" id="uploadAbsensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<form class="form-horizontal" action="<?=site_url('dashboard/upload_doc_absensi/' . $val->id)?>" method="POST" enctype="multipart/form-data" id="form_update">
											<input type="hidden" name="calendar_id" value="0">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Absensi</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
											<div class="modal-body">

												<input type="hidden" name="id" class="form-control" readonly required>
												<div class="form-group">
													<div class="alert alert-danger" style="display: none;"></div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Judul<span class="required"> * </span></label>
													<div class="col-sm-10">
														<input type="text" name="nip" class="form-control" value="<?=$val->title?>"readonly required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Deskripsi<span class="required"> * </span></label>
													<div class="col-sm-10">
														<input type="text" name="nip" class="form-control" value="<?=$val->desc?>"readonly required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-6">Dokumen Absensi</label>
													<input type="file" name="doc_absensi" class="file-upload-default" id="upload-absensi">
													<div class="input-group col-sm-10">
														<input type="text" class="form-control file-upload-info" disabled placeholder="Dokumen Absensi maks. 2Mb">
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-info" type="button">Cari</button>
														</span>
													</div>
													<p class="text-danger col-sm-6" id="size-file-absensi" style="visibility: hidden;">Maksimal ukuran file 2Mb</p>
												</div>

											</div>
											<div class="modal-footer" id="modal-footer">
												<!-- <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a> -->
												<a href="" class="btn btn-danger" data-dismiss="modal">Batalkan</a>
												<button id="submitAbsensi" type="submit" class="btn btn-success">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>	
</div>