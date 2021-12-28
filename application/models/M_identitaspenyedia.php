<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_identitaspenyedia extends CI_Model{
    protected $table_identitas_penyedia      = 'identitas_penyedia.*';
    protected $table_static_bentuk_usaha      = 'static_bentuk_usaha.*';
    protected $table_static_kabupaten      = 'static_kabupaten.*';
    protected $table_static_provinsi      = 'static_provinsi.*';
    function getbyid($id)
    {
        $this->db->select('identitas_penyedia.*, static_bentuk_usaha.*, static_kabupaten.*, static_provinsi.*');
        $this->db->from('identitas_penyedia');
        $this->db->join('static_bentuk_usaha', 'identitas_penyedia.id_bentuk_usaha= static_bentuk_usaha.id_bentuk_usaha', 'left');
        $this->db->join('static_kabupaten', 'identitas_penyedia.id_kabupaten= static_kabupaten.id_kabupaten', 'left');
        $this->db->join('static_provinsi', 'identitas_penyedia.id_provinsi= static_provinsi.id_provinsi', 'left');
        $this->db->where('identitas_penyedia.iduser', $id);
        return $this->db->get();
    }

}
?>