<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
            $query=$this->db->get('site');
            return $query->result();
        }

         //Detail data 
        public function detail($id_site){
            $query=$this->db->get_where('site',array('id_site' => $id_site));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('site',$data);
        }

        //edit
        public function edit($data){
            $this->db->where('id_site',$data['id_site']);
            $this->db->update('site',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_site',$data['id_site']);
            $this->db->delete('site',$data);
        }
}