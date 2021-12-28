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
                            <h3 class="card-title"> Pada data Jenis Klasifikasi ini merupakan data turunan berdasarkan jenis klasifikasinya  <span class="badge bg-warning"><?=isset($row) ? $row->jenis_klasifikasi : null?> <i class="fa fa-check"></i></span></h3>
                        </div>
                            <div class="card-body">
                            <form id="formtambah">
                                <div class="row">
                                        <div class="form-group col-sm-1">
                                              <input type="text" class="form-control" name="kode" placeholder="Kode">
                                              <input type="hidden" class="form-control" name="id_jenis_klasifikasi" value="<?=isset($row) ? $row->id_jenis_klasifikasi : null?>">
                                        </div>
                                        <div class="form-group col-sm-3">
                                              <input type="text" class="form-control" name="judul_klasifikasi" placeholder="Judul Klasifikasi">
                                        </div>
                                        <div class="form-group col-sm-7">
                                              <input type="text" class="form-control" name="deskripsi_klasifikasi" placeholder="Deskripsi Klasifikasi">
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <button type="submit" class="btn btn-md btn-primary" onclick="add()"> <i class="fa fa-plus"></i></button>
                                        </div>
                                        </form>
                                        
                               </div>
                               <br>
                                <table  id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th style="text-align:center">Judul Klasifikasi</th>
                                                <th style="text-align:center">Deskripsi Klasifikasi</th>
                                                <th style="text-align:center">Status</th>
                                                <th><center>Aksi</center></th>
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
                                              <td><?= $datas->kode?></td>
                                              <td><?= $datas->judul_klasifikasi?></td>
                                              <td><?= $datas->deskripsi_klasifikasi?></td>
                                              <td style="text-align:center"><?php
                                              if($datas->status == 1){
                                                echo '<span class="badge bg-success">Aktif <i class="fa fa-check"></i></span>';
                                              }
                                              else{
                                                echo '<span class="badge bg-danger">Non Aktif <i class="fa fa-times"></i></span>';
                                              }
                                              ?></td>
                                                <td style="text-align: center;">
                                              <?php if($datas->status == 1){?>
                                                <button onclick="disable(<?= $datas->id_jenis_deskripsi_klasifikasi?>)" class="btn btn-danger"><i class="fa fa-eye-slash"></i></button>
                                              <?php }else {?>
                                              <button onclick="enable(<?= $datas->id_jenis_deskripsi_klasifikasi?>)" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                              <?php } ?>
                                              <button onclick="edits(<?=$datas->id_jenis_deskripsi_klasifikasi?>, '<?= $datas->kode?>','<?= $datas->judul_klasifikasi?>', '<?= $datas->deskripsi_klasifikasi?>')" data-toggle="modal" class="btn btn-warning" data-target="#edit"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Edit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                                <form id="formedit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    
                                        <input type="hidden" id="edt_id_jenis_deskripsi_klasifikasi" name="edt_id_jenis_deskripsi_klasifikasi" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Kode</label>
                                      <input type="text" id="edt_kode" name="edt_kode" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Judul Klasifikasi</label>
                                      <input type="text" id="edt_judul_klasifikasi" name="edt_judul_klasifikasi" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Deskripsi Klasifikasi</label>
                                      <input type="text" id="edt_deskripsi_klasifikasi" name="edt_deskripsi_klasifikasi" class="form-control" required>
                                    </div>
                                </div>
                                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="perbaharui()" class="btn btn-primary">Perbaharui</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
  function add(){
        $("#formtambah").valid();
        };
        $('#formtambah').validate({
            rules: {
                kode: {
                    required: true,
                },
                judul_klasifikasi: {
                    required: true,
                },
                deskripsi_klasifikasi: {
                    required: true,
                },
            },
            messages: {
              kode: {
                   required: "Kolom ini Wajib di isi",
                },
                judul_klasifikasi: {
                  required: "Kolom ini Wajib di isi",
                },
                deskripsi_klasifikasi: {
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
               show();
              $.ajax({
              url: "<?= base_url('admin/master/tambahdeskripsi')?>",
              type: "POST",
              data:$('#formtambah').serialize(), 
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
            
        });
  function edits(id_jenis_deskripsi_klasifikasi, kode, judul_klasifikasi, deskripsi_klasifikasi){
    $('#edt_id_jenis_deskripsi_klasifikasi').val(id_jenis_deskripsi_klasifikasi);
    $('#edt_kode').val(kode);
    $('#edt_judul_klasifikasi').val(judul_klasifikasi);
    $('#edt_deskripsi_klasifikasi').val(deskripsi_klasifikasi);
  }
  function perbaharui(){
    $("#formedit").valid();
        };
        $('#formedit').validate({
            rules: {
                edt_kode: {
                    required: true,
                },
                edt_judul_klasifikasi: {
                    required: true,
                },
                edt_deskripsi_klasifikasi: {
                    required: true,
                },
            },
            messages: {
                edt_kode: {
                   required: "Kolom ini Wajib di isi",
                },
                edt_judul_klasifikasi: {
                  required: "Kolom ini Wajib di isi",
                },
                edt_deskripsi_klasifikasi: {
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
               show();
              $.ajax({
              url: "<?= base_url('admin/master/editdeskripsi')?>",
              type: "POST",
              data:$('#formedit').serialize(), 
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
            
        });
  function disable(id){
            
                Swal.fire({
                icon: 'question',
                title: 'Perhatian',
                text: 'Anda yakin ingin Menonaktifkan Data Master Ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Nonaktifkan',
                cancelButtonText: 'Batal'
            }).then(function(data){
                if(data.value === true){
                  show();
              $.ajax({
              url: "<?= base_url('admin/master/disable')?>",
              type: "POST",
              data: {
                  "id":id,
                  "field": id_field,
                  "table": table,
              },
              success:function(response){
              hide();
                        Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
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
            }


  function enable(id){
                Swal.fire({
                icon: 'question',
                title: 'Perhatian',
                text: 'Anda yakin ingin Mengaktifkan Data Master Ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Aktifkan',
                cancelButtonText: 'Batal'
            }).then(function(data){
                if(data.value === true){
                  show();
              $.ajax({
              url: "<?= base_url('admin/master/enable')?>",
              type: "POST",
              data: {
                  "id":id,
                  "field": id_field,
                  "table": table
              },
              success:function(response){
              hide();
                        Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
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
            }




            $('#table').DataTable({
            });
  
           

</script>

