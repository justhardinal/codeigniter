<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_dokumen extends CI_Controller {

    //loading database
    public function __construct(){
         parent::__construct();
         $this->load->model('kategori_dokumen_model');
    }

    //index 
    public function index(){
        $kategori_dokumen = $this->kategori_dokumen_model->listing();
        
        //validasi
        $valid=$this->form_validation;
        $valid->set_rules('nama_kategori_dokumen','Nama Kategori Dokumen','required|is_unique[kategori_dokumen.nama_kategori_dokumen]',
        			array('required' => 'Nama Harus Diisi',
        				  'is_unique'=> 'Nama Kategori : <strong>'.
        								 $this->input->post('nama_kategori_dokumen').' </strong> Sudah Ada..'
        			));
        
        if($valid->run()=== false){
        	
        	            
        
        $data = array( 'title' 			  => 'Kategori Dokumen',
                       'kategori_dokumen'  => $kategori_dokumen,
                       'isi'   			  => 'admin/kategori_dokumen/list');
        $this->load->view('admin/layout/wrapper',$data);
        //masuk database
        }else{
       	$i=$this->input;
       	$slug =url_title($this->input->post('nama_kategori_dokumen'),'dash',true);
       	$data 	= array('nama_kategori_dokumen'		=> $i->post('nama_kategori_dokumen'),
       					'slug_kategori_dokumen'		=> $slug,       					
       					'keterangan'				=> $i->post('keterangan'),
       					'urutan'					=> $i->post('urutan')
       	);
       	$this->kategori_dokumen_model->tambah($data);
       	$this->session->set_flashdata('sukses','Data Kategori dokumen berhasil ditambah');
       	redirect(base_url('admin/kategori_dokumen'));
        	
        	
        }
        //end masuk databse
    }
    
    //edit
    public function edit($id_kategori_dokumen){
    	$kategori_dokumen = $this->kategori_dokumen_model->detail($id_kategori_dokumen);
    	
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('nama_kategori_dokumen','Nama Kategori Dokumen','required',
    			array('required' => 'Nama Harus Diisi',
    					'is_unique'=> 'Nama Kategori : <strong>'.
    					$this->input->post('nama_kategori_dokumen').' </strong> Sudah Ada..'
    			));
    	
    	if($valid->run()=== false){
    		 
    		 
    	
    		$data = array( 'title' 			  => 'Edit Kategori Dokumen',
    				'kategori_dokumen'  		  => $kategori_dokumen,
    				'isi'   			      => 'admin/kategori_dokumen/edit');
    		$this->load->view('admin/layout/wrapper',$data);
    		//masuk database
    	}else{
    		$i=$this->input;
    		$data 	= array('id_kategori_dokumen'				=> $id_kategori_dokumen,
		    				'nama_kategori_dokumen'				=> $i->post('nama_kategori_dokumen'),
		    				'keterangan'						=> $i->post('keterangan'),
		    				'urutan'							=> $i->post('urutan')
    		);
    		$this->kategori_dokumen_model->edit($data);
    		$this->session->set_flashdata('sukses','Data Kategori dokumen berhasil Di Ubah');
    		redirect(base_url('admin/kategori_dokumen'));
    		 
    		 
    	}
    	//end masuk databse
    }
    
    
    //delete
    public function delete($id_kategori_dokumen) {
    	$data =array ('id_site' => $id_kategori_dokumen);
    	$this->kategori_dokumen_model->delete($data);
    	$this->session->set_flashdata('sukses', 'Data Terhapus');
    	redirect (base_url('admin/kategori_dokumen'));
    }
    
    
}