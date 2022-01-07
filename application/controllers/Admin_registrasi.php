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
    public function editpasien($id){
        $data['agama']=$this->Global_model->get_all('agama')->result();
        $data['pendidikan']=$this->Global_model->get_all('pendidikan')->result();
        $data['pekerjaan']=$this->Global_model->get_all('pekerjaan')->result();
        $data['provinces']=$this->Global_model->get_all('provinces')->result();
        $data['row']=$this->Global_model->getpasieddetail($id)->row();
        $this->load->view('admin_registrasi/edit_pasien',$data);
    }
    public function verifikasi_online(){
        $data['agama']=$this->Global_model->get_all('agama')->result();
        $data['pendidikan']=$this->Global_model->get_all('pendidikan')->result();
        $data['pekerjaan']=$this->Global_model->get_all('pekerjaan')->result();
        $data['provinces']=$this->Global_model->get_all('provinces')->result();
        $data['data']=$this->Global_model->getunverifiedpasien()->result();
        $this->load->view('admin_registrasi/verifikasi_online',$data);
    }
    public function input_pasien_poli(){
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
            'ditambahkan_oleh'=>'PIC-'.$this->session->userdata('nama'),
            'antrian_no'=>$no_antrian,
            'online'=>0
            );
            $this->Global_model->insert('register_poli',$data);
            echo '200';
            }else{
                echo '300';
            }
           
        }else{
            echo 'Daftar Pasien pada Tanggal tersebut penuh';
        }
    }
    public function daftar_poli($id){
        $paramdokter=array(
            'role_id'=>5,
            'status'=>1,
            'hapus'=>0
        );
        $parampoli=array(
            'status'=>1,
            'hapus'=>0
        );
        $data['poli']=$this->Global_model->getiddetail('poli',$parampoli)->result();
        $data['row']=$this->Global_model->getpasieddetail($id)->row();
        $this->load->view('admin_registrasi/daftar_poli',$data);
    }
    public function deletepasien(){
        $id=$this->input->post('id');
        $param=array(
            'id'=>$id
        );
        $this->Global_model->delete('pasien',$param);

    }
    public function terima(){
        $id=$this->input->post('id');
        $no_rm=rand(100000,1000000);
        $where=array(
            'id'=>$id
        );
        $data=array(
            'no_rm'=>$no_rm,
            'status'=>1
        );
        $this->Global_model->update('pasien', $where,$data);
    }
    public function tolak(){
        $id=$this->input->post('id');
        $alasan_penolakan=$this->input->post('alasan_penolakan');
        $where=array(
            'id'=>$id
        );
        $data=array(
            'alasan_penolakan'=>$alasan_penolakan,
            'status'=>2
        );
        $this->Global_model->update('pasien', $where,$data);
    }
    public function inputpasien(){
        $config['upload_path']=".".BERKAS;
        $config['allowed_types']='jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
		
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $file= $data['upload_data']['file_name'];
        }else{
            $file=0;
        }
		$nama_admin=$this->session->userdata('nama');
		$nama=$this->input->post('nama');
        $nik=$this->input->post('nik');
        $tmplahir=$this->input->post('tmplahir');
        $tgllahir=$this->input->post('tgllahir');
        $kelamin=$this->input->post('kelamin');
        $alamat=$this->input->post('alamat');
        $rt=$this->input->post('rt');
        $rw=$this->input->post('rw');
        $provinces_id=$this->input->post('provinces_id');
        $regencies_id=$this->input->post('regencies_id');
        $districts_id=$this->input->post('districts_id');
        $nohp=$this->input->post('nohp');
        $pekerjaan_id=$this->input->post('pekerjaan_id');
        $agama_id=$this->input->post('agama_id');
        $pendidikan_id=$this->input->post('pendidikan_id');
        $ibu_kandung=$this->input->post('ibu_kandung');
        $status_martial=$this->input->post('status_martial');
        $no_rm=rand(100000,1000000);
		$data=array(
			'nama'=>$nama,
            'no_rm'=>$no_rm,
            'nik'=>$nik,
            'tmplahir'=>$tmplahir,
            'tgllahir'=>$tgllahir,
            'kelamin'=>$kelamin,
            'alamat'=>$alamat,
            'rt'=>$rt,
            'rw'=>$rw,
            'provinces_id'=>$provinces_id,
            'regencies_id'=>$regencies_id,
            'districts_id'=>$districts_id,
            'nohp'=>$nohp,
            'pekerjaan_id'=>$pekerjaan_id,
            'agama_id'=>$agama_id,
            'pendidikan_id'=>$pendidikan_id,
            'ibu_kandung'=>$ibu_kandung,
            'status_martial'=>$status_martial,
			'file'=>$file,
            'create_by'=>$nama_admin,
            'status'=>1
		);
        echo $this->Global_model->insertcallback('pasien',$data);
      
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
    public function getdokter($id){
        $param=array(
            'role_id'=>5,
            'status'=>1,
            'hapus'=>0,
            'poli_id'=>$id
        );
        echo json_encode($this->Global_model->getiddetail('user',$param)->result_array());
    }
  
}

