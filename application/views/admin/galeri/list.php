 <p><a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-primary">
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
              <th>Posisi</th>
              <th>Author</th>
              <th>Website</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach ($galeri as $galeri) { ?>
          <tr class="odd gradeX">
              <td><?php echo $i ?></td>
              <td><img src="<?php echo base_url('assets/upload/image/thumbs/').$galeri->gambar ?>" width="60"></td>
              <td><?php echo $galeri->judul ?></td>
              <td><?php echo $galeri->posisi ?></td>
              <td><?php echo $galeri->nama ?></td>
              <td><?php echo $galeri->website ?></td>
              <td>
                <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>" class="btn btn-primary btn-sm" title="Edit Site">
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
