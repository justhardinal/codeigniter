
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
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>
<p>
	<a href="<?php echo base_url('admin/berita') ?>" class="btn btn-success"><i class="fa fa-undo"> Kembali</i></a>
</p>
	<div class="col-md-8">
	    <div class="form-group">
	        <label>Judul Berita</label>
	        <input type="text" name="judul" class="form-control" placeholder="judul" value="<?php echo $berita->judul ?>">
	    </div>
	</div>
	
	<div class="col-md-4">
	    <div class="form-group">
	        <label>Jenis</label>
	        <select name="jenis_berita" class="form-control">
	        	<option value="berita" <?php if($berita->jenis_berita =="berita"){echo "selected" ;}?>>Berita</option>
	        	<option value="profil" <?php if($berita->jenis_berita =="profil"){echo "selected" ;}?>>Profil</option>     	
	        </select>	        
	    </div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
	        <label>Kategori <sup><a href="<?php echo base_url('admin/kategori_berita') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></sup></label>
	        <select name="id_kategori_berita" class="form-control">
	        	<?php foreach ($kategori_berita as $kategori_berita){ ?>
	        	<option value="<?php echo $kategori_berita->id_kategori_berita ?>"	
	        	<?php if($berita->id_kategori_berita == $kategori_berita->id_kategori_berita ){echo "selected" ;}?>>
	        	<?php echo $kategori_berita->nama_kategori_berita ?>
	        	</option>
	        	<?php }?>
	        </select>	        
	    </div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Status Berita</label>
			<select name="status_berita" class="form-control">
				<option value="publish" <?php if($berita->status_berita =="publish"){echo "selected" ;}?>>Publikasi</option>
				<option value="draft" <?php if($berita->status_berita =="draft"){echo "selected" ;}?>>Simpan Ke Draft</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>
	</div>
	<div class="col-md-12">
	    <div class="form-group">
	        <label>Isi Berita</label>
	        <textarea name="isi" placeholder="Isi Berita" class="form-control"><?php echo $berita->isi ?></textarea>
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