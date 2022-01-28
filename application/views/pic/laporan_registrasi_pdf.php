<style>
.page_break { page-break-before: always; }
table tbody tr td {
  font-size: 12px;
}
</style>
<?php 
$model =& get_instance();
//$model->load->model('M_izinusaha');

function cara_daftar($cara_daftar){
  switch ($cara_daftar){
        case "0":
        return 'OFFLINE';
        break;
        case "1":
          return 'ONLINE';
          break;
            }
}
function status_pasien($status_pasien){
  switch ($status_pasien){
        case "0":
        return 'Belum AktifE';
        break;
        case "1":
          return 'ONLINE';
          break;
          case "2":
            return 'NON-AKTIF/TOLAK';
            break;
            }
}

            
?>
<title>Laporan Poli</title>
<center><h3>Laporan Daftar Pasien Poli</h3></center>
<p style="text-align: right">Tgl Cetak : <?=date("Y-m-d")?></p>
<p style="text-align: right">Cara Mendaftar : <?php if($cara_daftar=''){echo 'Semua';}else{echo cara_daftar($cara_daftar);}?></p>
<p style="text-align: right">Status Pasien : <?php if($status_pasien=''){echo 'Semua';}else{echo status_pasien($status_pasien);}?></p>
<p style="text-align: right">Bulan Daftar : <?php if($bulan_daftar=''){echo 'Semua';}else{echo $bulan_daftar;}?></p></p>
<hr />
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
  <thead>
    <tr style="text-align: center; background-color: #d9d9d9">
      <td>No.</td>
      <td>Nama</td>
      <td>Cara Daftar</td>
      <td>Status Pasien</td>
      <td>NO RM</td>
      <td>NIK</td>
      <td>TMPT LHR</td>
      <td>JK</td>
      <td>TGL LHR</td>
      <td>Status Martial</td>
      <td>Tanggal Input</td>
    </tr>
  </thead>
	<tbody>
    <?php 
    $no=1;
    foreach($data as $datas){?>
    <tr>
      <td><?=@$no?></td>
      <td><?=@$datas->nama?></td>
      <td><?=cara_daftar(@$datas->is_online)?></td>
      <td><?=status_pasien(@$datas->status)?></td>
      <td><?= @$datas->no_rm?></td>
      <td><?= @$datas->nik?></td>
      <td><?= @$datas->tmplahir?></td>
      <td><?= @$datas->kelamin?></td>
      <td><?= @$datas->tgllahir?></td>
      <td><?= @$datas->status_martial?></td>
      <td><?= @$datas->created_at?></td>
    </tr>
      <?php $no++; } ?>
	</tbody>
</table>