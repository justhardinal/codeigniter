<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">','</div>');


//open form
echo form_open(base_url('admin/site/edit/'.$site->id_site));
?>

<div class="col-md-6">
    <div class="form-group">
        <label>Nama Site</label>
        <input type="text" name="nama_site" class="form-control" placeholder="Nama Site" value="<?php echo $site->nama_site ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Contact Person</label>
        <input type="text" name="contact_person" class="form-control" placeholder="Contact Person" value="<?php echo $site->contact_person ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $site->alamat ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $site->telepon ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>HP</label>
        <input type="text" name="hp" class="form-control" placeholder="Phone Number" value="<?php echo $site->hp ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Kota</label>
        <input type="text" name="kota" class="form-control" placeholder="kota" value="<?php echo $site->kota ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $site->email ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" placeholder="keterangan"><?php echo $site->keterangan?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
        <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
    </div>
</div>

<?php

//close form
echo form_close();
?>