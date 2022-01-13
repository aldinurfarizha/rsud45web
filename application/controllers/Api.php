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
                            'success'=>true,
                            'data' => $data,                   
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
}
