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
                <div class="text-left">
                    <a href="<?=base_url('penyedia/personil')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <br>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                <br>
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-plus"></i> Edit Personil</h3>
                        </div>                                       
                        <div class="card-body">
                        <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font>
   
                                <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Lengkap <font color='#ff0000'> *</font></label>
                                    <input type="hidden" name="id_personil" value="<?=isset($row) ? $row->id_personil : null?>" class="form-control">
                                        <input type="text" name="nama" value="<?=isset($row) ? $row->nama : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Jenis Tenaga Ahli <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="jenis_tenaga">
                                        <option value="<?=isset($row) ? $row->jenis_tenaga : null?>" selected><?=isset($row) ? $row->jenis_tenaga : null?></option>
                                            <option value="Individu WNI">Individu WNI</option>
                                            <option value="Individu WNA">Individu WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kewarganegaraan <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" name="id_kewarganegaraan">
                                        <option value="<?=isset($row) ? $row->id_kewarganegaraan : null?>" selected><?=isset($row) ? $row->negara : null?></option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Identitas <font color='#ff0000'> *</font></label>
                                        <input type="number" value="<?=isset($row) ? $row->no_identitas : null?>" name="no_identitas"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NPWP <font color='#ff0000'> *</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->npwp : null?>" name="npwp"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor BPJS Kesehatan <font color='#ff0000'> *</font></label>
                                        <input type="number" value="<?=isset($row) ? $row->no_bpjs_kesehatan : null?>" name="no_bpjs_kesehatan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor BPJS Ketenagakerjaan <font color='#ff0000'> *</font></label>
                                        <input type="number" name="no_bpjs_ketenagakerjaan" value="<?=isset($row) ? $row->no_bpjs_ketenagakerjaan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Negara Tempat Lahir <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" name="id_negara_tempat_lahir">
                                        <option value="<?=isset($row) ? $row->id_negara_tempat_lahir : null?>" selected><?=isset($row) ? $row->negaralahir: null?></option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten Kota Tempat Lahir <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" name="id_kabupaten_kota_tempat_lahir">
                                        <option value="<?=isset($row) ? $row->id_kabupaten_kota_tempat_lahir : null?>" selected><?=isset($row) ? $row->kabupatenlahir: null?></option>
                                            <?php foreach($kabupaten as $kabupatena){
                                                ?>
                                            <option value="<?=$kabupatena->id_kabupaten?>"><?=$kabupatena->kabupaten?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Lahir <font color='#ff0000'> *</font></label>
                                        <input type="date" value="<?=isset($row) ? $row->tanggal_lahir : null?>" name="tanggal_lahir"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Jenis Kelamin <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="jenis_kelamin">
                                        <option value="<?=isset($row) ? $row->jenis_kelamin : null?>" selected><?=isset($row) ? $row->jenis_kelamin: null?></option>
                                            <option value="PRIA">Pria</option>
                                            <option value="WANITA">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Telp <font color='#ff0000'> *</font></label>
                                        <input type="text" name="telp" value="<?=isset($row) ? $row->telp : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Email <font color='#ff0000'> *</font></label>
                                        <input type="text" name="email" value="<?=isset($row) ? $row->email : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Website</label>
                                        <input type="text" name="website" value="<?=isset($row) ? $row->website : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat <font color='#ff0000'> *</font></label>
                                        <input type="text" name="alamat" value="<?=isset($row) ? $row->alamat : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Provinsi <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                        <option value="<?=isset($row) ? $row->id_provinsi : null?>" selected><?=isset($row) ? $row->provinsi: null?></option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten Kota <font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten_kota">
                                        <option value="<?=isset($row) ? $row->id_kabupaten_kota : null?>" selected><?=isset($row) ? $row->kabupaten: null?></option>
                                            <?php foreach($kabupaten as $kabupatena){
                                                ?>
                                            <option value="<?=$kabupatena->id_kabupaten?>"><?=$kabupatena->kabupaten?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Status Kepegawaian <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="status_kepegawaian">
                                        <option value="<?=isset($row) ? $row->status_kepegawaian : null?>" selected><?php if(isset($row)) {if($row->status_kepegawaian){echo "Tetap";}else{echo "Tidak Tetap";}} ?></option>
                                            <option value="1">Tetap</option>
                                            <option value="2">Tidak Tetap</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Lama Tahun Pengalaman Kerja <font color='#ff0000'> *</font></label>
                                        <input type="number" min=0 max=99 name="lama_tahun_pengalaman_bekerja" value="<?=isset($row) ? $row->lama_tahun_pengalaman_kerja : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Pendidikan Akhir <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="pendidikan_akhir">
                                        <option value="<?=isset($row) ? $row->pendidikan_akhir : null?>" selected><?=isset($row) ? $row->pendidikan_akhir: null?></option>
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
                                    <label for="">Profesi Keahlian <font color='#ff0000'> *</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->profesi_keahlian : null?>" name="profesi_keahlian" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Type SDM <font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="type_personil">
                                            <option value="<?=isset($row) ? $row->type_personil : null?>" selected><?=isset($row) ? $row->type_personil: null?></option>
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
              url: "<?= base_url('penyedia/personil/edit/')?>",
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