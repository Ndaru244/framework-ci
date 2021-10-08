<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('App_model');
    }
    
    public function login(){
        $this->form_validation->set_rules('email','Email','required',['required' => 'Email wajib Diisi!']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib Diisi!']);
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('app/login/form_login');
        }else {
            $auth = $this->App_model->cek_login();
            if($auth == FALSE){
                $this->session->set_flashdata('pesan','
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Username atau Password salah!</strong> Pastikan username dan password anda benar.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
                redirect('login');
            }else if($auth == TRUE){
                $this->session->set_userdata('id_user',   $auth->id_user);
                $this->session->set_userdata('nama_user',   $auth->nama_user);
                $this->session->set_userdata('alamat_user', $auth->alamat_user);
                $this->session->set_userdata('telp_user',   $auth->telp_user);
                $this->session->set_userdata('email',       $auth->email);
                $this->session->set_userdata('role_user',   $auth->role_user);
                
                switch($auth->role_user){
                    case 1: redirect(base_url('dashboard')); break; //admin
                    case 3: redirect(); break; //pelanggan
                    default: break;

                }
            }
        }
    }
    public function register(){
        $this->form_validation->set_rules('nama','Nama','required',['required' => 'Nama wajib Diisi!']);
        $this->form_validation->set_rules('email','Email','required',['required' => 'Email wajib Diisi!']);
        $this->form_validation->set_rules('telepon','Telepon','required',['required' => 'Telpon wajib Diisi!']);
        $this->form_validation->set_rules('alamat','Alamat','required',['required' => 'Alamat wajib Diisi!']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib Diisi!']);
        if($this->form_validation->run() == FALSE){
            $this->load->view('app/login/form_register');
        }else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telp_user' => $this->input->post('telepon'),
                'alamat_user' => $this->input->post('alamat'),
                'password' => $this->input->post('password'),
                'role_user' => 3
            );
            $this->db->insert('users',$data);
            redirect('login');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}