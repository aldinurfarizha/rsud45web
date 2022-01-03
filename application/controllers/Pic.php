<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Pic extends CI_Controller  {

    public function dashboard(){
        $this->load->view('pic/dashboard');
    }
    public function poli(){
        $param=array(
            'hapus'=>0
        );
        $data['data']=$this->Global_model->getiddetail('poli',$param)->result();
        $this->load->view('pic/poli',$data);
    }
    public function inputpoli(){
        $nama_poli=$this->input->post('nama_poli');
        $max=$this->input->post('max');
        $status=$this->input->post('status');
        $param=array(
            'nama_poli'=>$nama_poli,
            'max'=>$max,
            'status'=>$status
        );
        $this->Global_model->insert('poli',$param);
    }
    public function deletepoli(){
        $id=$this->input->post('id');
        $where=array(
            'poli_id'=>$id
        );
        $data=array(
            'hapus'=>1
        );
        $this->Global_model->update('poli',$where,$data);
    }
    public function editpoli(){
        $id=$this->input->post('id');
        $nama_poli=$this->input->post('nama_polis');
        $max=$this->input->post('maxs');
        $status=$this->input->post('statuss');
        $where=array(
            'poli_id'=>$id
        );
       
        $data=array(
            'nama_poli'=>$nama_poli,
            'max'=>$max,
            'status'=>$status
        );
        $this->Global_model->update('poli',$where,$data);
    }
    public function dokter(){
        $parampoli=array(
            'hapus'=>0,
            'status'=>1
        );
        $data['data']=$this->Global_model->getdokter()->result();
        $data['poli']=$this->Global_model->getiddetail('poli',$parampoli)->result();
        $this->load->view('pic/dokter',$data);
    }
    public function inputdokter(){
        $nama_dokter=$this->input->post('nama_dokter');
        $poli_id=$this->input->post('poli_id');
        $status=$this->input->post('status');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $param=array(
            'nama'=>$nama_dokter,
            'poli_id'=>$poli_id,
            'status'=>$status,
            'username'=>$username,
            'password'=>$password,
            'role_id'=>5
        );
        $this->Global_model->insert('user',$param);
    }
    public function deletedokter(){
        $id=$this->input->post('id');
        $where=array(
            'user_id'=>$id
        );
        $data=array(
            'hapus'=>1
        );
        $this->Global_model->update('user',$where,$data);
    }
    public function editdokter(){
        $id=$this->input->post('id');
        $nama_dokter=$this->input->post('nama_dokters');
        $poli_id=$this->input->post('poli_ids');
        $status=$this->input->post('statuss');
        $password=$this->input->post('passwords');
        $where=array(
            'user_id'=>$id
        );
       
        $data=array(
            'nama'=>$nama_dokter,
            'poli_id'=>$poli_id,
            'status'=>$status,
            'password'=>$password
        );
        $this->Global_model->update('user',$where,$data);
    }
    public function user(){
        $parampoli=array(
            'hapus'=>0,
            'status'=>1
        );
        $data['poli']=$this->Global_model->getiddetail('poli',$parampoli)->result();
        $data['data']=$this->Global_model->getuser()->result();
        $data['role']=$this->Global_model->getrole()->result();
        $this->load->view('pic/user',$data);
    }
    public function edituser($iduser){
        $parampoli=array(
            'hapus'=>0,
            'status'=>1
        );
        $paramrole=array(
            'user.role_id <', 5
        );
        $paramuser=array(
            'user_id'=>$iduser
        );
        $data['poli']=$this->Global_model->getiddetail('poli',$parampoli)->result();
        $data['row']=$this->Global_model->getuserwhere($paramuser)->row();
        $data['role']=$this->Global_model->getrole()->result();
        $this->load->view('pic/edituser',$data);
    }
    public function inputuser(){
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $poli_id=$this->input->post('poli_id');
        $role_id=$this->input->post('role_id');
        $nik=$this->input->post('nik');
        $nip=$this->input->post('nip');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');
        $no_telp=$this->input->post('no_telp');

        $param=array(
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'poli_id'=>$poli_id,
            'role_id'=>$role_id,
            'nik'=>$nik,
            'nip'=>$nip,
            'tgl_lahir'=>$tgl_lahir,
            'jenis_kelamin'=>$jenis_kelamin,
            'alamat'=>$alamat,
            'no_telp'=>$no_telp
        );
        $this->Global_model->insert('user',$param);
    }
    public function deleteuser(){
        $id=$this->input->post('id');
        $where=array(
            'user_id'=>$id
        );
        $this->Global_model->delete('user',$where);
    }
    public function doupdateuser(){
        $user_id=$this->input->post('user_id');
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $poli_id=$this->input->post('poli_id');
        $role_id=$this->input->post('role_id');
        $nik=$this->input->post('nik');
        $nip=$this->input->post('nip');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');
        $no_telp=$this->input->post('no_telp');
        $where=array(
            'user_id'=>$user_id
        );
        if($role_id=="1"){
            
        }else{
            $poli_id=0;
        }
        $data=array(
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'poli_id'=>$poli_id,
            'role_id'=>$role_id,
            'nik'=>$nik,
            'nip'=>$nip,
            'tgl_lahir'=>$tgl_lahir,
            'jenis_kelamin'=>$jenis_kelamin,
            'alamat'=>$alamat,
            'no_telp'=>$no_telp
        );
        $this->Global_model->update('user',$where,$data);

    }
   
}

