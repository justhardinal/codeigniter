 <p><a href="<?php echo base_url('admin/dokumen/tambah') ?>" class="btn btn-primary">
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
              <th>Files</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Jenis - Status</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach ($dokumen as $dokumen) { ?>
          <tr class="odd gradeX">
              <td><?php echo $i ?></td>
              <td>
             	<a href="<?php echo base_url('admin/dokumen/download/'.$dokumen->id_dokumen)?>" target="_blank" title="<?php echo $dokumen->gambar?>">
             	<i class="fa fa-download"> Unduh </i></a>           	
              </td>
              <td><?php echo $dokumen->judul ?></td>
              <td><?php echo $dokumen->nama_kategori_dokumen ?></td>
              <td><?php echo $dokumen->jenis_dokumen ?> - 	  <?php echo $dokumen->status_dokumen?>
              </td>
              <td>
                <a href="<?php echo base_url('admin/dokumen/edit/'.$dokumen->id_dokumen) ?>" class="btn btn-primary btn-sm" title="Edit Site">
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
