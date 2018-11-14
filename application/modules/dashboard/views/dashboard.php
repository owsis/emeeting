
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
							<p>Komp</p>
							<p class="font-weight-bold"><?=$data->userdata('komp')?></p>
							<p>Unit</p>
							<p class="font-weight-bold"><?=$data->userdata('unit')?></p>
							<p>Kuntp</p>
							<p class="font-weight-bold"><?=$data->userdata('kuntp')?></p>
							<p>Kunkom</p>
							<p class="font-weight-bold"><?=$data->userdata('kunkom')?></p>
							<p>Kun Unit</p>
							<p class="font-weight-bold"><?=$data->userdata('kununit')?></p>
							<p>Kun SK</p>
							<p class="font-weight-bold"><?=$data->userdata('kunsk')?></p>
							<p>Kun SSK</p>
							<p class="font-weight-bold"><?=$data->userdata('kunssk')?></p>
						</address>
					</div>
					<div class="col-md-3">
						<div style="width: 200px; height: 200px;">
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
