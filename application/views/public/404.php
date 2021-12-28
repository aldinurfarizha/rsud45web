<html lang="en" class="html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
    <link rel="icon" href="<?=base_url('assets/dist/img/favicon.ico')?>" type="image/gif" sizes="16x16">
    <title>SIKAP | Halaman Tidak Di Temukan </title>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Mohon Maaf Sepertinya Anda Salah Alamat
                </div>
                <img style="width: 300px;" class="text-center" src="<?=base_url('assets/dist/img/404.svg')?>" alt="">
                <br>
                <br>
                <a href="<?=base_url()?>" class="btn btn-primary">Bawa Saya Ke Halaman Utama</a>
                <br>
                <br>
                <Button onclick="back()" class="btn btn-outline-info">Bawa Saya Ke Halaman Sebelumnya</b>
        </div>
    </div>
</div>
</body>
</html>
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<script>
    function back(){
       window.history.go(-1); return false;
    }
</script>