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
                    <a href="<?=base_url('penyedia/pajak')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <br>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                        <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit Pajak</h3><br>
                            <label>PERINGATAN !!!</label>
                                <font color='#ff0000'>Kolom yang bertanda (*) wajib di isi</font>
                        </div> 
                                <div class="card-body">
                                <div class="row">
                                <form id="pajak">
                                <div class="row">
                                <div class="form-group col-sm-6">                                
                                        <label>Jenis Laporan Pajak <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="id_jenis_laporan_pajak">
                                            <option value="<?=isset($row) ? $row->id_static_pajak : null?>" selected><?=isset($row) ? $row->deskripsi : null?></option>
                                            <?php foreach($pajak as $pajaks){
                                                ?>
                                            <option value="<?=$pajaks->id_static_pajak?>"><?=$pajaks->deskripsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Bukti Penerimaan Surat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nomor_bukti_penerimaan_surat" value="<?=isset($row) ? $row->nomor_bukti_penerimaan_surat : null?>" class="form-control">
                                        <input type="hidden" name="id_pajak" value="<?=isset($row) ? $row->id_pajak : null?>" class="form-control">
                                    </div>
                                   
                                    <div class="form-group col-sm-6">
                                    <label for="">Masa Pajak <font color='#ff0000'>*</font></label>
                                        <input type="text" name="masa_pajak" value="TAHUNAN" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Bukti Penerimaan Surat <font color='#ff0000'>*</font></label>
                                        <input type="date" name="tanggal_bukti_penerimaan_surat" value="<?=isset($row) ? $row->tanggal_bukti_penerimaan_surat : null?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung (PDF) <font color='#ff0000'>*</font></label>
                                        <input type="text" name="file" value="<?=isset($row) ? $row->file : null?>" class="form-control" accept="application/pdf" readonly>
                                        <div class="row">
                                        <div class="col-sm-8"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti/Tambahkan Berkas</button></div>
                                        <?php if(!empty($row->file)){?>
                                            <div class="col-sm-4"> <a href="<?=base_url(BERKAS_PAJAK).$row->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        <?php }else{?>
                                            <div class="col-sm-4"><small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas ! <br>,Silahkan Tambahkan</small></div>
                                            
                                        <?php } ?>
                                        </div>
                                        
                                    </div>
                             
            </div>
            <div class="text-center">
                    <button type="submit" onclick="editpajak()" class="btn btn-lg btn-warning"><i class="fas fa-edit"></i> Simpan Perubahan</button>
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
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti/Tambahkan File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($row) ? $row->id_pajak : null?>"  name="id_pajak"class="form-control">
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
$('#submit').submit(function(e){
    show();
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/pajak/gantifile/')?>',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              async:false,
              beforeSend: function () {
                  Swal.fire({
                  title: 'Sedang Proses',
                  html: loadingeffect,
                  showConfirmButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  });
              },
               success: function(data){
                Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
            }
          });
     });
        function editpajak(){
            $("#pajak").valid();
        };
        $('#pajak').validate({
            rules: {
                id_jenis_laporan_pajak: {
                    required: true,
                },
                nomor_bukti_penerimaan_surat: {
                    required: true,
                },

                tanggal_bukti_penerimaan_surat: {
                    required: true,
                },
            },
            messages: {
                id_jenis_laporan_pajak: {
                    required: "Wajib di Pilih",
                },
                nomor_bukti_penerimaan_surat: {
                    required: "Kolom ini wajib di isi",
                },
                
                tanggal_bukti_penerimaan_surat: {
                    required: "tanggal bukti penerimaan surat wajib di isi",
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
              $.ajax({
              url: "<?= base_url('penyedia/pajak/edit/')?>",
              type: "POST",
              data:$('#pajak').serialize(), 
              success:function(response){
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
                            window.location.href = "<?= base_url('penyedia/pajak/')?>";
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
</script>
</body>
</html>
