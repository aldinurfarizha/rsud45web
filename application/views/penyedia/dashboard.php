<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$total['total_menunggu_verifikasi']?> <i class="fa fa-clock"></i></h3>
                <p>Total Data Menunggu Verifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
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
          <div class="col-lg-3 col-6">
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
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <i class="fa fa-clock"></i> <?php 
date_default_timezone_set('Asia/Jakarta');
echo "".date('H:i:s a');?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
                        <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-info"></i> Informasi Penting</h3>
                        </div>
                            <div class="card-body">
                            <?=isset($informasi) ? $informasi->informasi : null?>
                            </div>
                        </div>
                    </div>
        <div class="col-sm-12">
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-bell"></i> 10 Notifikasi Terbaru</h3>
                        </div>
                            <div class="card-body">
                                <table  id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Informasi</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr <?= $datas->is_read == 0 ? "style='background-color:#a8d6ea;'" : null ?> >
                                              <td><?= $no?></td>
                                              <td><?= $datas->informasi?></td>
                                              <td><?= $datas->tanggal?></td>
                                              <td><?= $datas->waktu?></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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
