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
    function checkeditbyid($table,$data){
      $this->db->where($data);
      return $this->db->get($table)->num_rows();
    }
    function insertcallback($table,$data){
      return ($this->db->insert($table, $data))  ?   $this->db->insert_id()  :   false;
    }
    function verifikasi($table, $data){
      $this->db->set('status_verif', '1');
      $this->db->where($data);
      return $this->db->update($table);
    }
    function tolak($table, $data){
      $this->db->set('status_verif', '2');
      $this->db->where($data);
      return $this->db->update($table);
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
    function check($table,$iduser){
      $this->db->where('iduser',$iduser);
      return $this->db->get($table)->num_rows();
    }
}
?>