<section class="sliderku>
	<div class="row">
		<div class="col-md-12">
			<div id="owl-demo" class="owl-carousel">
			<?php foreach ($slider as $slider ) { ?>
				<div class="item">
					<img src="<?php echo base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?php echo $slider->judul ?>" title="<?php echo $slider->judul ?>">
				</div>
			<?php }?>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo base_url()?>assets/owl-carousel/owl-carousel/owl.carousel.js"></script>


    <!-- Demo -->

    <style>
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({

      navigation : true,
      autoPlay	 : 3000,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
    </script>

