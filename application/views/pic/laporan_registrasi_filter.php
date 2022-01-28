<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<?php $this->load->view('partials/head.php') ?>
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row justify-content-center">
                <div class="col-sm-9">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fa fa-search"></i> Filter Laporan Poli</h3>
                            <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
                        </div>
                           <form method="post" target="_blank" action="<?=base_url('pic/laporan_registrasi_pdf')?>">
 <div class="card-body">
                               <div class="row">
                                <div class="form-group col-sm-3">
                                    <label class="text-sm">Cara Mendaftar</label>
                                        <select class="form-control form-control-sm" name="cara_daftar" id="cara_daftar">
                                        <option selected value="">--Semua--</option>
                                        <option value="0">Offline</option>
                                        <option value="1">Online</option>
                                        </select>
                                    </div>
                                     <div class="form-group col-sm-3">
                                    <label class="text-sm">Status Pasien</label>
                                        <select class="form-control form-control-sm" name="status_pasien" id="status_pasien">
                                        <option selected value="">--Semua--</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Belum Terverifikasi</option>
                                        <option value="2">Di Tolak</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                    <label class="text-sm">Bulan</label>
                                      <select name="bulan" id="bulan" class="form-control form-control-sm" >
                                        <option selected value="">--Semua--</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                      </select>
                                    </div>
                                     <div class="form-group col-sm-3">
                                    <label class="text-sm">Tahun</label>
                                        <select class="form-control form-control-sm" name="tahun" id="tahun">
                                        <option selected value="">--Semua--</option>
                                        <?php for($i = 2021; $i <= date('Y')+1; $i++){?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                               </div>
                                    <div class="row justify-content-center">
                                    <Button class="btn btn-danger btn-sm" value="submit" type="submit">Generate PDF</Button>
                                </div>
                            </div>
                            </form>
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
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
</body>
</html>
