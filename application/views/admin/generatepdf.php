<style>
.page_break { page-break-before: always; }
</style>
<?php 
$model =& get_instance();
$model->load->model('M_izinusaha');
?>
<title>DATA PENYEDIA</title>
<table cellspacing="0" style="border-collapse:collapse; margin-left:auto; margin-right:auto; width:100%">
	<tbody>
		<tr>
			<td style="width:22.807%"><img alt="" src="<?=base_url('assets/')?>dist/img/logo.png" style="height:140px; width:120px" /></td>
			<td style="text-align:center; width:52.0343%">
			<h3><strong>PAM TIRTA KAMUNING KABUPATEN KUNINGAN</strong></h3>
			<p>Jl. RE. Martadinata No. 527, Ancaran, Ancaran, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45514 (0232) 871190</p>
			</td>
			<td style="text-align:right; width:25.1586%">
			<p>SIKaP (Sistem Informasi Kinerja Penyedia)</p>
			<p><em>Tgl Cetak : <?=date("Y-m-d")?></em></p>
			</td>
		</tr>
	</tbody>
</table>

<hr />
<h3 style="text-align:center">IDENTITAS PENYEDIA</h3>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr>
			<td style="width:23.2363%">Nama Perusahaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->nama_perusahaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Bentuk Usaha</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->bentuk_usaha : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kepemilikan Kantor Cabang</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->kantor_cabang : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">No. NPWP</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->npwp : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">No. Pengukuhan PKP</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->no_pengukuhan_pkp : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Telepon Selluler</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->telp_seluler : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Alamat Perusahaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->alamat_perusahaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Provinsi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->provinsi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kabupaten</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->kabupaten : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Telp Perusahaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->telp : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Fax Perusahaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->fax : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Alamat Website</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->website : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kode POS</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->kode_pos : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Deskripsi Perusahaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($identitas) ? $identitas->deskripsi : null?></td>
		</tr>
	</tbody>
</table>
<h3 style="text-align:center">Daftar Narahubung</h3>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
	<tr style="background-color:#D3D3D3">
			<td style="width:5%"><center><strong>No.</strong></center></td>
			<td style="width:32%"><center><strong>Nama</strong></center></td>
			<td style="width:32%"><center><strong>Email</strong></center></td>
			<td style="width:31%"><center><strong>Telepon</strong></center></td>
		</tr>
		<?php 
             $no=0;
             foreach($narahubung as $narahubungs){
             $no++;
        ?>
        <tr>
			<td style="width:5%"><center><?= $no?></center></td>
			<td style="width:32%">&nbsp;<?=isset($narahubungs) ? $narahubungs->nama : null?></td>
			<td style="width:32%">&nbsp;<?=isset($narahubungs) ? $narahubungs->email : null?></td>
			<td style="width:31%">&nbsp;<?=isset($narahubungs) ? $narahubungs->telepon : null?></td>
		</tr>
        <?php } ?>
	</tbody>
</table>
<br>
<br>
<?php if(isset($identitas) && $identitas->status_verif == 1) 
                                         {?>
										 	<img alt="" style="float:right;" src="<?=base_url('assets/dist/img/dataverified.png')?>"/>
											  <?php }
                                         else{
                                            if(isset($identitas) && $identitas->status_verif == 2) {?>
                                               <img alt="" src="<?=base_url('assets/dist/img/ditolak.png')?>"/>
											   <?php 
                                            } 
                                            else{?>
                                                <img alt="" src="<?=base_url('assets/dist/img/unverified.png')?>"/>
                                            <?php }
                                        }?>
