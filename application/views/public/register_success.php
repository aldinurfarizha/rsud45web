<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOG IN || SIKAP PAM KUNINGAN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/preloader.css">
  <link rel="icon" href="<?=base_url('assets/dist/img/favicon.ico')?>" type="image/gif" sizes="16x16">
</head>
<div class="preloader">
			<div class="loading">
				<img src="<?=base_url('assets/dist/img/loader.gif')?>" width="400">
			</div>
		</div>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SIKaP</b> <br> Sistem Informasi Kinerja Penyedia</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <form id="form">
        <div class="row justify-content-center">
        <div class="form-group col-sm-12">
              <label for="">Registrasi Telah Kami terima !</label>
              <img src="<?= base_url('assets/dist/img/')?>checked.png" width="25x" height="25px" alt="Success">
              <p class="text-center">Silahkan tunggu admin untuk memverifikasi akun, selanjutnya kami akan mengirim notifikasi melalui E-mail Terdaftar</p>
              <a href="<?= base_url('auth')?>" class="btn btn-info btn-md col-md-12">Home</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
      $(document).ready(function() {
        $(".preloader").fadeOut();
        function show(){
            $(".preloader").show();
        };
        function hide(){
            $(".preloader").fadeOut();
        }
        $("#login").click( function() {
          var nama = $("#nama").val();
          var email = $("#email").val();
          var password = $("#password").val();
          var password2 = $("#password2").val();
          if(nama.length == "") {
            Swal.fire(
              'Nama',
              'Nama Wajib di isi',
              'warning'
            )
              return
          }
          if(email.length == "") {
            Swal.fire(
              'Email',
              'Email Wajib di isi',
              'warning'
            )
              return
          }
         if(password.length == "") {

            Swal.fire(
              'Password',
              'Password Wajib di isi',
              'warning'
            )
            return
          }
          if(password2.length == "") {

            Swal.fire(
              'Ulangi Password',
              'Ulangi Password Wajib di isi',
              'warning'
            )
            return
            }
            if(password !== password2) {

              Swal.fire(
                'Password Tidak Sama ',
                'Password dan ulangi password harus sama',
                'warning'
              )
              return
              }
      
           show();
$.ajax({
              url: "<?= base_url('auth/prosess_register')?>",
              type: "POST",
              data: {
                  "email": email,
                  "password": password
              },
              success:function(response){
hide();
                switch(response){
                  case '0':
                    Swal.fire({
                        title: "Gagal, Email Telah Terdaftar",
                        icon: "warning",
                        button: "Lupa Password",
                          }).then(function() {
                              window.location = "<?= base_url('auth/register/')?>";
                            });
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                          }).then(function() {
                              window.location = "<?= base_url('auth/register_success/')?>";
                            });
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
        }); 
      });
    </script>
</body>
</html>
