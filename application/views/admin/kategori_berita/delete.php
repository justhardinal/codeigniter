<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $kategori_berita->id_kategori_berita?>" title="Delete Site">
  <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $kategori_berita->id_kategori_berita?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Kategori Berita</h4>
            </div>
            <div class="modal-body">
                Yakin Dihapus Kategori Berita : <?php echo "<strong>".$kategori_berita->nama_kategori_berita."</strong>"?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('admin/kategori_berita/delete/'.$kategori_berita->id_kategori_berita)?>" class="btn btn-primary btn-sm">
                <i class="fa fa-trash-o">Ya, Hapus Data</i></a>
            </div>
        </div>
    </div>
</div>
