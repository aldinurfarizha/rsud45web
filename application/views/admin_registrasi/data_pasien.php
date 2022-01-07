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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Data Pasien</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Pasien
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-responsive table-sm table-striped table-bordered no-wrap table-hover">
                                        <thead>
                                            <tr class="text-center text-sm">
                                                <th style="min-width:1px">No.</th>
                                                <th style="min-width:72px"><center>Aksi</center></th>
                                                <th>No RM</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>TMPT LHR</th>
                                                <th>TGL LHR</th>
                                                <th>JK</th>
                                                <th>Alamat</th>
                                                <th>RT</th>
                                                <th>RW</th>
                                                <th>Provinsi</th>
                                                <th>Kabupaten</th>
                                                <th>Kecamatan</th>
                                                <th>No. HP</th>
                                                <th>Pekerjaan</th>
                                                <th>Agama</th>
                                                <th>Pendidikan</th>
                                                <th>Ibu Kandung</th>
                                                <th>Status Matrial</th>
                                                <th>Dibuat</th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr class="text-sm">
                                              <td><?= $no?></td>
                                              <td class="text-center">
                                              <button onclick="hapus('<?= $datas->id?>','<?= $datas->nama?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('admin_registrasi/editpasien/').$datas->id?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                              </td>
                                              <td><span class="badge text-md badge-primary"><?= @$datas->no_rm?></span></td>
                                              <td><?= @$datas->nama?></td>
                                              <td><?= @$datas->nik?></td>
                                              <td><?= @$datas->tmplahir?></td>
                                              <td><?= @$datas->tgllahir?></td>
                                              <td><?= @$datas->kelamin?></td>
                                              <td><?= @$datas->alamat?></td>
                                              <td><?= @$datas->rt?></td>
                                              <td><?= @$datas->rw?></td>
                                              <td><?= @$datas->provinsi?></td>
                                              <td><?= @$datas->kabupaten?></td>
                                              <td><?= @$datas->kecamatan?></td>
                                              <td><?= @$datas->nohp?></td>
                                              <td><?= @$datas->nama_pekerjaan?></td>
                                              <td><?= @$datas->agama?></td>
                                              <td><?= @$datas->nama_pendidikan?></td>
                                              <td><?= @$datas->ibu_kandung?></td>
                                              <td><?= @$datas->status_martial?></td>
                                              <td><?= @$datas->create_by?></td>
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
                                    <label class="text-sm" for="">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control form-control-sm">
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">NIK</label>
                                        <input type="text" name="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                  <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Tempat Lahir</label>
                                        <input type="text" name="tmplahir" class="form-control form-control-sm">
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Tanggal Lahir</label>
                                        <input type="date" name="tgllahir" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Jenis Kelamin</label>
                                        <select name="kelamin" class="form-control form-control-sm">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-3">
                                    <label class="text-sm" for="">RT</label>
                                        <input type="text" name="rt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-3">
                                    <label class="text-sm" for="">RW</label>
                                        <input type="text" name="rw" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm" for="">Provinsi</label>
                                        <select name="provinces_id" id="provinces_id" class="form-control form-control-sm">
                                            <option value="">--Pilih Provinsi--</option>
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
                                        <label for="">Nama Poli</label>
                                            <input type="hidden" id="id" name="id" class="form-control" required>
                                            <input type="text" id="nama_polis" name="nama_polis" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                        <label for="">Maximal Pelayanan</label>
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="maxs" name="maxs" class="form-control" required>
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
    $("#provinces_id").change(function(){
    $("#regencies_id").attr("disabled", false);
    var prov_id = $(this).val();
    $.ajax({
        url: '<?= base_url('admin_registrasi/getregencies/')?>'+prov_id,
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
                Swal.fire({
                title: 'Mohon Tunggu',
                html: loadingeffect,
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                });
            },
        success:function(response){
            Swal.close();
            var len = response.length;
            $("#regencies_id").empty();
            $("#regencies_id").append("<option value=''>--Pilih Kabupaten--</option>");
            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['name'];
                $("#regencies_id").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });
    
    $("#regencies_id").change(function(){
    $("#districts_id").attr("disabled", false);
    var regencies_id = $(this).val();
    $.ajax({
        url: '<?= base_url('admin_registrasi/getdistricts/')?>'+regencies_id,
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
                Swal.fire({
                title: 'Mohon Tunggu',
                html: loadingeffect,
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                });
            },
        success:function(response){
            Swal.close();
            var len = response.length;
            $("#districts_id").empty();
            $("#districts_id").append("<option value=''>--Pilih Kecamatan--</option>");
            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['name'];
                $("#districts_id").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
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
                nik: {
                    required: true,
                    minlength: 15,
                    maxlength: 18,
                },
                tmplahir: {
                    required: true,
                },
                tgl_lahir: {
                    required: true,
                },
                kelamin: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                rt: {
                    required: true,
                },
                rw: {
                    required: true,
                },
                provinces_id: {
                    required: true,
                },
                regencies_id: {
                    required:true,
                },
                districts_id: {
                    required:true,
                },
                pekerjaan_id: {
                    required: true,
                },
                agama_id:{
                    required: true
                },
                pendidikan_id:{
                    required: true,
                },
                ibu_kandung: {
                    required:true,
                },
                status_martial: {
                    required:true,
                },
            },
            messages: {
                 nama: {
                    required: "Kolom ini Wajib di isi",
                },
                nik: {
                    required: "Kolom ini Wajib di isi",
                    minlength:"Minimal 15 Angka",
                    maxlength: "Maximal 18 Angka"
                },
                tmplahir: {
                    required: "Kolom ini Wajib di isi",
                },
                tgl_lahir: {
                    required: "Kolom ini Wajib di isi",
                },
                kelamin: {
                    required: "Kolom ini Wajib di isi",
                },
                alamat: {
                    required: "Kolom ini Wajib di isi",
                },
                rt: {
                    required: "Kolom ini Wajib di isi",
                },
                rw: {
                    required: "Kolom ini Wajib di isi",
                },
                provinces_id: {
                    required: "Kolom ini Wajib di isi",
                },
                regencies_id: {
                    required: "Kolom ini Wajib di isi",
                },
                districts_id: {
                    required: "Kolom ini Wajib di isi",
                },
                pekerjaan_id: {
                    required: "Kolom ini Wajib di isi",
                },
                agama_id:{
                    required: "Kolom ini Wajib di isi"
                },
                pendidikan_id:{
                    required: "Kolom ini Wajib di isi",
                },
                ibu_kandung: {
                    required: "Kolom ini Wajib di isi",
                },
                status_martial: {
                    required: "Kolom ini Wajib di isi",
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
                $("#inputform").load("submit", function (e)
            {
                $.ajax({
              url: "<?= base_url('admin_registrasi/inputpasien/')?>",
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
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            window.location.href = "<?= base_url('admin_registrasi/daftar_poli/')?>"+data;
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
                }
            
        });
        function hapus(id,nama){
            Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Pasien atas Nama: '+nama+' ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
                    url: "<?= base_url('admin_registrasi/deletepasien')?>",
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
