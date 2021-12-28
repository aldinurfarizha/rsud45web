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
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Informasi</h5>
                  Apabila Data Yang akan di edit status sebelumnya <strong>TERVERIFIKASI</strong> maka statusnya akan berubah menjadi <strong>MENUNGGU VERIFIKASI</strong> jika di lakukan perubahan data
                  
                </div>
                <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-building"></i> Informasi Pelaku Usaha</h3>
                        </div>
                        
                        
                            <div class="card-body">
                                <form id="identitaspenyedia">
                                <div class="row">
                                <div class="form-group col-sm-12"><label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font></div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nama Perusahaan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama_perusahaan" class="form-control" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->nama_perusahaan : null?>">
                                         </div>
                                    
                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat Perusahaan <font color='#ff0000'>*</font></label>
                                        <input type="text" name="alamat_perusahaan" value="<?= isset($identitaspenyedia) ? $identitaspenyedia->alamat_perusahaan : null?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Pilih Bentuk Usaha <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="id_bentuk_usaha">
                                        <?php if(!isset($identitaspenyedia)){?>
                                        <option value='' selected='selected'>Pilih</option>
                                        <?php
                                        }else{?>
                                        <option value="<?= isset($identitaspenyedia) ? $identitaspenyedia->id_bentuk_usaha : null?>" selected="selected" ><?= isset($identitaspenyedia) ? $identitaspenyedia->bentuk_usaha : null?></option>
                                       <?php }
                                        ?>
                                            
                                            <?php foreach($bentukusaha as $bentukusahaa){
                                                ?>
                                            <option value="<?= isset($bentukusahaa) ? $bentukusahaa->id_bentuk_usaha : null?>"><?= isset($bentukusahaa) ? $bentukusahaa->bentuk_usaha : null?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Telepon Selluler <font color='#ff0000'>*</font></label>
                                        <input type="number" name="telepon_selluler" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->telp_seluler:null ?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">No. Telepon <font color='#ff0000'>*</font></label>
                                        <input type="number" name="telepon" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->telp: null?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">Tlp/FAX</label>
                                        <input type="text" name="fax" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->fax : null?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">Alamat Website</label>
                                        <input type="text" name="website" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->website : null?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">No. NPWP <font color='#ff0000'>*</font></label>
                                        <input type="text" name="npwp" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->npwp : null?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">Kode POS <font color='#ff0000'>*</font></label>
                                        <input type="number" name="kode_pos" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->kode_pos : null?>" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                    <label for="">No.Pengukuhan PKP <font color='#ff0000'>*</font></label>
                                        <input type="text" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->no_pengukuhan_pkp : null?>"  name="no_pengukuhan_pkp"class="form-control">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label  >Provinsi <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_provinsi" id="id_provinsi">
                                        <?php if($identitaspenyedia->id_provinsi == 0){?>
                                        <option value='' selected='selected'>Pilih</option>
                                        <?php
                                        }else{?>
                                        <option value="<?= isset($identitaspenyedia) ? $identitaspenyedia->id_provinsi : null?>" selected="selected" ><?= isset($identitaspenyedia) ? $identitaspenyedia->provinsi : null?></option>
                                       <?php }
                                        ?>
                                            <?php foreach($provinsi as $provinsia){
                                                ?>
                                            <option value="<?=$provinsia->id_provinsi?>"><?=$provinsia->provinsi?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label  >Kabupaten <font color='#ff0000'>*</font></label>
                                        <select class="form-control select2" name="id_kabupaten" id="id_kabupaten">
                                        <?php if($identitaspenyedia->id_kabupaten == 0){?>
                                        <option value='' selected='selected'>Pilih Provinsi terlebih dahulu</option>
                                        <?php
                                        }else{?>
                                        <option value="<?= isset($identitaspenyedia) ? $identitaspenyedia->id_kabupaten : null?>" selected="selected" ><?= isset($identitaspenyedia) ? $identitaspenyedia->kabupaten : null?></option>
                                       <?php }
                                        ?>
                                        </select>
                                    </div>

                                   

                                    <div class="form-group col-sm-6">
                                        <label  >Mempunyai Kantor Cabang ? <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="kantor_cabang">
                                        <?php if($identitaspenyedia->kantor_cabang == null){?>
                                        <option value='' selected='selected'>Pilih</option>
                                        <?php
                                        }else{?>
                                        <option value="<?= isset($identitaspenyedia) ? $identitaspenyedia->kantor_cabang : null?>" selected="selected" ><?= isset($identitaspenyedia) ? $identitaspenyedia->kantor_cabang : null?></option>
                                       <?php }
                                        ?>
                                            <option value="YA">YA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label  >Kepemilikan Kantor <font color='#ff0000'>*</font></label>
                                        <select class="form-control" id="kepemilikan" name="kepemilikan">
                                        <?php if($identitaspenyedia->kepemilikan == null){?>
                                        <option value='' selected='selected'>Pilih</option>
                                        <?php
                                        }else{?>
                                        <option value="<?= isset($identitaspenyedia) ? $identitaspenyedia->kepemilikan : null?>" selected="selected" ><?= isset($identitaspenyedia) ? $identitaspenyedia->kepemilikan : null?></option>
                                       <?php }
                                        ?>
                                            <option value="SEWA">SEWA</option>
                                            <option value="SHM">SHM</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Berkas Pendukung <font color='#ff0000'>*</font> <span class='badge badge-warning' id="keteranganfile"><?=@$identitaspenyedia->kepemilikan?></span></label>
                                    <div id="berkas">
                                    <?php if(@$identitaspenyedia->file){?>
                                    <p>Berkas Pendukung Telah di Terima <i class="fa fa-check"></i></p>
                                    <div class="row">
                                    <div class="col-sm-2">
                                    <input type="hidden" name="fileori" class="form-control" value="<?=@$identitaspenyedia->file ?>">
                                    <button type="button" onclick="popup('<?=base_url(BERKAS_KEPEMILIKAN_KANTOR).$identitaspenyedia->file?>')" class="btn btn-sm btn-outline-danger">Lihat Berkas <i class="fa fa-book"></i></b>
                                    </div>
                                    <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-default"><i class="fas fa-sync-alt"></i> Ganti Berkas</button>
                                   
                                    </div>
                                    </div>
                                        
                                      
                                    <?php }else{ ?>
                                    <input type="file" name="file" class="form-control" accept="application/pdf" required>
                                    <?php } ?>
                                    </div>
                                         
                                    </div>
                                        <div class="form-group col-sm-6">
                                        <label for="">Deskripsi Perusahaan </label>
                                            <textarea class="form-control" name="deskripsi" rows="3" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->deskripsi : null?>"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 text-right">
                                        <?php if(isset($identitaspenyedia) && $identitaspenyedia->status_verif == 1) 
                                         { echo "<img src='".base_url('assets/dist/img/dataverified.svg')."'>"; }
                                         else{
                                            if(isset($identitaspenyedia) && $identitaspenyedia->status_verif == 2) {
                                                echo "<img src='".base_url('assets/dist/img/ditolak.svg')."'>";
                                            }
                                            else{
                                                echo "<img src='".base_url('assets/dist/img/unverified.svg')."'>";
                                            }
                                        }?>
                                        </div>
                                </div>
                                <br>
                                        <div class="text-center">
                                        <button type="submit" onclick="inputidentitaspenyedia()" class="btn btn-lg btn-warning"><i class="fas fa-paper-plane"></i> SIMPAN</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Narahubung *</h3>
                        </div>
                            <div class="card-body">
                            <form id="narahubung">
                                <div class="row">
                                
                                        <div class="col-md-4">
                                        <div class="form-group">
                                              <input type="text" class="form-control" name="nama_narahubung" placeholder="Nama Lengkap">
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                              <input type="text" class="form-control" name="email_narahubung" placeholder="Email">
                                              </div>
                                              </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                              <input type="text" class="form-control" name="telepon_narahubung" placeholder="Telepon">
                                              </div>   
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-md btn-primary" onclick="inputnarahubung()">
                                           <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                               </div>
                               </form>
                               <br>
                                <div class="table-responsive">
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($narahubung as $narahubungs){
                                              $no++;
                                              ?>
                                              <tr>
                                              <td><?= $no?></td>
                                              <td><?= $narahubungs->nama?></td>
                                              <td><?= $narahubungs->email?></td>
                                              <td><?= $narahubungs->telepon?></td>
                                              <td style="text-align: center;"><button onclick="hapusnarahubung(<?= $narahubungs->id_narahubung?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title"><i class="fa fa-file-pdf"></i> Ganti Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p>Berkas Sebelumnya Akan di hapus dari Sistem, dan tidak bisa di kembalikan dan status verifikasi akan hilang</p>
            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <input type="hidden" value="<?=isset($identitaspenyedia) ? $identitaspenyedia->id_identitas : null?>"  name="id_identitas"class="form-control">
                                    <label for="">Berkas Baru (PDF)</label>
                                        <input type="hidden" name="filebefore" class="form-control" value="<?=$identitaspenyedia->file ?>">
                                        <input type="file" name="file" class="form-control" accept="application/pdf" required>
                                    </div>
                                </div>
                             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="ganti" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
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
$('#submit').submit(function(e){
     e.preventDefault(); 
     $("#ganti").attr("disabled", true);
          $.ajax({
              url:'<?= base_url('penyedia/identitaspenyedia/gantifile/')?>',
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
                $("#ganti").attr("disabled", false);
                Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              location.reload();
                            });
            }
          },
          );
     });
