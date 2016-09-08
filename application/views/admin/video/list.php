 <p>
 	<?php 
	//tambah kategori
	include 'tambah.php';
	?>
</p>

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
              <th>Judul</th>
              <th>Keterangan</th>
              <th>Posisi</th>
              <th>video</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach ($video as $video) { ?>
          <tr class="odd gradeX">
              <td><?php echo $i ?></td>
              <td><?php echo $video->judul ?></td>
              <td><?php echo $video->keterangan ?></td>
              <td><?php echo $video->posisi ?></td>
              <td><iframe width="200" height="113" src="https://www.youtube.com/embed/<?php echo $video->video ?>" framboder="0" allowfullscreen></iframe></td>
              <td>
                <a href="<?php echo base_url('admin/video/edit/'.$video->id_video) ?>" class="btn btn-primary btn-sm" title="Edit Kategori Berita">
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
