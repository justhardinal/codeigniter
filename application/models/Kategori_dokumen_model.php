<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_dokumen_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
            $query=$this->db->get('kategori_dokumen');
            return $query->result();
        }

         //Detail data 
        public function detail($id_kategori_dokumen){
            $query=$this->db->get_where('kategori_dokumen',array('id_kategori_dokumen' => $id_kategori_dokumen));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('kategori_dokumen',$data);
        }

        //edit
        public function edit($data){
            $this->db->where('id_kategori_dokumen',$data['id_kategori_dokumen']);
            $this->db->update('kategori_dokumen',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_kategori_dokumen',$data['id_kategori_dokumen']);
            $this->db->delete('kategori_dokumen',$data);
        }
}