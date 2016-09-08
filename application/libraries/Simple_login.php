<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {

    // set value super global
    var $CI = NULL;
    public function __construct (){
     $this->CI =& get_instance();
    }

    //login
    public function login($username,$password){
        //query pencocokan data 
        $query = $this->CI->db->get_where('users', array (
                                          'username' => $username,
                                          'password' => sha1($password)
                                         ));
        //cek jika ada hasilnya
        if($query->num_rows()==1){
            $row = $this->CI->db->query('select * from users where username ="'.$username.'"');
            $admin = $row->row();
            $id    = $admin->id_user;
            $nama  = $admin->nama;
            $level = $admin->akses_level;
            //$SEssions
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('akses_level',$level);
            $this->CI->session->set_userdata('nama');
            $this->CI->session->set_userdata('id_login',uniqid(rand()));
            $this->CI->session->set_userdata('id',$id);
            //kalau benar redirect
            redirect(base_url('admin/dasbor'));
        }else{
        	$this->CI->session->set_flashdata('sukses','Ooopss  .... Username / Password Salah');
        	redirect(base_url().'login');               
        }
        return false;

    }
    
    //cek login
    public function cek_login(){
    	if($this->CI->session->userdata('username')=='' && 
    	   $this->CI->session->userdata('akseslevel')==''){
    	   $this->CI->session->set_flashdata('sukses','Oooppss... silakan Login');
    	   redirect(base_url('login'));
    	}
    }
    
    
    //logout
    public function logout(){
    	$this->CI->session->unset_userdata('username');
    	$this->CI->session->unset_userdata('akses_level');
    	$this->CI->session->unset_userdata('nama');
    	$this->CI->session->unset_userdata('id_login');
    	$this->CI->session->unset_userdata('id');
    	$this->CI->session->set_flashdata('sukses','Terima Kasih Anda Berhasil Logout');
    	redirect(base_url().'login');
    }
}