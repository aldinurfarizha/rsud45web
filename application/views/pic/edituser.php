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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Edit User</h3>
                        </div>
                            <div class="card-body">
                            <form id="inputform">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama" onkeypress="return /[a-z ]/i.test(event.key)" value="<?=@$row->nama?>"class="form-control">
                                        <input type="hidden" name="user_id" value="<?=@$row->user_id?>"class="form-control">
                                        <input type="hidden" name="roles" id="roles" value="<?=@$row->role_id?>"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Username</label>
                                        <input type="text" value="<?=@$row->username?>" name="username" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Password</label>
                                        <input type="text" value="<?=@$row->password?>" name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Role</label>
                                        <select class="form-control" name="role_id" id="role_id">
                                                <option value="<?=@$row->role_id?>" selected='selected'><?=@$row->nama_role?></option>
                                                <?php foreach($role as $roles){?>
                                                    <option value="<?=$roles->role_id?>"><?=$roles->nama_role?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div id="poliinput" class="form-group col-sm-6">
                                    <label for="">Poli Penempatan</label>
                                        <select class="form-control" name="poli_id" id="poli_id">
                                                <option value="<?=@$row->poli_id?>" selected='selected'><?=@$row->nama_poli?></option>
                                                <?php foreach($poli as $polis){?>
                                                    <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NIK</label>
                                        <input type="text" name="nik" value="<?=@$row->nik?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NIP</label>
                                        <input type="text" value="<?=@$row->nip?>" name="nip" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="<?=@$row->tgl_lahir?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="<?=@$row->jenis_kelamin?>"><?=@$row->jenis_kelamin?></option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat</label>
                                        <input type="text" value="<?=@$row->alamat?>" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">No Telepon</label>
                                        <input type="text" value="<?=@$row->no_telp?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="no_telp" class="form-control">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                <button type="submit" id="add" onclick="input()" class="btn btn-primary">Simpan</button>
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
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php $this->load->view('partials/script.php') ?>
<script>
     $('#poliinput').hide();
     $('#poliinput').attr('disabled','disabled');
    var role=$('#roles').val();
    if(role=="1"){
        $('#poliinput').show();
        $("#poliinput").removeAttr('disabled');
    }
    
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
              url: "<?= base_url('pic/doupdateuser')?>",
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
                            window.location.href = "<?= base_url('pic/user/')?>";
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
