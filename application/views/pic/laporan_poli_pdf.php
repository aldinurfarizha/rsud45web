<style>
.page_break { page-break-before: always; }
</style>
<?php 
$model =& get_instance();
//$model->load->model('M_izinusaha');
?>
<title>Laporan Poli</title>
<center><h3>Laporan Daftar Pasien Poli</h3></center>
<p style="text-align: right">Tgl Cetak : <?=date("Y-m-d")?></p>
<hr />
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
  <thead>
    <tr>
      <td>No.</td>
      <td>Nama Pasien</td>
      <td>Status</td>
      <td>Dokter</td>
      <td>Poli</td>
      <td>Cara Bayar</td>
      <td>Tipe Pelayanan</td>
      <td>Cara Kunjungan</td>
      <td>Oleh</td>
      <td>Tanggal Periksa</td>
    </tr>
  </thead>
	<tbody>
    <?php 
    $no=1;
    foreach($data as $datas){?>
    <tr>
      <td><?=@$no?></td>
      <td><?=@$datas->nama_pasien?></td>
    </tr>
    <?php $no++; } ?>
	</tbody>
</table>
<?php print_r($date);?>