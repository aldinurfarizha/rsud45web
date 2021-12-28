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
                    <a href="<?=base_url('penyedia/pengurus')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                            <h3 class="card-title"><i class="fas fa-user-plus"></i> Edit Pengurus</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="">Nama Lengkap<font color='#ff0000'> *</font></label>
                                        <input type="text" name="nama" value="<?=isset($row) ? $row->nama: null?>" class="form-control">
                                        <input type="hidden" name="id_pengurus" value="<?=isset($row) ? $row->id_pengurus: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Kepengurusan<font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="jenis_kepengurusan">
                                        <option value="<?=isset($row) ? $row->jenis_kepengurusan : null?>" selected><?=isset($row) ? $row->jenis_kepengurusan : null?></option>
                                            <option value="Individu WNI">Individu WNI</option>
                                            <option value="Individu WNA">Individu WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Kewarganegaraan<font color='#ff0000'> *</font></label>
                                        <select class="form-control select2" name="id_kewarganegaraan">
                                        <option value="<?=isset($row) ? $row->id_kewarganegaraan : null?>" selected><?=isset($row) ? $row->negara : null?></option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Identitas<font color='#ff0000'> *</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->nomor_identitas: null?>" name="nomor_identitas" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">NPWP<font color='#ff0000'> *</font></label>
                                        <input type="text" name="npwp" value="<?=isset($row) ? $row->npwp: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Alamat<font color='#ff0000'> *</font></label>
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
                                    <div class="form-group col-sm-6">
                                    <label for="">Jabatan<font color='#ff0000'> *</font></label>
                                        <input type="text" name="jabatan" value="<?=isset($row) ? $row->jabatan: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Status<font color='#ff0000'> *</font></label>
                                        <select class="form-control" name="status">
                                        <option value="<?=isset($row) ? $row->status : null?>" selected><?php if(isset($row)) {if($row->status){echo "Aktif";}else{echo "Non Aktif";}} ?></option>
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="NON AKTIF">NON AKTIF</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Menjabat Sejak<font color='#ff0000'> *</font></label>
                                        <input type="date" name="menjabat_sejak" value="<?=isset($row) ? $row->menjabat_sejak: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Menjabat Sampai<font color='#ff0000'> *</font></label>
                                        <input type="date" name="menjabat_sampai" value="<?=isset($row) ? $row->menjabat_sampai: null?>" class="form-control">
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
                <div class="col-sm-3">
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-file"></i> Berkas</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="form-group col-sm-12">
                                <label>KTP</label><br>
                                <img style="width: 150px;" src="<?php 
                                if(@$row->file){
                                    echo base_url(BERKAS_KTP).$row->file;
                                } else{
                                    echo base_url(NOIMAGE);
                                }
                                ?>" alt="KTP">
                                        </div>
                                </div>
                                <br>
                                        <div class="text-center">
                                        <button type="button" class="btn btn-xs btn-outline-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti/Tambahkan File</button><br><br>
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
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti/Tambahkan File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($row) ? $row->id_pengurus : null?>"  name="id_pengurus"class="form-control">
                                    <label for="">Berkas (png, jpeg, jpg)</label>
                                        <input type="hidden" name="filebefore" class="form-control" value="<?=$row->file ?>">
                                        <input type="file" name="file" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="btn_upload" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script>
$('.select2').select2();
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
$('#submit').submit(function(e){
    show();
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/pengurus/gantifile/')?>',
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
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
            }
          });
     });
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
              url: "<?= base_url('penyedia/pengurus/edit/')?>",
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
                            window.location.href = "<?= base_url('penyedia/pengurus/')?>";
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