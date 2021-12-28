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
                <div class="text-left">
                    <a href="<?=base_url('penyedia/izinusaha')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                            <h3 class="card-title"><i class="fas fa-building"></i> Edit Izin Usaha</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <div class="row">
                                <div class="form-group col-sm-6">
                                        <label>Jenis Izin Usaha <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="id_jenis_izin_usaha" name="id_jenis_izin_usaha">
                                        <option value="<?=isset($row) ? $row->id_jenis_izin_usaha : null?>" selected><?=isset($row) ? $row->jenis_izin_usaha : null?></option>
                                            <?php foreach($jenis_izin_usaha as $a){
                                                ?>
                                            <option value="<?= isset($a) ? $a->id_jenis_izin_usaha : null?>"><?= isset($a) ? $a->jenis_izin_usaha : null?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Surat <font color='#ff0000'>*</font></label>
                                        <input type="hidden" value="<?=isset($row) ? $row->id_izin_usaha : null?>"  name="id_izin_usaha"class="form-control">
                                        <input type="text" value="<?=isset($row) ? $row->nomor_surat : null?>"  name="nomor_surat"class="form-control">
                                    </div>
                                    <div id="kualifikasi" class="form-group col-sm-6">
                                        <label >Kualifikasi <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="kualifikasis" name="kualifikasi">
                                        <option value="<?=isset($row) ? $row->kualifikasi : null?>" selected><?=isset($row) ? $row->kualifikasi : null?></option>
                                            <option value="KECIL">Kecil</option>
                                            <option value="NON KECIL">Non Kecil</option>
                                            <option value="MENENGAH">Menengah</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Instansi Pemberi <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->instansi_pemberi : null?>"  name="instansi_pemberi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Berlaku Sampai <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="berlaku_sampai" name="berlaku_sampai">
                                        <?php if(isset($row) && $row->berlaku_sampai=='SEUMUR HIDUP'){
                                            echo ' <option selected value="1">Seumur Hidup</option>';
                                            echo ' <option value="0">tanggal</option>';
                                        }
                                        else{
                                            echo ' <option selected value="0">Tanggal</option>';
                                            echo ' <option value="1">Seumur Hidup</option>';
                                        }?>
                                        </select>
                                    </div>
                                      <div id="tanggal" class="form-group col-sm-6">
                                        <label >tanggal <font color='#ff0000'>*</font></label>
                                        <input type="date" value="<?=isset($row) ? $row->berlaku_sampai : null?>"  name="tanggal" id="tanggals" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung <font color='#ff0000'>*</font></label>
                                        <input type="text" name="file" value="<?=isset($row) ? $row->file : null?>" class="form-control" accept="application/pdf" readonly>
                                        <div class="row">
                                        <div class="col-sm-10"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti File</button></div>
                                        <div class="col-sm-2"> <a href="<?=base_url(BERKAS_IZINUSAHA).$row->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>
                               
                                        <div class="text-center">
                                        <button type="submit" onclick="edit()" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN PERUBAHAN</button>
                                        </div>
                                </form>
                              
                            </div>
                            
                   
                        </div>
                        <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-building"></i> Kelola Klasifikasi</h3>
                        </div>
                            <div class="card-body">
                                <form id="klasifikasi">
                                <h4>Klasifikasi Bidang Usaha <font color='#ff0000'>*</font></h4>
                                <div class="row">
                                <div class="form-group col-sm-2">
                                <input type="hidden" value="<?=isset($row) ? $row->id_izin_usaha : null?>"  name="id_izin_usaha"class="form-control">
                                        <select name="id_jenis_klasifikasi" id="jenis_klasifikasi" class="form-control select2">
                                            <option value="" selected="selected">Cari</option>
                                            <?php foreach($jenis_klasifikasi as $jenis_klasifikasia){
                                                ?>
                                            <option value="<?= isset($jenis_klasifikasia) ? $jenis_klasifikasia->id_jenis_klasifikasi : null?>"><?= isset($jenis_klasifikasia) ? $jenis_klasifikasia->jenis_klasifikasi : null?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    
                                    <div class="form-group col-sm-9">
                                        <select name="id_deskripsi_klasifikasi" class="form-control select2" id="kualifikasia">
                                        </select>
                                    </div>
                                   
                                    <div class="col-md-1">
                                            <button type="submit" onclick="tambahklasifikasi()" class="btn btn-md btn-primary">
                                           <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                </form>
                                        <div class="table-responsive">
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Klasifikasi</th>
                                                <th>Kode</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th><center>Aksi</center></th>
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
                                              <td><?= $datas->jenis_klasifikasi?></td>
                                              <td><?= $datas->kode?></td>
                                              <td><?= $datas->judul_klasifikasi?></td>
                                              <td><?= $datas->deskripsi_klasifikasi?></td>
                                              <td style="text-align: center;"><button type="button" onclick="hapusklasifikasi(<?= $datas->id_klasifikasi_usaha?>,<?= $row->id_izin_usaha?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($row) ? $row->id_izin_usaha : null?>"  name="id_izin_usaha"class="form-control">
                                    <label for="">Berkas (PDF)</label>
                                        <input type="hidden" name="filebefore" class="form-control" value="<?=$row->file ?>">
                                        <input type="file" name="file" class="form-control" accept="application/pdf" required>
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
var e = document.getElementById("berlaku_sampai");
var strberlakusampai = e.value;
if(strberlakusampai=='1'){
    $("#tanggal").css('visibility', 'hidden');
}
var f = document.getElementById("id_jenis_izin_usaha");
var ids = f.value;
if(ids=='2'){
    $("#kualifikasi").css('visibility', 'hidden');
}
$('#submit').submit(function(e){
    show();
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/izinusaha/gantifile/')?>',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              async:false,
               success: function(data){
                   hide();
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
function hapusklasifikasi(id,idizinusaha){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus data klasifikasi ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/izinusaha/hapus/')?>"+id+"/"+idizinusaha;
                }
            });
            
};

$(document).ready(function(){
    
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
$("#jenis_klasifikasi").change(function(){
    var id_jenis_klasifikasi = $(this).val();

    $.ajax({
        url: '<?= base_url('penyedia/izinusaha/getdeskripsiklasifikasi/')?>'+id_jenis_klasifikasi,
        type: 'post',
        dataType: 'json',
        success:function(response){
            var len = response.length;

            $("#kualifikasia").empty();
            for( var i = 0; i<len; i++){
                var id = response[i]['id_jenis_deskripsi_klasifikasi'];
                var name = response[i]['kode']+' - '+response[i]['judul_klasifikasi']+' ('+response[i]['deskripsi_klasifikasi']+')';
                
                $("#kualifikasia").append("<option value='"+id+"'>"+name+"</option>");

            }
        }
    });
});

});
 $('.select2').select2();
  function tambahklasifikasi(){
      
        $("#klasifikasi").valid();
        };
        $('#klasifikasi').validate({
            rules: {
                id_jenis_klasifikasi: {
                    required: true,
                },
                id_deskripsi_klasifikasi: {
                    required: true,
                },
              
            },
            messages: {
                id_jenis_klasifikasi: {
                    required: "Kolom ini harus di isi",
                },
                id_deskripsi_klasifikasi: {
                    required: "Kolom ini harus di isi",
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
              url: "<?= base_url('penyedia/izinusaha/tambahklasifikasi/')?>",
              type: "POST",
              data:$('#klasifikasi').serialize(), 
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
                        text:'Silahkan Tambah Beberapa jenis klasifikasi apabila di butuhkan.',
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                            location.reload();
                            });
                      break;
                      case '2':
                      Swal.fire({
                        title: "Gagal",
                        text:'Jenis Klasifikasi ini telah di daftarkan pada izin usaha ini ! Silahkan Masukan Jenis klasifikasi yang belum di tambahkan',
                        icon: "error",
                        button: "OK",
                          }).then(function() {
                            location.reload();
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
   
  function edit(){
      
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
                berlaku_sampai: {
                    required: true,
                },
             
            },
            messages: {
                id_jenis_izin_usaha: {
                    required: "Kolom ini harus di isi",
                },
                nomor_surat: {
                    required: "Kolom ini harus di isi",
                },
                instansi_pemberi: {
                    required: "Kolom ini harus di isi",
                },
                berlaku_sampai: {
                    required: "Kolom ini harus di isi",
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
              url: "<?= base_url('penyedia/izinusaha/edit/')?>",
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
                        text:'Jika Belum Silahkan Isi Klasifikasi izin usaha Pada form kelola klasifikasi yang berawarna Biru di bawah',
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                            location.reload();
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