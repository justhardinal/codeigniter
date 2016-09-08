<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
        	$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
        	$this->db->from('berita');
        	//join table
        	$this->db->join('kategori_berita','kategori_berita.id_kategori_berita=berita.id_kategori_berita','LEFT');
        	$this->db->join('users','users.id_user=berita.id_user','LEFT');
        	$this->db->order_by('id_berita','DESC');
            $query=$this->db->get();
            return $query->result();
        }
        
        //list berita Home
        public function berita_home(){
        	$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
        	$this->db->from('berita');
        	//join table
        	$this->db->join('kategori_berita','kategori_berita.id_kategori_berita=berita.id_kategori_berita','LEFT');
        	$this->db->join('users','users.id_user=berita.id_user','LEFT');
        	//end relasi
        	$this->db->where('status_berita','publish');
        	$this->db->order_by('id_berita','DESC');
        	//batasan yang tampil
        	$this->db->limit(3);
        	$query=$this->db->get();
        	return $query->result();
        }
        
        //news
        public function news(){
        	$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
        	$this->db->from('berita');
        	//join table
        	$this->db->join('kategori_berita','kategori_berita.id_kategori_berita=berita.id_kategori_berita','LEFT');
        	$this->db->join('users','users.id_user=berita.id_user','LEFT');
        	//end relasi
        	$this->db->where('status_berita','publish');
        	$this->db->order_by('id_berita','DESC');
        	//batasan yang tampil
        	$this->db->limit(12);
        	$query=$this->db->get();
        	return $query->result();
        }
        
        //berita utama
        //list data
        public function berita_utama(){
        	$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
        	$this->db->from('berita');
        	//join table
        	$this->db->join('kategori_berita','kategori_berita.id_kategori_berita=berita.id_kategori_berita','LEFT');
        	$this->db->join('users','users.id_user=berita.id_user','LEFT');
        	//end relasi
        	$this->db->where('status_berita','publish');
        	$this->db->order_by('id_berita','DESC');
        	$query=$this->db->get();
        	return $query->row();
        }
        
        //read berita
        public function read($slug_berita){
        	$query=$this->db->get_where('berita', 
        						array('slug_berita'   => $slug_berita,
        							  'status_berita' => 'publish'
        						));
        	return $query->row();
        }

         //Detail data 
        public function detail($id_berita){
            $query=$this->db->get_where('berita',array('id_berita' => $id_berita));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('berita',$data);
        }
        
        //akhir
        public function akhir(){
        	//$this->db->from('berita');
        	$this->db->order_by('id_berita','DESC');
        	$query=$this->db->get('berita');
        	return $query->row();
        	
        }

        //edit
        public function edit($data){
            $this->db->where('id_berita',$data['id_berita']);
            $this->db->update('berita',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_berita',$data['id_berita']);
            $this->db->delete('berita',$data);
        }
}