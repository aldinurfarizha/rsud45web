<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Pic extends CI_Controller  {

    public function dashboard(){
        $this->load->view('pic/dashboard');
    }
    public function poli(){
        $param=array(
            'status'=>1
        );
        $data['data']=$this->Global_model->getiddetail('poli',$param)->result();
        $this->load->view('pic/poli',$data);
    }
   
}

