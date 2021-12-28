<?php 
$model =& get_instance();
$model->load->model('M_izinusaha');
?>
<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->load->view('partials/head.php') ?>
  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css">
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row justify-content-center">
                    <div class="col-sm-12">
                    <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Di bawah ini adalah daftar Profil Penyedia, dalam menu ini anda dapat melakukan <strong>VERIFIKASI DATA</strong> Penyedia dengan
                  melakukan click <strong>Nama Perusahaan</strong> dan lakukan verifikasi terhadap data.
                </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Data Penyedia</h3>
                        </div>
                            <div class="card-body">
                            
                               <br>
                                <div class="table-responsive">
                                <table  id="table" class="table table-striped table-bordered no-wrap table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Akun</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Bentuk Usaha</th>
                                                <th>Klasifikasi Usaha</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><p class="text-sm"><?= $no?></p></td>
                                              <td><p class="text-sm"><?= $datas->nama?></p></td>
                                              <td><a href="<?=base_url('admin/datapenyedia/detail/').$datas->iduser?>"><p class="text-sm"><?= $datas->nama_perusahaan?></p></a></td>
                                              <td><p class="text-sm"><?= $datas->bentuk_usaha?></p></td>
                                              <td><?php 
                                                $nomor=0;
                                                $array=array(
                                                  'iduser'=>$datas->iduser
                                                );
                                                $klasifikasi= $model->M_izinusaha->klasifikasi($array)->result();
                                                foreach($klasifikasi as $klasifikasia){
                                                    $nomor++;
                                                    echo '<p class="text-sm">'.$nomor.'.'.' '.$klasifikasia->jenis_klasifikasi.'-'.$klasifikasia->judul_klasifikasi.'<br></p>';
                                                }
                                              ?></td>
                                              <td><p class="text-sm"><?= $datas->email?></p></td>
                                              <td><p class="text-sm"><?= $datas->telepon?></p></td>
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
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script>
    	$(document).ready(function() {
        $('#table').DataTable({
                    "scrollX": true,
                    dom: 'Bfrtip',
                    language: {
                                buttons: {
                                    colvis : ' Tampilkan / Sembunyikan',
                                    colvisRestore: "Reset Kolom", 
                                    excel: ' Excel',
                                    print: ' Cetak'
                                }
                        },
                    buttons : [
                                    {extend: 'colvis', className:'bg-info fa fa-eye', postfixButtons: [ 'colvisRestore' ] },
                                    {extend: 'excel', className: 'bg-green fas fa-file-excel', title: 'Daftar Penyedia Yang Terdaftar di dalam SIKaP PAM TIRTA KAMUNING'},
                                    {extend:'print', className:'fa fa-print', title: 'Daftar Penyedia Yang Terdaftar di dalam SIKaP PAM TIRTA KAMUNING (Cetak Otomatis by System)'},
                        ]
                            });
	});
</script>
