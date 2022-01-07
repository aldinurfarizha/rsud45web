<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Catatan_medis extends CI_Controller  {
    public function daftar_pasien(){
        $this->load->view('catatan_medis/daftar_pasien');
    }
    	function load_antrian(){
		$no_rm=$this->input->post('no_rm');
		$status=$this->input->post('status');
		$tanggal_periksa=$this->input->post('tanggal_periksa');
		$tipe_registrasi=$this->input->post('tipe_registrasi');
		$param=array(
			'register_poli.no_rm'=>$no_rm,
            'register_poli.catatan_medis'=>$status,
            'register_poli.tanggal_periksa'=>$tanggal_periksa,
            'register_poli.online'=>$tipe_registrasi,
		);
        echo json_encode($this->Global_model->getpasiencm($param)->result()); 
    }
     
        function dicari(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'catatan_medis'=>1
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
        function dikirim(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'catatan_medis'=>2
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
           function tidakditemukan(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'catatan_medis'=>9
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
  
}

