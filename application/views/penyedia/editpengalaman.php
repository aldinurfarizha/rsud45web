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
                    <a href="<?=base_url('penyedia/pengalaman')?>" class="btn btn-lg btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <br>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                </div>
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-graduation-cap"></i> Edit Pengalaman</h3>
                        </div>
                            <div class="card-body">
                                <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Kontrak <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_kontrak" value="<?=isset($row) ? $row->nama_kontrak : null?>" class="form-control">
                                        <input type="hidden" name="id_pengalaman" value="<?=isset($row) ? $row->id_pengalaman : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nomor Kontrak <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->nomor_kontrak: null?>" name="nomor_kontrak"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Durasi Pelaksanaan Mulai <font color='#ff0000'>*</font></label>
                                        <input type="date" value="<?=isset($row) ? $row->durasi_pelaksanaan_mulai: null?>" name="durasi_pelaksanaan_mulai"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Durasi Pelaksanaan Selesai <font color='#ff0000'>*</font></label>
                                        <input type="date" value="<?=isset($row) ? $row->durasi_pelaksanaan_selesai : null?>" name="durasi_pelaksanaan_selesai"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Tanggal Serah Terima Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="date" value="<?=isset($row) ? $row->tanggal_serah_terima_pekerjaan: null?>" name="tanggal_serah_terima_pekerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nilai Kontrak <font color='#ff0000'>*</font></label>
                                        <input type="number" value="<?=isset($row) ? $row->nilai_kontrak : null?>" name="nilai_kontrak"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kategori Pekerjaan <font color='#ff0000'>*</font></label>
                                        
                                        <select class="form-control" name="kategori_pekerjaan">
                                            <option value="<?=isset($row) ? $row->kategori_pekerjaan : null?>" selected><?=isset($row) ? $row->kategori_pekerjaan : null?></option>
                                            <option value="BARANG">Barang</option>
                                            <option value="KONSTRUKSI">Konstruksi</option>
                                            <option value="JASA KONSULTASI (PERORANGAN)">Jasa Konsultasi (Perorangan)</option>
                                            <option value="JASA KONSULTASI BADAN USAHA KONTRUKSI">Jasa Konsultasi Badan Usaha Kontruksi</option>
                                            <option value="JASA KONSULTASI BADAN USAHA NON KONSTRUKSI">Jasa Konsultasi Badan Usaha Non Kontruksi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Persentase Pekerjaan (0-100%) <font color='#ff0000'>*</font></label>
                                    <div class="input-group-prepend"> 
                                    <input type="number" min="1" max="100" value="<?=isset($row) ? $row->persentase_pekerjaan : null?>" name="persentase_pekerjaan"class="form-control">
                                        <span class="input-group-text">% </span>
                                    </div>
                                       
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Uraian Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->uraian_pekerjaan : null?>" name="uraian_pekerjaan"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Ruang Lingkup Pekerjaan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="ruang_lingkup_pekerjaan" value="<?=isset($row) ? $row->ruang_lingkup_pekerjaan : null?>"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat <font color='#ff0000'>*</font></label>
                                        <input type="text" name="alamat" value="<?=isset($row) ? $row->alamat: null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Negara <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_negara">
                                        <option selected value="<?=isset($row) ? $row->id_negara : null?>"><?=isset($row) ? $row->negara : null?></option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Provinsi <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                        <option selected value="<?=isset($row) ? $row->id_provinsi : null?>"><?=isset($row) ? $row->provinsi : null?></option>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label >Kabupaten <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" id="id_kabupaten" name="id_kabupaten">
                                        <option selected value="<?=isset($row) ? $row->id_kabupaten : null?>"><?=isset($row) ? $row->kabupaten : null?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Instanasi <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($row) ? $row->nama_instansi: null?>" name="nama_instansi"class="form-control">
                                    </div>
                                                                       <div class="form-group col-sm-6">
                                    <label for="">Satuan Kerja</label>
                                        <input type="text" value="<?=isset($row) ? $row->satuan_kerja: null?>" name="satuan_kerja" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat Instansi</label>
                                        <input type="text" value="<?=isset($row) ? $row->alamat_instansi: null?>" name="alamat_instansi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Telepon Instansi</label>
                                        <input type="number" value="<?=isset($row) ? $row->telp_instansi: null?>" name="telp_instansi"class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung (SPK) <font color='#ff0000'>*</font></label>
                                        <input type="text" name="file" value="<?=isset($row) ? $row->file : null?>" class="form-control" accept="application/pdf" readonly>
                                        <div class="row">
                                        <div class="col-sm-8"> <button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-refresh"></i> Ganti/Tambahkan Berkas</button></div>
                                        <?php if(isset($row->file)){?>
                                            <div class="col-sm-4"> <a href="<?=base_url(BERKAS_PENGALAMAN).$row->file ?>" class="btn btn-xs btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></a></div>
                                        <?php }else{?>
                                            <div class="col-sm-4"><small class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Berkas ! <br>,Silahkan Tambahkan</small></div>
                                            
                                        <?php } ?>
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
                    </div>
                </div>
      </div>
      <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-building"></i> Kelola Klasifikasi</h3>
                        </div>
                            <div class="card-body">
                                <form id="klasifikasi">
                                <h4>Klasifikasi Bidang Usaha</h4>
                                <div class="row">
                                <div class="form-group col-sm-2">
                                <input type="hidden" value="<?=isset($row) ? $row->id_pengalaman : null?>"  name="id_pengalaman"class="form-control">
                                        <select name="id_jenis_klasifikasi" id="jenis_klasifikasi" class="form-control select2">
                                            <option value="" selected="selected">Cari</option>
                                            <?php foreach($jenis_klasifikasi as $jenis_klasifikasia){
                                                ?>
                                            <option value="<?= isset($jenis_klasifikasia) ? $jenis_klasifikasia->id_jenis_klasifikasi : null?>"><?= isset($jenis_klasifikasia) ? $jenis_klasifikasia->jenis_klasifikasi : null?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    
                                    <div class="form-group col-sm-9">
                                        <select name="id_deskripsi_klasifikasi" class="form-control select2" id="kualifikasi">
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
                                              <td style="text-align: center;"><button type="button" onclick="hapusklasifikasi(<?= $datas->id_pengalaman_klasifikasi?>,<?= $row->id_pengalaman?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
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
                                    <input type="hidden" value="<?=isset($row) ? $row->id_pengalaman : null?>"  name="id_pengalaman"class="form-control">
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
$(document).ready(function(){
$("#jenis_klasifikasi").change(function(){
    var id_jenis_klasifikasi = $(this).val();
    $.ajax({
        url: '<?= base_url('penyedia/izinusaha/getdeskripsiklasifikasi/')?>'+id_jenis_klasifikasi,
        type: 'post',
        dataType: 'json',
        success:function(response){
            var len = response.length;
            $("#kualifikasi").empty();
            for( var i = 0; i<len; i++){
                var id = response[i]['id_jenis_deskripsi_klasifikasi'];
                var name = response[i]['kode']+' - '+response[i]['judul_klasifikasi']+' ('+response[i]['deskripsi_klasifikasi']+')';
                $("#kualifikasi").append("<option value='"+id+"'>"+name+"</option>");
            }
        }
    });
});
});
$('#submit').submit(function(e){
    show();
     e.preventDefault(); 
          $.ajax({
              url:'<?= base_url('penyedia/pengalaman/gantifile/')?>',
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
$('.select2').select2();
 function hapusklasifikasi(id,idpengalaman){
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
                    window.location.href = "<?= base_url('penyedia/pengalaman/hapus/')?>"+id+"/"+idpengalaman;
                }
            });
            
};
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
              $.ajax({
            url: "<?= base_url('penyedia/pengalaman/tambahklasifikasi/')?>",
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
                      text:'Jenis Klasifikasi ini telah di daftarkan pada Pengalaman ini ! Silahkan Masukan Jenis klasifikasi yang belum di tambahkan',
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
                nama_instansi_lainnya: {
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
                nama_instansi_lainya: {
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
              url: "<?= base_url('penyedia/pengalaman/edit/')?>",
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
                        text:'Jika Belum Silahkan Isi Klasifikasi izin usaha Pada form kelola klasifikasi yang berawarna Biru di bawah',
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