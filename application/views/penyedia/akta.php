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
          <div class="row justify-content-center">
                <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-sticky-note"></i> Akta Pendirian</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                        </div>
                        <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font>
                        
                            <div class="card-body">
                                <form id="pendirian">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Notaris <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_notaris" value="<?= isset($akta_pendirian) ? $akta_pendirian->nama_notaris : null?>" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nomor" value="<?= isset($akta_pendirian) ? $akta_pendirian->nomor : null?>"  class="form-control" required>
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Akta <font color='#ff0000'>*</font></label>
                                        <input type="date" name="tanggal" value="<?= isset($akta_pendirian) ? $akta_pendirian->tanggal : null?>"  class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas (PDF) <font color='#ff0000'>*</font></label>
                                    <?php if(!isset($akta_pendirian->file)){ ?>
                                        <input type="file" name="file" class="form-control" accept="application/pdf" required> 
                                        <?php }else{ ?>
                                            <input type="text" name="file" value="<?= isset($akta_pendirian) ? $akta_pendirian->file : null?>"  class="form-control" readonly>
                                            <div class="row">
                                            <div class="col-sm-10"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-ganti-file"><i class="fa fa-refresh"></i> Ganti File</button></div>
                                        <div class="col-sm-2"> <a href="<?=base_url(BERKAS_AKTA).$akta_pendirian->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($akta_pendirian) && $akta_pendirian->status_verif == 1) 
                                         { echo "<img src='".base_url('assets/dist/img/dataverified.svg')."'>"; }
                                         else{
                                            if(isset($akta_pendirian) && $akta_pendirian->status_verif == 2) {
                                                echo "<img src='".base_url('assets/dist/img/ditolak.svg')."'>";
                                            }
                                            else{
                                                echo "<img src='".base_url('assets/dist/img/unverified.svg')."'>";
                                            }
                                        }?>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-reply-all"></i> Akta Perubahan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="butto" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i>Tambah Akta Perubahan 
                                    </button>
                                </div>
                                        <br>
                                <table  id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor </th>
                                                <th>Notaris </th>
                                                <th>Tanggal </th>
                                                <th>Status</th>
                                                <th>Berkas</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($akta_perubahan as $data){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $data->nomor?></td>
                                              <td><?= $data->nama_notaris?></td>
                                              <td><?= $data->tanggal?></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                                    { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                    else{
                                                        if(isset($data->status_verif) && $data->status_verif == 2) {
                                                            echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                        }
                                                        else{
                                                            echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                        }
                                                    }?>
                                             <td style="text-align: center;">
                                              <?php if(!empty($data->file)){?>
                                            <button onclick="popup('<?=base_url(BERKAS_AKTA_PERUBAHAN).$data->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                              <td style="text-align: center;">
                                              <button onclick="hapusperubahan(<?= $data->id_akta_perubahan?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('penyedia/akta/vieweditperubahan/').$data->id_akta_perubahan?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                              </td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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
<div class="modal fade" id="modal-ganti-file">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="gantifile">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($akta_pendirian) ? $akta_pendirian->id_akta_pendirian:null ?>"  name="id_akta_pendirian" class="form-control">
                                    <label for="">Berkas (PDF)</label>
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Akta Perubahan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="akta_perubahan">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Notaris *</label>
                                        <input type="text" name="nama_notaris2" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Nomor *</label>
                                        <input type="text" name="nomor2" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Tanggal *</label>
                                        <input type="date" name="tanggal2" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Berkas(Akta Perubahan) *</label>
                                        <input type="file" id="file2" name="file2" accept="application/pdf" class="form-control">
                                    </div>
                                
                                </div>
                                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="simpanPerubahan()" id="simpanaktaperubahan" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script>
$('#gantifile').submit(function(e){
    show();
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/akta/gantifile/')?>',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              async:false,
               success: function(data){
                   hide();
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
$('#table').DataTable({
            });
            function simpanPerubahan(){
            $("#akta_perubahan").valid();
        };
        $('#akta_perubahan').validate({
            rules: {
                nama_notaris2: {
                    required: true,
                },
                nomor2: {
                    required: true,
                },

                tanggal2: {
                    required: true,
                },
                file2: {
                    required: true,
                },
            },
            messages: {
                nama_notaris2: {
                    required: "Wajib di isi",
                },
                nomor2: {
                    required: "Wajib di isi",
                },
                
                tanggal2: {
                    required: "Wajib di isi",
                },
                file2: {
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
              $("#akta_perubahan").load("submit", function (e)
            {
                $("#simpanaktaperubahan").attr("disabled", true);
                $.ajax({
              url: "<?= base_url('penyedia/akta/add')?>",
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
                $("#simpanaktaperubahan").attr("disabled", false);
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
                            });
            }, error:function(data){
                $("#simpanaktaperubahan").attr("disabled", false);
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
          });
                });
                }
            
        });
        $('#pendirian').submit(function(e){
        show();
     e.preventDefault(); 
          $.ajax({
              url: "<?= base_url('penyedia/akta/update_pendirian/')?>",
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
                hide();
                Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            window.location.href = "<?= base_url('penyedia/akta/')?>";
                            });
            }, error:function(data){
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
          });
     });
        function hapusperubahan(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Akta Perubahan ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/akta/hapusperubahan/')?>"+id;
                }
            });
            
};
</script>
</body>
</html>

