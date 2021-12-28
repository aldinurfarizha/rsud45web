<?php 
$model =& get_instance();
$model->load->model('M_izinusaha');
?>
<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row justify-content-center">
                    <div class="col-sm-12">
                    <div class="text-right">
                    <?php if(isset($akta_pendirian->file)){?>
                        <a href="<?=base_url('berkas/').isset($akta_pendirian) ? $akta_pendirian->file : null ?>" class="btn btn-lg btn-primary"> <i class="fa fa-download"></i> Akta Pendirian</a>
                   <?php }
                    ?>
                    <a href="<?=base_url('admin/datapenyedia/pdf/').$iduser?>" target="_blank" class="btn btn-lg btn-danger"> <i class="fa fa-download"></i> PDF</a>
                    </div>
                    <br>
                    <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Di bawah ini adalah data Profil Penyedia, dalam menu ini anda dapat melakukan <strong>VERIFIKASI DATA</strong> dan mencetak <strong>LAPORAN</strong> Berupa keseluruhan data penyedia terkait
                </div>
                    <div class="row">
          <div class="col-sm-4">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$total['total_menunggu_verifikasi']?> <i class="fa fa-clock"></i></h3>
                <p>Total Data Menunggu Verifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$total['total_terverifikasi']?> <i class="fa fa-check"></i></h3>
                <p>Total Data Terverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$total['total_ditolak']?> <i class="fa fa-times"></i></h3>
                <p>Total Data di Tolak</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
                  
