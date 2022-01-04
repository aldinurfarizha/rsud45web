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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Daftar Pasien</h3>
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
                                            <tr class="text-center text-sm">
                                                <th>No.</th>
                                                <th>Pasien</th>
                                                <th>Poli</th>
                                                <th>Cara Bayar</th>
                                                <th>Tipe Pelayanan</th>
                                                <th>Tgl Periksa</th>
                                                <th>Cara Kunjungan</th>
                                                <th>Oleh</th>
                                                <th>Tgl Input</th>
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
                                              <td><?= $datas->nama_pasien.'-'.$datas->no_rm?></td>
                                              <td><?= $datas->nama_poli?></td>
                                              <td><?= $datas->cara_bayar?></td>
                                              <td><?= $datas->tipe_pelayanan?></td>
                                              <td><?= $datas->tanggal_periksa?></td>
                                              <td><?= $datas->cara_kunjungan?></td>
                                              <td class="text-center"><?php if($datas->ditambahkan_oleh=='ONLINE'){?>
                                                <span class="badge bg-success">ONLINE</span><?php }else{?>
                                                    <span class="badge bg-primary"><?=$datas->ditambahkan_oleh?></span><?php } ?>
                                                </td>
                                              <td><?= $datas->tanggal_input?></td>

                                            
                                              <td style="text-align: center;">
                                              <button onclick="hapus(<?= $datas->poli_id?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <button onclick="edit('<?= $datas->poli_id?>' , '<?= $datas->nama_poli?>', '<?= $datas->max?>', '<?= $datas->status?>')" data-toggle="modal" class="btn btn-sm btn-warning" data-target="#edit"><i class="fa fa-edit"></i></button>
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
            <form id="inputform">
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
$('#table').DataTable({
            });
        function input(){
        $("#inputform").valid();
        };
        $('#inputform').validate({
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
                $.ajax({
              url: "<?= base_url('pic/inputpoli')?>",
              type:"post",
              data:$('#inputform').serialize(), 
              beforeSend: function () {
                  $("#add").attr("disabled", true);
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
                $('#inputform').trigger("reset");
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
               
                }
            
        });
        function edit(id,nama_poli, max, status){
        var strstatus;
        if(status){strstatus='Aktif'}else{strstatus='Tidak Aktif'};
        $('#id').val(id);
        $('#nama_polis').val(nama_poli);
        $('#maxs').val(max);
        $('#statuss').empty();
        $('#statuss').append('<option selected value="'+status+'">'+strstatus+'</option>');
        $('#statuss').append('<option value="1">Aktif</option>');
        $('#statuss').append('<option value="0">Tidak Aktif</option>');
    }
    function doedit(){
        $("#editform").valid();
        };
        $('#editform').validate({
            rules: {
                nama_polis: {
                    required: true,
                },
                maxs: {
                    required: true,
                    digits:true
                },

                statuss: {
                    required: true,
                },
            },
            messages: {
                nama_polis: {
                    required: "Wajib di Pilih",
                },
                maxs: {
                    digits: "Isi dengan angka",
                    required: "Wajib di isi",
                },
                
                statuss: {
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
                $.ajax({
              url: "<?= base_url('pic/editpoli')?>",
              type:"post",
              data:$('#editform').serialize(), 
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
                $('#editform').trigger("reset");
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di edit",
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
               
                }
            
        });
        function hapus(id){
            Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Poli ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
                    url: "<?= base_url('pic/deletepoli')?>",
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
