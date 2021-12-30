<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model{
    function insert($table,$data)
    {
      return $this->db->insert($table, $data);
    }
    function update($table,$where,$data)
    {
      $this->db->set($data);
      $this->db->where($where);
      return $this->db->update($table);
    }
    function get_all($table)
    {
      return $this->db->get($table);
    }
    function replace($table,$data){
      return $this->db->replace($table,$data);
    }
    function getid($table,$id){
      $this->db->where('iduser',$id);
      return $this->db->get($table);
    }
    function getiddetail($table,$data){
      $this->db->where($data);
      return $this->db->get($table);
    }
    function delete($table,$data){
      $this->db->where($data);
      return $this->db->delete($table);
    }
    function insertcallback($table,$data){
      return ($this->db->insert($table, $data))  ?   $this->db->insert_id()  :   false;
    }
    function getdokter(){
        $this->db->select('dokter.*, poli.*, dokter.status as status_dokter');
        $this->db->from('dokter');
        $this->db->join('poli', 'dokter.poli_id = poli.poli_id', 'left');
        $this->db->where('dokter.hapus', 0);
        return $this->db->get();
    }
    function getuser(){
      $this->db->select('user.*, poli.*, role.*');
      $this->db->from('user');
      $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
      $this->db->join('role', 'user.role_id = role.role_id', 'left');
      return $this->db->get();
  }
  function getuserwhere($param){
    $this->db->select('user.*, poli.*, role.*');
    $this->db->from('user');
    $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
    $this->db->join('role', 'user.role_id = role.role_id', 'left');
    $this->db->where($param);
    return $this->db->get();
}
 function getverifiedpasien(){
    $this->db->select('pasien.*, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, agama.nama_agama as agama');
    $this->db->from('pasien');
    $this->db->join('provinces', 'pasien.provinces_id = provinces.id', 'left');
    $this->db->join('regencies', 'pasien.regencies_id = regencies.id', 'left');
    $this->db->join('villages', 'pasien.villages_id = villages.id', 'left');
    $this->db->join('districts', 'pasien.districts_id = districts.id', 'left');
    $this->db->join('agama', 'pasien.agama_id = agama.id', 'left');
    $this->db->where('no_rm >', '0');
    return $this->db->get();
}
   
    function count_dashboard_admin(){
      $param=array(
        'status_verif'=>'',
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_menunggu_verifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status_verif'=>1,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_terverifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status_verif'=>2,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_ditolak=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status'=>1,
        'disable'=>0,
        'role'=>2
      );
      $total_akun_penyedia=$this->db->where($param)->from('user')->count_all_results();
      $param=array(
        'status'=>1,
        'disable'=>0,
        'role'=>1
      );
      $total_akun_admin=$this->db->where($param)->from('user')->count_all_results();
      $result=array(
        'total_menunggu_verifikasi'=>$total_menunggu_verifikasi,
        'total_terverifikasi'=>$total_terverifikasi,
        'total_ditolak'=>$total_ditolak,
        'total_akun_penyedia'=>$total_akun_penyedia,
        'total_akun_admin'=>$total_akun_admin
      );
      return $result;
    }
    function count_dashboard_penyedia($iduser){
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>'',
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_menunggu_verifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>1,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_terverifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>2,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_ditolak=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $result=array(
        'total_menunggu_verifikasi'=>$total_menunggu_verifikasi,
        'total_terverifikasi'=>$total_terverifikasi,
        'total_ditolak'=>$total_ditolak
      );
      return $result;
    }
    function check($table,$where){
      $this->db->where($where);
      return $this->db->get($table)->num_rows();
    }
}
?>