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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Pajak</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Pajak
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-striped table-bordered table-responsive no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Laporan Pajak</th>
                                                <th>Nomor Bukti Penerimaan Surat</th>
                                                <th>Masa Pajak</th>
                                                <th>File Pajak</th>
                                                <th>Tanggal Bukti Penerimaan Surat</th>
                                                <th>Terakhir di Rubah</th>
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
                                              <td><?= $datas->deskripsi?></td>
                                              <td><?= $datas->nomor_bukti_penerimaan_surat?></td>
                                              <td><?= $datas->masa_pajak?></td>
                                              <td style="text-align: center;">
                                              <?php if(!empty($datas->file)){?>
                                            <button onclick="popup('<?=base_url(BERKAS_PAJAK).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                              <td><?= $datas->tanggal_bukti_penerimaan_surat?></td>
                                              <td><?= $datas->tanggal_perubahan?></td>
                                              <td style="text-align: center;">
                                              <?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-sm'>Terverifikasi</strong></span></td>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-sm'>DiTolak</strong></span></td>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-sm'>Menunggu Verifikasi</strong></span></td>";
                                                    }
                                                    }?>
                                                    
                                              <td style="text-align: center;">
                                              <button onclick="hapuspajak(<?= $datas->id_pajak?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('penyedia/pajak/vieweditpajak/').$datas->id_pajak?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah Pajak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Jenis Laporan Pajak</label>
                                        <select class="form-control" name="id_jenis_laporan_pajak">
                                            <option value="" selected>Pilih</option>
                                            <?php foreach($pajak as $pajaks){
                                                ?>
                                            <option value="<?=$pajaks->id_static_pajak?>"><?=$pajaks->deskripsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Nomor Bukti Penerimaan Surat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nomor_bukti_penerimaan_surat" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Masa Pajak <font color='#ff0000'>*</font></label>
                                        <input type="text" name="masa_pajak" value="TAHUNAN" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Tanggal Bukti Penerimaan Surat <font color='#ff0000'>*</font></label>
                                        <input type="date" name="tanggal_bukti_penerimaan_surat" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                    <label for="">File Pajak <font color='#ff0000'>*</font></label>
                                        <input type="file" name="file" accept="application/pdf" class="form-control">
                                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="add" onclick="inputpajak()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script>
$('#table').DataTable({
            });
            function inputpajak(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                id_jenis_laporan_pajak: {
                    required: true,
                },
                nomor_bukti_penerimaan_surat: {
                    required: true,
                },

                tanggal_bukti_penerimaan_surat: {
                    required: true,
                },
                file: {
                    required: true,
                },
            },
            messages: {
                id_jenis_laporan_pajak: {
                    required: "Wajib di Pilih",
                },
                nomor_bukti_penerimaan_surat: {
                    required: "Kolom ini wajib di isi",
                },
                
                tanggal_bukti_penerimaan_surat: {
                    required: "tanggal bukti penerimaan surat wajib di isi",
                },
                file: {
                    required: "Wajib Melampirkan File",
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
                $("#data").load("submit", function (e)
            {
                $("#add").attr("disabled", true);
                $.ajax({
              url: "<?= base_url('penyedia/pajak/tambah')?>",
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
                $("#add").attr("disabled", false);
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
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
                });
                }
            
        });
        function hapuspajak(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus data pajak ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/pajak/hapus/')?>"+id;
                }
            });
            
};
</script>
</body>
</html>
