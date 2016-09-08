<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    //Index Login
    public function index(){
    	//validasi form
    	$valid=$this->form_validation;
    	$valid->set_rules('username','Username','required',
    			array('required' => 'Username Harus Diisi..')); 
    	
    	$valid->set_rules('password','Password','required',
    			array('required' => 'Password Harus Diisi..'));
    	
    	$username	= $this->input->post('username');
    	$password	= $this->input->post('password');
    	
    	if($valid->run()){
    		$this->simple_login->login($username,$password);
    		redirect(base_url('admin/dasbor'), base_url().login);
    	}
    	
    	//end validasi
        $data=array('title'  =>  'Login Administrator');
        $this->load->view('admin/login_view',$data);
    }
    
    public function logout(){
    	$this->simple_login->logout();
    }
    

}