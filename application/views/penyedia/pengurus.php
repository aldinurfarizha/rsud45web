<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                            <h3 class="card-title"><i class="fas fa-user-circle"></i> Pengurus</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Pengurus
                                    </button>
                                </div>
                                        <br>
                                        <p class="text-center text-lg"><i class="fa fa-users"></i> Daftar Pengurus</p>
                               <?php 
                               $no=1;
                               foreach($data as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-3"><i class="fa fa-user"></i> <?=$datas->nama?></p></div>
                                        <div class="col-md-2"><i class="fa fa-address-book"></i> <?=$datas->jabatan?></p></div>
                                        <div class="col-md-2"><?php if(isset($datas->status) && $datas->status == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Aktif <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    echo "<span class='badge badge-success'><strong class='text-md'>Tidak Aktif <i class='fa fa-times'></i></strong></span>";
                                                    }?></div>
                                        <div class="col-md-3"><?php if(isset($datas->status_verif) && $datas->status_verif == 1) 
                                                { echo "<span class='badge badge-success'><strong class='text-md'>Terverifikasi <i class='fa fa-check'></i></strong></span>"; }
                                                else{
                                                    if(isset($datas->status_verif) && $datas->status_verif == 2) {
                                                        echo "<span class='badge badge-danger'><strong class='text-md'>DiTolak <i class='fa fa-times'></i></strong></span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge badge-warning'><strong class='text-md'>Menunggu Verifikasi <i class='fa fa-clock'></i> </strong></span>";
                                                    }
                                                    }?></div>
                                        <div class="card-tools col-md-1">
                                        <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fa fa-arrow-down"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                    <div class="row">
                                            <div class="col-md-4"><p class="font-weight-light"> Jenis Kepengurusan : <b><?=$datas->jenis_kepengurusan?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Kewarganegaraan : <b><?=$datas->negara?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> NPWP : <b><?=$datas->npwp?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Alamat : <b><?=$datas->alamat?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light"> Provinsi : <b><?=$datas->provinsi?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Kabupaten : <b><?=$datas->kabupaten?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light"> Menjabat Sejak : <b><?=$datas->menjabat_sejak?></b></p></div>
                                            <div class="col-md-4"><p class="font-weight-light">Menjabat Sampai: <b><?=$datas->menjabat_sampai?></b></p> </div>
                                            <div class="col-md-4"><p class="font-weight-light">File (KTP) : <b>
                                            <td style="text-align: center;">
                                              <?php if(!empty($datas->file)){?>
                                            <button onclick="popup('<?=base_url(BERKAS_KTP).$datas->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                            <?php } else { ?>
                                            <small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas</small>
                                            <?php } ?></td>
                                            </b></p></div>                                            
                                            <div class="col-md-6 text-center"><button onclick="hapus(<?=$datas->id_pengurus?>)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </button></div>
                                           <div class="col-md-6 text-center"><a href="<?=base_url('penyedia/pengurus/vieweditpengurus/').$datas->id_pengurus?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                $no++;
                               }
                                ?>
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
              <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Pengurus</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font>
                        
            <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Lengkap <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Kepengurusan <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="jenis_kepengurusan">
                                            <option selected value="">Pilih</option>
                                            <option value="Individu WNI">Individu WNI</option>
                                            <option value="Individu WNA">Individu WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kewarganegaraan <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" name="id_kewarganegaraan">
                                        <option selected value="">Pilih</option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Identitas <font color='#ff0000'> *</font></label>
                                        <input type="text" name="nomor_identitas" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NPWP <font color='#ff0000'> *</font></label>
                                        <input type="text" name="npwp" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Alamat <font color='#ff0000'> *</font></label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Provinsi <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_provinsi" id="id_provinsi">
                                            <option value="" selected>Pilih</option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kabupaten <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_kabupaten" id="id_kabupaten" disabled>
                                            <option value="" selected>--Pilih Provinsi Terlebih Dahulu--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Jabatan <font color='#ff0000'> *</font></label>
                                        <input type="text" name="jabatan" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Status <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="status">
                                            <option selected value="">Pilih</option>
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="NON AKTIF">NON AKTIF</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Menjabat Sejak <font color='#ff0000'> *</font></label>
                                        <input type="date" name="menjabat_sejak" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Menjabat Sampai <font color='#ff0000'> *</font></label>
                                        <input type="date" name="menjabat_sampai" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">File Berkas (KTP) <font color='#ff0000'> *</font></label>
                                    <input type="file" name="file" class="form-control" accept="image/*"> 
                                    </div>
                                </div>
                               
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="tambah()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script>
     $("#id_provinsi").change(function(){
    $("#id_kabupaten").attr("disabled", false);
    var kab = $(this).val();
    $.ajax({
        url: '<?= base_url('admin/master/getkabupaten/')?>'+kab,
        type: 'post',
        dataType: 'json',
        success:function(response){
            Pace.restart();
            var len = response.length;
            $("#id_kabupaten").empty();
            for( var i = 0; i<len; i++){
                var id = response[i]['id_kabupaten'];
                var name = response[i]['kabupaten'];
                $("#id_kabupaten").append("<option value='"+id+"'>"+name+"</option>");
            }
        }
    });
});
 $('.select2').select2();
        function tambah(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama: {
                    required: true,
                },
                jenis_kepengurusan: {
                    required: true,
                },
                id_kewarganegaraan: {
                    required: true,
                },
                nomor_identitas: {
                    required: true,
                },
                npwp: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                id_provinsi: {
                    required: true,
                },
                id_kabupaten: {
                    required: true,
                },
                jabatan: {
                    required: true,
                },
                status: {
                    required: true,
                },
                menjabat_sejak: {
                    required: true,
                },
                menjabat_sampai: {
                    required: true,
                },
                file: {
                    required: true,
                },
              
            },
            messages: {
                nama: {
                    required: "Wajib di Isi",
                },
                jenis_kepengurusan: {
                    required: "Wajib di Isi",
                },
                id_kewarganegaraan: {
                    required: "Wajib di Isi",
                },
                nomor_identitas: {
                    required: "Wajib di Isi",
                },
                npwp: {
                    required: "Wajib di Isi",
                },
                alamat: {
                    required: "Wajib di Isi",
                },
                id_provinsi: {
                    required: "Wajib di Isi",
                },
                id_kabupaten: {
                    required: "Wajib di Isi",
                },
                jabatan: {
                    required: "Wajib di Isi",
                },
                status: {
                    required: "Wajib di Isi",
                },
                menjabat_sejak: {
                    required: "Wajib di Isi",
                },
                menjabat_sampai: {
                    required: "Wajib di Isi",
                },
                file: {
                    required: "Wajib di Isi",
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
                $.ajax({
              url: "<?= base_url('penyedia/pengurus/tambah/')?>",
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
                        text: "Data Telah Berhasil di input",
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
                });
                }
            
        });
        function hapus(id){
            Swal.fire({
                        icon: 'question',
                        title: 'Hapus',
                        text: 'Anda yakin ingin Menghapus data Pengurus ini ?',
                        showConfirmButton: true,
                        showCancelButton: true,
                        showBackdrop: true,
                        confirmButtonText: 'Ya Hapus',
                        cancelButtonText: 'Tidak'
                    }).then(function(data){
                        if(data.value === true){
                            window.location.href = "<?= base_url('penyedia/pengurus/hapus/')?>"+id;
                        }
                    });};
</script>
</body>
</html>
