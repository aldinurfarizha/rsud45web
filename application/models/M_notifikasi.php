<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model{
    //Tadinya ini untuk mengirim notifikasi dari segala jenis input file
    // function penyedia($informasi,$type_input,$pengirim)
    // {
      
    //   $thisdate = date('Y-m-d');
    //   $data=array(
    //     'informasi'=>$informasi,
    //     'type_input'=>$type_input,
    //     'pengirim'=>$pengirim,
    //     'tanggal'=>$thisdate
    //   );
    //   $this->db->where('pengirim',$pengirim);
    //   $this->db->where('type_input',$type_input);
    //   $this->db->where('tanggal',$thisdate);
    //   $total=$this->db->get('notifikasi')->num_rows();
    //   if($total==0){
    //     $this->db->insert('notifikasi', $data);
    //   }
    // }
    function penyedia($informasi,$type_input,$pengirim)
    {
      $informasi='Telah Memperbaharui Data';
      $thisdate = date('Y-m-d');
      $data=array(
        'informasi'=>$informasi,
        'type_input'=>$type_input,
        'pengirim'=>$pengirim,
        'tanggal'=>$thisdate
      );
      $this->db->where('pengirim',$pengirim);
      $this->db->where('tanggal',$thisdate);
      $total=$this->db->get('notifikasi')->num_rows();
      if($total==0){
        $this->db->insert('notifikasi', $data);
      }
    }
    function admin($informasi,$type_input,$kepada)
    {
      
      $thisdate = date('Y-m-d');
      $data=array(
        'informasi'=>$informasi,
        'type_input'=>$type_input,
        'kepada'=>$kepada,
        'tanggal'=>$thisdate
      );
      $this->db->where('kepada',$kepada);
      $this->db->where('type_input',$type_input);
      $this->db->where('tanggal',$thisdate);
      $total=$this->db->get('notifikasi')->num_rows();
      if($total==0){
        $this->db->insert('notifikasi', $data);
      }
    }
    function getnotifadmin(){
      $this->db->select('notifikasi.*,user.*');
      $this->db->from('notifikasi');
      $this->db->join('user', 'notifikasi.pengirim= user.iduser', 'left');
      $this->db->where('kepada',1);
      $this->db->order_by('waktu', 'DESC');
      return $this->db->get();
    }
    function getnotifpenyedia($iduser){
      $this->db->select('notifikasi.*,user.*');
      $this->db->from('notifikasi');
      $this->db->join('user', 'notifikasi.pengirim= user.iduser', 'left');
      $this->db->where('kepada',$iduser);
      $this->db->order_by('waktu', 'DESC');
      return $this->db->get();
    }
    function getnotifpenyedia5($iduser){
      $this->db->select('notifikasi.*,user.*');
      $this->db->from('notifikasi');
      $this->db->join('user', 'notifikasi.pengirim= user.iduser', 'left');
      $this->db->where('kepada',$iduser);
      $this->db->order_by('waktu', 'DESC');
      $this->db->limit(5);  
      return $this->db->get();
    }
    function readnotif($sender){
      $this->db->set('is_read','1');
      $this->db->where('pengirim',$sender);
      return $this->db->update('notifikasi');
    }
    function readnotifpenyedia($kepada){
      $this->db->set('is_read','1');
      $this->db->where('kepada',$kepada);
      return $this->db->update('notifikasi');
    }
    function countnotifadmin(){
      $param=array(
        'kepada'=>1,
        'is_read'=>0
      );
      return $this->db->where($param)->from('notifikasi')->count_all_results();
    }
    function countnotifpenyedia($iduser){
      $param=array(
        'kepada'=>$iduser,
        'is_read'=>0
      );
      return $this->db->where($param)->from('notifikasi')->count_all_results();
    }
}
?>