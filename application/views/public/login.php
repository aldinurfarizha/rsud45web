<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOG IN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/preloader.css">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/')?>pace-progress/themes/orange/pace-theme-flat-top.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
 <b><?=APP_NAME?></b>
<h4><?=SUB_APP_NAME?> <br> <b><?=APP_NAME?></b></h3>

   <br>
       <img src="<?=base_url('assets/')?>dist/img/logo.png" alt="Logo PDAM" class="brand-image"
           style="width:200px">
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <form id="submit">
        <div class="row justify-content-center">
            <div class="form-group col-sm-12">
                <label for="">E-Mail</label>
                    <input type="username" id="username" class="form-control">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Password</label>
                    <input type="password" id="password" class="form-control">
            </div>
            <div class="row col-md-12 justify-content-end">
            <br>
            </div>
            <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary btn-md col-md-12" id="login">Login</button>
            </div>
            <a href="<?= base_url('auth/register')?>" class="btn btn-success btn-md col-md-3">Daftar</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?=base_url('assets/plugins/')?>pace-progress/pace.min.js"></script>
<script>
  var loadingeffect='<div style="text-align:center"><i class="fas fa-2x fa-sync-alt fa-3x fa-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>';
        $('#submit').submit(function(e){
          e.preventDefault(); 
          var username = $("#username").val();
          var password = $("#password").val();
          if(username.length == "") {
            Swal.fire(
              'username',
              'username Wajib di isi',
              'warning'
            );
          } else if(password.length == "") {
            Swal.fire(
              'Password',
              'Password Wajib di isi',
              'warning'
            )
          } else {
            $.ajax({
              url: "<?= base_url('auth/prosess_login')?>",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },
              beforeSend(){
              Pace.restart();
              $("#login").attr("disabled", true);
                  Swal.fire({
                  title: 'Sedang Proses',
                  html: loadingeffect,
                  showConfirmButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  });
              },
              success:function(response){
                $("#login").attr("disabled", false);
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'username Atau Password Salah',
                        'error'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                        timer:"1000",
                          }).then(function() {
                              window.location = "<?= base_url('admin/dashboard/')?>";
                            });
                      break;
                      case '2':
                        Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                        timer:"1000",
                          }).then(function() {
                              window.location = "<?= base_url('penyedia/dashboard/')?>";
                            });
                      break;
                      case '4':
                        Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                        timer:"1000",
                          }).then(function() {
                              window.location = "<?= base_url('pic/dashboard')?>";
                            });
                      break;
                      case '99':
                        Swal.fire(
                        'Maaf',
                        'Akun Anda Belum di Verifikasi, Silahkan Hubungi Admin',
                        'warning'
                      )
                }
              },
              error:function(response){
                $("#login").attr("disabled", false);
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            })
          }
        });
    </script>
</body>
</html>
