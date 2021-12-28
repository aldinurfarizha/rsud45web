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
                            <h3 class="card-title"><i class="fas fa-wrench"></i> Peralatan</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="butto" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Peralatan
                                    </button>
                                </div>
                                        <br>
                                <table id="table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th width="100px"><center>Aksi</center></th>
                                                <th>Status</th>
                                                <th>Nama Peralatan*</th>
                                                <th>Jumlah*</th>
                                                <th>Kapasitas</th>
                                                <th>Merk/Type</th>
                                                <th>Tahun Pembuatan*</th>
                                                <th>Kondisi*</th>
                                                <th>Lokasi Sekarang</th>
                                                <th>Status Kepemilikan*</th>
                                                <th>Bukti Kepemilikan</th>
                                                <th>File pendukung*</th>
                                                <th>Keterangan</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($peralatan as $data){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td style="text-align: center;">
                                              <button onclick="hapusperalatan(<?= $data->id_peralatan?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                              <a href="<?=base_url('penyedia/peralatan/vieweditperalatan/').$data->id_peralatan?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                              </td>
                                              <td style="text-align: center;">
                                              <?php if(isset($data->status_verif) && $data->status_verif == 1) 
                                         { echo "<span class='badge badge-success'><strong class='text-sm'>Terverifikasi</strong></span></td>"; }
                                         else{
                                            if(isset($data->status_verif) && $data->status_verif == 2) {
                                                echo "<span class='badge badge-danger'><strong class='text-sm'>DiTolak</strong></span></td>";
                                            }
                                            else{
                                                echo "<span class='badge badge-warning'><strong class='text-sm'>Menunggu Verifikasi</strong></span></td>";
                                            }
                                        }?>
                                              <td><?= $data->nama_peralatan?></td>
                                              <td><?= $data->jumlah?></td>
                                              <td><?= $data->kapasitas?></td>
                                              <td><?= $data->merk_type?></td>
                                              <td><?= $data->tahun_pembuatan?></td>
                                              <td><?= $data->kondisi?></td>
                                              <td><?= $data->lokasi_sekarang?></td>
                                              <td><?= $data->status_kepemilikan?></td>
                                              <td><?= $data->bukti_kepemilikan?></td>
                                              <td style="text-align: center;">
                                              <?php if(!empty($data->file)){?>
                                            <button type="button" onclick="popup('<?=base_url(BERKAS_PERALATAN).$data->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                            </b></p></td>
                                              <td><?= $data->keterangan?></td>
                                             
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-wrench"></i> Tambah Peralatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Peralatan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_peralatan" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Jenis <font color='#ff0000'>*</font></label>
                                        <select name="jenis" class="form-control">
                                        <option value="" selected>--Pilih Jenis--</option>
                                        <option value="KENDARAAN">Kendaraan</option>
                                        <option value="ALAT BERAT">Alat Berat</option>
                                        <option value="LAIN-LAIN">Lain - Lain</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Kapasitas </label>
                                        <input type="text" name="kapasitas" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Merk / Type </label>
                                        <input type="text" name="merk_type" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tahun Pembuatan <font color='#ff0000'>*</font></label>
                                        <input type="number" name="tahun_pembuatan" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kondisi <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="kondisi">
                                            <option value="" selected>Pilih</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Lokasi Sekarang </label>
                                        <input type="text" name="lokasi_sekarang" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Status Kepemilikan <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="status_kepemilikan" name="status_kepemilikan">
                                            <option value="" selected>Pilih</option>
                                            <option value="Sendiri">Sendiri</option>
                                            <option value="Sewa">Sewa</option>
                                            <option value="Dukungan">Dukungan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Bukti Kepemilikan</label>
                                        <input type="text" id="bukti_kepemilikan" name="bukti_kepemilikan" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">File Pendukung <font color='#ff0000'>*</font> <span class='badge badge-warning' id="keteranganfile"></span></label>
                                        <input type="file" name="file" class="form-control" accept="application/pdf"> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Keterangan </label>
                                    <textarea class="form-control" name="keterangan" rows="3"></textarea>
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="add" onclick="inputperalatan()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script>
 $('#status_kepemilikan').on('change', function() {
 var status_kepemilikan=$(this).find(":selected").val();
 console.log(status_kepemilikan);
 if(status_kepemilikan=="Sendiri"){
    keterangan="BPKB";
 }
 if(status_kepemilikan=="Sewa"){
    keterangan="Surat Kontrak Sewa";
 }
 if(status_kepemilikan=="Dukungan"){
    keterangan="Surat Dukungan";
 }
 if(status_kepemilikan==""){
    keterangan="Pilih Status Kepemilikan !";
 }
 $("#keteranganfile").text(keterangan);
 $("#bukti_kepemilikan").val(status_kepemilikan);
 });
$('#table').DataTable({
    "scrollX": true
            });
        function inputperalatan(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama_peralatan: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
                jumlah: {
                    required: true,
                },
             
                kondisi: {
                    required: true,
                },
                status_kepemilikan: {
                    required: true,
                },
              
                tahun_pembuatan: {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                },
                file: {
                    required: true,
                },
            },
            messages: {
                nama_peralatan: {
                    required: "Nama Peralatan Harus di isi",
                },
                jumlah: {
                    required: "Jumlah Harus di isi",
                },
               
                kondisi: {
                    required: "Kolom Ini Harus di isi",
                },
                
                status_kepemilikan: {
                    required: "Kolom Ini Harus di isi",
                },
              
                tahun_pembuatan: {
                    required: "Kolom Ini Harus di isi",
                    minlength: "Minimal 4 Karakter",
                    maxlength: "Maximal 4 Karakter",
                },
                file: {
                    required: "Wajib Melampirkan File Sesuai Intruksi",
                },
                jenis: {
                    required: "Kolom Ini Harus di isi",
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
              url: "<?= base_url('penyedia/peralatan/inputperalatan')?>",
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
              success:function(response){
                $("#add").attr("disabled", false);
                switch(response){
                  case '0':
                    $("#add").attr("disabled", false);
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
                            $("#add").attr("disabled", false);
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
                  $("#add").attr("disabled", false);
              }
            });
        }
            )}
        });
        function hapusperalatan(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Peralatan ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/peralatan/hapusperalatan/')?>"+id;
                }
            });
            
};
</script>
</body>
</html>
