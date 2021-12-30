<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Admin_poli extends CI_Controller  {

    public function dashboard(){
        $this->load->view('admin_poli/dashboard');
    }
    public function daftar_pasien(){
        $param=array(
            'hapus'=>0
        );
        $data['data']=$this->Global_model->getiddetail('poli',$param)->result();
        $this->load->view('admin_poli/daftar_pasien',$data);
    }
  
}

