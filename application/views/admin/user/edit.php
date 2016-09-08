<?php
//validasi input
echo validation_errors('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">
    <div class="form-group form-group-lg">
        <label>User Untuk Site??</label>
        <select name="id_site" class="form-control">
            <?php foreach($site as $site) { ?>
            <option value="<?php echo $site->id_site ?>"
                <?php if ($user->id_site==$site->id_site) {
                                 echo "selected"; } ?>
            >
                <?php echo $site->nama_site. ' - ' .$site->kota ?>
            </option>
            <?php } ?>

        </select>
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" >
    </div>

</div>

<div class="col-md-6">
    <div class="form-group form-group-lg">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user->nama ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $user->email ?>">
    </div>
    <div class="form-group">
        <label>Akses Level</label>
        <select name="akses_level" class="form-control">
            <option value="admin" <?php if($user->akses_level=="admin") { echo "selected"; } ?> >Administrator</option>
            <option value="user" <?php if($user->akses_level=="user") { echo "selected"; } ?>>User/Staff</option>
            <option value="blocked" <?php if($user->akses_level=="blocked") { echo "selected"; } ?>>Blocked</option>
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Save DAta">
        <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset DAta">
    </div>
</div>


<?php 
echo form_close();
?>




