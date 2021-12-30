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
    public function deletepasien(){
        $id=$this->input->post('id');
        $param=array(
            'id'=>$id
        );
        $this->Global_model->delete('pasien',$param);

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
            'create_by'=>$nama_admin
		);
		$this->Global_model->insert('pasien',$data);
      
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

