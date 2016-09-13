<style>
#portofolio {
	margin-top: 60px !important;
}
</style>

<!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $title ?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            	<?php foreach ($galeri as $galeri) { ?>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo $galeri->id_galeri ?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar)?>" class="img-responsive" alt="<?php echo $galeri->judul ?>">
                    </a>
                </div>
                <?php }?>               
            </div>
        </div>
    </section>
    
    <?php foreach ($modal as $modal) { ?>
     <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $modal->id_galeri?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $modal->judul ?></h2>
                            <hr class="star-primary">
                            <img src="<?php echo base_url('assets/upload/image/'.$modal->gambar)?>" class="img-responsive img-centered" alt="<?php echo $galeri->id_galeri ?>">
                            <p><?php echo $galeri->keterangan ?></p>
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    