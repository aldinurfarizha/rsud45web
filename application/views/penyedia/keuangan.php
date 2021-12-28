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
                  Sisa Kemampuan Nyata (SKN) merupakan salah satu syarat kualifikasi penyedia barang/jasa untuk mengikuti tender pengadaan barang/pekerjaan konstruksi/jasa lainnya . Syarat ini mulai diberlakukan sejak Perpres Nomor 16 Tahun 2018 tentang Pengadaan Barang/Jasa Pemerintah. Ketentuan tentang SKN diatur pada Peraturan LKPP Nomor 9 Tahun 2018 sebagaimana telah diamanatkan pada pasal 91 ayat (1) huruf l Perpres Nomor 16 Tahun 2018.
                  <br>
                  <br>

                  Silahkan Upload File (PDF) SKN  <a href="<?= base_url('assets/file/formatskn.docx')?>">Contoh Format</a>
                </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Keuangan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Keuangan
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>File</th>
                                                <th>Status</th>
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
                                              <td><?= $datas->keterangan?></td>
                                              <td><?= $datas->tanggal?></td>
                                              <td> <a href="<?=base_url(BERKAS_KEUANGAN).$datas->file?>" class="btn btn-danger">Lihat Berkas <i class="fa fa-book"></i></a></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-lg'>Terverifikasi</strong></span></td>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-lg'>DiTolak</strong></span></td>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-lg'>Menunggu Verifikasi</strong></span></td>";
                                                    }
                                                    }?>
                                              <td style="text-align: center;">
                                              <button onclick="hapuskeuangan(<?=$datas->id_keuangan?>,'<?=$datas->file?>')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah keuangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Keterangan </label>
                                        <input type="text" name="keterangan" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Berkas SKN (PDF) <font color='#ff0000'>*</font></label>
                                        <input type="file" name="file" class="form-control" accept="application/pdf">
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="btn_upload" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php $this->load->view('partials/script.php') ?>
<script>
$('#table').DataTable({
            });
            $(document).ready(function(){
 
 $('#submit').submit(function(e){
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/keuangan/upload/')?>',
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
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
            }
          });
     });
  

});
        function hapuskeuangan(id,file){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus data Keuangan ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/keuangan/hapus/')?>"+id+"/"+file;
                }
            });
            
};
</script>
</body>
</html>
