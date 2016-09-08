<!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Latest Video</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php foreach ($video as $video) { ?>
                
                <div class="col-md-6">
                	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video->video?>" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <?php } ?>
            </div>
        </div>
    </section>