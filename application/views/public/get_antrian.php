<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOG IN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/preloader.css">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/')?>pace-progress/themes/orange/pace-theme-flat-top.css">
</head>
<body class="hold-transition">
  <div class="login-logo">
   <br>
       <img src="<?=base_url('assets/')?>dist/img/logo.png" alt="Logo" class="brand-image"
           style="width:200px">
  </div>
  <div class="row justify-content-center">
  <div class="card col-md-10">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="form-group col-sm-12">
              <p class="text-center">Klik Tombol di bawah untuk mendapatkan nomor antrian</p>
            <Button onclick="printDiv('printableArea')" id="antri" class="btn btn-warning btn-lg col-md-12">AMBIL NOMOR ANTRIAN</Button>
            </div>
        </div>
      
    </div>
  </div>
  </div>
  <div id="printableArea">
    <center>
      <h3><?=APP_NAME?></h3>
      <h3>Nomor Antrian</h3>
      <h1><strong><?=$no_antrian?></strong></h1>
      <?=date('Y-m-d')?>
      </center>
</div>
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?=base_url('assets/plugins/')?>pace-progress/pace.min.js"></script>
<script>
  var loadingeffect='<div style="text-align:center"><i class="fas fa-2x fa-sync-alt fa-3x fa-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>';
  function printDiv(divName) {
    $("#antri").attr("disabled", true);
     
     $.ajax({
              url: "<?= base_url('loket/proses_antri')?>",
              type: "POST",
              beforeSend(){
                  Swal.fire({
                  title: 'Sedang Mengambil Antrian',
                  html: loadingeffect,
                  showConfirmButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  });
              },
              success:function(response){
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Koneksi Error',
                        'error'
                      )
                    break;
                    case '1':
                      var printContents = document.getElementById(divName).innerHTML;
                      var originalContents = document.body.innerHTML;
                      document.body.innerHTML = printContents;
                      window.print();
                      document.body.innerHTML = originalContents;
                      location.reload();
                      break;
                }
              },
              error:function(response){
                console.log(response);
                // $("#antri").attr("disabled", false);
                //   Swal.fire({
                //     type: 'error',
                //     title: 'Opps!',
                //     text: 'Server Dalam Perbaikan'
                //   });
              }
            })
};      
    </script>
</body>
</html>
