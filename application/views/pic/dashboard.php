<?php 
$model =& get_instance();
$model->load->model('Global_model');
?>
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
        <div class="row">
          <h3>Grafik Harian Pendaftaran Pasien Baru</h3>
          <br>
          <div class="col-md-12">
            <div class="info-box">
              <canvas id="chart_pasien" height="75"></canvas>
            </div>
          </div>
           <h3>Grafik Harian Pendaftaran Seluruh Poli</h3>
          <br>
          <div class="col-md-12">
            <div class="info-box">
              <canvas id="chart_pasien_poli" height="75"></canvas>
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
<script src="<?= base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>
</body>
</html>

<?php
$poli_id=$this->session->userdata('poli_id');
$total_pasien=array();
$total_hari=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
for ($x = 1; $x <= $total_hari; $x++) {
 array_push($total_pasien, $model->Global_model->total_register_hari($x));
};
?>
<script>
    const jumlah_hari='<?php echo cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));?>'
    const bulan='<?php echo date('M')." ".date('Y');?>'
    const hari=[];
    const total=[];

   for (var i = 1; i < jumlah_hari; i++) {
    hari.push(i);
    }
    console.log(JSON.stringify(hari));
		var ctx = document.getElementById("chart_pasien").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: hari,
				datasets: [{
					label: bulan,
					data: [<?php foreach($total_pasien as $val){
            echo $val.', ';
          }?>],
          borderColor: "#80b6f4",
            pointBorderColor: "#80b6f4",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#80b6f4",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
  </script>
  <?php
$poli_id=$this->session->userdata('poli_id');
$total_pasien_poli=array();
$total_hari=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
for ($x = 1; $x <= $total_hari; $x++) {
 array_push($total_pasien_poli, $model->Global_model->total_pasien_hari_semua($x));
};
?>
<script>
		var ctx = document.getElementById("chart_pasien_poli").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: hari,
				datasets: [{
					label: bulan,
					data: [<?php foreach($total_pasien_poli as $vals){
            echo $vals.', ';
          }?>],
          borderColor: "#80b6f4",
            pointBorderColor: "#80b6f4",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#80b6f4",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
  </script>