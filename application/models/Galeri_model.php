<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
        	$this->db->select('galeri.*,users.nama');
        	$this->db->from('galeri');
        	$this->db->join('users', 'users.id_user=galeri.id_user', 'LEFT');
        	$this->db->order_by('id_galeri','DESC');
            $query=$this->db->get();
            return $query->result();
        }
        
        //list data
        public function galeri(){
        	$this->db->select('galeri.*,users.nama');
        	$this->db->from('galeri');
        	$this->db->join('users', 'users.id_user=galeri.id_user', 'LEFT');
        	$this->db->order_by('id_galeri','DESC');
        	$this->db->limit(50);
        	$query=$this->db->get();
        	return $query->result();
        }
        //list homepage
        public function home(){
        	$this->db->select('galeri.*,users.nama');
        	$this->db->from('galeri');
        	$this->db->join('users', 'users.id_user=galeri.id_user', 'LEFT');
        	//tampil hompage
        	$this->db->where('galeri.posisi','homepage');
        	$this->db->order_by('id_galeri','DESC');
        	$this->db->limit(5);
        	$query=$this->db->get();
        	return $query->result();
        }

         //Detail data 
        public function detail($id_galeri){
            $query=$this->db->get_where('galeri',array('id_galeri' => $id_galeri));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('galeri',$data);
        }

        //edit
        public function edit($data){
            $this->db->where('id_galeri',$data['id_galeri']);
            $this->db->update('galeri',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_galeri',$data['id_galeri']);
            $this->db->delete('galeri',$data);
        }
}