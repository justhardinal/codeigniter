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
			<p class="text-right"><a href="<?php echo base_url('document') ?>"><i class="fa fa-backward"></i> Back To Document</a></p>
			<table class="table table-bordered table-hover table-resposive">
				<tr>
					<td>Document Title</td>
					<td>: <?php echo $dokumen->judul ?></td>
				</tr>
				<tr>
					<td>Document Category</td>
					<td>: <?php echo $dokumen->nama_kategori_dokumen ?></td>
				</tr>
				<tr>
					<td>Document Status</td>
					<td>: <?php echo $dokumen->status_dokumen ?></td>
				</tr>
				<tr>
					<td>Document Type</td>
					<td>: <?php echo $dokumen->jenis_dokumen ?></td>
				</tr>
				<tr>
					<td>Filename</td>
					<td>
						<a href="<?php echo base_url('document/download/'.$dokumen->id_dokumen) ?>" 
						target="_blank" title="<?php echo $dokumen->gambar?>">
						<i class="fa fa-download"><?php echo $dokumen->gambar?>
						</i></a>
					</td>
				</tr>
				<tr>
					<td>Last Update</td>
					<td>: <?php echo date('d M Y',strtotime($dokumen->tanggal)) ?></td>
				</tr>
				<tr>
					<td>Description</td>
				</tr>
				<tr>					
					<td colspan="2"><?php echo $dokumen->isi ?></td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</section>