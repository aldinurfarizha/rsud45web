<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Error extends CI_Controller  {

    public function index()
    {
        $this->load->view('public/404');
    }
    
   
}

