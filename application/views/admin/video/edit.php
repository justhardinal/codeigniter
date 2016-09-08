<?php
// validasi form
echo validation_errors ( '<div class="alert alert-warning">', '</div>' );

// open Form
echo form_open (base_url('admin/video/edit/').$video->id_video );
?>

<div class="col-md-8">
	<div class="form-group">
		<label>Judul Video</label> 
		<input type="text" name="judul" class="form-control" placeholder="Judul Video" value="<?php echo $video->judul ?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Posisi Video</label>
		<select name="posisi">
			<option value="galeri"<?php if ($video->posisi == "galeri") {echo "selected";}?>>Galeri Video</option>
			<option value="homepage"<?php if ($video->posisi == "homepage") {echo "selected";}?>>Homepage Video</option>
		</select>
	</div>
</div>

<div class="col-md-12">
	<label>Link Video</label>
	<div class="form-group input-group form-group-lg"><span class="input-group-addon">https://www.youtube.com/watch?v=</span>
		<input type="text" name="video" class="form-control" placeholder="Kode Link youtube.com setelah (=)"><?php echo set_value('video')?>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo $video->keterangan ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Save">
		<input type="reset" name="reset"   class="btn btn-default" value="Reset">
	</div>
</div>


<?php echo form_close();?>