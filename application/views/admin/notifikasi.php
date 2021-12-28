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
                        <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-bell"></i> Notifikasi</h3>
                        </div>
                            <div class="card-body">
                                <table  id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Informasi</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Penyedia</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr <?= $datas->is_read == 0 ? "style='background-color:#a8d6ea;'" : null ?> >
                                              <td><?= $no?></td>
                                              <td><?= $datas->informasi?></td>
                                              <td><?= $datas->tanggal?></td>
                                              <td><?= $datas->waktu?></td>
                                              <td><?= $datas->nama?></td>
                                              <td style="text-align: center;"><a href="<?=base_url('admin/datapenyedia/detail/').$datas->iduser?>" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat</td>
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
<script>
$('#table').DataTable({
            });
</script>
</body>
</html>
