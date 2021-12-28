<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/summernote/summernote-bs4.css">
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row justify-content-center">
          
                    <div class="col-sm-12">
                   
                <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="icon fas fa-info"></i> Penjelasan</h3>
                        </div>
                            <div class="card-body">
                            <div class="alert alert-info alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                                  Halaman Ini adalah halaman pengaturan TOS (Term Of Use) yang akan muncul hanya sekali ketika penyedia 
                                  belum menyetujui TOS yang di terbitkan.
                                </div>
                                <div class="row">
                                <div class="col-md-12"><div class="text-center"><img style="width: 80%;" src="<?=base_url('assets/dist/img/tos.png')?>" alt="Contoh"></div></div>
                             
                                
                               </div>
                               <br>
                            </div>
                        </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-database"></i> TOS (Term Of Use)</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" id="judul" value="<?=@$data->judul?>">
                                </div>
                                <div class="form-group">
                                <label>Checklist</label>
                                <input type="text" class="form-control" id="checklist" value="<?=@$data->checklist?>">
                                </div>
                                <div class="form-group">
                                <label>Isi</label>
                                <textarea id="informasi" class="textarea"><?= @$data->isi?></textarea>
                                </div>
                                
                                </div>
                                <div class="col-md-12">   <div class="text-center"><button type="submit" onclick="perbaharui()" class="btn btn-lg btn-warning">Perbaharui</button></div></div>
                             
                                
                               </div>
                               <br>
                            </div>
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
<script src="<?=base_url('assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
</body>
</html>
<script>
  $(function () {
    $('.textarea').summernote()
  })
  function perbaharui(){
          var judul=$("#judul").val();
          var checklist=$('#checklist').val();
          var isi=$('#informasi').val();
          
            show();
              $.ajax({
              url: "<?= base_url('admin/master/edittos/')?>",
              type: "POST",
              data: {
                  "judul": judul,
                  "checklist":checklist,
                  "isi":isi
              },
              beforeSend: function() {
              Pace.restart();
              },
              success:function(response){
              hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Format tidak di dukung atau ukuran Gambar/video Terlalu Besar !',
                        'warning'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            });
  }
</script>

