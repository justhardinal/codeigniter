<?php 
	//informasi web
	$site_config = $this->konfigurasi_model->listing();
?>
<!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>
                        <?php echo nl2br($site_config->alamat)?>
                        </p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/hardinalfs" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About <?php echo $site_config->namaweb ?></h3>
                        <p><?php echo nl2br($site_config->description)?> <a href="<?php echo $site_config->website?>"><?php echo $site_config->website?></a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Hardinal 
                        <?php 
                        date_default_timezone_set ( 'Asia/Jakarta' );
                        echo date ( 'Y' );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    

   

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/front/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('assets/front/js/jqBootstrapValidation.js')?>"></script>
    <script src="<?php echo base_url('assets/front/js/contact_me.js')?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url('assets/front/js/freelancer.min.js')?>"></script>

</body>

</html>