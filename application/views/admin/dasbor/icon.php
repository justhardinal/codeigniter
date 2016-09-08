<?php 
	echo validation_errors('<div class="alert alert-warning">','</div>');
	
	//error
	if(isset($error)){
		echo '<div class="alert alert-success">';
		echo $error;
		echo '</div>';
	}

	echo form_open_multipart(base_url('admin/dasbor/icon'));
?>
<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>"
<div class="col-md-4">
<h4>Upload Icon Baru </h4><hr>
	<div class="form-group form-group-lg">
		<label>Upload Icon Baru</label>
		<input type="file" class="form-control" name="icon" required>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-primary-lg" value="Simpan Konfigurasi">
	</div>
</div>
<div class="col-md-8">
	<h4>LOGO Saat Ini </h4><hr>
	<p><img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon)?>" class="img img-responsive"></p>
</div>

<?php echo form_close() ?>