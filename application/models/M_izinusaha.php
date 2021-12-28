<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_izinusaha extends CI_Model{
  function getby($data){
      $this->db->select('izin_usaha.*, static_jenis_izin_usaha.*');
      $this->db->from('izin_usaha');
      $this->db->join('static_jenis_izin_usaha', 'izin_usaha.id_jenis_izin_usaha=static_jenis_izin_usaha.id_jenis_izin_usaha', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
  function klasifikasi($data){
    $this->db->select('izin_usaha_klasifikasi.*, static_jenis_klasifikasi.*, static_jenis_deskripsi_klasifikasi.*');
    $this->db->from('izin_usaha_klasifikasi');
    $this->db->join('static_jenis_klasifikasi', 'izin_usaha_klasifikasi.id_jenis_klasifikasi=static_jenis_klasifikasi.id_jenis_klasifikasi', 'left');
    $this->db->join('static_jenis_deskripsi_klasifikasi', 'izin_usaha_klasifikasi.id_deskripsi_klasifikasi=static_jenis_deskripsi_klasifikasi.id_jenis_deskripsi_klasifikasi', 'left');
    $this->db->where($data);
    return $this->db->get();
  }

  function check($data){
    $this->db->select('*');
    $this->db->from('izin_usaha_klasifikasi');
    $this->db->where($data);
    $query= $this->db->get();
    return $query;
  }
    
  
   
}
?>