<div class="page_break"></div>
<h3 style="text-align:center">Daftar Izin Usaha</h3>
<?php 
             $no=0;
			 if(!$izinusaha){
				echo '<center>Belum ada data yang di tambahkan</center>';
			}
             foreach($izinusaha as $data){
             $no++;
        ?>
        <table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr style="background-color:#D3D3D3">
		<td colspan="2"><center><?=$no?></center></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Jenis Izin Usaha</td>
			<td style="width:76.7637%">&nbsp;<?=isset($data) ? $data->jenis_izin_usaha : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nomor Surat</td>
			<td style="width:76.7637%">&nbsp;<?=isset($data) ? $data->nomor_surat : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kualifikasi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($data) ? $data->kualifikasi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Instansi Pemberi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($data) ? $data->instansi_pemberi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Berlaku Sampai</td>
			<td style="width:76.7637%">&nbsp;<?=isset($data) ? $data->berlaku_sampai : null?></td>
		</tr>
		
	</tbody>
	<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr>
                                                <th>No.</th>
                                                <th>Klasifikasi</th>
                                                <th>Kode</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $nomor=0;
                                          $array=array(
                                            'id_izin_usaha'=>$data->id_izin_usaha
                                          );
                                          $klasifikasi= $model->M_izinusaha->klasifikasi($array)->result();
                                          foreach($klasifikasi as $klasifikasia){
                                              $nomor++;
                                              ?>
                                              <tr>
                                              <td><?= $nomor?></td>
                                              <td><?= $klasifikasia->jenis_klasifikasi?></td>
                                              <td><?= $klasifikasia->kode?></td>
                                              <td><?= $klasifikasia->judul_klasifikasi?></td>
                                              <td><?= $klasifikasia->deskripsi_klasifikasi?></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
</table>
<div class="col-sm-3"><?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                { echo "<p style=background-color:powderblue>Terverifikasi</p>"; }
                                                else{
                                                    if(isset($data->status_verif) && $data->status_verif == 2) {
                                                        echo "<p style=background-color:red>Ditolak</p>"; ;
                                                    }
                                                    else{
                                                        echo"<p style=background-color:orange>Menunggu Verifikasi</p>";
                                                    }
                                                    }?></div>
        <?php } ?>
<div class="page_break"></div>
<h3 style="text-align:center"><strong>Akta Perusahaan</strong></h3>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
	<tr style="background-color:#D3D3D3">
		<td colspan="2">Akta Pendirian</td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Notaris</td>
			<td style="width:76.7637%">&nbsp;<?= isset($akta_pendirian) ? $akta_pendirian->nama_notaris : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nomor</td>
			<td style="width:76.7637%">&nbsp;<?= isset($akta_pendirian) ? $akta_pendirian->nomor : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Tanggal Akta</td>
			<td style="width:76.7637%">&nbsp;<?= isset($akta_pendirian) ? $akta_pendirian->tanggal : null?></td>
		</tr>
	</tbody>
</table>
<br>
<?php if(isset($akta_pendirian) && $akta_pendirian->status_verif == 1) 
                                         {?>
										 	<img alt="" style="float:right;" src="<?=base_url('assets/dist/img/dataverified.png')?>"/>
											  <?php }
                                         else{
                                            if(isset($akta_pendirian) && $akta_pendirian->status_verif == 2) {?>
                                               <img alt="" style="float:right;" src="<?=base_url('assets/dist/img/ditolak.png')?>"/>
											   <?php 
                                            } 
                                            else{?>
                                                <img alt="" style="float:right;" src="<?=base_url('assets/dist/img/unverified.png')?>"/>
                                            <?php }
                                        }?>
<br>
<br>
<br>
<br>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr style="background-color:#D3D3D3">
										<td colspan="5">Akta Perubahan</td>
										</tr>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor</th>
                                                <th>Notaris</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($akta_perubahan as $data){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $data->nomor?></td>
                                              <td><?= $data->nama_notaris?></td>
                                              <td><?= $data->tanggal?></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                    { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                    else{
                                                        if(isset($data->status_verif) && $data->status_verif == 2) {
                                                            echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                        }
                                                        else{
                                                            echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                        }
                                                    }?>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
<div class="page_break"></div>
<h3 style="text-align:center"><strong>Daftar Pemilik</strong></h3>
<?php 
             $no=0;
			  if(!$pemilik){
				echo '<center>Belum ada data yang di tambahkan</center>';
			}
             foreach($pemilik as $datas){
             $no++;
        ?>
        <table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr style="background-color:#D3D3D3">
		<td colspan="2"><center><?=$no?></center></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Lengkap</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama : null?></td>
		</tr>	
		<tr>
			<td style="width:23.2363%">Jenis Kepemilikan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jenis_kepemilikan : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kewarganegaraan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->negara : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Nomor Identitas</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nomor_identitas : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">NPWP</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->npwp : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Jenis Saham</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jenis_saham : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Nilai Saham</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nilai_saham : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Alamat</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->alamat : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Provinsi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->provinsi : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kabupaten</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kabupaten : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Status</td>
			<td style="width:76.7637%"> <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                    { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                    else{
                                                        if(isset($data->status_verif) && $data->status_verif == 2) {
                                                            echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                        }
                                                        else{
                                                            echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                        }
                                                    }?></td>
		</tr>		
	</tbody>
</table>
        <?php } ?>
<div class="page_break"></div>
<h3 style="text-align:center"><strong>Daftar Pengurus</strong></h3>
<?php 
             $no=0;
			 if(!$pengurus){
				echo '<center>Belum ada data yang di tambahkan</center>';
			}
             foreach($pengurus as $datas){
             $no++;
        ?>
        <table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr style="background-color:#D3D3D3">
		<td colspan="2"><center><?=$no?></center></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Lengkap</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama : null?></td>
		</tr>	
		<tr>
			<td style="width:23.2363%">Jenis Kepengurusan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jenis_kepengurusan : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kewarganegaraan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->negara : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Nomor Identitas</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nomor_identitas : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">NPWP</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->npwp : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Alamat</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->alamat : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Provinsi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->provinsi : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kabupaten</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kabupaten : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Jabatan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jabatan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Periode Jabatan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->menjabat_sejak.' - '.$datas->menjabat_sampai : null?></td>
		</tr>	
		<tr>
			<td style="width:23.2363%">Status Kepengurusan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas->status) ? 'Aktif' : 'Non Aktif'?></td>
		</tr>				
		<tr>
			<td style="width:23.2363%">Status Verifikasi</td>
			<td style="width:76.7637%"> <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                    { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                    else{
                                                        if(isset($data->status_verif) && $data->status_verif == 2) {
                                                            echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                        }
                                                        else{
                                                            echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                        }
                                                    }?></td>
		</tr>		
	</tbody>
</table>
        <?php } ?>
		<div class="page_break"></div>
<h3 style="text-align:center"><strong>Daftar Personil</strong></h3>
<?php 
             $no=0;
			 if(!$personil){
				echo '<center>Belum ada data yang di tambahkan</center>';
			}
             foreach($personil as $datas){
             $no++;
        ?>
        <table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr style="background-color:#D3D3D3">
		<td colspan="2"><center><?=$no?></center></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Lengkap</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama : null?></td>
		</tr>	
		<tr>
			<td style="width:23.2363%">Jenis Tenaga</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jenis_tenaga : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kewarganegaraan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->negara : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Nomor Identitas</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->no_identitas : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">NPWP</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->npwp : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">No. BPJS Kesehatan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->no_bpjs_kesehatan : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">No. BPJS Ketenagakerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->no_bpjs_ketenagakerjaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Negara Tempat Lahir</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->negaralahir : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kabupaten Tempat Lahir</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kabupatenlahir : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Tanggal Lahir</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->tanggal_lahir : null?></td>
		</tr>			
		<tr>
			<td style="width:23.2363%">Jenis Kelamin</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->jenis_kelamin : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Telepon</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->telp : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Email</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->email : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Website</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->website : null?></td>
		</tr>					
		<tr>
			<td style="width:23.2363%">Alamat</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->alamat : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Provinsi Sekarang</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->provinsi : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Kabupaten Sekarang</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kabupaten : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Status Kepegawaian</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas->status_kepagawain) ? 'Tetap' : 'Tidak Tetap'?></td>
		</tr>				
		<tr>
			<td style="width:23.2363%">Lama Tahun Pengalaman Bekerja</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->lama_tahun_pengalaman_kerja.' Tahun' : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Pendidikan Akhir</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->pendidikan_akhir : null?></td>
		</tr>		
		<tr>
			<td style="width:23.2363%">Profesi Keahlian</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->profesi_keahlian : null?></td>
		</tr>	
		<tr>
			<td style="width:23.2363%">Tipe Personil</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->type_personil : null?></td>
		</tr>			
		<tr>
			<td style="width:23.2363%">Status Verifikasi</td>
			<td style="width:76.7637%"> <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                    { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                    else{
                                                        if(isset($data->status_verif) && $data->status_verif == 2) {
                                                            echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                        }
                                                        else{
                                                            echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                        }
                                                    }?></td>
		</tr>		
	</tbody>
</table>
        <?php } ?>
		<div class="page_break"></div>
<h3 style="text-align:center"><strong>Daftar Peralatan</strong></h3>
<table border="1" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr style="background-color:#D3D3D3">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Jml</th>
                                                <th>Merk/Type</th>
                                                <th>Thn Pembuatan</th>
                                                <th>Kondisi</th>
                                                <th>Status Kepemilikan</th>
                                                <th>Bukti Kepemilikan</th>
                                                <th>Keterangan</th>
												<th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($peralatan as $data){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $data->nama_peralatan?></td>
                                              <td><?= $data->jumlah?></td>
                                              <td><?= $data->merk_type?></td>
                                              <td><?= $data->tahun_pembuatan?></td>
                                              <td><?= $data->kondisi?></td>
                                              <td><?= $data->status_kepemilikan?></td>
                                              <td><?= $data->bukti_kepemilikan?></td>
                                              <td><?= $data->keterangan?></td>
											  <td style="text-align: center;">
                                              <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                         { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                         else{
                                            if(isset($data->status_verif) && $data->status_verif == 2) {
                                                echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                            }
                                            else{
                                                echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                            }
                                        }?>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
<div class="page_break"></div>
<h3 style="text-align:center"><strong>Pajak</strong></h3>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr style="background-color:#D3D3D3">
                                                <th>No.</th>
                                                <th>Jenis Laporan Pajak</th>
                                                <th>Nomor Bukti Penerimaan Surat</th>
                                                <th>Masa Pajak</th>
                                                <th>Tanggal Bukti Penerimaan Surat</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($pajak as $datas){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              
                                              <td><?= $datas->deskripsi?></td>
                                              <td><?= $datas->nomor_bukti_penerimaan_surat?></td>
                                              <td><?= $datas->masa_pajak?></td>
                                              <td><?= $datas->tanggal_bukti_penerimaan_surat?></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                    }
                                                    }?>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
<div class="page_break"></div>
<h3 style="text-align:center"><strong>Pengalaman</strong></h3>
<?php 
             $no=0;
			if(!$pengalaman){
				echo '<center>Belum ada data yang di tambahkan</center><div class="page_break"></div>';
			}
             foreach($pengalaman as $datas){
             $no++;
        ?>
        <table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
	<tbody>
		<tr style="background-color:#D3D3D3">
		<td colspan="2"><center><?=$no?></center></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Kontrak</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama_kontrak : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nomor Kontrak</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nomor_kontrak : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Durasi Pelaksanaan Mulai</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->durasi_pelaksanaan_mulai : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Durasi Pelaksanaan Selesai</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->durasi_pelaksanaan_selesai : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Tanggal Serah Terima Pekerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->tanggal_serah_terima_pekerjaan: null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nilai Kontrak</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? 'Rp. '.number_format($datas->nilai_kontrak, 0, ".", ".") : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kategori Pekerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kategori_pekerjaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Persentase Pekerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->persentase_pekerjaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Uraian Pekerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->uraian_pekerjaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Ruang Lingkup Pekerjaan</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->ruang_lingkup_pekerjaan : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Alamat</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->alamat : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Negara</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->negara : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Provinsi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->provinsi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Kabupaten</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->kabupaten : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Instansi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama_instansi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Nama Instansi Lainya</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->nama_instansi_lainnya : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Satuan Kerja</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->satuan_kerja : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Alamat Instansi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->alamat_instansi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Telepon Instansi</td>
			<td style="width:76.7637%">&nbsp;<?=isset($datas) ? $datas->telp_instansi : null?></td>
		</tr>
		<tr>
			<td style="width:23.2363%">Status Verif</td>
			<td style="text-align: center;">
                                              <?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                         { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                         else{
                                            if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                            }
                                            else{
                                                echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                            }
                                        }?>
		</tr>
	</tbody>
	</table>
	<br>
	<p style="text-align:center">Klasifikasi</p>
	<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr style="background-color:#D3D3D3">
                                                <th>No.</th>
                                                <th>Klasifikasi</th>
                                                <th>Kode</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $nomor=0;
                                          $array=array(
											'id_pengalaman'=>$datas->id_pengalaman
                                          );
										  $klasifikasi= $model->M_pengalaman->klasifikasi($array)->result();
                                          foreach($klasifikasi as $klasifikasia){
                                              $nomor++;
                                              ?>
                                              <tr>
                                              <td><?= $nomor?></td>
                                              <td><?= $klasifikasia->jenis_klasifikasi?></td>
                                              <td><?= $klasifikasia->kode?></td>
                                              <td><?= $klasifikasia->judul_klasifikasi?></td>
                                              <td><?= $klasifikasia->deskripsi_klasifikasi?></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>

<div class="page_break"></div>
        <?php } ?>
<h3 style="text-align:center"><strong>Keuangan</strong></h3>
<table border="1" cellspacing="0" style="border-collapse:collapse; width:100%">
                                        <thead>
										<tr style="background-color:#D3D3D3">
                                                <th>No.</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($keuangan as $datas){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $datas->keterangan?></td>
                                              <td><?= $datas->tanggal?></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                    }
                                                    }?>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
									<br>
									<br>
									<br>
									<div class="page_break"></div>
									<p><?=$tos->isi?></p>
									<p class="text-right">
										<b>TTD</b><br>
										<?=isset($identitas) ? $identitas->nama_perusahaan : null?>
									</p>
