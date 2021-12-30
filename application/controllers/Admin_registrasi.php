<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Admin_registrasi extends CI_Controller  {

    public function dashboard(){
        $this->load->view('admin_registrasi/dashboard');
    }
    public function data_pasien(){
        $data['agama']=$this->Global_model->get_all('agama')->result();
        $data['pendidikan']=$this->Global_model->get_all('pendidikan')->result();
        $data['pekerjaan']=$this->Global_model->get_all('pekerjaan')->result();
        $data['provinces']=$this->Global_model->get_all('provinces')->result();
        $data['data']=$this->Global_model->getverifiedpasien()->result();
        $this->load->view('admin_registrasi/data_pasien',$data);
    }
    public function deletepasien(){
        $id=$this->input->post('id');
        $param=array(
            'id'=>$id
        );
        $this->Global_model->delete('pasien',$param);

    }
    public function getregencies($id){
        $param=array(
            'province_id'=>$id
        );
        echo json_encode($this->Global_model->getiddetail('regencies',$param)->result_array());
    }

    public function getdistricts($id){
        $param=array(
            'regency_id'=>$id
        );
        echo json_encode($this->Global_model->getiddetail('districts',$param)->result_array());
    }
    public function getvillages($id){
        $param=array(
            'district_id'=>$id
        );
        echo json_encode($this->Global_model->getiddetail('villages',$param)->result_array());
    }
  
}

