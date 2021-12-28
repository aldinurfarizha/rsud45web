<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilik extends CI_Model{
  function getby($data){
      $this->db->select('pemilik.*, static_kabupaten.*, static_negara.*, static_provinsi.*');
      $this->db->from('pemilik');
      $this->db->join('static_kabupaten', 'pemilik.id_kabupaten = static_kabupaten.id_kabupaten', 'left');
      $this->db->join('static_provinsi', 'pemilik.id_provinsi = static_provinsi.id_provinsi', 'left');
      $this->db->join('static_negara', 'pemilik.id_kewarganegaraan = static_negara.id_negara', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
}
?>