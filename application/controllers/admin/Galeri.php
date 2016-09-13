<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	//loading database
	public function __construct(){
		parent::__construct();
		$this->load->model('galeri_model');
	}
	
	
	//index
	public function index(){
		$galeri = $this->galeri_model->listing();		
		$data 	= array('title' 			=> 'Data Galeri',
						'galeri'			=> $galeri,
						'isi'				=> 'admin/galeri/list');
		$this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);			
	}
	
	//tambah
	public function tambah(){
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
		
		if($valid->run()){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
			$data 	= array('title' 			=> 'Data Galeri',
							'error'				=> $this->upload->display_errors(),
							'isi'				=> 'admin/galeri/tambah');
			$this->load->view('admin/layout/wrapper',$data);
			
			// Masuk database
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor bikin thumbnail
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			
				$i = $this->input;
				$data = array(	'id_user'			=> $this->session->userdata('id'),
								'judul'				=> $i->post('judul'),
								'keterangan'		=> $i->post('keterangan'),
								'posisi'			=> $i->post('posisi'),
								'website'			=> $i->post('website'),
								'gambar'			=> $upload_data['uploads']['file_name']					
								);
				$this->galeri_model->tambah($data);
				$this->session->set_flashdata('sukses','Galeri Berhasil ditambahkan');
				redirect(base_url('admin/galeri'));
			}
		}
			// End masuk database
		$data 	= array('title' 			=> 'Data Galeri',
						'isi'				=> 'admin/galeri/tambah');
		$this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
	}
	
	//edit
	public function edit($id_galeri){
		//dari database
		$galeri			 = $this->galeri_model->detail($id_galeri);	
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul','required',
				array('required' => 'Judul Harus Diisi'));
	
		if($valid->run()){
			//jika ada gambar
			if(!empty($_FILES['gambar']['name'])){
				
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
	
				$data 	= array('title' 	=> 'Edit Galeri',
						'galeri'			=> $galeri,
						'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/edit');
				$this->load->view('admin/layout/head',$data);
				$this->load->view('admin/layout/header',$data);
				$this->load->view('admin/layout/nav',$data);
				$this->load->view('admin/layout/content',$data);
				$this->load->view('admin/layout/footer',$data);	
					
				// Masuk database
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor bikin thumbnail
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
				//hapus gambar lama
				if($galeri->gambar != ""){
					unlink('./assets/upload/image/'.$galeri->gambar);
					unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
				}
				
				$i = $this->input;
				$data = array(	'id_galeri'		=> $id_galeri,
								'id_user'			=> $this->session->userdata('id'),
								'judul'				=> $i->post('judul'),
								'keterangan'		=> $i->post('keterangan'),
								'posisi'			=> $i->post('posisi'),
								'website'			=> $i->post('website'),
								'gambar'			=> $upload_data['uploads']['file_name']
				);
				$this->galeri_model->edit($data);
				$this->session->set_flashdata('sukses','Galeri Berhasil di Update');
				redirect(base_url('admin/galeri'));
			}
			}else{
				//update tanpa gambar
				$i = $this->input;
				$data = array(	'id_galeri'		=> $id_galeri,
						'judul'				=> $i->post('judul'),
						'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
						'isi'				=> $i->post('isi'),
						'id_user'			=> $this->session->userdata('id'),
						'status_galeri'		=> $i->post('status_galeri'),
						'jenis_galeri'		=> $i->post('jenis_galeri')
				);
				$this->galeri_model->edit($data);
				$this->session->set_flashdata('sukses','Galeri Berhasil di Update');
				redirect(base_url('admin/galeri'));
			}
		}
		// End masuk database
	
		$data 	= array('title' 	=> 'Data Galeri',
				'kategori_galeri' 	=> $kategori_galeri,
				'galeri'			=> $galeri,
				'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	
	//delete
	public function delete($id_galeri) {
		$galeri = $this->galeri_model->detail($id_galeri);
		//hapus gambar
		if($galeri->gambar != ""){
			unlink('./assets/upload/image/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
		}		
		//end hapus 
		$data =array ('id_galeri' => $id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Galeri Terhapus');
		redirect (base_url('admin/galeri'));
	}


}