$('#kepemilikan').on('change', function() {
 var kepemilikan=$(this).find(":selected").val();
 console.log(kepemilikan);
 if(kepemilikan=="SEWA"){
    keterangan="SEWA (Surat Kontrak Sewa)";
 }
 if(kepemilikan=="SHM"){
    keterangan="SERTIFIKAT HAK MILIK";
 }
 if(kepemilikan==""){
    keterangan="Pilih Status Kepemilikan Kantor!";
 }
 $("#keteranganfile").text(keterangan);
 });

        function inputidentitaspenyedia(){
        $('#identitaspenyedia').valid();
        };
        $('#identitaspenyedia').validate({
            rules: {
                nama_perusahaan: {
                    required: true,
                },
                alamat_perusahaan: {
                    required: true,
                },
                id_bentuk_usaha: {
                    required: true,
                },
                telepon_selluler: {
                    required: true,
                },
                telepon: {
                    required: true,
                },
                npwp: {
                    required: true,
                },
                kode_pos: {
                    required: true,
                },
                no_pengukuhan_pkp: {
                    required: true,
                },
                id_kabupaten: {
                    required: true,
                },
                id_provinsi: {
                    required: true,
                },
                kantor_cabang: {
                    required: true,
                },
           
                
               
            },
            messages: {
                nama_perusahaan: {
                    required: "Nama Perusahaan harus diisi",
                },
                alamat_perusahaan: {
                    required: "Alamat Perusahaan harus diisi",
                },
                id_bentuk_usaha: {
                    required: "Pilih Bentuk Usaha",
                },
                telepon_selluler: {
                    required: "Isi Telepon Selluler",
                },
                telepon: {
                    required: "Isi Telepon",
                },
                npwp: {
                    required: "Isi NPWP",
                },
                kode_pos: {
                    required: "Isi Kode Pos",
                },
                no_pengukuhan_pkp: {
                    required: "Isi No Pengukuhan PKP",
                },
                id_kabupaten: {
                    required: "Pilih Kabupaten",
                },
                id_provinsi: {
                    required: "Pilih Provinsi",
                },
                kantor_cabang: {
                    required: "Pilih Jawaban",
                },
                kepemilikan: {
                    required: "Pilih Jawaban",
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
                $("#identitaspenyedia").load("submit", function (e)
            {
                $.ajax({
              url: "<?= base_url('penyedia/identitaspenyedia/input/')?>",
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
                        text: "Data telah berhasil di input",
                        icon: "success",
                        button: "OK",
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


        function inputnarahubung(){
        $("#narahubung").valid();
        };
        $('#narahubung').validate({
            rules: {
                nama_narahubung: {
                    required: true,
                },
                email_narahubung: {
                    required: true,
                    email: true,
                },
                telepon_narahubung: {
                    required: true,
                    minlength: 11,
                    maxlength: 13,
                },
            },
            messages: {
                nama_narahubung: {
                    required: "Nama harus diisi",
                },
                email_narahubung: {
                    required: "Email harus diisi",
                    email: "Format Email tidak sesuai",
                },
                telepon_narahubung: {
                    required: "No. Telepon harus diisi",
                    minlength: "Minimal 11 karakter",
                    maxlength: "Maksimal 13 karakter",
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
              url: "<?= base_url('penyedia/identitaspenyedia/inputnarahubung')?>",
              type: "POST",
              data:$('#narahubung').serialize(), 
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

function hapusnarahubung(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Narahubung ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/identitaspenyedia/hapusnarahubung/')?>"+id;
                }
            });
            
};
</script>
</body>
</html>
