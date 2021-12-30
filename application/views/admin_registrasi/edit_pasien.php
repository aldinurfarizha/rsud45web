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
                                    <?php print_r($row)?>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Nama Lengkap</label>
                                        <input type="text" name="nama" value="<?=@$row->nama?>" class="form-control form-control-sm">
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">NIK</label>
                                        <input type="text" value="<?=@$row->nik?>"  name="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                  <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Tempat Lahir</label>
                                        <input type="text" value="<?=@$row->tmplahir?>"  name="tmplahir" class="form-control form-control-sm">
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Tanggal Lahir</label>
                                        <input type="date" name="tgllahir" value="<?=@$row->tgllahir?>"  class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Jenis Kelamin</label>
                                        <select name="kelamin" class="form-control form-control-sm">
                                            <?php $jk;
                                            if($row->kelamin=="L"){
                                                $jk='Laki-Laki';
                                            }else{
                                                $jk='Perempuan';
                                            }?>
                                            <option value="<?=@$row->kelamin?>"> <?=@$jk?> </option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Alamat</label>
                                        <input type="text" value="<?=@$row->alamat?>" name="alamat" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-3">
                                    <label class="text-sm" for="">RT</label>
                                        <input type="text" name="rt" value="<?=@$row->rt?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-3">
                                    <label class="text-sm" for="">RW</label>
                                        <input type="text" name="rw" value="<?=@$row->rw?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Provinsi</label>
                                        <select name="provinces_id" id="provinces_id" class="form-control form-control-sm">
                                            <option value="<?=@$row->provinces_id?>"><?=@$row->provinsi?></option>
                                           <?php foreach ($provinces as $provinsi){?>
                                            <option value="<?=$provinsi->id?>"><?=$provinsi->name?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Kabupaten</label>
                                        <select name="regencies_id" id="regencies_id" disabled class="form-control form-control-sm">
                                        </select>
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Kecamatan</label>
                                        <select name="districts_id" id="districts_id" disabled class="form-control form-control-sm">
                                        </select>
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">No. HP</label>
                                        <input type="text" name="nohp" id="nohp" class="form-control form-control-sm"></input>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Pekerjaan</label>
                                       <select name="pekerjaan_id" id="pekerjaan_id" class="form-control form-control-sm">
                                           <option value="">--Pilih Pekerjaan--</option>
                                           <?php foreach ($pekerjaan as $pekerjaans){?>
                                            <option value="<?=$pekerjaans->id?>"><?=$pekerjaans->nama_pekerjaan?></option>
                                           <?php } ?>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Agama</label>
                                       <select name="agama_id" id="agama_id" class="form-control form-control-sm">
                                           <option value="">--Pilih Agama--</option>
                                           <?php foreach ($agama as $agamas){?>
                                            <option value="<?=$agamas->id?>"><?=$agamas->nama_agama?></option>
                                           <?php } ?>
                                       </select>
                                    </div>
                                      <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Pendidikan</label>
                                       <select name="pendidikan_id" id="pendidikan_id" class="form-control form-control-sm">
                                           <option value="">--Pilih Pendidikan--</option>
                                           <?php foreach ($pendidikan as $pendidikans){?>
                                            <option value="<?=$pendidikans->id?>"><?=$pendidikans->nama_pendidikan?></option>
                                           <?php } ?>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Ibu Kandung</label>
                                        <input type="text" name="ibu_kandung" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Status Martial</label>
                                        <select type="text" name="status_martial" class="form-control form-control-sm">
                                            <option value="">--Status Martial--</option>
                                            <option value="BELUM KAWIN">BELUM KAWIN</option>
                                            <option value="KAWIN">KAWIN</option>
                                            <option value="CERAI HIDUP">CERAI HIDUP</option>
                                            <option value="CERAI MATI">CERAI MATI</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Dokumen KK (Foto/Scan)</label>
                                        <input type="file" name="file" accept="image/*" class="form-control form-control-sm">
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
