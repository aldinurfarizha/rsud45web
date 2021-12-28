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
                  Data di bawah ini hanya menampilkan akun penyedia yang belum <strong>Terverifikasi</strong>
                </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Verifikasi Akun Penyedia</h3>
                        </div>
                            <div class="card-body">
                            
                               <br>
                                <table  id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
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
                                              <td style="text-align: center;"><button onclick="verif(<?=$datas->iduser?> , '<?=$datas->email?>')" class="btn btn-warning">Verifikasi</button></td>
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
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
  function verif(id,email){
                Swal.fire({
                icon: 'question',
                title: 'Verifikasi',
                text: 'Anda yakin ingin melakukan verifikasi terhadap akun ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Verifikasi',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){  
                  show();   
                  $.ajax({
              url: "<?= base_url('admin/verifakun/verified')?>",
              type: "POST",
              data: {
                  "email": email,
                  "id": id
              },
              success:function(response){
                hide();
                switch(response){
                  case '0':
                    Swal.fire(
                        'Gagal',
                        'Kesalahan tidak di ketahui',
                        'error'
                      )
                    break;
                    case '1':
                      Swal.fire({
                        title: "Berhasil, Notif Email Berhasil di kirim ke Penyedia",
                        icon: "success",
                        button: "Lanjutkan",
                          }).then(function() {
                              window.location = "<?= base_url('admin/verifakun/')?>";
                            });
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            })
                }
            });
            }
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
</script>

