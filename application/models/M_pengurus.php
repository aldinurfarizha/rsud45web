<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengurus extends CI_Model{
  function getby($data){
      $this->db->select('pengurus.*, static_kabupaten.*, static_negara.*, static_provinsi.*');
      $this->db->from('pengurus');
      $this->db->join('static_kabupaten', 'pengurus.id_kabupaten = static_kabupaten.id_kabupaten', 'left');
      $this->db->join('static_provinsi', 'pengurus.id_provinsi = static_provinsi.id_provinsi', 'left');
      $this->db->join('static_negara', 'pengurus.id_kewarganegaraan = static_negara.id_negara', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
  function getexpiredall(){
    return $this->db->query('SELECT pengurus.*, identitas_penyedia.* FROM pengurus
    INNER JOIN identitas_penyedia ON pengurus.iduser=identitas_penyedia.iduser where menjabat_sampai <= CURDATE()');
  }
}
?>