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
                            <h3 class="card-title"><i class="fas fa-user-circle"></i> Pemilik</h3>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <button type="butto" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Pemilik
                                    </button>
                                </div>
                                <br>
                                <div class="row">
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
                                        <div class="col-md-2"><i class="fa fa-building"></i> <?=$datas->jenis_kepemilikan?></p></div>
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
                                            <div class="col-md-4"><p > Kewarganegaraan : <?=$datas->negara?></p> </div>
                                            <div class="col-md-4"><p> NPWP : <?=$datas->npwp?></p></div>
                                            <div class="col-md-4"><p >Alamat : <?=$datas->alamat?></p> </div>
                                            <div class="col-md-4"><p > Provinsi : <?=$datas->provinsi?></p></div>
                                            <div class="col-md-4"><p>Kabupaten : <?=$datas->kabupaten?></p></div>
                                            <div class="col-md-4"><p > Saham : <?=$datas->nilai_saham." ".$datas->jenis_saham?></p></div>
                                            <div class="col-md-12"><p>No Identitas : <?=$datas->nomor_identitas?></p></div>
                                           <div class="col-md-6 text-center"><button onclick="hapus(<?=$datas->id_pemilik?>)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </button></div>
                                           <div class="col-md-6 text-center"><a href="<?=base_url('penyedia/pemilik/vieweditpemilik/').$datas->id_pemilik?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></div>
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
              <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Pemilik</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
            <label for="">KETERANGAN !!!</label><br><font color='#ff0000'>Kolom yang bertanda (*) wajib di isi.</font>
            <form id="data">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="">Nama Lengkap <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Kepemilikan <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="jenis_kepemilikan">
                                            <option selected value="">Pilih </option>
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
                                            <option value="" selected>Pilih</option>
                                            <?php foreach($negara as $negaras){
                                                ?>
                                            <option value="<?=$negaras->id_negara?>"><?=$negaras->negara?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Nomor Identitas <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nomor_identitas" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">NPWP <font color='#ff0000'>*</font></label>
                                        <input type="text" name="npwp" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Jenis Saham <font color='#ff0000'>*</font></label>
                                        <select class="form-control" name="jenis_saham">
                                            <option value="" selected>Pilih</option>
                                            <option value="PERSEN">Persen</option>
                                            <option value="LEMBAR">LEMBAR</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label for="">Nilai Saham <font color='#ff0000'>*</font></label>
                                        <input type="text" name="nilai_saham" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label for="">Alamat <font color='#ff0000'>*</font></label>
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
            function tambah(){
        $("#data").valid();
        };
        $('#data').validate({
            rules: {
                nama: {
                    required: true,
                },
                jenis_kepemilikan: {
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
                jenis_saham: {
                    required: true,
                },
                nilai_saham: {
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
            },
            messages: {
                nama: {
                    required: "Wajib di isi",
                },
                jenis_kepemilikan: {
                    required: "Wajib di isi",
                },
                id_kewarganegaraan: {
                    required: "Wajib di isi",
                },
                nomor_identitas: {
                    required: "Wajib di isi",
                },
                npwp: {
                    required: "Wajib di isi",
                },
                jenis_saham: {
                    required: "Wajib di isi",
                },
                nilai_saham: {
                    required: "Wajib di isi",
                },
                alamat: {
                    required: "Wajib di isi",
                },
                id_provinsi: {
                    required: "Wajib di isi",
                },
                id_kabupaten: {
                    required: "Wajib di isi",
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
              url: "<?= base_url('penyedia/pemilik/tambah')?>",
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
        function hapus(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus data Pemilik ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/pemilik/hapus/')?>"+id;
                }
            });
            
};
</script>
</body>
</html>
