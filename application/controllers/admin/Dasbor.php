<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('user_model');
	}
	

    //index 
    public function index(){
    	
        $data = array( 'title' => 'Selamat Datang ',
                       'isi'   => 'admin/dasbor/home');
        $this->load->view('admin/layout/wrapper',$data);
    }
    
    
    //konfigurasi
    public function konfigurasi(){
    	$konfigurasi = $this->konfigurasi_model->listing();
    	
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('namaweb','Nama Web','required',
    					array('required' => 'Nama web harus diisi' ));
    	
    	//end validasi
    	if($valid->run()=== FALSE) {
    		
    	$data = array( 'title' 			=> 'Halaman Dasbor',
    				   'konfigurasi'	=> $konfigurasi,
                       'isi'   			=> 'admin/dasbor/umum');
        $this->load->view('admin/layout/wrapper',$data);
          
       	}else{
       		$i=$this->input;
       		$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
		       				'namaweb'			=> $i->post('namaweb'),
		       				'tagline'			=> $i->post('tagline'),
		       				'website'			=> $i->post('website'),
		       				'email'				=> $i->post('email'),
		       				'telepon'			=> $i->post('telepon'),
		       				'alamat'			=> $i->post('alamat'),
		       				'keyword'			=> $i->post('keyword'),
       						'description'		=> $i->post('description'),
       				    	'google_map'		=> $i->post('google_map'),
       						'metatext'			=> $i->post('metatext')
       				
       		);
       		$this->konfigurasi_model->edit($data);
       		$this->session->set_flashdata('sukses','konfigurasi Berhasil di Update');
       		redirect(base_url('admin/dasbor/konfigurasi'));
       	}
    	
    }
    
    
    //icon
    public function icon(){
    	$konfigurasi = $this->konfigurasi_model->listing();
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('id_konfigurasi','ID Konfigurasi','required',
    				array('required' => 'ID Konfigurasi Harus Diisi'));
    	 
    	if($valid->run()){
    		$config['upload_path'] 		= './assets/upload/image/';
    		$config['allowed_types'] 	= 'gif|jpg|png|svg';
    		$config['max_size']			= '12000'; // KB
    		$this->load->library('upload', $config);
    		if(! $this->upload->do_upload('icon')) {
    			 
    			$data 	= array('title' 	=> 'Ganti Icon',
    					'error'				=> $this->upload->display_errors(),
    					'konfigurasi'		=> $konfigurasi,
    					'isi'				=> 'admin/dasbor/icon');
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
    			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
    							'icon'				=> $upload_data['uploads']['file_name']
    			);
    			$this->konfigurasi_model->edit($data);
    			$this->session->set_flashdata('sukses','Logo Telah diupdate');
    			redirect(base_url('admin/dasbor/icon'));
    		}
    	}
    	// End masuk database
    	$data 	= array('title' 			=> 'Data Galeri',
		    			'konfigurasi'		=> $konfigurasi,
		    			'isi'				=> 'admin/dasbor/icon');
    	$this->load->view('admin/layout/wrapper',$data);
    }
    
    
    //logo
    public function logo(){
    	$konfigurasi = $this->konfigurasi_model->listing();
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('id_konfigurasi','ID Konfigurasi','required',
    			array('required' => 'ID Konfigurasi Harus Diisi'));
    	
    	if($valid->run()){
    		$config['upload_path'] 		= './assets/upload/image/';
    		$config['allowed_types'] 	= 'gif|jpg|png|svg';
    		$config['max_size']			= '12000'; // KB
    		$this->load->library('upload', $config);
    		if(! $this->upload->do_upload('logo')) {
    	
    			$data 	= array('title' 	=> 'Ganti Logo',
    					'error'				=> $this->upload->display_errors(),
    					'konfigurasi'		=> $konfigurasi,
    					'isi'				=> 'admin/dasbor/logo');
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
    			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
    							'logo'			=> $upload_data['uploads']['file_name']
    			);
    			$this->konfigurasi_model->edit($data);
    			$this->session->set_flashdata('sukses','Logo Telah diupdate');
    			redirect(base_url('admin/dasbor/logo'));
    		}
    	}
    	// End masuk database
    	$data 	= array('title' 			=> 'Data Galeri',
    					'konfigurasi'		=> $konfigurasi,
    					'isi'				=> 'admin/dasbor/logo');
    	$this->load->view('admin/layout/wrapper',$data);
    }
}
