 <p><a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-primary">
 <i class="fa fa-plus"></i>Tambah</a></p>

<?php 
//cetak notifikasi
if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
?>


 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
          <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Author</th>
              <th>Jenis Berita</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach ($berita as $berita) { ?>
          <tr class="odd gradeX">
              <td><?php echo $i ?></td>
              <td><img src="<?php echo base_url('assets/upload/image/thumbs/').$berita->gambar ?>" width="60"></td>
              <td><?php echo $berita->judul ?></td>
              <td><?php echo $berita->nama_kategori_berita ?></td>
              <td><?php echo $berita->nama ?></td>
              <td><?php echo $berita->jenis_berita ?> - 	  <?php echo $berita->status_berita?>
              </td>
              <td>
                <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="btn btn-primary btn-sm" title="Edit Site">
                    <i class="fa fa-edit"></i>
                </a>
                
                <?php 
                //hapus date 
                include ('delete.php');
                ?>
              </td>
          </tr>
    <?php $i++; } ?>
      </tbody>
</table>
