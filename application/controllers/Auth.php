<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Auth extends CI_Controller  {

    public function index()
    {
        $this->load->view('public/login');
    }
    public function login(){
        $this->load->view('public/login');
    }   
    public function register(){
        $this->load->view('public/register');
    }   
    public function register_success(){
        $this->load->view('public/register_success');
    }  
      
    
    public function prosess_login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $data=array(
            'username'=>$username,
            'password'=>$password
        );
        $result=$this->Authentication->login($data);
        if($result->num_rows() > 0){
            $row=$result->row();
            $params=array(
                'user_id'=>$row->user_id,
                'username'=>$row->username,
                'role_id'=>$row->role_id,
                'nama_role'=>$row->nama_role,
                'nama'=>$row->nama,
                'poli_id'=>$row->poli_id,
            );
            echo $row->role_id;
            $this->session->set_userdata($params);
        }
        else{
         echo 0;
        }
    }

    public function prosess_register(){
        $iduser=rand(100000,1000000);
        $nama=$this->input->post('nama');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $telepon=$this->input->post('telepon');
        $data=array(
            'iduser'=>$iduser,
            'nama'=>$nama,
            'email'=>$email,
            'telepon'=>$telepon,
            'password'=>sha1($password)
        );
        $emailcheck=$this->Authentication->emailcheck($email);
        if($emailcheck->num_rows() > 0){
            echo 0;
            return;
        }
        if($this->Authentication->register($data)){
            echo 1;
        }

    }
    public function forgetpassword(){
        $this->load->view('public/forgetpass');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function dashboard(){
        $this->load->view('dashboard');
    }
   
}

