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
                                  Data di bawah ini adalah data informasi yang akan di tampilkan di dalam dashboard seluruh penyedia.
                                </div>
                                <div class="row">
                                <div class="col-md-12"><div class="text-center"><h3>Akan tampil di dalam Dashboard Penyedia</h3><img style="width: 500px;" src="<?=base_url('assets/dist/img/contoh.png')?>" alt="Contoh"></div></div>
                             
                                
                               </div>
                               <br>
                            </div>
                        </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-database"></i> Data Informasi</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-12">
                                <input type="hidden" id="id" name="id" value="<?= isset($data) ? $data->id_informasi : null?>" class="form-control" required>
                                <textarea id="informasi" class="textarea"><?= isset($data) ? $data->informasi : null?></textarea>
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
  var id_field='id_informasi';
  var field='informasi';
  var table='informasi';
  $(function () {
    $('.textarea').summernote()
  })
  function perbaharui(){
          var keterangan=$("#informasi").val();
          var id=$('#id').val();
          
            show();
              $.ajax({
              url: "<?= base_url('admin/master/edit/')?>",
              type: "POST",
              data: {
                  "id":id,
                  "id_field":id_field,
                  "field": field,
                  "table": table,
                  "keterangan": keterangan

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

