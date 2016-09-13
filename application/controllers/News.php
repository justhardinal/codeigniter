<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	//loading database
	public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
	}

	//index
	public function index(){
		$berita = $this->berita_model->news();
		$data =array('title' 	=> 'Latest News | Portal Hardinal',
					 'berita'	=>  $berita,
					 'isi'		=> 'news/list'
		);
		$this->load->view('layout/head',$data);
		$this->load->view('layout/nav',$data);
		$this->load->view('layout/content',$data);
		$this->load->view('layout/footer',$data);
		
	}
	
	//read
	public function read($slug_berita){
		$berita = $this->berita_model->read($slug_berita);
		$data =array('title'	=>  $berita->judul,
					 'berita'	=>  $berita,
					 'isi'		=> 'news/detail'
		);
		$this->load->view('layout/head',$data);
		$this->load->view('layout/nav',$data);
		$this->load->view('layout/content',$data);
		$this->load->view('layout/footer',$data);
		
	}
	
	
}