
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
echo form_open_multipart(base_url('admin/dokumen/edit/'.$dokumen->id_dokumen));
?>
<p>
	<a href="<?php echo base_url('admin/dokumen') ?>" class="btn btn-success"><i class="fa fa-undo"> Kembali</i></a>
</p>
	<div class="col-md-8">
	    <div class="form-group">
	        <label>Judul Dokumen</label>
	        <input type="text" name="judul" class="form-control" placeholder="judul" value="<?php echo $dokumen->judul ?>">
	    </div>
	</div>
	
	<div class="col-md-4">
	    <div class="form-group">
	        <label>Jenis</label>
	        <select name="jenis_dokumen" class="form-control">
	        	<option value="internal" <?php if($dokumen->jenis_dokumen =="internal"){echo "selected" ;}?>>Dokumen</option>
	        	<option value="external" <?php if($dokumen->jenis_dokumen =="external"){echo "selected" ;}?>>Profil</option>     	
	        </select>	        
	    </div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
	        <label>Kategori <sup><a href="<?php echo base_url('admin/kategori_dokumen') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sup></label>
	        <select name="id_kategori_dokumen" class="form-control">
	        	<?php foreach ($kategori_dokumen as $kategori_dokumen){ ?>
	        	<option value="<?php echo $kategori_dokumen->id_kategori_dokumen ?>"	
	        	<?php if($dokumen->id_kategori_dokumen == $kategori_dokumen->id_kategori_dokumen ){echo "selected" ;}?>>
	        	<?php echo $kategori_dokumen->nama_kategori_dokumen ?>
	        	</option>
	        	<?php }?>
	        </select>	        
	    </div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Status Dokumen</label>
			<select name="status_dokumen" class="form-control">
				<option value="publish" <?php if($dokumen->status_dokumen =="publish"){echo "selected" ;}?>>Publikasi</option>
				<option value="draft" <?php if($dokumen->status_dokumen =="draft"){echo "selected" ;}?>>Simpan Ke Draft</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Upload Dokumen</label>
			<input type="file" name="gambar" class="form-control">
		</div>
	</div>
	<div class="col-md-12">
	    <div class="form-group">
	        <label>Isi Dokumen</label>
	        <textarea name="isi" placeholder="Isi Dokumen" class="form-control"><?php echo $dokumen->isi ?></textarea>
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