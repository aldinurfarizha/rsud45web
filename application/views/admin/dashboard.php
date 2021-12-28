<?php 
$model =& get_instance();
$model->load->model('M_master');
?>
<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <br>
       <h3>Selamat Datang <strong><?=$this->session->userdata('nama');?></strong></h3>
       <br>
        <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$total['total_akun_penyedia']?> <i class="fa fa-users"></i></h3>
                <p>Akun Penyedia Terdaftar dan Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$total['total_akun_admin']?> <i class="fa fa-user"></i></h3>
                <p>Akun Admin SIKaP</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-md-12">
             <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Daftar Pengurus Yang Berakhir Masa Jabatanya </h3>
              </div>
              <div class="card-body">
              <table  id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Nama Pengurus</th>
                                                <th>Masa Jabatan</th>
                                                <th>No. HP Perusahaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          $no=0;
                                          foreach($pengurus as $datas){
                                              $no++;
                                              ?>
                                              <td><?= $no?></td>
                                              <td><a href="<?=base_url('admin/datapenyedia/detail/').$datas->iduser?>"><?= $datas->nama_perusahaan?></a></td>
                                              <td><?= $datas->nama?></td>
                                              <td><?= $datas->menjabat_sejak.' - <strong style="color: red;">'.$datas->menjabat_sampai.'</strong>'?></td>
                                              <td><?= $datas->telp_seluler?></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
              </div>
            </div>
            </div>
        <div class="col-md-6">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bentuk Usaha Terdaftar </h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;" ></canvas>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Status Data</h3>

              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;"></canvas>
              </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Izin Usaha Terdaftar</h3>

              </div>
              <div class="card-body">
                <canvas id="horizontalchart" ></canvas>
              </div>
            </div>
            </div>
        </div>
    </section>
    <?php 
    $baru=array();
    $index=0;
    foreach($bentukusaha as $asd){
      $baru[$index]['bentuk_usaha']=$asd->bentuk_usaha;
      $baru[$index]['total']=$model->M_master->hitung_bentukusaha($asd->id_bentuk_usaha);
      $index++;
    }
    $izin_usaha=array();
    $index=0;
    foreach($izinusaha as $asd){
      $izin_usaha[$index]['jenis_izin_usaha']=$asd->jenis_izin_usaha;
      $izin_usaha[$index]['total']=$model->M_master->hitung_izinusaha($asd->id_jenis_izin_usaha);
      $index++;
    }
    ?>
  </div>
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php $this->load->view('partials/script.php') ?>
<script src="<?= base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>
<script>
 var data = <?php echo json_encode($baru)?>;
 var bentuk_usaha=[];
 var val_bentuk_usaha=[];
   for (var x in data) {
      bentuk_usaha.push(data[x].bentuk_usaha);
      val_bentuk_usaha.push(data[x].total);
   }

 var izin = <?php echo json_encode($izin_usaha)?>;
 var jenis_izin_usaha=[];
 var val_jenis_izin_usaha=[];
   for (var x in izin) {
      jenis_izin_usaha.push(izin[x].jenis_izin_usaha);
      val_jenis_izin_usaha.push(izin[x].total);
   }
 var data = {
      labels  : bentuk_usaha,
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(0, 140, 255, 1)',
          borderColor         : 'rgba(0, 140, 255, 1)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : val_bentuk_usaha
        },
      ]
    }
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, data)
    var temp1 = data.datasets[0]
    barChartData.datasets[0] = temp1
    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: {
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
            }]
        }
    }
    });
    var chartOptions = {
  scales: {
    yAxes: [{
    }]
  },
};
    

var densityCanvas = document.getElementById("horizontalchart");
var densityData = {
  label: 'Total',
  data: val_jenis_izin_usaha,
  backgroundColor: [
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
  ],
  borderColor: [
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
    'rgba(16, 185, 46, 1)',
  ],
  borderWidth: 2,
};

var chartOptions = {
  scales: {
    yAxes: [{
    }]
  },
};

var barChart = new Chart(densityCanvas, {
  type: 'horizontalBar',
  data: {
    labels: jenis_izin_usaha,
    datasets: [densityData],
  },
  options: chartOptions
});


    //piechart
    var piedata = {
      labels: [
          'Menunggu Verifikasi',
          'Terverifikasi',
          'Di Tolak',
      ],
      datasets: [
        {
          data: [<?=$total['total_menunggu_verifikasi']?> ,<?=$total['total_terverifikasi']?> , <?=$total['total_ditolak']?>],
          backgroundColor : ['#f39c12', '#00a65a', '#f56954'],
        }
      ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = piedata;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    });
</script>
</body>
</html>
