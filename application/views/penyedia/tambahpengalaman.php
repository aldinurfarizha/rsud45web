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
                            <h3 class="card-title"><i class="fas fa-graduation-cap"></i> Tambah Pengalaman</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font> <br> <br>
                                <div class="row">
                                
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Kontrak <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_kontrak"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Kontrak <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nomor_kontrak"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Durasi Pelaksanaan Mulai <font color='#ff0000'>*</font></label>
                                        <input type="date" name="durasi_pelaksanaan_mulai"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Durasi Pelaksanaan Selesai <font color='#ff0000'>*</font></label>
                                        <input type="date" name="durasi_pelaksanaan_selesai"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Serah Terima Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="date" name="tanggal_serah_terima_pekerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nilai Kontrak <font color='#ff0000'>*</font></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                        <input id="nilai_kontrak" name="nilai_kontrak"class="form-control">
                                    </div>
                                      
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kategori Pekerjaan <font color='#ff0000'>*</font></label>
                                        
                                        <select class="form-control" name="kategori_pekerjaan">
                                            <option value="" selected>Pilih</option>
                                            <option value="BARANG">Barang</option>
                                            <option value="KONSTRUKSI">Pekerjaan Konstruksi</option>
                                            <option value="JASA KONSULTASI (PERORANGAN)">Jasa Konsultansi (Perorangan)</option>
                                            <option value="JASA KONSULTASI BADAN USAHA KONTRUKSI">Jasa Konsultansi Badan Usaha Kontruksi</option>
                                            <option value="JASA KONSULTASI BADAN USAHA NON KONSTRUKSI">Jasa Konsultansi Badan Usaha Non Kontruksi</option>
                                            <option value="JASA Lainnya">Jasa Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Persentase Pekerjaan (0-100%) <font color='#ff0000'>*</font></label>
                                    <div class="input-group-prepend">
                                    <input type="number" min="1" max="100" name="persentase_pekerjaan"class="form-control">
                                        <span class="input-group-text">% </span>
                                    </div>
                                      
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Uraian Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="uraian_pekerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Ruang Lingkup Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="ruang_lingkup_pekerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="alamat"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Negara <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_negara">
                                        <option selected value="">Pilih</option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Provinsi <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                        <option selected value="">--Ketik/Pilih--</option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" disabled id="id_kabupaten" name="id_kabupaten">
                                        <option selected value="">--Pilih Provinsi Terlebih Dahulu--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Instansi <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_instansi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Satuan Kerja <font color='#ff0000'>*</font></label>
                                        <input type="text" name="satuan_kerja"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat Instansi <font color='#ff0000'>*</font></label>
                                        <input type="text" name="alamat_instansi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Telepon Instansi <font color='#ff0000'>*</font></label>
                                        <input type="number" name="telp_instansi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">File Dokumen SPK <font color='#ff0000'>*</font></label>
                                        <input type="file" name="file" class="form-control" accept="application/pdf"> 
                                    </div>
                                <br>
                                </div>
                                        <div class="text-center">
                                        <button type="submit" id="add" onclick="tambah()"class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> TAMBAHKAN</button>
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
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
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
	$( '#nilai_kontrak' ).mask('000.000.000.000', {reverse: true});
    $('.select2').select2();
        function tambah(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama_kontrak: {
                    required: true,
                },
                nomor_kontrak: {
                    required: true,
                },
                durasi_pelaksanaan_mulai: {
                    required: true,
                },
                durasi_pelaksanaan_selesai: {
                    required: true,
                },
                tanggal_serah_terima_pekerjaan: {
                    required: true,
                },
                nilai_kontrak: {
                    required: true,
                },
                kategori_pekerjaan: {
                    required: true,
                },
                persentase_pekerjaan: {
                    required: true,
                },
                uraian_pekerjaan: {
                    required: true,
                },
                ruang_lingkup_pekerjaan: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                id_negara: {
                    required: true,
                },
                id_provinsi: {
                    required: true,
                },
                id_kabupaten: {
                    required: true,
                },
                nama_instansi: {
                    required: true,
                },
                satuan_kerja: {
                    required: true,
                },
                alamat_instansi: {
                    required: true,
                },
                telp_instansi: {
                    required: true,
                },
                file: {
                    required: true,
                },
            },
            messages: {
                nama_kontrak: {
                    required: "Kolom ini harus di isi",
                },
                nomor_kontrak: {
                    required: "Kolom ini harus di isi",
                },
                durasi_pelaksanaan_mulai: {
                    required: "Kolom ini harus di isi",
                },
                durasi_pelaksanaan_selesai: {
                    required: "Kolom ini harus di isi",
                },
                tanggal_serah_terima_pekerjaan: {
                    required: "Kolom ini harus di isi",
                },
                nilai_kontrak: {
                    required: "Kolom ini harus di isi",
                },
                kategori_pekerjaan: {
                    required: "Kolom ini harus di isi",
                },
                persentase_pekerjaan: {
                    required: "Kolom ini harus di isi",
                },
                uraian_pekerjaan: {
                    required: "Kolom ini harus di isi",
                },
                ruang_lingkup_pekerjaan: {
                    required: "Kolom ini harus di isi",
                },
                alamat: {
                    required: "Kolom ini harus di isi",
                },
                id_negara: {
                    required: "Kolom ini harus di isi",
                },
                id_provinsi: {
                    required: "Kolom ini harus di isi",
                },
                id_kabupaten: {
                    required: "Kolom ini harus di isi",
                },
                nama_instansi: {
                    required: "Kolom ini harus di isi",
                },
                satuan_kerja: {
                    required: "Kolom ini harus di isi",
                },
                alamat_instansi: {
                    required: "Kolom ini harus di isi",
                },
                telp_instansi: {
                    required: "Kolom ini harus di isi",
                },
                file: {
                    required: "File Wajib di Lampirkan",
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
              url: "<?= base_url('penyedia/pengalaman/input/')?>",
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
                        text: "Data Telah Berhasil di input, Lanjutkan Mengisi klasifikasi",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            window.location.href = "<?= base_url('penyedia/pengalaman/vieweditpengalaman/')?>"+data;
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
     
</script>
</body>
</html>