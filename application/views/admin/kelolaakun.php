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
                  Data di bawah ini adalah data seluruh akun, Anda bisa menambahkan akun <strong>ADMIN PENYEDIA</strong> dan 
                  akun <strong>PENYEDIA</strong> , atau penyedia bisa melakukan pendaftaran secara mandiri melalui Form <a href="<?= base_url('auth/register')?>">Daftar Ini</a>
                </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Kelola Akun</h3>
                        </div>
                            <div class="card-body">
                            <div class="row justify-content-end">
                                    <button type="butto" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Akun
                                    </button>
                                </div>
                               <br>
                                <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th style="text-align:center">Hak Akses</th>
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
                                              <td><?= $datas->nama?></td>
                                              <td><?= $datas->email?></td>
                                              <td><?= $datas->telepon?></td>
                                              <td style="text-align:center"><?php
                                              if($datas->role == 1){
                                                echo '<span class="badge bg-success">Admin</span>';
                                              }
                                              else{
                                                echo '<span class="badge bg-primary">Penyedia</span>';
                                              }
                                              ?></td>
                                              <?php
                                              if($datas->disable == 0){
                                                echo " <td style='text-align: center;'><button onclick='nonaktif(".$datas->iduser.")' class='btn btn-danger'><i class='fa fa-power-off'></i> Non Aktifkan</button></td>";
                                              }
                                              else{
                                                echo " <td style='text-align: center;'><button onclick='aktif(".$datas->iduser.")' class='btn btn-primary'><i class='fa fa-check'></i> Aktifkan</button></td>";
                                              }
                                              ?>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Akun SIKaP</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="tambahakun">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Telp</label>
                                        <input type="tel" name="telp" pattern="[0-9]" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Privilage(Hak Akses)</label>
                                        <select class="form-control" name="role">
                                        <option value="">Pilih</option>
                                        <option value="1">Admin SIKAP</option>
                                        <option value="2">Penyedia</option>
                                        </select>
                                    </div>
                               
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="tambah()" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
      $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            function nonaktif(id){
                Swal.fire({
                icon: 'question',
                title: 'Non-Aktifkan',
                text: 'Anda yakin ingin Menonaktifkan data akun ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Nonaktifkan',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('admin/kelolaakun/nonaktif/')?>"+id;
                }
            });
            
};
function tambah(){
        $("#tambahakun").valid();
        };
        $('#tambahakun').validate({
            rules: {
                nama_lengkap: {
                    required: true,
                },
                telp: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 30,
                },
                role: {
                    required: true,
                },
              
            },
            messages: {
              nama_lengkap: {
                    required: "Kolom Ini Wajib di isi",
                },
                telp: {
                    required: "Kolom Ini Wajib di isi",
                },
                email: {
                    required: "Kolom Ini Wajib di isi",
                    email: "Format E-Mail Tidak Sesuai",
                },
                password: {
                    minlength: "Minimal 8 Karakter",
                    maxlength: "Maximal 30 Karakter",
                    required: "Kolom Ini Wajib di isi",
                },
                role: {
                    required: "Kolom Ini Wajib di Pilih",
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
              url: "<?= base_url('admin/kelolaakun/tambah')?>",
              type: "POST",
              data:$('#tambahakun').serialize(), 
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
function aktif(id){
                Swal.fire({
                icon: 'question',
                title: 'Aktifkan',
                text: 'Anda yakin ingin Mengaktifkan data akun ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Aktifkan',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('admin/kelolaakun/aktif/')?>"+id;
                }
            });
            
};
</script>
