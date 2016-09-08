<?php 
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open(base_url('admin/dasbor/konfigurasi'));
?>

<div class="col-md-5">
	<div class="form-group form-group-lg">
		<label>Nama Organinisasi</label>
		<input type="text" name="namaweb" class="form-control" placeholder="Nama Web" value="<?php echo $konfigurasi->namaweb ?>">
	</div>
	<div class="form-group">
		<label>Tagline/Motto</label>
		<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline?>">
	</div>
	<div class="form-group">
		<label>Website</label>
		<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $konfigurasi->website?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" placeholder="email resmi" value="<?php echo $konfigurasi->email?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon?>">
	</div>
	<div class="form-group form-group-lg">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" placeholder="alamat Lengkat"><?php echo $konfigurasi->alamat ?></textarea>
	</div>
</div>

<div class="col-md-7">
	<div class="form-group form-group-lg">
		<label>Keywords</label>
		<textarea name="keyword" class="form-control" placeholder="Keywords"><?php echo $konfigurasi->keyword ?></textarea>
	</div>
	<div class="form-group form-group-lg">
		<label>Description</label>
		<textarea name="description" class="form-control" placeholder="description"><?php echo $konfigurasi->description ?></textarea>
	</div>
	<div class="form-group form-group-lg">
		<label>Meta Text</label>
		<textarea name="metatext" class="form-control" placeholder="metatext"><?php echo $konfigurasi->metatext ?></textarea>
	</div>
	<div class="form-group form-group-lg">
		<label>Google Map</label>
		<textarea name="google_map" class="form-control" placeholder="Kode Iframe Google Map"><?php echo $konfigurasi->google_map ?></textarea>
	</div>
	<hr>
	<style>
	iframe {
		width : 100% ;
		height: 100px;
	}
	</style>
	<?php echo $konfigurasi->google_map ?>
</div>

<div class="col-md-12">
	<input type="submit" name="submit" class="btn btn-primary btn-primary-lg" value="Simpan Konfigurasi">
</div>
<?php 
	echo form_close();

?>