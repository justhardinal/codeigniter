<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

        public function __construct(){
            $this->load->database();
        }

        //list data 
        public function listing(){
            $query=$this->db->get('video');
            return $query->result();
        }
        
        //list homepage
        public function video_homepage(){
        	$this->db->select('video.*,users.nama');
        	$this->db->from('video');
        	$this->db->join('users', 'users.id_user=video.id_user', 'LEFT');
        	//tampil hompage
        	$this->db->where('video.posisi','homepage');
        	$this->db->order_by('id_video','DESC');
        	$this->db->limit(2);
        	$query=$this->db->get();
        	return $query->result();
        }

         //Detail data 
        public function detail($id_video){
            $query=$this->db->get_where('video',array('id_video' => $id_video));
            return $query->row();
        }

        //tambah
        public function tambah($data){
            $this->db->insert('video',$data);
        }

        //edit
        public function edit($data){
            $this->db->where('id_video',$data['id_video']);
            $this->db->update('video',$data);
        }

        
        //delete
        public function delete($data){
            $this->db->where('id_video',$data['id_video']);
            $this->db->delete('video',$data);
        }
}