<?php
// validasi form
echo validation_errors ( '<div class="alert alert-warning">', '</div>' );

// open Form
echo form_open (base_url('admin/kategori_dokumen/edit/').$kategori_dokumen->id_kategori_dokumen );
?>

<div class="col-md-8">
	<div class="form-group">
		<label>Kategori Dokumen</label> 
		<input type="text" name="nama_kategori_dokumen" class="form-control" placeholder="Kategori Dokumen" value="<?php echo $kategori_dokumen->nama_kategori_dokumen ?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Urutan Dokumen</label> 
		<input type="number" name="urutan"	class="form-control" placeholder="Urutan Dokumen" value="<?php echo $kategori_dokumen->urutan ?>" required>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control" value="<?php echo $kategori_dokumen->keterangan ?>"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Save">
		<input type="reset" name="reset"   class="btn btn-default" value="Reset">
	</div>
</div>


<?php echo form_close();?>