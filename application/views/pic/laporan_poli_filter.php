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
                <div class="col-sm-6">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fa fa-search"></i> Filter Laporan Poli</h3>
                            <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
                        </div>
                           <form method="post" target="_blank" action="<?=base_url('pic/laporan_poli_pdf')?>">
 <div class="card-body">
                               <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="text-sm">Nama Poli</label>
                                       <select class="form-control form-control-sm" name="nama_poli" id="nama_poli">
                                        <option value="">--Semua--</option>
                                        <?php foreach($poli as $polis){ ?>
                                        <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm">Status</label>
                                        <select class="form-control form-control-sm" name="filter_status" id="filter_status">
                                        <option value="">--Semua--</option>
                                        <option value="0">Belum Check IN</option>
                                        <option value="1">Check IN</option>
                                        <option value="2">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm">Bulan</label>
                                      <select name="bulan" id="bulan" class="form-control form-control-sm" >
                                        <option value="">--Semua--</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                      </select>
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm">Tahun</label>
                                        <select class="form-control form-control-sm" name="filter_ditambahkan" id="filter_ditambahkan">
                                        <option value="">--Semua--</option>
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
