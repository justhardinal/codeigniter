<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
        	$this->db->select('dokumen.*, kategori_dokumen.nama_kategori_dokumen, users.nama');
        	$this->db->from('dokumen');
        	//join table
        	$this->db->join('kategori_dokumen','kategori_dokumen.id_kategori_dokumen=dokumen.id_kategori_dokumen','LEFT');
        	$this->db->join('users','users.id_user=dokumen.id_user','LEFT');
        	$this->db->order_by('id_dokumen','DESC');
            $query=$this->db->get();
            return $query->result();
        }
        
        //list data
        public function external(){
        	$this->db->select('dokumen.*, kategori_dokumen.nama_kategori_dokumen, users.nama');
        	$this->db->from('dokumen');
        	//join table
        	$this->db->join('kategori_dokumen','kategori_dokumen.id_kategori_dokumen=dokumen.id_kategori_dokumen','LEFT');
        	$this->db->join('users','users.id_user=dokumen.id_user','LEFT');
        	//end relasi
        	$this->db->where(array('status_dokumen' 	=> 'publish',
        						  'jenis_dokumen'	=> 'external'        					
        					));
        	$this->db->order_by('id_dokumen','DESC');
        	$query=$this->db->get();
        	return $query->result();
        }
        
        //list kategogry
        public function kategori($id_kategori_dokumen){
        	$this->db->select('dokumen.*, kategori_dokumen.nama_kategori_dokumen, users.nama');
        	$this->db->from('dokumen');
        	//join table
        	$this->db->join('kategori_dokumen','kategori_dokumen.id_kategori_dokumen=dokumen.id_kategori_dokumen','LEFT');
        	$this->db->join('users','users.id_user=dokumen.id_user','LEFT');
        	//end relasi
        	$this->db->where('dokumen.id_kategori_dokumen',$id_kategori_dokumen);
        	$this->db->order_by('id_dokumen','DESC');
        	$query=$this->db->get();
        	return $query->result();
        }
         
        //list kategogry eksternal
        public function kategori_eksternal($id_kategori_dokumen){
        	$this->db->select('dokumen.*, kategori_dokumen.nama_kategori_dokumen, users.nama');
        	$this->db->from('dokumen');
        	//join table
        	$this->db->join('kategori_dokumen','kategori_dokumen.id_kategori_dokumen=dokumen.id_kategori_dokumen','LEFT');
        	$this->db->join('users','users.id_user=dokumen.id_user','LEFT');
        	//end relasi
        	$this->db->where(array('dokumen.id_kategori_dokumen' => $id_kategori_dokumen ,
				        			'status_dokumen' 			 => 'publish',
				        			'jenis_dokumen'				 => 'external'));
        	$this->db->order_by('id_dokumen','DESC');
        	$query=$this->db->get();
        	return $query->result();
        }
        
        //read dokumen
        public function read($slug_dokumen){
        	$this->db->select('dokumen.*, kategori_dokumen.nama_kategori_dokumen, users.nama');
        	$this->db->from('dokumen');
        	//join table
        	$this->db->join('kategori_dokumen','kategori_dokumen.id_kategori_dokumen=dokumen.id_kategori_dokumen','LEFT');
        	$this->db->join('users','users.id_user=dokumen.id_user','LEFT');
        	//end relasi
        	$this->db->where(array('status_dokumen' 	=> 'publish'     					
        					));
        	$this->db->order_by('id_dokumen','DESC');
        	$query=$this->db->get();
        	return $query->row();
        }

         //Detail data 
        public function detail($id_dokumen){
            $query=$this->db->get_where('dokumen',array('id_dokumen' => $id_dokumen));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('dokumen',$data);
        }
        
        //akhir
        public function akhir(){
        	//$this->db->from('dokumen');
        	$this->db->order_by('id_dokumen','DESC');
        	$query=$this->db->get('dokumen');
        	return $query->row();
        	
        }

        //edit
        public function edit($data){
            $this->db->where('id_dokumen',$data['id_dokumen']);
            $this->db->update('dokumen',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_dokumen',$data['id_dokumen']);
            $this->db->delete('dokumen',$data);
        }
}