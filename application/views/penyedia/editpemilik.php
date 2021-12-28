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
                    <a href="<?=base_url('penyedia/pemilik')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                            <h3 class="card-title"><i class="fas fa-user-plus"></i> Edit Pemilik</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="">Nama Lengkap<font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama" value="<?=isset($row) ? $row->nama: null?>" class="form-control">
                                        <input type="hidden" name="id_pemilik" value="<?=isset($row) ? $row->id_pemilik: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Kepemilikan<font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="jenis_kepemilikan">
                                        <option value="<?=isset($row) ? $row->jenis_kepemilikan : null?>" selected><?=isset($row) ? $row->jenis_kepemilikan : null?></option>
                                            <option value="Individu WNI">Individu WNI</option>
                                            <option value="Individu WNA">Individu WNA</option>
                                            <option value="Perusahaan Nasional">Perusahaan Nasional</option>
                                            <option value="Perusahaan Asing">Perusahaan Asing</option>
                                            <option value="Pemerintahan">Pemerintahan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kewarganegaraan <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_kewarganegaraan">
                                        <option value="<?=isset($row) ? $row->id_kewarganegaraan : null?>" selected><?=isset($row) ? $row->negara : null?></option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Nomor Identitas <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->nomor_identitas: null?>" name="nomor_identitas" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">NPWP <font color='#ff0000'>*</font></label>
                                        <input type="text" name="npwp" value="<?=isset($row) ? $row->npwp: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Saham <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="jenis_saham">
                                        <option value="<?=isset($row) ? $row->jenis_saham : null?>" selected><?=isset($row) ? $row->jenis_saham : null?></option>
                                            <option value="PERSEN">Persen</option>
                                            <option value="LEMBAR">LEMBAR</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nilai Saham <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->nilai_saham: null?>" name="nilai_saham" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Alamat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="alamat" value="<?=isset($row) ? $row->alamat: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Provinsi <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                        <option value="<?=isset($row) ? $row->id_provinsi : null?>" selected><?=isset($row) ? $row->provinsi: null?></option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kabupaten <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten">
                                        <option value="<?=isset($row) ? $row->id_kabupaten : null?>" selected><?=isset($row) ? $row->kabupaten: null?></option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                        <div class="text-center">
                                        <button type="submit" onclick="edit()" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN</button>
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
        function edit(){
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
              url: "<?= base_url('penyedia/pemilik/edit/')?>",
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
                            window.location.href = "<?= base_url('penyedia/pemilik/')?>";
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