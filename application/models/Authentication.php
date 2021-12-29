<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model{
    function login($data)
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('role', 'user.role_id=role.role_id', 'left');
      $this->db->where('username', $data['username']);
      $this->db->where('password', sha1($data['password']));
      $query= $this->db->get();
      return $query;
    }
    function register($data)
    {
     return $this->db->insert('user', $data);
    }
    function emailcheck($email)
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('email', $email);
      $query= $this->db->get();
      return $query;
    }
   
}
?>