<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengalaman extends CI_Model{
  function getby($data){
      $this->db->select('pengalaman.*, static_kabupaten.*, static_negara.*, static_provinsi.*');
      $this->db->from('pengalaman');
      $this->db->join('static_kabupaten', 'pengalaman.id_kabupaten = static_kabupaten.id_kabupaten', 'left');
      $this->db->join('static_provinsi', 'pengalaman.id_provinsi = static_provinsi.id_provinsi', 'left');
      $this->db->join('static_negara', 'pengalaman.id_negara = static_negara.id_negara', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
  function klasifikasi($data){
    $this->db->select('pengalaman_klasifikasi_bidang.*, static_jenis_klasifikasi.*, static_jenis_deskripsi_klasifikasi.*');
    $this->db->from('pengalaman_klasifikasi_bidang');
    $this->db->join('static_jenis_klasifikasi', 'pengalaman_klasifikasi_bidang.id_jenis_klasifikasi=static_jenis_klasifikasi.id_jenis_klasifikasi', 'left');
    $this->db->join('static_jenis_deskripsi_klasifikasi', 'pengalaman_klasifikasi_bidang.id_deskripsi_klasifikasi=static_jenis_deskripsi_klasifikasi.id_jenis_deskripsi_klasifikasi', 'left');
    $this->db->where($data);
    return $this->db->get();
  }

  function check($data){
    $this->db->select('*');
    $this->db->from('pengalaman_klasifikasi_bidang');
    $this->db->where($data);
    $query= $this->db->get();
    return $query;
  }
}
?>