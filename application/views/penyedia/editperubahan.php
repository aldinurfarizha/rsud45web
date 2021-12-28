<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row">
        
                <div class="col-sm-12">
                <div class="text-left">
                    <a href="<?=base_url('penyedia/akta')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <br>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                        <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit Akta Perubahan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                <form id="data">
                                <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="">Nama Notaris <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nama_notaris" value="<?=isset($row) ? $row->nama_notaris : null?>" class="form-control">
                                        <input type="hidden" name="id_akta_perubahan" value="<?=isset($row) ? $row->id_akta_perubahan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Nomor <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nomor" value="<?=isset($row) ? $row->nomor : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Tanggal <font color='#ff0000'> *</font></label>
                                        <input type="date" name="tanggal" value="<?=isset($row) ? $row->tanggal : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung <font color='#ff0000'>*</font></label>
                                        <input type="text" name="file" value="<?=isset($row) ? $row->file : null?>" class="form-control" accept="application/pdf" readonly>
                                        <div class="row">
                                        <div class="col-sm-10"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti File/Tambahkan</button></div>
                                        <?php if(isset($row->file)){?>
                                            <div class="col-sm-2"> <a href="<?=base_url(BERKAS_AKTA_PERUBAHAN).$row->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        <?php }else{ ?>
                                            <div class="col-sm-2"> <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas, Silahkan Tambahkan Berkas</small></div>
                                            
                                        <?php } ?>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                             
            </div>
            <div class="text-center">
                    <button type="submit" onclick="editperubahan()" class="btn btn-lg btn-warning"><i class="fas fa-edit"></i> Simpan Perubahan</button>
                </div>
            </form>
                                </div>
                                     
                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti File/Tambah</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($row) ? $row->id_akta_perubahan : null?>"  name="id_akta_perubahan"class="form-control">
                                    <label for="">Berkas (PDF)</label>
                                        <input type="hidden" name="filebefore" class="form-control" value="<?=$row->file ?>">
                                        <input type="file" name="file" class="form-control" accept="application/pdf" required>
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="btn_upload" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php $this->load->view('partials/script.php') ?>
<script>
        function editperubahan(){
            $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama_notaris: {
                    required: true,
                },
                nomor: {
                    required: true,
                },

                tanggal: {
                    required: true,
                },
            },
            messages: {
                nama_notaris: {
                    required: "Wajib di isi",
                },
                nomor: {
                    required: "Wajib di isi",
                },
                
                tanggal: {
                    required: "Wajib di isi",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function() {
               show();
$.ajax({
              url: "<?= base_url('penyedia/akta/edit/')?>",
              type: "POST",
              data:$('#data').serialize(), 
              success:function(response){
hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Server Dalam Perbaikan',
                        'warning'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                            window.location.href = "<?= base_url('penyedia/akta/')?>";
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
            
        });
        $('#submit').submit(function(e){
    show();
     e.preventDefault(); 
     
          $.ajax({
              url:'<?= base_url('penyedia/akta/gantifileaktaperubahan/')?>',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              async:false,
              beforeSend: function () {
                $("#btn_upload").attr("disabled", true);
                  Swal.fire({
                  title: 'Sedang Proses',
                  html: loadingeffect,
                  showConfirmButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  });
              },
               success: function(data){
                   hide();
                Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
            },
            error:function(data){
                $("#btn_upload").attr("disabled", true);
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
          });
     });
</script>
</body>
</html>
