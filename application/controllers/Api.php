<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function login_dokter()
	{
		$username=$this->input->post('username');
        $password=$this->input->post('password');
        $param=array(
            'user.username'=>$username,
            'user.password'=>$password,
        );
        $data=$this->Global_model->login_dokter($param)->row();
        if($data){
           if($data->role_id==5){
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'login'=>true,
                        'data'=>$data,
                        'message'=>'Berhasil Login'
                )));
           }else{
               return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'login'=>false,
                        'message' => 'Akun yang anda masukan bukan akun Dokter',                   
                )));
           }
        }else{
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'login'=>false,
                    'message' => 'Username Atau Password Salah',                   
            )));
        }
	}
    public function dashboard_dokter(){
       $poli_id=$this->input->post('poli_id');
       $result=array();
        $start_date = date('Y-m-d');  
        for ($x = 0; $x <= 6; $x++) {
        $date = strtotime($start_date);
        $date = strtotime("+".$x."day", $date);
        $tanggal=date('Y-m-d', $date);
        $param=array(
                'poli_id'=>$poli_id,
                'tanggal_periksa'=>$tanggal
            );
        $temp_array=array(
            'tanggal'=>$tanggal,
            'total_pasien'=>$this->Global_model->countdashboarddokter($param)
        );
        array_push($result, $temp_array);

        } 
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'success'=>true,
                            'data' => $result,                   
                    )));
            
        }
        public function login_pasien(){
            $no_rm=$this->input->post('no_rm');
            $param=array(
                'no_rm'=>$no_rm
            );
            $data=$this->Global_model->getiddetail('pasien', $param)->row();
            if($data){
                    if($data->status!=="2"){
                        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'login'=>true,
                            'data' => $data,   
                            'message' => 'Login Berhasil',                  
                    )));
                    }else{
                    return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'login'=>false,
                            'message' => 'Akun Anda di nonaktifkan',                   
                    )));
                    }
            }else{
                    return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'login'=>false,
                            'message' => 'NO RM tidak ditemukan',                   
                    )));
            }
        }
        public function dashboard_pasien(){
        $no_rm=$this->input->post('no_rm');
        $parampasien=array(
        'register_poli.no_rm'=>$no_rm,
        'register_poli.status < '=> 2,
        'batal'=>0
        );
        $parampoli=array(
                'status'=>1
        );
        $pasien=$this->Global_model->getiddetail('register_poli', $parampasien)->row();
        $poli=$this->Global_model->getiddetail('poli', $parampoli)->result();
        if($pasien){
                $is_antri=true;
        }else{
                $is_antri=false;
        }
        return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>true,
                        'poli'=>$poli,
                        'pasien'=>@$pasien,
                        "id_periksa"=>@$pasien->registrasi_id,
                        "is_antri"=>$is_antri
                )));
        }
        public function registrasi_pasien(){
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
	$nama_admin='ONLINE';
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
	$data=array(
	    'nama'=>$nama,
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
            'status'=>0,
            'is_online'=>1
		);
        $id=$this->Global_model->insertcallback('pasien',$data);
         return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>true,
                        'id'=>$id,
                )));
        }

        public function check_status(){
        $id=$this->input->post('id');
        $param=array(
                'id'=>$id
        );
        $data=$this->Global_model->getiddetail('pasien', $param)->row();
         return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>true,
                        'status'=>@$data->status,
                )));
        }
        public function daftar_poli(){
        $no_rm=$this->input->post('no_rm');
        $dokter_id=$this->input->post('dokter_id');
        $cara_bayar=$this->input->post('cara_bayar');
        $tipe_pelayanan=$this->input->post('tipe_pelayanan');
        $tgl_periksa=$this->input->post('tgl_periksa');
        $cara_kunjungan=$this->input->post('cara_kunjungan');
        $poli_id=$this->session->userdata('poli_id');
      
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
            'online'=>0
            );
            $ids=$this->Global_model->insertcallback('register_poli',$data);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>true,
                        'id'=>@$ids,
                )));
            }else{
               return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>false,
                        'message'=>'Pasien Sudah Terdaftar pada tanggal Tersebut'
                )));
            }
           
        }else{
             return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>false,
                        'message'=>'Daftar Pasien pada tanggal tersebut penuh!t'
                )));
        }
        }

        public function status_antrian(){
        $id=$this->input->post('id');
        $date=date('Y-m-d');
        $param=array(
                'registrasi_id'=>$id
        );
        $data=$this->Global_model->getiddetail('register_poli', $param)->row();
        if($data->tanggal_periksa==$date){
        $param=array(
                'poli_id'=>$data->poli_id
        );
         $antrian=$this->Global_model->getiddetail('temp_antrian', $param)->row();
         return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                        'success'=>true,
                        'data'=>$antrian
                )));
        }else{
        return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(array(
                                'success'=>false,
                                'message'=>'Nomor Antrian akan muncul pada Tanggal pemeriksaan'
                        )));
        }

        }

}
