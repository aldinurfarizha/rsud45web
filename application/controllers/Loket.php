<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Loket extends CI_Controller  {

    public function index(){
        $data['no_antrian']=$this->Global_model->get_antrian_loket();
        $this->load->view('public/get_antrian',$data);
    }
    public function proses_antri(){
        $this->Global_model->input_antrian_loket();
        echo '1';
    }
  
}