<!--- Identitas Penyedia --->
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Identitas Penyedia</h3>
                        </div>
                            <div class="card-body">
                            <div class="row">
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Nama Perusahaan</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->nama_perusahaan : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Bentuk Usaha</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->bentuk_usaha : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Kepemilikan Kantor Cabang</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->kantor_cabang : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">No. NPWP</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->npwp : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">No. Pengukuhan PKP</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->no_pengukuhan_pkp : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Telepon Selluler</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->telp_seluler : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Alamat Perusahaan</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->alamat_perusahaan : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Provinsi</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->provinsi : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Kabupaten</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->kabupaten : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Telp Perusahaan</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->telp : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Fax Perusahaan</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->fax : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Alamat Website</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->website : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Kode POS</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->kode_pos : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Status Kepemilikan Kantor</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->kepemilikan : null?></strong></p>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">File Terlampir</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <?php if(isset($identitas->file)){ ?>
                                <button type="button" onclick="popup('<?=base_url(BERKAS_KEPEMILIKAN_KANTOR).$identitas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                              <?php } else{?>
                                <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                              <?php } ?>
                            </div>
                            <div class="form-group col-sm-3">
                              <p class="font-weight-light">Deskripsi Perusahaan</p>
                            </div>
                            <div class="form-group col-sm-9">
                              <p class="font-weight-normal"><strong><?=isset($identitas) ? $identitas->deskripsi : null?></strong></p>
                            </div>
                            </div>
                            <p class="font-weight-bold text-center">Daftar Narahubung</p>
                            <div class="table-responsive">
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($narahubung as $narahubungs){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?=isset($narahubungs) ? $narahubungs->nama : null?></td>
                                              <td><?=isset($narahubungs) ? $narahubungs->email : null?></td>
                                              <td><?=isset($narahubungs) ? $narahubungs->telepon : null?></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                               <br>
                               <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($identitas) && $identitas->status_verif == 1) 
                                         { echo "<img src='".base_url('assets/dist/img/dataverified.svg')."'>"; }
                                         else{
                                            if(isset($identitas) && $identitas->status_verif == 2) {
                                                echo "<img src='".base_url('assets/dist/img/ditolak.svg')."'>";
                                            }
                                            else{
                                                echo "<img src='".base_url('assets/dist/img/unverified.svg')."'>";
                                            }
                                        }?>
                                        </div>
                                        <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($identitas) && $identitas->status_verif == 1) {
                                         ?>
                                        <button onclick="tolak(<?=$iduser?> , 1 ,<?=$identitas->id_identitas?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                        
                                       <?php }else{
                                         if(isset($identitas) && $identitas->status_verif == 2) { ?>
                                              <button onclick="verifikasi(<?=$iduser?> , 1 ,<?=$identitas->id_identitas?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                       <?php }
                                      else{ ?>
                                      <?php if(isset($identitas)){
                                          ?>
                                      <button onclick="tolak(<?=$iduser?> , 1 ,<?=$identitas->id_identitas?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                      <button onclick="verifikasi(<?=$iduser?> , 1 ,<?=$identitas->id_identitas?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                      <?php } ?>
                                     
                                      <?php } }?> 
                                      
                                        </div>
                                        
                                        
                            </div>
                        </div>
<!--- Izin Usaha --->
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Izin Usaha</h3>
                        </div>
                            <div class="card-body">
                               <br>
                               <div class="row">
                                <?php 
                               $no=1;
                               foreach($izinusaha as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-sm-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-sm-2"><i class="fa fa-sticky-note"></i> <?=$datas->jenis_izin_usaha?></p></div>
                                        <div class="col-sm-2">
                                        <?php if(!empty($datas->file)){?>
                                          <button type="button" onclick="popup('<?=base_url(BERKAS_IZINUSAHA).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                        <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                        <?php } ?>
                                        </div>
                                        <div class="col-sm-1"><i class="fa fa-calendar"></i> <?=$datas->berlaku_sampai?></p></div>
                                        <div class="col-sm-2"><i class="fa fa-building"></i> <?=$datas->instansi_pemberi?></p></div>
                                       
                                        <div class="col-sm-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-sm-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                    <label>Klasifikasi Usaha Terdaftar</label>
                                    <div class="table-responsive">
                                    <table class=" table table-striped">
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
                                            'id_izin_usaha'=>$datas->id_izin_usaha
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
                                </div>
                                <div class="form-group col-sm-12 text-right">
                                <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>   <button onclick="tolak(<?=$iduser?> , 2 ,<?=$datas->id_izin_usaha?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 2 ,<?=$datas->id_izin_usaha?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?>  <button onclick="tolak(<?=$iduser?> , 2 ,<?=$datas->id_izin_usaha?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 2 ,<?=$datas->id_izin_usaha?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                      </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
                                </div>
                            </div>
                        </div>
<!--- AKTA Pendirian -->
                            <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-sticky-note"></i> Akta Pendirian</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Notaris</label>
                                        <input type="text" name="nama_notaris" value="<?= isset($akta_pendirian) ? $akta_pendirian->nama_notaris : null?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor</label>
                                        <input type="text" name="nomor" value="<?= isset($akta_pendirian) ? $akta_pendirian->nomor : null?>"  class="form-control" readonly>
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Akta</label>
                                        <input type="date" name="tanggal" value="<?= isset($akta_pendirian) ? $akta_pendirian->tanggal : null?>"  class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas (PDF)</label>
                                    <br>
                                    <?php if(isset($akta_pendirian->file)){ ?>
                                <button type="button" onclick="popup('<?=base_url(BERKAS_AKTA).$akta_pendirian->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                              <?php } else{?>
                                <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                              <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($akta_pendirian) && $akta_pendirian->status_verif == 1) 
                                         { echo "<img src='".base_url('assets/dist/img/dataverified.svg')."'>"; }
                                         else{
                                            if(isset($akta_pendirian) && $akta_pendirian->status_verif == 2) {
                                                echo "<img src='".base_url('assets/dist/img/ditolak.svg')."'>";
                                            }
                                            else{
                                                echo "<img src='".base_url('assets/dist/img/unverified.svg')."'>";
                                            }
                                        }?>
                                        </div>
                                        <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($akta_pendirian) && $akta_pendirian->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 3 ,<?=$akta_pendirian->id_akta_pendirian?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($akta_pendirian) && $akta_pendirian->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 3 ,<?=$akta_pendirian->id_akta_pendirian?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> 
                                            <?php if(isset($akta_pendirian)){?>
                                                <button onclick="tolak(<?=$iduser?> , 3 ,<?=$akta_pendirian->id_akta_pendirian?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                            <button onclick="verifikasi(<?=$iduser?> , 3 ,<?=$akta_pendirian->id_akta_pendirian?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                            <?php } ?>
                                           
                                             <?php }
                                        }?>
                                        </div>
                                        <br>
                            </div>
                        </div>
<!--- AKTA Perubahan -->
                      <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-reply-all"></i> Akta Perubahan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                </div>
                                        <br>
                                <table  id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor</th>
                                                <th>Notaris</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th><center>Aksi</center></th>
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
                                              <td style="text-align: center;">
                                              <?php if(isset($data) && $data->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 4 ,<?=$data->id_akta_perubahan?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($data) && $data->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 4 ,<?=$data->id_akta_perubahan?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 4 ,<?=$data->id_akta_perubahan?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 4 ,<?=$data->id_akta_perubahan?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                              </td>
                                         
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
<!--- Pemilik -->
                      <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-circle"></i> Pemilik</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                </div>
                                        <br>
                                <div class="row">
                                <?php 
                               $no=1;
                               foreach($pemilik as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-3"><i class="fa fa-user"></i> <?=$datas->nama?></p></div>
                                        <div class="col-md-2"><i class="fa fa-building"></i> <?=$datas->jenis_kepemilikan?></p></div>
                                        <div class="col-md-2"><?php if(isset($datas->status) && $datas->status == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Aktif <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    echo "<span class='badge badge-success'><strong class='text-md'>Tidak Aktif <i class='fa fa-times'></i></strong></span>";
                                                    }?></div>
                                        <div class="col-md-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-md-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                            <div class="col-md-4"><p > Kewarganegaraan : <?=$datas->negara?></p> </div>
                                            <div class="col-md-4"><p> NPWP : <?=$datas->npwp?></p></div>
                                            <div class="col-md-4"><p >Alamat : <?=$datas->alamat?></p> </div>
                                            <div class="col-md-4"><p > Provinsi : <?=$datas->provinsi?></p></div>
                                            <div class="col-md-4"><p>Kabupaten : <?=$datas->kabupaten?></p></div>
                                            <div class="col-md-4"><p > Saham : <?=$datas->nilai_saham." ".$datas->jenis_saham?></p></div>
                                            <div class="col-md-12"><p>No Identitas : <?=$datas->nomor_identitas?></p></div>
                                            <div class="form-group col-sm-12 text-right">
                                            <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 5 ,<?=$datas->id_pemilik?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 5 ,<?=$datas->id_pemilik?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 5 ,<?=$datas->id_pemilik?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 5 ,<?=$datas->id_pemilik?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
                                </div>
                            </div>
                        </div>
<!--- Pengurus -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-circle"></i> Pengurus</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                </div>
                                        <br>
                               <?php 
                               $no=1;
                               foreach($pengurus as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-3"><i class="fa fa-user"></i> <?=$datas->nama?></p></div>
                                        <div class="col-md-2"><i class="fa fa-address-book"></i> <?=$datas->jabatan?></p></div>
                                        <div class="col-md-2"><?php if(isset($datas->status) && $datas->status == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Aktif <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    echo "<span class='badge badge-success'><strong class='text-md'>Tidak Aktif <i class='fa fa-times'></i></strong></span>";
                                                    }?></div>
                                        <div class="col-md-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-md-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                            <div class="col-md-4"><p class="font-weight-light"> Jenis Kepengurusan : <b><?=$datas->jenis_kepengurusan?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Kewarganegaraan : <b><?=$datas->negara?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> NPWP : <b><?=$datas->npwp?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Alamat : <b><?=$datas->alamat?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Provinsi : <b><?=$datas->provinsi?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Kabupaten : <b><?=$datas->kabupaten?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Menjabat Sejak : <b><?=$datas->menjabat_sejak?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Menjabat Sampai: <b><?=$datas->menjabat_sampai?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light">Berkas / KTP : 
                                            <?php if(isset($datas->file)){ ?>
                                              <button type="button" onclick="popup('<?=base_url(BERKAS_KTP).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else{?>
                                              <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?>
                                            </p></div>
                                            <div class="form-group col-sm-12 text-right">
                                            <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 6 ,<?=$datas->id_pengurus?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 6 ,<?=$datas->id_pengurus?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 6 ,<?=$datas->id_pengurus?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 6 ,<?=$datas->id_pengurus?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
                            </div>
                        </div>
<!--- Personil -->
                  <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Personil</h3>
                        </div>
                            <div class="card-body">
                               <?php 
                               $no=1;
                               foreach($personil as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-2"><i class="fa fa-user"></i> <?=$datas->nama?></p></div>
                                        <div class="col-md-2"><i class="fa fa-phone"></i> <?=$datas->telp?></p></div>
                                        <div class="col-md-3"><i class="fa fa-graduation-cap"></i> <span class='badge badge-info'><strong class='text-md'><?=$datas->type_personil?></strong></span></div>
                                        <div class="col-md-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-md-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                            <div class="col-md-4"><p ><i class="fa fa-envelope"></i> <b><?=$datas->email?></b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-globe"></i> <b><?=$datas->website?></b></p></div>
                                            <div class="col-md-4"><p ><i class="fa fa-map-marker"></i> <b><?=$datas->alamat?></b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-globe"></i> <b><?=$datas->negara?></b></p></div>
                                            <div class="col-md-4"><p ><i class="fa fa-clock"></i> Pengalaman Kerja : <b><?=$datas->lama_tahun_pengalaman_kerja?> Tahun</b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-graduation-cap"></i> <?=$datas->pendidikan_akhir?></b></p></div>
                                            <div class="col-md-4"><p > Kabupaten Kota : <b><?=$datas->kabupaten?></b></p> </div>
                                            <div class="col-md-4"><p > No. Identitas : <b><?=$datas->no_identitas?></b></p> </div>
                                            <div class="col-md-4"><p> NPWP : <b><?=$datas->npwp?></b></p></div>
                                            <div class="col-md-4"><p >No. BPJS Kesehatan : <b><?=$datas->no_bpjs_kesehatan?></b></p> </div>
                                            <div class="col-md-4"><p > No. BPJS Ketenagakerjaan : <b><?=$datas->no_bpjs_ketenagakerjaan?></b></p></div>
                                            <div class="col-md-4"><p > Kota Lahir :<b><?=$datas->kabupatenlahir?> </b></p></div>
                                            <div class="col-md-4"><p>Tanggal Lahir :<b><?=$datas->tanggal_lahir?></b></p></div>
                                            <div class="col-md-4"><p><b><?=$datas->jenis_kelamin?></b></p> </div>
                                            <div class="col-md-4"><p > Jenis Tenaga Ahli : <b><?=$datas->jenis_tenaga?></b></p> </div>
                                            <div class="col-md-4"><p> Provinsi : <b><?=$datas->provinsi?></b></p></div>
                                            <div class="col-md-4"><p> Status Kepegawaian : <b><?=$datas->status_kepegawaian ? "Tetap" : "Tidak Tetap"?></b></p></div>
                                            <div class="col-md-4"><p >Profesi Keahlian:<b> <?=$datas->profesi_keahlian?></b></p> </div>
                                            <div class="form-group col-sm-12 text-right">
                                            <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 7 ,<?=$datas->id_personil?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 7 ,<?=$datas->id_personil?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 7 ,<?=$datas->id_personil?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 7 ,<?=$datas->id_personil?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
                                
                            </div>
                        </div>
<!--- Peralatan -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-wrench"></i> Peralatan</h3>
                        </div>
                            <div class="card-body">
                                        <br>
                                <table id="peralatan" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th width="150px"><center>Aksi</center></th>
                                                <th>Berkas</th>
                                                <th>Status</th>
                                                <th>Nama Peralatan</th>
                                                <th>Jenis</th>
                                                <th>Kapasitas</th>
                                                <th>Merk/Type</th>
                                                <th>Tahun Pembuatan</th>
                                                <th>Kondisi</th>
                                                <th>Lokasi Sekarang</th>
                                                <th>Status Kepemilikan</th>
                                                <th>Bukti Kepemilikan</th>
                                                <th>Keterangan</th>
                                               
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
                                              <td> <?php if(isset($data) && $data->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 8 ,<?=$data->id_peralatan?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($data) && $data->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 8 ,<?=$data->id_peralatan?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 8 ,<?=$data->id_peralatan?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 8 ,<?=$data->id_peralatan?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?></td>
                                               <td style="text-align: center;">
                                              <?php if(!empty($data->file)){?>
                                            <button type="button" onclick="popup('<?=base_url(BERKAS_PERALATAN).$data->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                            </b></p></td>
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
                                              <td><?= $data->nama_peralatan?></td>
                                              <td><?= $data->jenis?></td>
                                              <td><?= $data->kapasitas?></td>
                                              <td><?= $data->merk_type?></td>
                                              <td><?= $data->tahun_pembuatan?></td>
                                              <td><?= $data->kondisi?></td>
                                              <td><?= $data->lokasi_sekarang?></td>
                                              <td><?= $data->status_kepemilikan?></td>
                                              <td><?= $data->bukti_kepemilikan?></td>
                                              <td><?= $data->keterangan?></td>
                                             
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
<!--- Pengalaman -->
                  <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-graduation-cap"></i> Pengalaman</h3>
                        </div>
                            <div class="card-body">
                               <br>
                               <div class="row">
                                <?php 
                               $no=1;
                               foreach($pengalaman as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-2"><i class="fa fa-sticky-note"></i> <?=$datas->nama_kontrak?></p></div>
                                        <div class="col-md-2"><i class="fa fa-pager"></i> <?=$datas->nomor_kontrak?></p></div>
                                        <div class="col-md-3"><i class="fa fa-calendar"></i> <?=$datas->durasi_pelaksanaan_mulai.' - '.$datas->durasi_pelaksanaan_mulai?></p></div>
                                       
                                        <div class="col-md-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-md-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                            <div class="col-md-4"><p class="font-weight-light"> Tanggal Serah Terima Pekerjaan : <b><?=$datas->tanggal_serah_terima_pekerjaan?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Nilai Kontrak : <b><?='Rp. '.number_format($datas->nilai_kontrak, 0, ".", ".")?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Kategori Pekerjaan : <b><?=$datas->kategori_pekerjaan?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Persentase Pekerjaan : <b><?=$datas->persentase_pekerjaan?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Uraian Pekerjaan : <b><?=$datas->uraian_pekerjaan?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Ruang Lingkup Pekerjaan : <b><?=$datas->ruang_lingkup_pekerjaan?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Alamat : <b><?=$datas->alamat?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Negara : <b><?=$datas->negara?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Kabupaten : <b><?=$datas->kabupaten?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Provinsi : <b><?=$datas->provinsi?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Nama Instansi : <b><?=$datas->nama_instansi?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Nama Instansi Lainya : <b><?=$datas->nama_instansi_lainnya?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Satuan kerja : <b><?=$datas->satuan_kerja?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Alamat Instansi : <b><?=$datas->alamat_instansi?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Berkas : 
                                            <?php if(isset($datas->file)){ ?>
                                              <button type="button" onclick="popup('<?=base_url(BERKAS_PENGALAMAN).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else{?>
                                              <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?>
                                            </p></div>
                                    <div class="table-responsive">
                                    <table class=" table table-striped">
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
                                </div>
                                <div class="form-group col-sm-12 text-right">
                                <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 9 ,<?=$datas->id_pengalaman?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 9 ,<?=$datas->id_pengalaman?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 9 ,<?=$datas->id_pengalaman?>)" class="btn btn-lg btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 9 ,<?=$datas->id_pengalaman?>)" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
                                </div>
                            </div>
                        </div>
<!--- Pajak -->
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Pajak</h3>
                        </div>
                            <div class="card-body">
                                        <br>
                                        <table id="pajak" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Berkas File</th>
                                                <th>Jenis Laporan Pajak</th>
                                                <th>Nomor Bukti Penerimaan Surat</th>
                                                <th>Masa Pajak</th>
                                                <th>Tanggal Bukti Penerimaan Surat</th>
                                                <th>Terakhir di Rubah</th>
                                                <th>Status</th>
                                                <th width="200px"><center>Aksi</center></th>
                                               
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
                                              <td style="text-align: center;">
                                              <?php if(!empty($datas->file)){?>
                                            <button onclick="popup('<?=base_url(BERKAS_PAJAK).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                              <td><?= $datas->deskripsi?></td>
                                              <td><?= $datas->nomor_bukti_penerimaan_surat?></td>
                                              <td><?= $datas->masa_pajak?></td>
                                              <td><?= $datas->tanggal_bukti_penerimaan_surat?></td>
                                              <td><?= $datas->tanggal_perubahan?></td>
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
                                              <td style="text-align: center;">
                                              <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 10 ,<?=$datas->id_pajak?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 10 ,<?=$datas->id_pajak?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 10 ,<?=$datas->id_pajak?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 10 ,<?=$datas->id_pajak?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                              </td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
<!--- Keuangan -->
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Keuangan</h3>
                        </div>
                            <div class="card-body">
                                        <br>
                                        <table id="keuangan" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th width="150px"><center>Aksi</center></th>
                                               
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
                                              <td> <a href="<?=base_url(BERKAS_KEUANGAN).$datas->file?>" class="btn btn-danger">Lihat Berkas <i class="fa fa-book"></i></a></td>
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
                                                <td style="text-align: center;">
                                              <?php if(isset($datas) && $datas->status_verif == 1) 
                                         { ?>  <button onclick="tolak(<?=$iduser?> , 11 ,<?=$datas->id_keuangan?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button> <?php }
                                         else{
                                            if(isset($datas) && $datas->status_verif == 2) 
                                            { ?>  <button onclick="verifikasi(<?=$iduser?> , 11 ,<?=$datas->id_keuangan?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button> <?php }
                                            else{ ?> <button onclick="tolak(<?=$iduser?> , 11 ,<?=$datas->id_keuangan?>)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak </button>
                                                      <button onclick="verifikasi(<?=$iduser?> , 11 ,<?=$datas->id_keuangan?>)" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verifikasi </button>
                                             <?php }
                                        }?>
                                              </td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
function verifikasi(iduser,jenis,id){
    Swal.fire({
                icon: 'question',
                title: 'Verifikasi',
                text: 'Apakah anda yakin telah membaca data ini dan akan merubah status data tersebut menjadi TERVERIFIKASI ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Verifikasi',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
              url: "<?= base_url('admin/datapenyedia/verifikasi/')?>"+iduser+'/'+jenis+'/'+id,
              type: "POST",
              success:function(response){
                hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Kesalahan tidak di ketahui',
                        'error'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil, Refresh Untuk melihat perubahan",
                        icon: "success",
                        button: "Ok",
                          })
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            })
                }
            });
            
};
function tolak(iduser,jenis,id){
    Swal.fire({
                icon: 'question',
                title: 'Tolak',
                text: 'Apakah anda yakin telah membaca data ini dan akan merubah status data tersebut menjadi Di Tolak ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Tolak',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                  Swal.fire({
                  title: 'Alasan Penolakan',
                  input: 'textarea',
                  inputPlaceholder: 'Ketik di sini...',
                  showCancelButton: true
                })
                if (!text) {
                  Swal.fire('Gagal, Penolakan tanpa alasan tidak bisa di lakukan !')
                  return 
                }
                    $.ajax({
              url: "<?= base_url('admin/datapenyedia/tolak/')?>"+iduser+'/'+jenis+'/'+id+'/'+text,
              type: "POST",
              success:function(response){
                hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Kesalahan tidak di ketahui',
                        'error'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil, Refresh Untuk melihat perubahan",
                        icon: "success",
                        button: "Ok",
                          })
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            })
                }
            });
            
};
    	$(document).ready(function() {
            $('#table').DataTable();
            $('#pajak').DataTable();
            $('#keuangan').DataTable();
            $('#peralatan').DataTable({
    "scrollX": true
            });
	});
  
</script>
