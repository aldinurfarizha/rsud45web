<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2/css/select2.min.css">
<?php $this->load->view('partials/head.php') ?>

  <?php $this->load->view('partials/navbar.php') ?>
  <?php $this->load->view('partials/leftbar.php') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          <br>
          <div class="row justify-content-center">
                <div class="col-sm-12">
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-building"></i> Tambah Izin Usaha</h3>
                        </div>
                        <div class="card-body">
                                <form id="data">
                                <div class="row">
                        </div>
                        <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font>
                        
                            <div class="card-body">
                                <div class="row">
                                <div class="form-group col-sm-6">
                                        <label>Jenis Izin Usaha <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="id_jenis_izin_usaha" id="id_jenis_izin_usaha" >
                                        <option value='' selected='selected'>Pilih</option>
                                            <?php foreach($jenis_izin_usaha as $a){
                                                ?>
                                            <option value="<?= isset($a) ? $a->id_jenis_izin_usaha : null?>"><?= isset($a) ? $a->jenis_izin_usaha : null?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Surat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nomor_surat"class="form-control" >
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Instansi Pemberi *</label>
                                        <input type="text" name="instansi_pemberi"class="form-control" >
                                    </div>
                                 
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung (PDF) <font color='#ff0000'>*</font></label>
                                        <input type="file" name="file" class="form-control" accept="application/pdf" >
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Berlaku Sampai <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="berlaku_sampai" name="berlaku_sampai">
                                            <option selected value="">Pilih</option>
                                            <option value="0">Tanggal</option>
                                            <option value="1">Seumur Hidup</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6" id="kualifikasi">
                                        <label >Kualifikasi <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="kualifikasis" name="kualifikasi">
                                            <option selected value="">Pilih</option>
                                            <option value="KECIL">Kecil</option>
                                            <option value="NON KECIL">Non Kecil</option>
                                            <option value="MENENGAH">Menengah</option>
                                        </select>
                                        </select>
                                    </div>
                                      <div id="tanggal" class="form-group col-sm-6">
                                        <label >Tanggal</label>
                                        <input type="date" value="tanggal" name="tanggal" id="tanggals" class="form-control">
                                    </div>
                                </div>
                                <br>
                               
                                        <div class="text-center">
                                        <button type="submit" onclick="simpan()" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN</button>
                                        </div>
                                </form>
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
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script>
 $('.select2').select2();
    function simpan(){
        $("#data").valid();
    };
        $('#data').validate({
            rules: {
                id_jenis_izin_usaha: {
                    required: true,
                },
                nomor_surat: {
                    required: true,
                },
                instansi_pemberi: {
                    required: true,
                },
                file: {
                    required: true,
                },
                berlaku_sampai: {
                    required: true,
                },
                kualifikasi: {
                    required: true,
                },
            },
            messages: {
                nomor_surat: {
                    required: "Kolom ini harus di isi",
                },
                id_jenis_izin_usaha: {
                    required: "Kolom Ini Harus Di isi",
                },
                nomor_surat: {
                    required: "Kolom Ini Harus Di isi",
                },
                instansi_pemberi: {
                    required: "Kolom Ini Harus Di isi",
                },
                file: {
                    required: "Kolom Ini Harus Di isi",
                },
                berlaku_sampai: {
                    required: "Kolom Ini Harus Di isi",
                },
                kualifikasi: {
                    required: "Kolom Ini Harus Di isi",
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
              url: "<?= base_url('penyedia/izinusaha/input/')?>",
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
                        text: "Silahkan Lanjut Untuk Menambahkan Klasifikasi Bidang Usaha",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            window.location.href = "<?= base_url('penyedia/izinusaha/vieweditizinusaha/')?>"+data;
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
     
          
     
    $("#tanggal").css('visibility', 'hidden');
    $('#berlaku_sampai').on('change', function() {
    var pilihan=$(this).find(":selected").val();
    if(pilihan==1 || pilihan==''){
        $("#tanggal").css('visibility', 'hidden');
        $("#tanggals").prop('required',false);
        $("#tanggals").val(new Date());
       
    }else{
        $("#tanggal").css('visibility', 'visible');
        $("#tanggals").prop('required',true);
        $("#tanggals").val(new Date());
    }
    });
    $('#id_jenis_izin_usaha').on('change', function() {
    var id_izin_usaha=$(this).find(":selected").val();
    if(id_izin_usaha==2 || id_izin_usaha==''){
        $("#kualifikasi").css('visibility', 'hidden')
        $("#kualifikasis").prop('required',false);
        $("#kualifikasis").val('');
    }else{
        $("#kualifikasi").css('visibility', 'visible')
        $("#kualifikasis").prop('required',true);
        $("#kualifikasis").val('');
    }
    });
</script>
</body>
</html>