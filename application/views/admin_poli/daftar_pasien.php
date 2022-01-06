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
                <div class="col-sm-6">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fa fa-search"></i> Filter Data</h3>
                            <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-end">
                                     <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Tambah Pasien
                                    </button>
                                </div>
                               <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="text-sm">No RM</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control form-control-sm" name="filter_no_rm" id="filter_no_rm">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm">Status</label>
                                        <select class="form-control form-control-sm" name="filter_status" id="filter_status">
                                        <option value="">--Semua--</option>
                                        <option value="0">Belum Check IN</option>
                                        <option value="1">Check IN</option>
                                        <option value="2">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label class="text-sm">Tanggal Periksa</label>
                                        <input type="date" class="form-control form-control-sm" value ="<?php echo date('Y-m-d') ?>" name="filter_tanggal" id="filter_tanggal">
                                    </div>
                                     <div class="form-group col-sm-6">
                                    <label class="text-sm">Di Tambahkan</label>
                                        <select class="form-control form-control-sm" name="filter_ditambahkan" id="filter_ditambahkan">
                                        <option value="">--Semua--</option>
                                        <option value="ONLINE">Online</option>
                                        <option value="a">Offline</option>
                                        </select>
                                    </div>
                               </div>
                                    <div class="row justify-content-center">
                                    <Button class="btn btn-primary btn-sm" onclick="load()"><i class="fa fa-search"></i> Tampilkan</Button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-12">
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Daftar Pasien</h3>
                        </div>
                            <div class="card-body">
                                 <div id="loading"></div>
                                        <div id="nodata" class="text-center">-Tidak ada Data-</div>
                                        <div id="informasi" class="text-center">-Click Tampilkan Di Atas-</div>
                                        <table id="table" style="display:none; min-width:100%" class="table table-sm table-striped table-bordered no-wrap table-hover">
                                        <thead>
                                            <tr class="text-center text-sm">
                                                <th>No. Antrian</th>
                                                <th>Aksi</th>
                                                <th style="min-width: 200px;">Pasien</th>
                                                <th>Status</th>
                                                <th>Dokter</th>
                                                <th>Cara Bayar</th>
                                                <th>Tipe Pelayanan</th>
                                                <th>Tgl Periksa</th>
                                                <th>Cara Kunjungan</th>
                                                <th>Oleh</th>
                                                <th>Tgl Input</th>
                                            </tr>
                                        </thead>
                                         <tbody id="data">
                                        </tbody>
                                    </table>
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
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Tambah Antrian Pasien</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="inputform">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label class="text-sm">No Rm - Nama Pasien - Alamat</label>
                                    <select class="form-control form-control-sm select2 " name="no_rm">
                                        <option selected value="">Ketik / Pilih</option>
                                            <?php foreach($pasien as $pasiens){
                                                ?>
                                            <option value="<?=$pasiens->no_rm?>"><?=$pasiens->no_rm.' - '.$pasiens->nama.' - '.$pasiens->alamat?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                       <div class="form-group col-sm-12">
                                    <label class="text-sm">Dokter</label>
                                    <select class="form-control form-control-sm select2" name="dokter_id">
                                        <option selected value="">Ketik / Pilih</option>
                                            <?php foreach($dokter as $dokters){
                                                ?>
                                            <option value="<?=$dokters->user_id?>"><?=$dokters->nama?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label class="text-sm">Cara Bayar</label>
                                        <select class="form-control form-control-sm" name="cara_bayar" id="cara_bayar">
                                            <option value="">--Pilih Cara Bayar--</option>
                                            <option value="KREDIT">KREDIT</option>
                                            <option value="CASH">CASH</option>
                                            <option value="TRANSFER">TRANSFER</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label class="text-sm">Tipe Pelayanan</label>
                                        <select class="form-control form-control-sm" name="tipe_pelayanan" id="tipe_pelayanan">
                                            <option value="">--Pilih Tipe Pelayanan--</option>
                                            <option value="REGULER">REGULER</option>
                                            <option value="VIP">VIP</option>
                                            <option value="SUPER VIP">SUPER VIP</option>
                                        </select>
                                    </div>
                                     <div class="col-sm-12">
                                    <label class="text-sm">Tanggal Periksa</label>
                                        <input type="date" class="form-control form-control-sm" name="tgl_periksa" id="tgl_periksa">
                                        </input>
                                    </div>
                                     <div class="col-sm-12">
                                    <label class="text-sm">Cara Kunjungan</label>
                                        <select class="form-control form-control-sm" name="cara_kunjungan" id="cara_kunjungan">
                                            <option value="">--Pilih Cara Kunjungan--</option>
                                            <option value="MANDIRI">MANDIRI</option>
                                            <option value="DI JEMPUT">DI JEMPUT</option>
                                        </select>
                                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="add" onclick="input()" class="btn btn-primary">Tambah</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editform">
                <div class="modal-header bg-success">
                <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
            
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                        <label for="">Nama Poli</label>
                                            <input type="hidden" id="id" name="id" class="form-control" required>
                                            <input type="text" id="nama_polis" name="nama_polis" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                        <label for="">Maximal Pelayanan</label>
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="maxs" name="maxs" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                        <label for="">Status</label>
                                            <select name="statuss" id="statuss" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" onclick="doedit()" class="btn btn-primary">Edit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
<?php $this->load->view('partials/script.php') ?>
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script>
$('.select2').select2();
$('#loading').html(loadingeffect);
$('#loading').hide();
$('#nodata').hide();
 function load(){
    $('#table').show();
    $('#informasi').hide();
    $('#nodata').hide();
    $('#table').DataTable().destroy(); $('#data').html('');
    var filter_no_rm = $('#filter_no_rm').val();
    var filter_status = $('#filter_status').val();
    var filter_tanggal = $('#filter_tanggal').val();
    var filter_ditambahkan = $('#filter_ditambahkan').val();
    $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url('admin_poli/load_antrian')?>',
                async : false,
                data:{
                    "no_rm":filter_no_rm,
                    "status":filter_status,
                    "tanggal_periksa":filter_tanggal,
                    "ditambahkan_oleh":filter_ditambahkan,
                  },
                dataType : 'json',
                beforeSend: function () {
                    Pace.restart();
                    $('#loading').show();
                },
                success : function(data){
                  $('#loading').hide();
                    var html = '';
                    var i;
                    var no=0;
                    var status;
                    if(data.length===0){
                      $('#nodata').show();
                      $('#table').hide();
                      return;
                    }
                    for(i=0; i<data.length; i++){
                        no++;
                        status='';
                        switch(data[i].status){
                                case "1":
                                 status='<span class="badge badge-primary">Check In</span>';
                                 break;
                                 case "2":
                                 status='<span class="badge badge-success">SELESAI</span>';
                                 break;
                                 default:
                                     status='<span class="badge badge-secondary">Belum Check In</span>';
                                     break;

                        }
                        html += '<tr class"text-sm">'+
                                '<td class="text-center">'+no+'</td>'+
                                '<td class="text-center"><div class="btn-group"><button type="button" class="btn btn-sm bg-gray dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>'+
                                '<div class="dropdown-menu"><a class="dropdown-item" href="<?=base_url("admin/kependudukan/editpenduduk/")?>'+data[i].registrasi_id+'">Edit</a><a class="dropdown-item" href="#" onclick="hapus('+data[i].registrasi_id+')">Hapus</a></div></div></td>'+
                                '<td>'+data[i].nama_pasien+'</td>'+
                                '<td class="text-center">'+status+'</td>'+
                                '<td>'+data[i].nama_dokter+'</td>'+
                                '<td>'+data[i].cara_bayar+'</td>'+
                                '<td>'+data[i].tipe_pelayanan+'</td>'+
                                '<td>'+data[i].tanggal_periksa+'</td>'+
                                '<td>'+data[i].cara_kunjungan+'</td>'+
                                '<td>'+data[i].ditambahkan_oleh+'</td>'+
                                '<td>'+data[i].tanggal_input+'</td>'+
                                '</tr>';
                    }
                    $('#table').show();
                    $('#data').html(html);
                    $('#table').DataTable({
                    "scrollX": true,
                    searching: false,
                    dom: 'Bfrtip',

                            });
                                }
 
            });
   }
        function input(){
        $("#inputform").valid();
        };
        $('#inputform').validate({
            rules: {
                no_rm: {
                    required: true,
                },
                dokter_id: {
                    required: true
                },

                cara_bayar: {
                    required: true,
                },

                tipe_pelayanan: {
                    required: true,
                },

                tgl_periksa: {
                    required: true,
                },

                 cara_kunjungan: {
                    required: true,
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
              url: "<?= base_url('admin_poli/input_pasien')?>",
              type:"post",
              data:$('#inputform').serialize(), 
              beforeSend: function () {
                  $("#add").attr("disabled", true);
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
                $('#inputform').trigger("reset");
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
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
               
                }
            
        });
        function edit(id,nama_poli, max, status){
        var strstatus;
        if(status){strstatus='Aktif'}else{strstatus='Tidak Aktif'};
        $('#id').val(id);
        $('#nama_polis').val(nama_poli);
        $('#maxs').val(max);
        $('#statuss').empty();
        $('#statuss').append('<option selected value="'+status+'">'+strstatus+'</option>');
        $('#statuss').append('<option value="1">Aktif</option>');
        $('#statuss').append('<option value="0">Tidak Aktif</option>');
    }
    function doedit(){
        $("#editform").valid();
        };
        $('#editform').validate({
            rules: {
                nama_polis: {
                    required: true,
                },
                maxs: {
                    required: true,
                    digits:true
                },

                statuss: {
                    required: true,
                },
            },
            messages: {
                nama_polis: {
                    required: "Wajib di Pilih",
                },
                maxs: {
                    digits: "Isi dengan angka",
                    required: "Wajib di isi",
                },
                
                statuss: {
                    required: "Wajib di pilih",
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
              url: "<?= base_url('pic/editpoli')?>",
              type:"post",
              data:$('#editform').serialize(), 
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
                $('#editform').trigger("reset");
                Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di edit",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                            location.reload();
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
               
                }
            
        });
        function hapus(id){
            Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Poli ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
                    url: "<?= base_url('pic/deletepoli')?>",
                    type:"post",
                    data: {
                        "id": id,
                    },
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
                                text: "Data Telah di hapus",
                                icon: "success",
                                button: "Lanjut",
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
                }
            });
            
};
</script>
</body>
</html>
