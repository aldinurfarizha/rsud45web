<style>
.page_break { page-break-before: always; }
table tbody tr td {
  font-size: 12px;
}
</style>
<?php 
$model =& get_instance();
//$model->load->model('M_izinusaha');

function status($status){
  switch ($status){
        case "0":
        return 'BELUM CHECK-IN';
        break;
        case "1":
          return 'CHECK-IN';
          break;
          case "2":
            return 'SELESAI';
            break;
            case "9":
              return 'BATAL';
            }
}

            
?>
<title>Laporan Poli</title>
<center><h3>Laporan Daftar Pasien Poli</h3></center>
<p style="text-align: right">Tgl Cetak : <?=date("Y-m-d")?></p>
<hr />
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
  <thead>
    <tr style="text-align: center; background-color: #d9d9d9">
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
      <td><?=status(@$datas->status)?></td>
      <td><?= @$datas->nama_dokter?></td>
      <td><?= @$datas->nama_poli?></td>
      <td><?= @$datas->cara_bayar?></td>
      <td><?= @$datas->tipe_pelayanan?></td>
      <td><?= @$datas->cara_kunjungan?></td>
      <td><?= @$datas->ditambahkan_oleh?></td>
      <td><?= @$datas->tanggal_periksa?></td>
    </tr>
    <?php $no++; } ?>
	</tbody>
</table>