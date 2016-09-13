<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	//loading database
	public function __construct(){
		parent::__construct();
		$this->load->model('dokumen_model');
		$this->load->model('kategori_dokumen_model');
	}

	//index
	public function index(){
		
		//jika login
		if($this->session->userdata('username') != "" ){
			$dokumen=$this->dokumen_model->listing();
		}else{
			//jika tidak login yang tampil external
			$dokumen = $this->dokumen_model->external();
		}
		
		
		$data =array('title' 	=> 'Latest Document',
					 'dokumen'	=>  $dokumen,
					 'isi'		=> 'document/list'
		);
		$this->load->view('layout/head',$data);
		$this->load->view('layout/nav',$data);
		$this->load->view('layout/content',$data);
		$this->load->view('layout/footer',$data);
		
		
	}
	
	//category
	public function category($id_kategori_dokumen){
		
		$kategori =$this->kategori_dokumen_model->detail($id_kategori_dokumen);
		
		//jika login
		if($this->session->userdata('username') != "" ){
			$dokumen=$this->dokumen_model->kategori($id_kategori_dokumen);
		}else{
			//jika tidak login yang tampil external
			$dokumen = $this->dokumen_model->kategori_eksternal($id_kategori_dokumen);
		}
	
	
		$data =array('title' 		=>  $kategori->nama_kategori_dokumen,
					'dokumen'		=>  $dokumen,
					'isi'			=> 'document/list'
		);
		$this->load->view('layout/wrapper',$data);
	
	}
	
	//download
	public function download($id_dokumen){
		$dokumen = $this->dokumen_model->detail($id_dokumen);
	
		// fungsi download
		$this->load->helper('download');
		$file=$dokumen->gambar;
		force_download('./assets/upload/image/'.$file, NULL);
	}
	
	//read
	public function read($slug_dokumen){
		
		$dokumen=$this->dokumen_model->read($slug_dokumen);		
		$data =array('title' 	=>  $dokumen->judul,
				'dokumen'		=>  $dokumen,
				'isi'			=> 'document/read'
		);
		$this->load->view('layout/wrapper',$data);
	}
	
}