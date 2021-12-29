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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Master Poli</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Poli
                                    </button>
                                </div>
                                        <br>
                                        <table id="table" class="table table-sm table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama Poli</th>
                                                <th>Maximal Pelayanan</th>
                                                <th>Status Poli</th>
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
                                              <td><?= $datas->nama_poli?></td>
                                              <td class="text-center"><?= $datas->max.' (Orang/Hari)'?></td>
                                              <td class="text-center"><?php if($datas->status){?>
                                                <span class="badge bg-primary">Aktif</span><?php }else{?>
                                                    <span class="badge bg-danger">Tidak Aktif</span><?php } ?>
                                                </td>
                                              <td style="text-align: center;">
                                              <button onclick="hapuspajak(<?= $datas->poli_id?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('penyedia/pajak/vieweditpajak/').$datas->poli_id?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah Poli</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Poli</label>
                                        <input type="text" name="nama_poli" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Maximal Pelayanan</label>
                                        <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="max" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                    <label for="">Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="">--Pilih Status Poli--</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
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
<?php $this->load->view('partials/script.php') ?>
<script>
$('#table').DataTable({
            });
            function input(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama_poli: {
                    required: true,
                },
                max: {
                    required: true,
                    digits:true
                },

                status: {
                    required: true,
                },
            },
            messages: {
                nama_poli: {
                    required: "Wajib di Pilih",
                },
                max: {
                    digits: "Isi dengan angka",
                    required: "Wajib di isi",
                },
                
                status: {
                    required: "Wajib di pilih",
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
