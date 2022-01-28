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
                                    <input type="hidden" value="<?= base_url('admin_poli/display/')?>"id="url">
                                    <input type="hidden" value ="<?php echo date('Y-m-d') ?>" id="tanggals">
                                </div>
                               <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="text-sm">Poli</label>
                                        <select class="form-control form-control-sm select2" id="filter_poli_id" name="filter_poli_id">
                                        <option selected value="">--Semua--</option>
                                            <?php foreach($poli as $polis){
                                                ?>
                                            <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                            <?php } ?>
                                        </select>
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
                                    <label class="text-sm">Tipe Registrasi</label>
                                        <select class="form-control form-control-sm" name="filter_ditambahkan" id="filter_ditambahkan">
                                        <option value="">--Semua--</option>
                                        <option value="1">Online</option>
                                        <option value="0">Offline</option>
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
                                                <th>Poli</th>
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
              <h4 class="modal-title"><i class="fa fa-money-bill-alt"></i> Daftarkan Pasien Ke Poli</h4>
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
                                    <label class="text-sm">Poli</label>
                                    <select class="form-control form-control-sm select2" id="poli_id" name="poli_id">
                                        <option selected value="">--Pilih Poli--</option>
                                            <?php foreach($poli as $polis){
                                                ?>
                                            <option value="<?=$polis->poli_id?>"><?=$polis->nama_poli?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                       <div class="form-group col-sm-12">
                                    <label class="text-sm">Dokter</label>
                                    <select class="form-control form-control-sm select2" disabled name="dokter_id" id="dokter_id">
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
                                        <input type="date" class="form-control form-control-sm"  name="tgl_periksa" id="tgl_periksa">
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
                                    <label class="text-sm">No Rm - Nama Pasien - Alamat</label>
                                    <input type="hidden" class="form-control" id="ids" name="ids">
                                    <select class="form-control form-control-sm select2 " name="no_rms" id="no_rms">
                                            <?php foreach($pasien as $pasiens){
                                                ?>
                                            <option value="<?=$pasiens->no_rm?>"><?=$pasiens->no_rm.' - '.$pasiens->nama.' - '.$pasiens->alamat?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                       <div class="form-group col-sm-12">
                                    <label class="text-sm">Dokter</label>
                                    <select class="form-control form-control-sm select2" name="dokter_ids" id="dokter_ids">
                                            <?php foreach($dokter as $dokters){
                                                ?>
                                            <option value="<?=$dokters->user_id?>"><?=$dokters->nama?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label class="text-sm">Cara Bayar</label>
                                        <select class="form-control form-control-sm" name="cara_bayars" id="cara_bayars">
                                            <option value="KREDIT">KREDIT</option>
                                            <option value="CASH">CASH</option>
                                            <option value="TRANSFER">TRANSFER</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label class="text-sm">Tipe Pelayanan</label>
                                        <select class="form-control form-control-sm" name="tipe_pelayanans" id="tipe_pelayanans">
                                            <option value="REGULER">REGULER</option>
                                            <option value="VIP">VIP</option>
                                            <option value="SUPER VIP">SUPER VIP</option>
                                        </select>
                                    </div>
                                     <div class="col-sm-12">
                                    <label class="text-sm">Tanggal Periksa</label>
                                        <input type="date" class="form-control form-control-sm" name="tgl_periksas" id="tgl_periksas" readonly>
                                        </input>
                                    </div>
                                     <div class="col-sm-12">
                                    <label class="text-sm">Cara Kunjungan</label>
                                        <select class="form-control form-control-sm" name="cara_kunjungans" id="cara_kunjungans">
                                            <option value="MANDIRI">MANDIRI</option>
                                            <option value="DI JEMPUT">DI JEMPUT</option>
                                        </select>
                                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" id="btn_edit" onclick="doedit()" class="btn btn-primary">Edit</button>
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
 $("#poli_id").change(function(){
    $("#dokter_id").attr("disabled", false);
    var dokter_id = $(this).val();
    $.ajax({
        url: '<?= base_url('admin_registrasi/getdokter/')?>'+dokter_id,
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
                Swal.fire({
                title: 'Mohon Tunggu',
                html: loadingeffect,
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                });
            },
        success:function(response){
            Swal.close();
            var len = response.length;
            $("#dokter_id").empty();
            $("#dokter_id").append("<option value=''>--Pilih Dokter--</option>");
            for( var i = 0; i<len; i++){
                var id = response[i]['user_id'];
                var name = response[i]['nama'];
                $("#dokter_id").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });
function cetak(no_antrian, nama_pasien, nama_poli){
    html='<html><center><h3>'+nama_poli+'</h3><h3>No Antrian:</h3><h1>'+no_antrian+'</h1><h3>'+nama_pasien+'</h3><p><?=date('Y-m-d')?></p></center></html>';
    var printContents = html;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
   }
 function load(){
    $('#table').show();
    $('#informasi').hide();
    $('#nodata').hide();
    $('#table').DataTable().destroy(); $('#data').html('');
    var filter_poli_id = $('#filter_poli_id').val();
    var filter_status = $('#filter_status').val();
    var filter_tanggal = $('#filter_tanggal').val();
    var filter_ditambahkan = $('#filter_ditambahkan').val();
    $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url('admin_registrasi/load_antrian')?>',
                async : false,
                data:{
                    "poli_id":filter_poli_id,
                    "status":filter_status,
                    "tanggal_periksa":filter_tanggal,
                    "tipe_registrasi":filter_ditambahkan,
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
                        button='';
                        switch(data[i].status){
                                case "1":
                                 status='<span class="badge badge-primary">Check In</span>';
                                 button='<div class="btn-group"><button type="button" class="btn btn-sm bg-gray dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>'+
                                            '<div class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="#" onclick="cetak(\'' +data[i].antrian_no+ '\',\'' +data[i].nama_pasien+ '\',\'' +data[i].nama_poli+ '\')">Cetak</a>'+
                                            '</div></div>';
                                 break;

                        }
                        html += '<tr class"text-sm">'+
                                '<td class="text-center">'+data[i].antrian_no+'</td>'+
                                '<td class="text-center">'+
                                button+
                                '</td>'+
                                '<td>'+data[i].nama_pasien+'</td>'+
                                '<td class="text-center">'+status+'</td>'+
                                '<td class="text-center">'+data[i].nama_poli+'</td>'+
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
                poli_id: {
                    required:true,
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
               success: function(response){
                switch(response){
                     case '400':
                        $("#add").attr("disabled", false);
                        Swal.fire({
                        title: "Gagal",
                        text: "Daftar Pasien pada tanggal tersebut penuh!",
                        icon: "error",
                        button: "OK",
                          })
                    
                        break;
                        case '300':
                    $("#add").attr("disabled", false);
                        Swal.fire({
                      title: "Gagal",
                        text: "Pasien Sudah Terdaftar pada tanggal Tersebut !",
                        icon: "error",
                        button: "Lanjut",
                          });
                        break;
                     default:
                    $("#add").attr("disabled", false);
                    $('#inputform').trigger("reset");
                    $('#modal-default').modal('hide');
                        Swal.fire({
                        title: "Berhasil",
                        text: "Data Telah Berhasil di input",
                        icon: "success",
                        button: "Lanjut",
                          }).then(function() {
                              
                            cetak();
                            load();
                            });
                        break;
                }

                
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
</script>
</body>
</html>
