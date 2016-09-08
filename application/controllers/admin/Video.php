<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    //loading database
    public function __construct(){
         parent::__construct();
         $this->load->model('video_model');
    }

    //index 
    public function index(){
        $video = $this->video_model->listing();
        
        //validasi
        $valid=$this->form_validation;
        $valid->set_rules('judul','judul','required|is_unique[video.judul]',
        			array('required' => 'Judul Harus Diisi',
        				  'is_unique'=> 'Judul Video : <strong>'.
        								 $this->input->post('judul').' </strong> Sudah Ada..'
        			));
        $valid->set_rules('video','Video','required|is_unique[video.video]',
        		array('required' => 'Video Harus Diisi',
        				'is_unique'=> 'File Video : <strong>'.
        				$this->input->post('video').' </strong> Sudah Ada..'
        		));
        if($valid->run()=== false){
        	
        	            
        
        $data = array( 'title' 			  => 'Video',
                       'video'  		  => $video,
                       'isi'   			  => 'admin/video/list');
        $this->load->view('admin/layout/wrapper',$data);
        //masuk database
        }else{
       	$i=$this->input;
       	$data 	= array(	'judul'					=> $i->post('judul'),
		    				'keterangan'			=> $i->post('keterangan'),
		    				'posisi'				=> $i->post('posisi'),
    						'video'					=> $i->post('video'),
    						'id_user'				=> $this->session->userdata('id')
       	);
       	$this->video_model->tambah($data);
       	$this->session->set_flashdata('sukses','Data Video berhasil ditambah');
       	redirect(base_url('admin/video'));      	
        	
        }
        //end masuk databse
    }
    
    //edit
    public function edit($id_video){
    	$video = $this->video_model->detail($id_video);
    	
    	//validasi
    	$valid=$this->form_validation;
    	$valid->set_rules('judul','Judul Video','required',
    				array('required' => 'Judul Harus Diisi',
    					  'is_unique'=> 'Judul Video : <strong>'.
    					  $this->input->post('judul').' </strong> Sudah Ada..Buat Judul Baru'
    			));
    	
    	if($valid->run()=== false){
    		 
    		 
    	
    		$data = array( 'title' 	  => 'Edit Video',
		    			   'video'    => $video,
		    			   'isi'   	  => 'admin/video/edit');
    		$this->load->view('admin/layout/wrapper',$data);
    		//masuk database
    	}else{
    		$i=$this->input;
    		$data 	= array('id_video'				=> $id_video,
		    				'judul'					=> $i->post('judul'),
		    				'keterangan'			=> $i->post('keterangan'),
		    				'posisi'				=> $i->post('posisi'),
    						'video'					=> $i->post('video'),
    						'id_user'				=> $this->session->userdata('id')
    		);
    		$this->video_model->edit($data);
    		$this->session->set_flashdata('sukses','Data Video berhasil Di Ubah');
    		redirect(base_url('admin/video'));
    		 
    		 
    	}
    	//end masuk databse
    }
    
    
    //delete
    public function delete($id_video) {
    	$data =array ('id_video' => $id_video);
    	$this->video_model->delete($data);
    	$this->session->set_flashdata('sukses', 'Data Terhapus');
    	redirect (base_url('admin/video'));
    }
    
    
}