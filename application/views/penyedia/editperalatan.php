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
                    <a href="<?=base_url('penyedia/peralatan')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <br>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                        <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-wrench"></i> Edit Peralatan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                <form id="peralatan">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Peralatan <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nama_peralatan" value="<?=isset($peralatan) ? $peralatan->nama_peralatan : null?>" class="form-control">
                                        <input type="hidden" name="id_peralatan" value="<?=isset($peralatan) ? $peralatan->id_peralatan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Jenis <font color='#ff0000'>*</font></label>
                                        <select name="jenis" class="form-control">
                                        <option value="<?=@$peralatan->jenis?>" selected><?=@$peralatan->jenis?></option>
                                        <option value="KENDARAAN">Kendaraan</option>
                                        <option value="ALAT BERAT">Alat Berat</option>
                                        <option value="LAIN-LAIN">Lain - Lain</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Kapasitas </label>
                                        <input type="text" name="kapasitas" value="<?=isset($peralatan) ? $peralatan->kapasitas : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Merk / Type </label>
                                        <input type="text" name="merk_type" value="<?=isset($peralatan) ? $peralatan->merk_type : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tahun Pembuatan <font color='#ff0000'> *</font></label>
                                        <input type="number" name="tahun_pembuatan" value="<?=isset($peralatan) ? $peralatan->tahun_pembuatan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kondisi <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="kondisi">
                                            <option value="<?=isset($peralatan) ? $peralatan->kondisi : null?>" selected><?=isset($peralatan) ? $peralatan->kondisi : null?></option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Lokasi Sekarang </label>
                                        <input type="text" name="lokasi_sekarang" value="<?=isset($peralatan) ? $peralatan->lokasi_sekarang : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Status Kepemilikan <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="status_kepemilikan">
                                            <option value="<?=isset($peralatan) ? $peralatan->status_kepemilikan : null?>" selected><?=isset($peralatan) ? $peralatan->status_kepemilikan : null?></option>
                                            <option value="Sendiri">Sendiri</option>
                                            <option value="Sewa">Sewa</option>
                                            <option value="Dukungan">Dukungan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Bukti Kepemilikan <font color='#ff0000'> *</font></label>
                                        <input type="text" name="bukti_kepemilikan" value="<?=isset($peralatan) ? $peralatan->bukti_kepemilikan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung (PDF) <font color='#ff0000'>*</font></label>
                                        <input type="text" name="file" value="<?=isset($peralatan) ? $peralatan->file : null?>" class="form-control" accept="application/pdf" readonly>
                                        <div class="row">
                                        <div class="col-sm-8"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti/Tambahkan Berkas</button></div>
                                        <?php if(!empty($peralatan->file)){?>
                                            <div class="col-sm-4"> <a href="<?=base_url(BERKAS_PERALATAN).$peralatan->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        <?php }else{?>
                                            <div class="col-sm-4"><small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas ! <br>,Silahkan Tambahkan</small></div>
                                            
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Keterangan </label>
                                    <textarea class="form-control" name="keterangan"  rows="3"><?=isset($peralatan) ? $peralatan->keterangan : null?></textarea>
                                    </div>
                                </div>
            </div>
            <div class="text-center">
                    <button type="submit" onclick="editperalatan()" class="btn btn-lg btn-warning"><i class="fas fa-edit"></i> Simpan Perubahan</button>
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
                                    <input type="hidden" value="<?=isset($peralatan) ? $peralatan->id_peralatan : null?>"  name="id_peralatan"class="form-control">
                                    <label for="">Berkas (PDF)</label>
                                        <input type="hidden" name="filebefore" class="form-control" value="<?=$peralatan->file ?>">
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
              url:'<?= base_url('penyedia/peralatan/gantifile/')?>',
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
        function editperalatan(){
        $("#peralatan").valid();
        };
        $('#peralatan').validate({
            rules: {
                nama_peralatan: {
                    required: true,
                },
                jumlah: {
                    required: true,
                },
             
                kondisi: {
                    required: true,
                },
                status_kepemilikan: {
                    required: true,
                },
              
                tahun_pembuatan: {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                },
            },
            messages: {
                nama_peralatan: {
                    required: "Nama Peralatan Harus di isi",
                },
                jumlah: {
                    required: "Jumlah Harus di isi",
                },
               
                kondisi: {
                    required: true,
                },
                
                status_kepemilikan: {
                    required: true,
                },
              
                tahun_pembuatan: {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                },
                file: {
                    required: true,
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
              url: "<?= base_url('penyedia/peralatan/editperalatan/')?>",
              type: "POST",
              data:$('#peralatan').serialize(), 
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
                            window.location.href = "<?= base_url('penyedia/peralatan/')?>";
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
