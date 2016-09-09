           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">    
                
                <!-- modul Site -->          
                      <li>
                        <a href="#"><i class="fa fa-home"></i> Site<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('admin/site')?>">Data Site</a></li>
                        </ul>
                      </li> 
                      
				<!-- modul Konfigurasi -->          
                      <li>
                        <a href="#"><i class="fa fa-wrench"></i> Konfigurasi Website<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li><a href="<?php echo base_url('admin/dasbor/konfigurasi')?>">Konfigurasi Website</a></li>
	                            <li><a href="<?php echo base_url('admin/dasbor/logo')?>">Ganti Logo</a></li>
	                            <li><a href="<?php echo base_url('admin/dasbor/icon')?>">Ganti Icon</a></li>
	                        </ul>
                      </li> 

                <!-- modul User/Admin -->          
                      <li>
                        <a href="#"><i class="fa fa-user"></i> Administrator<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li><a href="<?php echo base_url('admin/user')?>">Admin Data</a></li>
	                        </ul>
                      </li>
                       
                <!-- modul Berita -->          
                      <li>
                        <a href="#"><i class="fa fa-newspaper-o"></i> Berita<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('admin/berita')?>">Data Berita</a></li>
                            <li><a href="<?php echo base_url('admin/kategori_berita')?>">Data Kategori Berita</a></li>
                        </ul>
                      </li> 
                <!-- modul Galeri -->          
                      <li>
                        <a href="#"><i class="fa fa-image"></i> Galeri<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('admin/galeri')?>">Image</a></li>
                            <li><a href="<?php echo base_url('admin/video')?>">Video</a></li>
                        </ul>
                      </li> 
                 
                <!-- modul Dokumen -->          
                      <li>
                        <a href="#"><i class="fa fa-book"></i> Dokumen<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('admin/dokumen')?>">Data Dokumen</a></li>
                            <li><a href="<?php echo base_url('admin/kategori_dokumen')?>">Data Kategori Dokumen</a></li>
                        </ul>
                      </li>                       
                
                </ul>               
            </div>            
        </nav>  
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $title?></h2>                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">                        
                        <div class="panel-body">
                            <div class="table-responsive">
