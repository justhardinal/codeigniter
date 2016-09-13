<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

    //loading database
    public function __construct(){
         parent::__construct();
         $this->load->model('kategori_berita_model');
    }

    //index 
    public function index(){
        $kategori_berita = $this->kategori_berita_model->listing();
        
        //validasi
        $valid=$this->form_validation;
        $valid->set_rules('nama_kategori_berita','Nama Kategori Berita','required|is_unique[kategori_berita.nama_kategori_berita]',
        			array('required' => 'Nama Harus Diisi',
        				  'is_unique'=> 'Nama Kategori : <strong>'.
        								 $this->input->post('nama_kategori_berita').' </strong> Sudah Ada..'
        			));
        
        if($valid->run()=== false){
        	
        	            
        
        $data = array( 'title' 			  => 'Kategori Berita',
                       'kategori_berita'  => $kategori_berita,
                       'isi'   			  => 'admin/kategori_berita/list');
        $this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
        //masuk database
        }else{
       	$i=$this->input;
       	$slug =url_title($this->input->post('nama_kategori_berita'),'dash',true);
       	$data 	= array('nama_kategori_berita'		=> $i->post('nama_kategori_berita'),
       					'slug_kategori'				=> $slug,       					
       					'keterangan'				=> $i->post('keterangan'),
       					'urutan'					=> $i->post('urutan')
       	);
       	$this->kategori_berita_model->tambah($data);
       	$this->session->set_flashdata('sukses','Data Kategori berita berhasil ditambah');
       	redirect(base_url('admin/kategori_berita'));
        	
        	
        }
        //end masuk databse
    }
    
    //edit
    public function edit($id_kategori_berita){
    	$kategori_berita = $this->kategori_berita_model->detail($id_kategori_berita);
    	
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('nama_kategori_berita','Nama Kategori Berita','required',
    			array('required' => 'Nama Harus Diisi',
    					'is_unique'=> 'Nama Kategori : <strong>'.
    					$this->input->post('nama_kategori_berita').' </strong> Sudah Ada..'
    			));
    	
    	if($valid->run()=== false){
    		 
    		 
    	
    		$data = array( 'title' 			  => 'Edit Kategori Berita',
    				'kategori_berita'  		  => $kategori_berita,
    				'isi'   			      => 'admin/kategori_berita/edit');
    		$this->load->view('admin/layout/head',$data);
			$this->load->view('admin/layout/header',$data);
			$this->load->view('admin/layout/nav',$data);
			$this->load->view('admin/layout/content',$data);
			$this->load->view('admin/layout/footer',$data);	
    		//masuk database
    	}else{
    		$i=$this->input;
    		$data 	= array('id_kategori_berita'				=>$id_kategori_berita,
		    				'nama_kategori_berita'				=> $i->post('nama_kategori_berita'),
		    				'keterangan'						=> $i->post('keterangan'),
		    				'urutan'							=> $i->post('urutan')
    		);
    		$this->kategori_berita_model->edit($data);
    		$this->session->set_flashdata('sukses','Data Kategori berita berhasil Di Ubah');
    		redirect(base_url('admin/kategori_berita'));
    		 
    		 
    	}
    	//end masuk databse
    }
    
    
    //delete
    public function delete($id_kategori_berita) {
    	$data =array ('id_site' => $id_kategori_berita);
    	$this->kategori_berita_model->delete($data);
    	$this->session->set_flashdata('sukses', 'Data Terhapus');
    	redirect (base_url('admin/kategori_berita'));
    }
    
    
}