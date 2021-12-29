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
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="<?= base_url('assets/')?>plugins/sparklines/sparkline.js"></script>
<script src="<?= base_url('assets/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url('assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/')?>dist/js/pages/dashboard.js"></script>
<script src="<?= base_url('assets/')?>dist/js/demo.js"></script>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
