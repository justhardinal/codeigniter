<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $user->id_user?>" title="Delete user">
  <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $user->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus</h4>
            </div>
            <div class="modal-body">
                Yakin Dihapus <?php echo "<strong>".$user->nama."</strong>"?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('admin/user/delete/'.$user->id_user)?>" class="btn btn-primary btn-sm">
                <i class="fa fa-trash-o">Ya, Hapus Data</i></a>
            </div>
        </div>
    </div>
</div>
