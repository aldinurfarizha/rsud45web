<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model{
    function bentukusaha()
    {
      $this->db->where('status',1);
      return $this->db->get('static_bentuk_usaha');
    }
    function provinsi()
    {
      $this->db->where('status',1);
      return $this->db->get('static_provinsi');
    }
    function kabupaten()
    {
      $this->db->where('status',1);
      return $this->db->get('static_kabupaten');
    }
    function jenisizinusaha()
    {
      $this->db->where('status',1);
      return $this->db->get('static_jenis_izin_usaha');
    }
    function pajak()
    {
      $this->db->where('status',1);
      return $this->db->get('static_pajak');
    }
    function negara()
    {
      $this->db->where('status',1);
      return $this->db->get('static_negara');
    }
    function jenisklasifikasi()
    {
      $this->db->where('status',1);
      return $this->db->get('static_jenis_klasifikasi');
    }
    function deksripsiklasifikasi($id)
    {
      $this->db->where('id_jenis_klasifikasi',$id);
      $this->db->where('status',1);
      return $this->db->get('static_jenis_deskripsi_klasifikasi');
    }
    function disable($data,$table)
    {
      $this->db->set('status',0);
      $this->db->where($data);
      return $this->db->update($table);
    }
    function enable($data,$table)
    {
      $this->db->set('status',1);
      $this->db->where($data);
      return $this->db->update($table);
    }
    function hitung_bentukusaha($id){
      return $this->db->where('id_bentuk_usaha',$id)->from('identitas_penyedia')->count_all_results();
    }
    function hitung_izinusaha($id){
      return $this->db->where('id_jenis_izin_usaha',$id)->from('izin_usaha')->count_all_results();
    }
    function gettos(){
      $this->db->where('id', 1);
      return $this->db->get('tos');
    }
    function getkabupaten($id)
    {
      $this->db->where('id_provinsi',$id);
      $this->db->where('status',1);
      return $this->db->get('static_kabupaten');
    }
 
}
?>