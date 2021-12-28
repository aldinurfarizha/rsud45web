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
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-plus"></i> Tambah Personil</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Lengkap *</label>
                                        <input type="text" name="nama"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Jenis Tenaga Ahli *</label>
                                        <select class="form-control" name="jenis_tenaga">
                                            <option selected value="">Pilih</option>
                                            <option value="Individu WNI">Individu WNI</option>
                                            <option value="Individu WNA">Individu WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kewarganegaraan *</label>
                                        <select class="form-control select2" name="id_kewarganegaraan">
                                        <option selected value="">Pilih</option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Identitas *</label>
                                        <input type="number" name="no_identitas"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NPWP *</label>
                                        <input type="text" name="npwp"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor BPJS Kesehatan *</label>
                                        <input type="number" name="no_bpjs_kesehatan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor BPJS Ketenagakerjaan *</label>
                                        <input type="number" name="no_bpjs_ketenagakerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Negara Tempat Lahir *</label>
                                        <select class="form-control select2" name="id_negara_tempat_lahir">
                                        <option selected value="">Pilih</option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten Kota Tempat Lahir *</label>
                                        <select class="form-control select2" name="id_kabupaten_kota_tempat_lahir">
                                            <option selected value="">Pilih</option>
                                            <?php foreach($kabupaten as $kabupatena){
                                                ?>
                                            <option value="<?=$kabupatena->id_kabupaten?>"><?=$kabupatena->kabupaten?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Lahir *</label>
                                        <input type="date" name="tanggal_lahir"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Jenis Kelamin *</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="" selected>Pilih</option>
                                            <option value="PRIA">Pria</option>
                                            <option value="WANITA">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Telp *</label>
                                        <input type="text" name="telp"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Email</label>
                                        <input type="text" name="email"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Website</label>
                                        <input type="text" name="website"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat *</label>
                                        <input type="text" name="alamat"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Provinsi *</label>
                                        <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                        <option selected value="">Pilih</option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten Kota *</label>
                                        <select class="form-control select2" id="id_kabupaten" disabled name="id_kabupaten_kota">
                                        <option selected value="">--Pilih Provinsi Terlebih dahulu--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Status Kepegawaian *</label>
                                        <select class="form-control" name="status_kepegawaian">
                                            <option selected value="">Pilih</option>
                                            <option value="1">Tetap</option>
                                            <option value="2">Tidak Tetap</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Lama Tahun Pengalaman Kerja *</label>
                                        <input type="number" min=0 max=99 name="lama_tahun_pengalaman_bekerja" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Pendidikan Akhir *</label>
                                        <select class="form-control" name="pendidikan_akhir">
                                            <option selected value="">Pilih</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA/SMK">SMA/SMK</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4/S1">D4/S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Profesi Keahlian *</label>
                                        <input type="text" name="profesi_keahlian"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Type SDM *</label>
                                        <select class="form-control" name="type_personil">
                                            <option selected value="">Pilih</option>
                                            <option value="TENAGA AHLI">Tenaga Ahli</option>
                                            <option value="TENAGA TRAMPIL">Tenaga Trampil</option>
                                            <option value="TENAGA ADMINISTRASI">Tenaga Administrasi</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                        <div class="text-center">
                                        <button type="submit" onclick="input()" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN</button>
                                        </div>
                                </form>
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
        function input(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama: {
                    required: true,
                },
                jenis_tenaga: {
                    required: true,
                },
             
                id_kewarganegaraan: {
                    required: true,
                },
                no_identitas: {
                    required: true,
                    minlength: 5,
                    maxlength: 40,
                },
                npwp: {
                    required: true,
                },
                no_bpjs_kesehatan: {
                    required: true,
                },
                no_bpjs_ketenagakerjaan: {
                    required: true,
                },
                id_negara_tempat_lahir: {
                    required: true,
                },
                id_kabupaten_kota_tempat_lahir: {
                    required: true,
                },
                tanggal_lahir: {
                    required: true,
                },
                jenis_kelamin: {
                    required: true,
                },
                telp: {
                    required: true,
                    minlength: 10,
                    maxlength: 13,
                },
                email: {
                    required: true,
                    email: true,
                },
                alamat: {
                    required: true,
                    minlength: 10,
                    maxlength: 120,
                },
                id_provinsi: {
                    required: true,
                },
                id_kabupaten_kota: {
                    required: true,
                },
                status_kepegawaian: {
                    required: true,
                },
                lama_tahun_pengalaman_bekerja: {
                    required: true,
                    minlength: 1,
                    maxlength: 2,
                },
                pendidikan_akhir: {
                    required: true,
                },
                profesi_keahlian: {
                    required: true,
                },
                type_personil: {
                    required: true,
                },
            },
            messages: {
                nama: {
                    required: "Kolom Ini Harus di isi",
                },
                jenis_tenaga: {
                    required: "Kolom Ini Harus di isi",
                },
             
                id_kewarganegaraan: {
                    required: "Kolom Ini Harus di isi",
                },
                no_identitas: {
                    required: "Kolom Ini Harus di isi",
                    minlength: "Minimal 5 Karakter",
                    maxlength: "Maximal 40 Karakter",
                },
                npwp: {
                    required: "Kolom Ini Harus di isi",
                },
                no_bpjs_kesehatan: {
                    required: "Kolom Ini Harus di isi",
                },
                no_bpjs_ketenagakerjaan: {
                    required: "Kolom Ini Harus di isi",
                },
                id_negara_tempat_lahir: {
                    required: "Kolom Ini Harus di isi",
                },
                id_kabupaten_kota_tempat_lahir: {
                    required: "Kolom Ini Harus di isi",
                },
                tanggal_lahir: {
                    required: "Kolom Ini Harus di isi",
                },
                jenis_kelamin: {
                    required: "Kolom Ini Harus di isi",
                },
                telp: {
                    required: "Kolom Ini Harus di isi",
                    minlength: "Minimal 10 Karakter",
                    maxlength: "Maximal 13 Karakter",
                },
                email: {
                    required: "Kolom Ini Harus di isi",
                    email: "Format Email tidak Sesuai",
                },
                alamat: {
                    required: "Kolom Ini Harus di isi",
                    minlength: "Minimal 10 Karakter",
                    maxlength: "Maximal 120 Karakter",
                },
                id_provinsi: {
                    required: "Kolom Ini Harus di isi",
                },
                id_kabupaten_kota: {
                    required: "Kolom Ini Harus di isi",
                },
                status_kepegawaian: {
                    required: "Kolom Ini Harus di isi",
                },
                lama_tahun_pengalaman_bekerja: {
                    required: "Kolom Ini Harus di isi",
                },
                pendidikan_akhir: {
                    required: "Kolom Ini Harus di isi",
                },
                profesi_keahlian: {
                    required: "Kolom Ini Harus di isi",
                },
                type_personil: {
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
               show();
$.ajax({
              url: "<?= base_url('penyedia/personil/input/')?>",
              type: "POST",
              data:$('#data').serialize(), 
              success:function(response){
hide();
                switch(response){
                  case '0':
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
                            window.location.href = "<?= base_url('penyedia/personil/')?>";
                            });
                      break;
                }
              },

              error:function(response){
                  Swal.fire({
                    type: 'warning',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
            });
                }
            
        });
</script>
</body>
</html>