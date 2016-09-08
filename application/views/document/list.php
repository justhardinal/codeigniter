<!-- Documentt -->
<section class="kotak-atas">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2><?php echo $title?></h2>
				<hr class="star-light">
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<?php if(count($dokumen) < 1) { ?>
			<div class="alert alert-success">
			<p>There is No Document</p></div>
			<?php }else{?>
				<table class="table table-bordered table-hover table-responsive">
					<tr>
						<th>#</th>
						<th>File</th>
						<th>Document Title</th>
						<th>Category</th>
						<th>Type</th>						
					</tr>
					<?php $i= 1; foreach ($dokumen as $dokumen) { ?>
					<tr>
						<td><?php echo $i ?>.</td>
						<td>
							<a href="<?php echo base_url('document/download/'.$dokumen->id_dokumen) ?>" 
							target="_blank" class="btn btn-primary btn-sm" title="<?php echo $dokumen->gambar?>">
							<i class="fa fa-download">Download</i></a>
						</td>
						<td>
						<a href ="<?php echo base_url('document/read/'.$dokumen->slug_dokumen) ?>">
						<?php echo $dokumen->judul ?><sup><i class="fa fa-link"></i></sup></a>
						</td>
						<td><a href="<?php echo base_url('document/category/'.$dokumen->id_kategori_dokumen) ?>"
						target="_blank"><?php echo $dokumen->nama_kategori_dokumen ?><sup><i class="fa fa-chain"></i></sup></a></td>
						<td><?php echo $dokumen->jenis_dokumen ?></td>
					</tr>
					<?php $i++; } ?>
				</table>
				<?php } ?>
			</div>
		</div>
	</div>
</section>