<?php foreach ($ruangan as $r) { ?>
	<h3><?=$r->name_r?></h3>
	<table>
		<tr>
			<td>Lantai</td>
			<td>&nbsp;:</td>
			<td><?=$r->lantai_r?></td>
		</tr>
		<tr>
			<td>Fasilitas</td>
			<td>&nbsp;:</td>
			<td><?=$r->fasilitas_r?></td>
		</tr>
		<tr>
			<td>Kapasitas</td>
			<td>&nbsp;:</td>
			<td><?=$r->kapasitas_r?> org</td>
		</tr>
	</table>
<?php } ?>

<div class="card">
	<div class="card-body">
		<div id="calendar" style="width: 900px; margin: 40px auto; font-size: 14px;"></div>
	</div>
</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="<?=site_url('ruangan/jadwal_store')?>" id="form_create">
				<input type="hidden" name="calendar_id" value="0">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Buat Jadwal Rapat</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="alert alert-danger" style="display: none;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">NIP Pemesan<span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="nip" class="form-control" value="<?=$this->session->userdata('nip')?>" readonly required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">Ruangan<span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="code_r" class="form-control" value="<?=$code_r?>" readonly required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-6">Judul Rapat  <span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" placeholder="Judul" required autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-6">Deskripsi Rapat</label>
						<div class="col-sm-10">
							<textarea name="desc" rows="3" class="form-control" placeholder="Deskripsi" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Warna Jadwal</label>
						<div class="col-sm-10">
							<select name="color" class="form-control">
								<option value="">Choose</option>
								<option style="color:#3F51B5;" value="#3F51B5">&#9724; Indigo</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#009688;" value="#009688">&#9724; Teal</option>                       
								<option style="color:#FFEB3B;" value="#FFEB3B">&#9724; Yellow</option>
								<option style="color:#FF9800;" value="#FF9800">&#9724; Orange</option>
								<option style="color:#F44336;" value="#F44336">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">Mulai Rapat</label>
						<div class="col-sm-10">
							<input id="datetimepicker1" type="text" class="form-control" name="start" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">Selesai Rapat</label>
						<div class="col-sm-10">
							<input id="datetimepicker2" type="text" class="form-control" name="end"/>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END CREATE MODAL -->

<!-- EDIT MODAL -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" id="form_update">
				<input type="hidden" name="calendar_id" value="0">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Ubah Jadwal Rapat</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<div class="modal-body">

					<input type="hidden" name="id" class="form-control" readonly required>
					<div class="form-group">
						<div class="alert alert-danger" style="display: none;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">NIP Pemesan<span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="nip" class="form-control" readonly required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">Ruangan<span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="code_r" class="form-control" readonly required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-6">Judul Rapat  <span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" placeholder="Judul" required autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-6">Deskripsi Rapat</label>
						<div class="col-sm-10">
							<textarea id="desc" name="desc" rows="3" class="form-control" placeholder="Deskripsi" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Warna Judul</label>
						<div class="col-sm-10">
							<select name="color" class="form-control">
								<option value="">Warna Judul</option>
								<option style="color:#3F51B5;" value="#3F51B5">&#9724; Indigo</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#009688;" value="#009688">&#9724; Teal</option>                       
								<option style="color:#FFEB3B;" value="#FFEB3B">&#9724; Yellow</option>
								<option style="color:#FF9800;" value="#FF9800">&#9724; Orange</option>
								<option style="color:#F44336;" value="#F44336">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">Mulai Rapat</label>
						<div class="col-sm-10">
							<input id="datetimepicker3" type="text" class="form-control" name="start" autocomplete="off" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">Selesai Rapat</label>
						<div class="col-sm-10">
							<input id="datetimepicker4" type="text" class="form-control" name="end" autocomplete="off" />
						</div>
					</div>

				</div>
				<div class="modal-footer" id="modal-footer">
					<?=$this->session->userdata('nip_jadwal')?>
					<!-- <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a> -->
					<a href="" class="btn btn-danger">Batalkan</a>
					<button class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END EDIT MODAL -->