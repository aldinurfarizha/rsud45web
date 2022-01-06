<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Admin_poli extends CI_Controller  {

    public function dashboard(){
        $this->load->view('admin_poli/dashboard');
    }
    public function daftar_pasien(){
        $poli_id=$this->session->userdata('poli_id');
        $param=array(
            'poli_id'=>$poli_id,
        );
        $paramdokter=array(
            'poli_id'=>$poli_id,
            'role_id'=>5,
            'status'=>1,
            'hapus'=>0
        );
        $data['pasien']=$this->Global_model->get_all('pasien')->result();
        $data['dokter']=$this->Global_model->getiddetail('user',$paramdokter)->result();
        $this->load->view('admin_poli/daftar_pasien',$data);
    }
    public function input_pasien(){
        $no_rm=$this->input->post('no_rm');
        $dokter_id=$this->input->post('dokter_id');
        $cara_bayar=$this->input->post('cara_bayar');
        $tipe_pelayanan=$this->input->post('tipe_pelayanan');
        $tgl_periksa=$this->input->post('tgl_periksa');
        $cara_kunjungan=$this->input->post('cara_kunjungan');
        $poli_id=$this->session->userdata('poli_id');
        $data=array(
            'no_rm'=>$no_rm,
            'dokter_id'=>$dokter_id,
            'cara_bayar'=>$cara_bayar,
            'tipe_pelayanan'=>$tipe_pelayanan,
            'tanggal_periksa'=>$tgl_periksa,
            'cara_kunjungan'=>$cara_kunjungan,
            'poli_id'=>$poli_id,
            'ditambahkan_oleh'=>$this->session->userdata('nama')
        );
        $this->Global_model->insert('register_poli',$data);
    }
    	function load_antrian(){
		$no_rm=$this->input->post('no_rm');
		$status=$this->input->post('status');
		$tanggal_periksa=$this->input->post('tanggal_periksa');
		$ditambahkan_oleh=$this->input->post('ditambahkan_oleh');
		$param=array(
			'register_poli.no_rm'=>$no_rm,
            'register_poli.status'=>$status,
            'register_poli.tanggal_periksa'=>$tanggal_periksa,
            'register_poli.ditambahkan_oleh'=>$ditambahkan_oleh

		);
        echo json_encode($this->Global_model->getpasien($param)->result()); 
    }
  
}

