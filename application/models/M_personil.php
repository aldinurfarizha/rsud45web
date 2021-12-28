<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_personil extends CI_Model{
  function getby($data){
      $this->db->select('personil.*, static_kabupaten.*, static_negara.*, static_provinsi.*');
      $this->db->from('personil');
      $this->db->join('static_kabupaten', 'personil.id_kabupaten_kota = static_kabupaten.id_kabupaten', 'left');
      $this->db->join('static_provinsi', 'personil.id_provinsi = static_provinsi.id_provinsi', 'left');
      $this->db->join('static_negara', 'personil.id_kewarganegaraan = static_negara.id_negara', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
  function getbydetail($data){
    $this->db->select('personil.*, static_kabupaten.*, static_negara.*, static_provinsi.*, negaralahirs.negara as "negaralahir", kabupatenlahirs.kabupaten as "kabupatenlahir"');
    $this->db->from('personil');
    $this->db->join('static_kabupaten', 'personil.id_kabupaten_kota = static_kabupaten.id_kabupaten', 'left');
    $this->db->join('static_provinsi', 'personil.id_provinsi = static_provinsi.id_provinsi', 'left');
    $this->db->join('static_negara', 'personil.id_kewarganegaraan = static_negara.id_negara', 'left');
    $this->db->join('static_negara as negaralahirs', 'personil.id_negara_tempat_lahir = negaralahirs.id_negara', 'left');
    $this->db->join('static_kabupaten as kabupatenlahirs', 'personil.id_kabupaten_kota_tempat_lahir = kabupatenlahirs.id_kabupaten', 'left');
    $this->db->where($data);
    return $this->db->get();
}
    
  
   
}
?>