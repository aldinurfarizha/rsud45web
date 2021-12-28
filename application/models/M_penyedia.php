<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyedia extends CI_Model{
  
  function getidentitas($id){
    $this->db->where('iduser',$id);
    return $this->db->get('identitas_penyedia');
  }
 
}
?>