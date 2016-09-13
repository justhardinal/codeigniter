    <?php 
    	include ('slider.php');
    	include ('video.php');
    	
    	
    ?>
    

    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>LATEST NEWS</h2>
                    <hr class="star-light">
                    <hr>
                </div>
            </div>
            <div class="row">
            <?php foreach ($berita as $berita) { ?>
                <div class="col-lg-4">
                <h3><a href="<?php echo base_url('news/read/'.$berita->slug_berita)?>"><?php echo $berita->judul ?></a></h3>
            	<p><img src="<?php echo base_url('./assets/upload/image/thumbs/'.$berita->gambar);?>" class="img img-responsive"></p>
                <?php echo character_limiter($berita->isi,150) ?>
                <p><a href="<?php echo base_url('news/read/'.$berita->slug_berita)?>" class="btn btn-primary">Read More...</a></p>
                </div>
                <?php } ?>
                <hr>
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url('news')?>" class="btn btn-primary btn-lg">
                        <i class="fa fa-newspaper-o"></i> See More News....
                    </a>
                </div>
            </div>
        </div>
    </section>

 