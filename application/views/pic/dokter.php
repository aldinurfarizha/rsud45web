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
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Master Dokter</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Dokter
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-sm table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px;">No.</th>
                                                <th>Nama Dokter</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Poli</th>
                                                <th>Status</th>
                                                <th width="100px"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $datas->nama_dokter?></td>
                                              <td><?= $datas->username?></td>
                                              <td><?= $datas->password?></td>
                                              <td class="text-center"><?= $datas->nama_poli?></td>
                                              <td class="text-center"><?php if($datas->status_dokter){?>
                                                <span class="badge bg-primary">Aktif</span><?php }else{?>
                                                    <span class="badge bg-danger">Tidak Aktif</span><?php } ?>
                                                </td>
                                              <td style="text-align: center;">
                                              <button onclick="hapus(<?= $datas->dokter_id?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <button onclick="edit('<?= $datas->dokter_id?>' , '<?= $datas->nama_dokter?>', '<?= $datas->poli_id?>', '<?= $datas->status?>', '<?= $datas->nama_poli?>', '<?= $datas->username?>', '<?= $datas->password?>')" data-toggle="modal" class="btn btn-sm btn-warning" data-target="#edit"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah Dokter</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="inputform">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Dokter</label>
                                        <input type="text" name="nama_dokter" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Poli Penempatan</label>
                                        <select class="form-control" name="poli_id" id="poli_id">
                                                <option value='' selected='selected'>--Pilih Poli--</option>
                                                <?php foreach($poli as $polis){?>
                                                    <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label for="">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="" selected>--Pilih Status--</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="add" onclick="input()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editform">
                <div class="modal-header bg-success">
                <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
            
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                        <label for="">Nama Dokter</label>
                                            <input type="hidden" id="id" name="id" class="form-control" required>
                                            <input type="text" id="nama_dokters" name="nama_dokters" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                    <label for="">Username</label>
                                        <input type="text" name="usernames" id="usernames" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Password</label>
                                        <input type="text" name="passwords" id="passwords" class="form-control">
                                    </div>
                                        <div class="form-group col-sm-12">
                                        <label for="">Poli Dokter</label>
                                        <select class="form-control" name="poli_ids" id="poli_ids">
                                                <?php foreach($poli as $polis){?>
                                                    <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                        <label for="">Status</label>
                                            <select name="statuss" id="statuss" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" onclick="doedit()" class="btn btn-primary">Edit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script>
$('#table').DataTable({
            });
        function input(){
        $("#inputform").valid();
        };
        $('#inputform').validate({
            rules: {
                nama_dokter: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                poli_id: {
                    required: true,
                },

                status: {
                    required: true,
                },
            },
            messages: {
                nama_dokter: {
                    required: "Wajib di Pilih",
                },
                username: {
                    required: "Wajib di isi",
                },
                password: {
                    required: "Wajib di isi",
                },
                poli_id: {
                    required: "Wajib di isi",
                },
                
                status: {
                    required: "Wajib di pilih",
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
              url: "<?= base_url('pic/inputdokter')?>",
              type:"post",
              data:$('#inputform').serialize(), 
              beforeSend: function () {
                  $("#add").attr("disabled", true);
                  Swal.fire({
                  title: 'Sedang Proses',
                  html: loadingeffect,
                  showConfirmButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  });
              },
               success: function(data){
                $("#add").attr("disabled", false);
                $('#inputform').trigger("reset");
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
                            });
            }, error:function(data){
                $("#add").attr("disabled", false);
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
          });
               
                }
            
        });
        function edit(id,nama_dokter, poli_id, status, polistring,username,password){
        var strstatus;
        if(status){strstatus='Aktif'}else{strstatus='Tidak Aktif'};
        $('#id').val(id);
        $('#nama_dokters').val(nama_dokter);
        $('#usernames').val(username);
        $('#passwords').val(password);
        $('#poli_ids').append('<option selected value="'+poli_id+'">'+polistring+'</option>');
        $('#statuss').empty();
        $('#statuss').append('<option selected value="'+status+'">'+strstatus+'</option>');
        $('#statuss').append('<option value="1">Aktif</option>');
        $('#statuss').append('<option value="0">Tidak Aktif</option>');
    }
    function doedit(){
        $("#editform").valid();
        };
        $('#editform').validate({
            rules: {
                nama_dokters: {
                    required: true,
                },
                poli_ids: {
                    required: true,
                },
                usernames: {
                    required: true,
                },
                passwords: {
                    required: true,
                },
                statuss: {
                    required: true,
                },
            },
            messages: {
                nama_dokters: {
                    required: "Wajib di Pilih",
                },
                poli_ids: {
                    required: "Wajib di isi",
                },
                usernames: {
                    required: "Wajib di isi",
                },
                passwords: {
                    required: "Wajib di isi",
                },
                statuss: {
                    required: "Wajib di pilih",
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
              url: "<?= base_url('pic/editdokter')?>",
              type:"post",
              data:$('#editform').serialize(), 
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
                $('#editform').trigger("reset");
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di edit",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
                            });
            }, error:function(data){
                $("#add").attr("disabled", false);
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
          });
               
                }
            
        });
        function hapus(id){
            Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
                    url: "<?= base_url('pic/deletedokter')?>",
                    type:"post",
                    data: {
                        "id": id,
                    },
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
                                text: "Data Telah di hapus",
                                icon: "success",
                                button: "Lanjut",
                                }).then(function() {
                                    location.reload();
                                    });
                    }, error:function(data){
                        Swal.fire({
                            type: 'warning',
                            title: 'Opps!',
                            text: 'Server Dalam Perbaikan'
                        });
                    }
                });
                }
            });
            
};
</script>
</body>
</html>
