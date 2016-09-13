<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    //loading database
    public function __construct(){
         parent::__construct();
         $this->load->model('site_model'); //data site
         $this->load->model('user_model'); // data user
    }


    //index 
    public function index(){
        $user = $this->user_model->listing();
        $data = array( 'title' => 'Administrator',
                       'user'  =>$user,
                       'isi'   => 'admin/user/list');
        $this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
    }

    //validasi password
    /*public function password_check($str){
    if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
        return TRUE;
    }
    return FALSE;
    }*/

    //tambah 
    public function tambah(){
        $site = $this->site_model->listing();

        //validasi
        $valid=$this->form_validation;

        $valid->set_rules('nama','Nama','required',
                        array('required'    => 'Nama Harus Di Isi'));
        $valid->set_rules('username','Username','required|is_unique[users.username]',
                        array('required'    => 'Username Harus Di Isi',
                              'is_unique'   => 'Opps Username : <strong>'.
                                                $this->input->post('username').
                                                '</strong> Sudah Ada, Silakan Buat Username Baru'));
        $valid->set_rules('email','Email','required|valid_email|is_unique[users.email]',
                        array('required'    => 'Email Harus Di Isi',
                              'valid_email' => 'Email Tidak Sesuai',
                              'is_unique'   => 'Opps Username : <strong>'.
                                                $this->input->post('email').
                                                '</strong> Sudah Ada, Silakan Buat Username Baru'));
        $valid->set_rules('password','Password','required|min_length[8]|max_length[32]',
                        array('required'    => 'Password Harus Di Isi',
                              'min_length'  => 'Password minimal 8',
                              'max_length'  => 'Password maksimal 32'));
        
        if ($valid->run()===FALSE) {        
        //end validasi
        $data = array( 'title' => ' Tambah Administrator',
                       'site'  =>$site,
                       'isi'   => 'admin/user/tambah');
        $this->load->view('admin/layout/head',$data);
        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/nav',$data);
        $this->load->view('admin/layout/content',$data);
        $this->load->view('admin/layout/footer',$data);
        //masuk database
        }else{
            $i = $this->input;
            $data = array ('nama'           =>$i->post('nama'),
                           'email'          =>$i->post('email'),
                           'username'       =>$i->post('username'),
                           'password'       =>sha1($i->post('password')),
                           'id_site'        =>$i->post('id_site'),
                           'akses_level'    =>$i->post('akses_level'),
                           //'gambar'         =>$i->post('nama'),
                           //'id_admin'       =>$i->post('nama'),
                        );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses','data User/Administrator telah ditambah');
            redirect(base_url('admin/user'));
            //end masuk database
        }
        
    }

    public function edit($id_user){
        $site = $this->site_model->listing();
        $user = $this->user_model->detail($id_user); 

        //validasi
        $valid=$this->form_validation;

        $valid->set_rules('nama','Nama','required',
                        array('required'    => 'Nama Harus Di Isi'));
    /* $valid->set_rules('username','Username','required|is_unique[users.username]',
                        array('required'    => 'Username Harus Di Isi',
                              'is_unique'   => 'Opps Username : <strong>'.
                                                $this->input->post('username').
                                                '</strong> Sudah Ada, Silakan Buat Username Baru')); */
        $valid->set_rules('email','Email','required|valid_email',
                        array('required'    => 'Email Harus Di Isi',
                              'valid_email' => 'Email Tidak Sesuai'));
        $valid->set_rules('password','Password','required|min_length[8]|max_length[32]',
                        array('required'    => 'Password Harus Di Isi',
                              'min_length'  => 'Password minimal 8',
                              'max_length'  => 'Password maksimal 32'));
        
        if ($valid->run()===FALSE) {        
        //end validasi
        $data = array( 'title' => ' Edit Administrator',
                       'site'  =>	$site,
                       'user'  =>	$user,
                       'isi'   => 'admin/user/edit');
        $this->load->view('admin/layout/head',$data);
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/nav',$data);
		$this->load->view('admin/layout/content',$data);
		$this->load->view('admin/layout/footer',$data);	
        //masuk database
        }else{
            $i = $this->input;
            if (strlen($i->post('password')) < 8 || strlen($i->post('password')) > 32 ) {
                    $data = array ( 'id_user'        =>$id_user,
                                    'nama'           =>$i->post('nama'),
                                    'email'          =>$i->post('email'),
                                    'username'       =>$i->post('username'),
                                    //'password'       =>sha1($i->post('password')),
                                    'id_site'        =>$i->post('id_site'),
                                    'akses_level'    =>$i->post('akses_level'),
                                    //'gambar'         =>$i->post('nama'),
                                    //'id_admin'       =>$i->post('nama'),
                        );
            }else{
                $data = array ( 'id_user'        =>$id_user,
                                'nama'           =>$i->post('nama'),
                                'email'          =>$i->post('email'),
                                'username'       =>$i->post('username'),
                                'password'       =>sha1($i->post('password')),
                                'id_site'        =>$i->post('id_site'),
                                'akses_level'    =>$i->post('akses_level'),
                                //'gambar'         =>$i->post('nama'),
                                //'id_admin'       =>$i->post('nama'),
                        );

            }            
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses','data User/Administrator telah di ubah');
            redirect(base_url('admin/user'));
            //end masuk database
        }
        
    }

    //delete
    public function delete($id_user){
        $data= array ('id_user'=>$id_user);
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses','Data Sukses Dihapus');
        redirect(base_url('admin/user'));
    }
    
}