<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
            $query=$this->db->get('konfigurasi');
            return $query->row();
        }

         //Detail data 
        public function detail($id_konfigurasi){
            $query=$this->db->get_where('konfigurasi',array('id_konfigurasi' => $id_konfigurasi));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('konfigurasi',$data);
        }

        //edit
        public function edit($data){
            $this->db->where('id_konfigurasi',$data['id_konfigurasi']);
            $this->db->update('konfigurasi',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_konfigurasi',$data['id_konfigurasi']);
            $this->db->delete('konfigurasi',$data);
        }
}