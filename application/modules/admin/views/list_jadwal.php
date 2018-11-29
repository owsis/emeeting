<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">List Jadwal</h3>
				<p class="card-description"></p>
				<table id="list-jadwal" class="table" style="width:100%">
					<thead>
						<tr>
							<th>Aksi</th>
							<th>Pemesan</th>
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Kode Ruangan</th>
							<th>Mulai Rapat</th>
							<th>Selesai Rapat</th>
							<th>Status</th>
							<th>Tgl. Pesan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($jadwal as $key) {?>
							<tr>
								<td>
									<?php if($key->status == 'diterima') {?>
										<a href="<?=site_url('admin/jadwal_user_tolak/'. $key->id)?>" class="btn btn-danger" style="width: 80px; padding: 5px 10px;">TOLAK</a>
									<?php } else if ($key->status == 'ditolak') {?>
										<a href="javascript:void" class="btn btn-danger" style="width: 120px; padding: 5px 5px;">SUDAH DITOLAK</a>
									<?php } else { ?>
										<a href="<?=site_url('admin/jadwal_user_setuju/'. $key->id)?>" class="btn btn-success mb-1" style="width: 80px; padding: 5px 10px;">SETUJUI</a>
									<br>
									<a href="<?=site_url('admin/jadwal_user_tolak/'. $key->id)?>" class="btn btn-danger" style="width: 80px; padding: 5px 10px;">TOLAK</a>
									<?php }?>
								</td>
								<td><?=$key->nip?></td>
								<td><?=$key->title?></td>
								<td><?=strlen($key->desc) > 15 ? substr($key->desc, 0, 15) . ' ...' : $key->desc ;?></td>
								<td>
									<a href="" class="btn btn-outline-primary">
										<?php foreach($ruang as $val) {
											if ($val->code_r == $key->code_r) {
												echo $val->name_r;
											}
										}
										?>
									</a>
								</td>
								<td><?=$key->start?></td>
								<td><?=$key->end?></td>
								<td>
									<?php if($key->status == 'diterima') {?>
										<label class="badge badge-success">Di Terima</label>
									<?php } else if ($key->status == 'ditolak') {?>
										<label class="badge badge-danger">Di Tolak</label>
									<?php } else { ?>
										<label class="badge badge-info">Order</label>
									<?php }?>
								</td>
								<td><?=$key->created_at?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>
</div>
