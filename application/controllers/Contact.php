<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	//loading database
	public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
		$this->load->model('galeri_model');
		$this->load->model('video_model');
	}

	//index
	public function index(){
		$header = $this->berita_model->berita_utama();
		$berita = $this->berita_model->berita_home();
		$site   = $this->konfigurasi_model->listing();
		$slider = $this->galeri_model->home();
		$video  = $this->video_model->video_homepage();
		
		$data =array('title' 	=> 'Kontak - '.$site->namaweb.' | '.$site->tagline,
					 'header'	=>  $header,
					 'berita'	=>  $berita,
					 'slider'	=>  $slider,
					 'video'	=>  $video,	
					 'site'		=>  $site,
					 'isi'		=> 'home/contact'
		);
		$this->load->view('layout/head',$data);
		$this->load->view('layout/nav',$data);
		$this->load->view('layout/content',$data);
		$this->load->view('layout/footer',$data);
		
	}
	
	
}