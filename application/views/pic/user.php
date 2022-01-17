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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Master User</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah User
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-sm table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px;">No.</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Poli</th>
                                                <th>Role</th>
                                                <th>NIK</th>
                                                <th>NIP</th>
                                                <th>Tgl Lahir</th>
                                                <th>JK</th>
                                                <th>Alamat</th>
                                                <th>Telp</th>
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
                                              <td><?= $datas->nama?></td>
                                              <td><?= $datas->username?></td>
                                              <td><?= $datas->password?></td>
                                              <td class="text-center"><?= $datas->nama_poli?></td>
                                              <td class="text-center"><?= $datas->nama_role?></td>
                                              <td><?= $datas->nik?></td>
                                              <td><?= $datas->nip?></td>
                                              <td><?= $datas->tgl_lahir?></td>
                                              <td><?= $datas->jenis_kelamin?></td>
                                              <td><?= $datas->alamat?></td>
                                              <td><?= $datas->no_telp?></td>
                                              <td style="text-align: center;">
                                              <button onclick="hapus(<?= $datas->user_id?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('pic/edituser/').$datas->user_id?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="inputform">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama" onkeypress="return /[a-z]/i.test(event.key)" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Role</label>
                                        <select class="form-control" name="role_id" id="role_id">
                                                <option value='' selected='selected'>--Pilih Role--</option>
                                                <?php foreach($role as $roles){?>
                                                    <option value="<?=$roles->role_id?>"><?=$roles->nama_role?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div id="poliinput" class="form-group col-sm-6">
                                    <label for="">Poli Penempatan</label>
                                        <select class="form-control" name="poli_id" id="poli_id">
                                                <option value='' selected='selected'>--Pilih Poli--</option>
                                                <?php foreach($poli as $polis){?>
                                                    <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NIK</label>
                                        <input type="text" name="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NIP</label>
                                        <input type="text" name="nip" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="">--Pilih jenis Kelamin--</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">No Telepon</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="no_telp" class="form-control">
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
<?php $this->load->view('partials/script.php') ?>
<script>
     $('#poliinput').hide();
     $('#poliinput').attr('disabled','disabled');
    $('#role_id').on('change', function() {
    var role_id=$(this).find(":selected").val();
    if(role_id=="1"){
        $('#poliinput').show();
        $("#poliinput").removeAttr('disabled');
    }else{
        $('#poliinput').hide();
        $('#poliinput').attr('disabled','disabled');
    }
    });
$('#table').DataTable({
            });
        function input(){
        $("#inputform").valid();
        };
        $('#inputform').validate({
            rules: {
                nama: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                },
                poli_id: {
                    required: true,
                },
                role_id: {
                    required: true,
                },
                nik: {
                    minlength: 15,
                    maxlength: 18,
                    required: true,
                },
                nip: {
                    required: true,
                },
                tgl_lahir: {
                    required: true,
                },
                jenis_kelamin: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                no_telp: {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 13,
                },

            },
            messages: {
                nama: {
                    required: "Wajib di isi",
                },
                username: {
                    required: "Wajib di isi",
                },
                password: {
                    required: "Wajib di isi",
                    minlength:"Minimal 5 karakter",
                },
                poli_id: {
                    required: "Wajib di isi",
                },
                role_id: {
                    required: "Wajib di isi",
                },
                nik: {
                    required: "Wajib di isi",
                    minlength:"Minimal 15 Angka",
                    maxlength: "Maximal 18 Angka"
                },
                nip: {
                    required: "Wajib di isi",
                },
                tgl_lahir: {
                    required: "Wajib di isi",
                },
                jenis_kelamin: {
                    required: "Wajib di isi",
                },
                alamat: {
                    required: "Wajib di isi",
                },
                no_telp: {
                    required: "Wajib di isi",
                    number: "Harus Angka",
                    minlength:"Minimal 9 Angka",
                    maxlength: "Maximal 13 Angka"
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
              url: "<?= base_url('pic/inputuser')?>",
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
                    url: "<?= base_url('pic/deleteuser')?>",
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
