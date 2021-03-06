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
        $data['pasien']=$this->Global_model->getverifiedpasien()->result();
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
        $poli_id=$this->input->post('poli_id');
      
        $paramcheck=array(
            'tanggal_periksa'=>$tgl_periksa,
            'poli_id'=>$poli_id
        );  
        $paramcheckpasien=array(
            'tanggal_periksa'=>$tgl_periksa,
            'no_rm'=>$no_rm,
            'poli_id'=>$poli_id
        );

        $check_pasien=$this->Global_model->checkregisterpolipasien($paramcheckpasien);
        $max_pasien=$this->Global_model->checkmaxregisterpoli($poli_id)->row()->max;
        $pasien_terdaftar=$this->Global_model->checkregisterpoli($paramcheck);
        if($pasien_terdaftar<=$max_pasien){
            if(!$check_pasien){
            $no_antrian=$pasien_terdaftar+1;
            $data=array(
            'no_rm'=>$no_rm,
            'dokter_id'=>$dokter_id,
            'cara_bayar'=>$cara_bayar,
            'tipe_pelayanan'=>$tipe_pelayanan,
            'tanggal_periksa'=>$tgl_periksa,
            'cara_kunjungan'=>$cara_kunjungan,
            'poli_id'=>$poli_id,
            'ditambahkan_oleh'=>$this->session->userdata('nama'),
            'antrian_no'=>$no_antrian,
            'online'=>0,
            'status'=>1
            );
            $this->Global_model->insert('register_poli',$data);
            $where=array(
                'antrian_no'=>$no_antrian,
                'tanggal_periksa'=>$tgl_periksa,
            );
            echo json_encode($this->Global_model->getpasiendetail($where)->result_array());
            }else{
                $response_code=array(
                    'res'=>300
                );
                echo json_encode($response_code);
            }
           
        }else{
            $response_code=array(
                'res'=>400
            );
            echo json_encode($response_code);
        }
    }
        function update_panggil(){
            $poli_id=$this->session->userdata('poli_id');
            $antrian_no=$this->input->post('antrian_no');
            $tgl=$this->input->post('tgl');
            $data=array(
                'poli_id'=>$poli_id,
                'antrian_no'=>$antrian_no,
                'tgl'=>$tgl
            );
            $this->Global_model->replace('temp_antrian', $data);
        }
    	function load_antrian(){
		$no_rm=$this->input->post('no_rm');
		$status=$this->input->post('status');
		$tanggal_periksa=$this->input->post('tanggal_periksa');
		$tipe_registrasi=$this->input->post('tipe_registrasi');
        $poli_id=$this->session->userdata('poli_id');
		$param=array(
			'register_poli.no_rm'=>$no_rm,
            'register_poli.status'=>$status,
            'register_poli.tanggal_periksa'=>$tanggal_periksa,
            'register_poli.online'=>$tipe_registrasi,
            'register_poli.poli_id'=>$poli_id
		);
        echo json_encode($this->Global_model->getpasien($param)->result()); 
    }
        function edit(){
        $id=$this->input->post('ids');
        $no_rm=$this->input->post('no_rms');
        $dokter_id=$this->input->post('dokter_ids');
        $cara_bayar=$this->input->post('cara_bayars');
        $tipe_pelayanan=$this->input->post('tipe_pelayanans');
        $tgl_periksa=$this->input->post('tgl_periksas');
        $cara_kunjungan=$this->input->post('cara_kunjungans');
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
        $where=array(
            'registrasi_id'=>$id
        );
        $this->Global_model->update('register_poli', $where, $data);
        }

        function checkin(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'status'=>1
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
        function selesai(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'status'=>2
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
           function batal(){
            $id=$this->input->post('id');
            $where=array(
                'registrasi_id'=>$id
            );
            $data=array(
                'status'=>9
            );
            $this->Global_model->update('register_poli', $where, $data);
        }
        function display($no_antrian,$nama_pasien){
            $data['no_antrian']=$no_antrian;
            $data['nama_pasien']=urldecode($nama_pasien);
            $this->load->view('admin_poli/display',$data);
        }
  
}

