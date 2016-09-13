<?php 
	//informasi web
	$site_config = $this->konfigurasi_model->listing();
?>

<style>
img.logoku {
background-color : #fff;
max-height: 60px;
width: auto;
position: absolute;
margin-top: -20px !important;
border-radius: 10px;
</style>
 <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <?php if ($site_config->logo !="") { ?>
                <a class="navbar-brand" href="<?php echo base_url() ?>" title="<?php echo $site_config->namaweb ?>">
                	<img alt="<?php echo $site_config->namaweb ?>" src="<?php echo base_url('assets/upload/image/'.$site_config->logo) ?>" class="logoku"
                	title ="<?php echo $site_config->namaweb ?>">
                </a>
            	
            	<?php }else { ?>
            	<a class="navbar-brand" href="<?php echo base_url() ?>" title="<?php echo $site_config->namaweb ?>"><?php echo $site_config->namaweb ?></a>
           		<?php }?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('news') ?>">NEWS</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('document') ?>">DOCUMENT</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('galeri') ?>">GALLERY</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('video') ?>">VIDEO</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('contact') ?>">CONTACT</a>
                    </li>
                    <?php if($this->session->userdata('username') != "") { ?>
                    
                    <li class="page-scroll">
                        <a href="<?php echo base_url('admin/dasbor') ?>" target="_blank" class="btn btn-success"><i class="fa fa-user "></i>
                        <?php echo $this->session->userdata('username') ?></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('login/logout') ?>" target="_blank" class="btn btn-success"><i class="fa fa-sign-out "></i> 
                        Logout</a>
                    </li>
                    
                    <?php }else { ?>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('login') ?>" target="_blank" class="btn btn-success"><i class="fa fa-key "></i> Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
