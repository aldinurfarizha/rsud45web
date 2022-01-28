<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model{
    function insert($table,$data)
    {
      return $this->db->insert($table, $data);
    }
    function update($table,$where,$data)
    {
      $this->db->set($data);
      $this->db->where($where);
      return $this->db->update($table);
    }
    function get_all($table)
    {
      return $this->db->get($table);
    }
    function replace($table,$data){
      return $this->db->replace($table,$data);
    }
    function getid($table,$id){
      $this->db->where('iduser',$id);
      return $this->db->get($table);
    }
    function getiddetail($table,$data){
      $this->db->where($data);
      return $this->db->get($table);
    }
    function delete($table,$data){
      $this->db->where($data);
      return $this->db->delete($table);
    }
    function insertcallback($table,$data){
      return ($this->db->insert($table, $data))  ?   $this->db->insert_id()  :   false;
    }
    function getrole(){
       $this->db->select('role.*');
        $this->db->from('role');
       $this->db->where('role_id <', 5);
       return $this->db->get();
    }
    function getmaxnorm(){
      $rm=$this->db->query('SELECT MAX(no_rm) as no_rm from pasien')->row()->no_rm;
      $no_rm=$rm+=1;
      return $no_rm;
    }
    function get_nama_poli($poli_id){
      $nama_poli=$this->db->query('SELECT nama_poli from poli where poli_id ='.$poli_id)->row()->nama_poli;
      return $nama_poli;
    }
    function login_dokter($param){
        $this->db->select('user.*, poli.*');
        $this->db->from('user');
        $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
        $this->db->where($param);
        return $this->db->get();
    }
    function getdokter(){
        $this->db->select('user.*, poli.*, user.status as status_dokter');
        $this->db->from('user');
        $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
        $this->db->where('user.hapus', 0);
        $this->db->where('user.role_id', 5);
        return $this->db->get();
    }
    function checkregisterpoli($param){
      return $this->db->where($param)->from('register_poli')->count_all_results();
    }
    function checkregisterpolipasien($param){
      return $this->db->where($param)->from('register_poli')->count_all_results();
    }
    function checkmaxregisterpoli($poli_id){
      $this->db->select('max');
              $this->db->where('poli_id',$poli_id);
              $this->db->from('poli');
              return $this->db->get();
    }
    function countdashboarddokter($where){
     return $this->db->where($where)->from('register_poli')->count_all_results();
    }
    function getpasiendetail($where){
        $this->db->select('register_poli.*, poli.nama_poli as nama_poli, pasien.nama as nama_pasien,pasien.alamat as alamat_pasien, user.nama as nama_dokter');
        $this->db->from('register_poli');
        $this->db->join('poli', 'register_poli.poli_id = poli.poli_id', 'left');
        $this->db->join('pasien', 'register_poli.no_rm = pasien.no_rm', 'left');
        $this->db->join('user', 'register_poli.dokter_id = user.user_id', 'left');
        $this->db->where($where);
        return $this->db->get();
    }
    function getpasien($where){
        $this->db->select('register_poli.*, poli.nama_poli as nama_poli, pasien.nama as nama_pasien,pasien.alamat as alamat_pasien, user.nama as nama_dokter');
        $this->db->from('register_poli');
        $this->db->join('poli', 'register_poli.poli_id = poli.poli_id', 'left');
        $this->db->join('pasien', 'register_poli.no_rm = pasien.no_rm', 'left');
        $this->db->join('user', 'register_poli.dokter_id = user.user_id', 'left');
        $this->db->like($where);
        $this->db->order_by('register_poli.status', 'ASC');
        $this->db->order_by('register_poli.antrian_no', 'ASC' );
        return $this->db->get();
    }
    function getpasiencm($where){
      $this->db->select('register_poli.*, poli.nama_poli as nama_poli, pasien.nama as nama_pasien,pasien.alamat as alamat_pasien, user.nama as nama_dokter');
      $this->db->from('register_poli');
      $this->db->join('poli', 'register_poli.poli_id = poli.poli_id', 'left');
      $this->db->join('pasien', 'register_poli.no_rm = pasien.no_rm', 'left');
      $this->db->join('user', 'register_poli.dokter_id = user.user_id', 'left');
      $this->db->like($where);
      $this->db->order_by('register_poli.catatan_medis','ASC' );
      $this->db->order_by('register_poli.antrian_no', 'ASC' );
      $this->db->where('register_poli.status <', 3);
      return $this->db->get();
  }
    function getuser(){
      $this->db->select('user.*, poli.*, role.*');
      $this->db->from('user');
      $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
      $this->db->join('role', 'user.role_id = role.role_id', 'left');
      $this->db->where('user.role_id <', 5);
      return $this->db->get();
  }
  function getuserwhere($param){
    $this->db->select('user.*, poli.*, role.*');
    $this->db->from('user');
    $this->db->join('poli', 'user.poli_id = poli.poli_id', 'left');
    $this->db->join('role', 'user.role_id = role.role_id', 'left');
    $this->db->where($param);
    return $this->db->get();
}
 function getverifiedpasien(){
    $this->db->select('pasien.*, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, agama.nama_agama as agama, pekerjaan.nama_pekerjaan as nama_pekerjaan, pendidikan.nama_pendidikan as nama_pendidikan');
    $this->db->from('pasien');
    $this->db->join('provinces', 'pasien.provinces_id = provinces.id', 'left');
    $this->db->join('regencies', 'pasien.regencies_id = regencies.id', 'left');
    $this->db->join('villages', 'pasien.villages_id = villages.id', 'left');
    $this->db->join('districts', 'pasien.districts_id = districts.id', 'left');
    $this->db->join('agama', 'pasien.agama_id = agama.id', 'left');
    $this->db->join('pekerjaan', 'pasien.pekerjaan_id = pekerjaan.id', 'left');
    $this->db->join('pendidikan', 'pasien.pendidikan_id = pendidikan.id', 'left');
    $this->db->where('no_rm >', '0');
    $this->db->order_by('no_rm', 'ASC');
    return $this->db->get();
}
function getunverifiedpasien(){
  $this->db->select('pasien.*, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, agama.nama_agama as agama, pekerjaan.nama_pekerjaan as nama_pekerjaan, pendidikan.nama_pendidikan as nama_pendidikan');
  $this->db->from('pasien');
  $this->db->join('provinces', 'pasien.provinces_id = provinces.id', 'left');
  $this->db->join('regencies', 'pasien.regencies_id = regencies.id', 'left');
  $this->db->join('villages', 'pasien.villages_id = villages.id', 'left');
  $this->db->join('districts', 'pasien.districts_id = districts.id', 'left');
  $this->db->join('agama', 'pasien.agama_id = agama.id', 'left');
  $this->db->join('pekerjaan', 'pasien.pekerjaan_id = pekerjaan.id', 'left');
  $this->db->join('pendidikan', 'pasien.pendidikan_id = pendidikan.id', 'left');
  $this->db->where('pasien.status', '0');
  return $this->db->get();
}
function getpasieddetail($id){
  $this->db->select('pasien.*, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, agama.nama_agama as agama, pekerjaan.nama_pekerjaan as nama_pekerjaan, pendidikan.nama_pendidikan as nama_pendidikan');
  $this->db->from('pasien');
  $this->db->join('provinces', 'pasien.provinces_id = provinces.id', 'left');
  $this->db->join('regencies', 'pasien.regencies_id = regencies.id', 'left');
  $this->db->join('villages', 'pasien.villages_id = villages.id', 'left');
  $this->db->join('districts', 'pasien.districts_id = districts.id', 'left');
  $this->db->join('agama', 'pasien.agama_id = agama.id', 'left');
  $this->db->join('pekerjaan', 'pasien.pekerjaan_id = pekerjaan.id', 'left');
  $this->db->join('pendidikan', 'pasien.pendidikan_id = pendidikan.id', 'left');
  $this->db->where('pasien.id', $id);
  return $this->db->get();
}
function getpendaftaranlaporan($where){
  $this->db->select('pasien.*, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, agama.nama_agama as agama, pekerjaan.nama_pekerjaan as nama_pekerjaan, pendidikan.nama_pendidikan as nama_pendidikan');
  $this->db->from('pasien');
  $this->db->join('provinces', 'pasien.provinces_id = provinces.id', 'left');
  $this->db->join('regencies', 'pasien.regencies_id = regencies.id', 'left');
  $this->db->join('villages', 'pasien.villages_id = villages.id', 'left');
  $this->db->join('districts', 'pasien.districts_id = districts.id', 'left');
  $this->db->join('agama', 'pasien.agama_id = agama.id', 'left');
  $this->db->join('pekerjaan', 'pasien.pekerjaan_id = pekerjaan.id', 'left');
  $this->db->join('pendidikan', 'pasien.pendidikan_id = pendidikan.id', 'left');
  $this->db->like($where);
  return $this->db->get();
}
function total_pasien_hari($day, $poli_id){
  $year=date('Y');
  $month=date('m');
  $date=$year.'-'.$month.'-'.$day;
  $param=array(
    'tanggal_periksa'=>$date,
    'poli_id'=>$poli_id
  );
  return $this->db->where($param)->from('register_poli')->count_all_results();
}
function total_pasien_hari_semua($day){
  $year=date('Y');
  $month=date('m');
  $date=$year.'-'.$month.'-'.$day;
  $param=array(
    'tanggal_periksa'=>$date,
  );
  return $this->db->where($param)->from('register_poli')->count_all_results();
}
function total_register_hari($day){
  $year=date('Y');
  $month=date('m');
  $date_awal='"'.$year.'-'.$month.'-'.$day.' 00:00:00'.'"';
  $day++;
  $date_akhir='"'.$year.'-'.$month.'-'.$day.' 00:00:00'.'"';
  return $this->db->query('SELECT COUNT(id) as total FROM pasien WHERE created_at >='.$date_awal.' AND created_at <'.$date_akhir)->row()->total;
}
   
    function count_dashboard_admin(){
      $param=array(
        'status_verif'=>'',
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_menunggu_verifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status_verif'=>1,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_terverifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status_verif'=>2,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_ditolak=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'status'=>1,
        'disable'=>0,
        'role'=>2
      );
      $total_akun_penyedia=$this->db->where($param)->from('user')->count_all_results();
      $param=array(
        'status'=>1,
        'disable'=>0,
        'role'=>1
      );
      $total_akun_admin=$this->db->where($param)->from('user')->count_all_results();
      $result=array(
        'total_menunggu_verifikasi'=>$total_menunggu_verifikasi,
        'total_terverifikasi'=>$total_terverifikasi,
        'total_ditolak'=>$total_ditolak,
        'total_akun_penyedia'=>$total_akun_penyedia,
        'total_akun_admin'=>$total_akun_admin
      );
      return $result;
    }
    function count_dashboard_penyedia($iduser){
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>'',
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_menunggu_verifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>1,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_terverifikasi=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $param=array(
        'iduser'=>$iduser,
        'status_verif'=>2,
      );
      $a=$this->db->where($param)->from('pengalaman')->count_all_results();
      $b=$this->db->where($param)->from('izin_usaha')->count_all_results();
      $c=$this->db->where($param)->from('identitas_penyedia')->count_all_results();
      $d=$this->db->where($param)->from('akta_pendirian')->count_all_results();
      $e=$this->db->where($param)->from('pemilik')->count_all_results();
      $f=$this->db->where($param)->from('pengurus')->count_all_results();
      $g=$this->db->where($param)->from('personil')->count_all_results();
      $h=$this->db->where($param)->from('peralatan')->count_all_results();
      $i=$this->db->where($param)->from('pajak')->count_all_results();
      $j=$this->db->where($param)->from('keuangan')->count_all_results();
      $k=$this->db->where($param)->from('akta_perubahan')->count_all_results();
      $total_ditolak=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
      $result=array(
        'total_menunggu_verifikasi'=>$total_menunggu_verifikasi,
        'total_terverifikasi'=>$total_terverifikasi,
        'total_ditolak'=>$total_ditolak
      );
      return $result;
    }
    function check($table,$where){
      $this->db->where($where);
      return $this->db->get($table)->num_rows();
    }
}
?>