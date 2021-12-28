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
                  Data di bawah ini adalah data master yang di tampilkan pada form Penyedia.
                </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-database"></i> Master Jenis Klasifikasi <span class="badge bg-warning"> Tipe Data Bercabang ! </span></h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-9">
                                        <div class="form-group">
                                              <input type="text" class="form-control" id="keterangans" placeholder="Jenis Klasifikasi">
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-md btn-primary" onclick="add()">
                                           <i class="fa fa-plus"></i> Tambah Jenis klasifikasi
                                            </button>
                                        </div>
                               </div>
                               <br>
                                <table  id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Klasifikasi</th>
                                                <th style="text-align:center">Status</th>
                                                <th style="text-align:center">Deskripsi Klasifikasi</th>
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
                                              <td><?= $datas->jenis_klasifikasi?></td>
                                              <td style="text-align:center"><?php
                                              if($datas->status == 1){
                                                echo '<span class="badge bg-success">Aktif <i class="fa fa-check"></i></span>';
                                              }
                                              else{
                                                echo '<span class="badge bg-danger">Non Aktif <i class="fa fa-times"></i></span>';
                                              }
                                              ?></td>
                                               <td style="text-align: center;"><a href="<?=base_url('admin/master/jenisklasifikasi/').$datas->id_jenis_klasifikasi?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Lihat</td>
                                                <td style="text-align: center;">
                                              <?php if($datas->status == 1){?>
                                                <button onclick="disable(<?= $datas->id_jenis_klasifikasi?>)" class="btn btn-danger"><i class="fa fa-eye-slash"></i></button>
                                              <button onclick="edits(<?= $datas->id_jenis_klasifikasi?> , '<?= $datas->jenis_klasifikasi?>')" data-toggle="modal" class="btn btn-warning" data-target="#edit"><i class="fa fa-edit"></i></button>
                                              <?php }else {?>
                                              <button onclick="enable(<?= $datas->id_jenis_klasifikasi?>)" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                              <button onclick="edits(<?= $datas->id_jenis_klasifikasi?> , '<?= $datas->jenis_klasifikasi?>')" data-toggle="modal" class="btn btn-warning" data-target="#edit"><i class="fa fa-edit"></i></button>
                                              <?php } ?>
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
         
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Keterangan</label>
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="perbaharui()" class="btn btn-primary">Perbaharui</button>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
  var id_field='id_jenis_klasifikasi';
  var field='jenis_klasifikasi';
  var table='static_jenis_klasifikasi';
function add(){
        var keterangan=$("#keterangans").val();
        if(!keterangan){
          alert("Isi dahulu Form kosong");
          return;
        }
        console.log(keterangan);
               show();
              $.ajax({
              url: "<?= base_url('admin/master/add')?>",
              type: "POST",
              data: {
                  "keterangans":keterangan,
                  "field": field,
                  "table": table
              },
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
  function edits(id,keterangan){
    $('#id').val(id);
    $('#keterangan').val(keterangan);
  }
  function perbaharui(){
          var keterangan=$("#keterangan").val();
          var id=$('#id').val();
          
            show();
              $.ajax({
              url: "<?= base_url('admin/master/edit/')?>",
              type: "POST",
              data: {
                  "id":id,
                  "id_field":id_field,
                  "field": field,
                  "table": table,
                  "keterangan": keterangan

              },
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

