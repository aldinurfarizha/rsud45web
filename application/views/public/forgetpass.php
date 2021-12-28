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
 <b>SIKaP</b> <br>Halaman Lupa Password</b>
   <br>
    
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <form id="form">
        <div class="row justify-content-center">
            <div class="form-group col-sm-12">
                <label for="">E-Mail</label>
                    <input type="email" id="email" class="form-control">
            </div>
            <div class="form-group col-sm-12">
            <input type="button" class="btn btn-primary btn-md col-md-12" name="login" id="login" value="Reset">
            </div>
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
        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                login();
            }
        });
        $("#login").click( function() {
         login();
      }); 
        function login(){
          var email = $("#email").val();
          var password = $("#password").val();
          if(email.length == "") {
            Swal.fire(
              'Email',
              'Email Wajib di isi',
              'warning'
            )

          } else if(password.length == "") {

            Swal.fire(
              'Password',
              'Password Wajib di isi',
              'warning'
            )

          } else {
           show();
$.ajax({
              url: "<?= base_url('auth/prosess_login')?>",
              type: "POST",
              data: {
                  "email": email,
                  "password": password
              },
              success:function(response){
hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Email Atau Password Salah',
                        'error'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                          }).then(function() {
                              window.location = "<?= base_url('admin/dashboard/')?>";
                            });
                      break;
                      case '2':
                        Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjutkan",
                          }).then(function() {
                              window.location = "<?= base_url('penyedia/dashboard/')?>";
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
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            })
          }
        }
     
      });
    </script>
</body>
</html>
