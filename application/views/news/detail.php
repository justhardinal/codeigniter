<div class="clearfix"></div>

<!-- merapihkan jeda judul "LAtest News -->
<style>
.kotak-atas {
	margin-top:40px;
}
</style>
<!-- Latest News -->
    <section class="kotak-atas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $berita->judul ?></h2>
                    <hr class="star-light">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
            	<p><img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" class="img img-responsive"></p>
                <?php echo $berita->isi ?>
                </div>
                <hr>
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url('news')?>" class="btn btn-primary btn-lg">
                        <i class="fa fa-newspaper-o"></i> See More News....
                    </a>
                </div>
            </div>
        </div>
    </section>