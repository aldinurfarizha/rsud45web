<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Daftar Poli</h3>
                        </div>
                            <div class="card-body">
                            <form id="inputform">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label class="text-sm">No Rm</label>
                                        <input class="form-control form-control-sm" readonly value=<?=$row->no_rm?> name="no_rm">
                                    </div>
                                    <div class="form-group col-sm-12">
                                    <label class="text-sm">Nama</label>
                                        <input class="form-control form-control-sm" readonly value=<?=$row->nama?> >
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
                                    <select class="form-control form-control-sm" disabled id="dokter_id" name="dokter_id">
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
              <button type="submit" id="add" onclick="input()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
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
<script>
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
$('#table').DataTable({
            });
        function input(){
        $("#inputform").valid();
        };
        $('#inputform').validate({
            rules: {
                nama: {
                    required: true,
                },
                poli_id: {
                    required: true,
                },
                dokter_id: {
                    required: true,
                },
                cara_bayar: {
                    required: true,
                },
                tipe_pelayanan: {
                    required: true,
                },
                cara_bayar: {
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
              dataType: 'json',
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
                $("#add").attr("disabled", false);
                $('#inputform').trigger("reset");
                cetak(response[0]['antrian_no'], response[0]['nama_pasien'], response[0]['nama_poli']);
                window.location.href = "<?= base_url('admin_registrasi/daftar_poli_new/')?>";
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
        function cetak(no_antrian, nama_pasien, nama_poli){
    html='<html><center><h3>'+nama_poli+'</h3><h3>No Antrian:</h3><h1>'+no_antrian+'</h1><h3>'+nama_pasien+'</h3><p><?=date('Y-m-d')?></p></center></html>';
    var printContents = html;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
   }
</script>
</body>
</html>
