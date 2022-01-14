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
        return 'OFFLINE';
        break;
        case "1":
          return 'ONLINE';
          break;
           case "2":
          return 'DITOLAK';
          break;
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
      <td>Nama</td>
      <td>Cara Daftar</td>
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
    foreach($data as $datas){
      if($datas->status=="2"){
      }else{?>
    <tr>
      <td><?=@$no?></td>
      <td><?=@$datas->nama?></td>
      <td><?=status(@$datas->is_online)?></td>
      <td><?= @$datas->no_rm?></td>
      <td><?= @$datas->nik?></td>
      <td><?= @$datas->tmplahir?></td>
      <td><?= @$datas->kelamin?></td>
      <td><?= @$datas->tgllahir?></td>
      <td><?= @$datas->status_martial?></td>
      <td><?= @$datas->created_at?></td>
    </tr>
      <?php $no++; } ?>
    
    <?php  } ?>
	</tbody>
</table>