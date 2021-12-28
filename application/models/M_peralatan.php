<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_peralatan extends CI_Model{
  
  function getid($table,$id){
    $this->db->where('iduser',$id);
    return $this->db->get($table);
  }
 
}
?>