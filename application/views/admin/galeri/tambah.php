
<!--  //-->
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript">
</script>
<script>
tinymce.init({
	  selector: 'textarea',
	  height: 150,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table contextmenu paste code'
	  ],
	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  content_css: [
	    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
	});
</script>

<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">','</div>');

//errror upload file
if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';	
}

//open form
echo form_open_multipart(base_url('admin/galeri/tambah'));
?>
<p>
	<a href="<?php echo base_url('admin/galeri') ?>" class="btn btn-success"><i class="fa fa-undo"> Kembali</i></a>
</p>
	<div class="col-md-8">
	    <div class="form-group">
	        <label>Judul Galeri</label>
	        <input type="text" name="judul" class="form-control" placeholder="judul" value="<?php echo set_value('judul') ?>">
	    </div>
	</div>
	
	<div class="col-md-4">
	    <div class="form-group">
	        <label>Posisi Galeri</label>
	        <select name="posisi" class="form-control">
	        	<option value="galeri">Galeri</option>
	        	<option value="homepage">Homepage Slider</option>     	
	        </select>	        
	    </div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Link Gambar Galeri</label>
			<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website')?>">
			
		</div>
	</div>
	
	<div class="col-md-12">
	    <div class="form-group">
	        <label>Keterangan Galeri</label>
	        <textarea name="keterangan" placeholder="Keterangan Galeri" class="form-control" value="<?php echo set_value('keterangan')?>"></textarea>
	    </div>
	</div>
	<div class="col-md-12">
	    <div class="form-group">
	        <input type="submit" name="submit" class="btn btn-primary" value="Save">
	        <input type="reset" name="reset" class="btn btn-default" value="Reset">
	    </div>
	</div>

<?php
//close form
echo form_close();
?>