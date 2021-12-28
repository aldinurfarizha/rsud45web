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
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Izin Usaha</h3>
                        </div>
                            <div class="card-body">
                          
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('penyedia/izinusaha/tambah')?>"class="btn btn-success"><i class="fa fa-plus"></i> Tambah Izin Usaha</a>
                                        </div>

                               <br>
                               <div class="row">
                                <?php 
                               $no=1;
                               foreach($data as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-sm-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-sm-2"><i class="fa fa-sticky-note"></i> <?=$datas->jenis_izin_usaha?></p></div>
                                        <div class="col-sm-2">
                                        <?php if(!empty($datas->file)){?>
                                            <a href="<?= base_url(BERKAS_IZINUSAHA).$datas->file; ?>" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a>
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
                                           <div class="col-md-6 text-center"><button onclick="hapus(<?=$datas->id_izin_usaha?>)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </button></div>
                                           <div class="col-md-6 text-center"><a href="<?=base_url('penyedia/izinusaha/vieweditizinusaha/').$datas->id_izin_usaha?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></div>
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
            function hapus(id){
                Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus data izin usaha ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/izinusaha/hapusizinusaha/')?>"+id;
                }
            });
            
};
</script>
