<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pajak extends CI_Model{
  function getby($data){
      $this->db->select('pajak.*, static_pajak.*');
      $this->db->from('pajak');
      $this->db->join('static_pajak', 'pajak.id_jenis_laporan_pajak= static_pajak.id_static_pajak', 'left');
      $this->db->where($data);
      return $this->db->get();
  }
    
  
   
}
?>