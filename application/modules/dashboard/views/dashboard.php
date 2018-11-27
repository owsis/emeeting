
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
