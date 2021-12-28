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
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data=array(
            'email'=>$email,
            'password'=>$password
        );
        $result=$this->Authentication->login($data);
        if($result->num_rows() > 0){
            $row=$result->row();
            $params=array(
                'iduser'=>$row->iduser,
                'email'=>$row->email,
                'role'=>$row->role,
                'nama'=>$row->nama,
                'tos'=>$row->tos
            );
            if($row->status == '0'){
                echo 99;
                return;
            }
            if($row->role == '1'){
                echo 1;
                $this->session->set_userdata($params);
            }
            else{
                echo 2;
                $this->session->set_userdata($params);
            }
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

