<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    //loading database
    public function __construct(){
         parent::__construct();
         $this->load->model('site_model');
    }

    //index 
    public function index(){
        $site = $this->site_model->listing();
        $data = array( 'title' => 'Site',
                       'site'  => $site,
                       'isi'   => 'admin/site/list');
        $this->load->view('admin/layout/wrapper',$data);
    }


    //tambah 
    public function tambah(){
        //validasi
        $valid=$this->form_validation;
        $valid->set_rules('nama_site', 'Nama Site', 'required',
            array('required' => 'Nama Site Harus Diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email',
            array('required'     => 'Email Harus Diisi',
                  'valid_email'  => 'Oops....email tidak valid' ));

        if($valid->run()===FALSE){
        //end validasi

        $data = array( 'title' => 'Tambah Site',
                       'isi'   => 'admin/site/tambah');
        $this->load->view('admin/layout/wrapper',$data);

        //masuk database
        }else{
            $i= $this->input;
            $data=array (   'id_user'           => 1,
                            'nama_site'         => $i->post('nama_site'),
                            'contact_person'    => $i->post('contact_person'),
                            'alamat'            => $i->post('alamat'),
                            'telepon'           => $i->post('telepon'),
                            'hp'                => $i->post('hp'),
                            'email'             => $i->post('email'),
                            'kota'              => $i->post('kota'),
                            'keterangan'        => $i->post('keterangan')
                        );
            $this->site_model->tambah($data);
            $this->session->set_flashdata('sukses','Data Site Telah Tersimpan');
            redirect (base_url('admin/site'));
        }
        //end masuk database
        
    }


    //edit data 
    public function edit($id_site){
        $site = $this->site_model->detail($id_site);

        //validasi
        $valid=$this->form_validation;
        $valid->set_rules('nama_site', 'Nama Site', 'required',
            array('required' => 'Nama Site Harus Diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email',
            array('required'     => 'Email Harus Diisi',
                  'valid_email'  => 'Oops....email tidak valid' ));
                  
        if($valid->run()===FALSE){
        //end validasi

        $data = array( 'title' => 'Edit Site',
                       'site'  => $site,
                       'isi'   => 'admin/site/edit');
        $this->load->view('admin/layout/wrapper',$data);

        //masuk database
        }else{
            $i= $this->input;
            $data=array (   'id_user'           => 1,
                            'nama_site'         => $i->post('nama_site'),
                            'contact_person'    => $i->post('contact_person'),
                            'alamat'            => $i->post('alamat'),
                            'telepon'           => $i->post('telepon'),
                            'hp'                => $i->post('hp'),
                            'email'             => $i->post('email'),
                            'kota'              => $i->post('kota'),
                            'keterangan'        => $i->post('keterangan')
                        );
            $this->site_model->edit($data);
            $this->session->set_flashdata('sukses','Data Site Telah Tersimpan');
            redirect (base_url('admin/site'));
        }
        //end masuk database
        
    }

    //delete
    public function delete($id_site) {
        $data =array ('id_site' => $id_site);
        $this->site_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data Terhapus');
        redirect (base_url('admin/site'));
    }
}
