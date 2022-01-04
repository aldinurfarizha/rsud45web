<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Admin_poli extends CI_Controller  {

    public function dashboard(){
        $this->load->view('admin_poli/dashboard');
    }
    public function daftar_pasien(){
        $param=array(
            'poli_id'=>$this->session->userdata('poli_id'),
        );
        $data['data']=$this->Global_model->getpasien($param)->result();
        $this->load->view('admin_poli/daftar_pasien',$data);
    }
  
}

