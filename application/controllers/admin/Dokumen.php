<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	//loading database
	public function __construct(){
		parent::__construct();
		$this->load->model('dokumen_model');
		$this->load->model('kategori_dokumen_model');
	}
	
	
	//index
	public function index(){
		$dokumen = $this->dokumen_model->listing();		
		$data 	= array('title' 			=> 'Data Dokumen',
						'dokumen'			=> $dokumen,
						'isi'				=> 'admin/dokumen/list');
		$this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);			
	}
	
	//tambah
	public function tambah(){
		//dari database
		$kategori_dokumen = $this->kategori_dokumen_model->listing();
		$akhir		= $this->dokumen_model->akhir();
		
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
		
		if($valid->run()){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|doc|docx|xls|xlsx|ppt|pptx|pdf|avi|mp4|3gp|flv';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
			$data 	= array('title' 			=> 'Data Dokumen',
							'kategori_dokumen' 	=> $kategori_dokumen,
							'error'				=> $this->upload->display_errors(),
							'isi'				=> 'admin/dokumen/tambah');
			$this->load->view('admin/layout/head',$data);
			$this->load->view('admin/layout/header',$data);
			$this->load->view('admin/layout/nav',$data);
			$this->load->view('admin/layout/content',$data);
			$this->load->view('admin/layout/footer',$data);	
			
			// Masuk database
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				
				$i = $this->input;
				$url_akhir	= $akhir->id_dokumen+1;
				$slug = $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
				$data = array(	'slug_dokumen'		=> $slug,
								'judul'				=> $i->post('judul'),
								'id_kategori_dokumen'=> $i->post('id_kategori_dokumen'),
								'isi'				=> $i->post('isi'),
								'gambar'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'),
								'status_dokumen'		=> $i->post('status_dokumen'),
								'jenis_dokumen'		=> $i->post('jenis_dokumen')
				);
				$this->dokumen_model->tambah($data);
				$this->session->set_flashdata('sukses','Dokumen Berhasil ditambahkan');
				redirect(base_url('admin/dokumen'));
			}
		}
			// End masuk database
		
		$data 	= array('title' 			=> 'Data Dokumen',
						'kategori_dokumen' 	=> $kategori_dokumen,
						'isi'				=> 'admin/dokumen/tambah');
		$this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
	}
	
	//edit
	public function edit($id_dokumen){
		//dari database
		$dokumen			 = $this->dokumen_model->detail($id_dokumen);
		$kategori_dokumen = $this->kategori_dokumen_model->listing();
		$akhir			 = $this->dokumen_model->akhir();
	
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
	
		if($valid->run()){
			//jika ada gambar
			if(!empty($_FILES['gambar']['name'])){
				
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|doc|docx|xls|xlsx|ppt|pptx|pdf|avi|mp4|3gp|flv';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
	
				$data 	= array('title' 	=> 'Edit Dokumen',
						'kategori_dokumen' 	=> $kategori_dokumen,
						'dokumen'			=> $dokumen,
						'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/dokumen/edit');
				$this->load->view('admin/layout/head',$data);
				$this->load->view('admin/layout/header',$data);
				$this->load->view('admin/layout/nav',$data);
				$this->load->view('admin/layout/content',$data);
				$this->load->view('admin/layout/footer',$data);	
					
				// Masuk database
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				
				//hapus gambar lama
				if($dokumen->gambar != ""){
					unlink('./assets/upload/image/'.$dokumen->gambar);
					unlink('./assets/upload/image/thumbs/'.$dokumen->gambar);
				}
				
				$i = $this->input;
				$data = array(	'id_dokumen'		=> $id_dokumen,
							'judul'					=> $i->post('judul'),
							'id_kategori_dokumen'	=> $i->post('id_kategori_dokumen'),
							'isi'					=> $i->post('isi'),
							'gambar'				=> $upload_data['uploads']['file_name'],
							'id_user'				=> $this->session->userdata('id'),
							'status_dokumen'		=> $i->post('status_dokumen'),
							'jenis_dokumen'			=> $i->post('jenis_dokumen')
				);
				$this->dokumen_model->edit($data);
				$this->session->set_flashdata('sukses','Dokumen Berhasil di Update');
				redirect(base_url('admin/dokumen'));
			}
			}else{
				//update tanpa gambar
				$i = $this->input;
				$data = array(	'id_dokumen'		=> $id_dokumen,
						'judul'						=> $i->post('judul'),
						'id_kategori_dokumen'		=> $i->post('id_kategori_dokumen'),
						'isi'						=> $i->post('isi'),
						'id_user'					=> $this->session->userdata('id'),
						'status_dokumen'			=> $i->post('status_dokumen'),
						'jenis_dokumen'				=> $i->post('jenis_dokumen')
				);
				$this->dokumen_model->edit($data);
				$this->session->set_flashdata('sukses','Dokumen Berhasil di Update');
				redirect(base_url('admin/dokumen'));
			}
		}
		// End masuk database
	
		$data 	= array('title' 	=> 'Data Dokumen',
				'kategori_dokumen' 	=> $kategori_dokumen,
				'dokumen'			=> $dokumen,
				'isi'				=> 'admin/dokumen/edit');
		$this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
	}
	
	
	//download
	public function download($id_dokumen){
		$dokumen = $this->dokumen_model->detail($id_dokumen);
		
		// fungsi download
		$this->load->helper('download');
		$file=$dokumen->gambar;
		force_download('./assets/upload/image/'.$file, NULL);
	}
	
	//delete
	public function delete($id_dokumen) {
		$dokumen = $this->dokumen_model->detail($id_dokumen);
		//hapus gambar
		if($dokumen->gambar != ""){
			unlink('./assets/upload/image/'.$dokumen->gambar);
		}		
		//end hapus 
		$data =array ('id_dokumen' => $id_dokumen);
		$this->dokumen_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Dokumen Terhapus');
		redirect (base_url('admin/dokumen'));
	}


}