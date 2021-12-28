<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_verifakun extends CI_Model{
    function verif($id)
    {
      $this->db->set('status',1);
      $this->db->where('iduser', $id);
      return $this->db->update('user');
    }
    function get_unverif(){
      $this->db->select('iduser, nama, email, status, telepon');
      $this->db->where('status', 0);
      return $this->db->get('user');
    }
    function get_onlyverif(){
      $this->db->select('iduser, nama, email, status, role, telepon,disable');
      $this->db->where('status', 1);
      return $this->db->get('user');
    }
    function nonaktif($id){
      $this->db->set('disable', '1');
      $this->db->where('iduser', $id);
      $this->db->update('user');
    }
    function aktif($id){
      $this->db->set('disable', '0');
      $this->db->where('iduser', $id);
      $this->db->update('user');
    }
    function getallpenyedia(){
      $this->db->select('user.*, identitas_penyedia.*, static_bentuk_usaha.*');
      $this->db->from('user');
      $this->db->join('identitas_penyedia', 'user.iduser= identitas_penyedia.iduser', 'left');
      $this->db->join('static_bentuk_usaha', 'identitas_penyedia.id_bentuk_usaha= static_bentuk_usaha.id_bentuk_usaha', 'left');
      $param=array(
        'role'=>2,
        'user.status'=>1,
        'disable'=>0
      );
      $this->db->where($param);
      return $this->db->get();
    }
}
?>