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
                            <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Data Pendaftar Melalui Online</h3>
                        </div>
                            <div class="card-body">
                                        <br>
                                        <table id="table" class="table table-responsive table-sm table-striped table-bordered no-wrap table-hover">
                                        <thead>
                                            <tr class="text-center text-sm">
                                                <th style="min-width:1px">No.</th>
                                                <th style="min-width:72px"><center>Aksi</center></th>
                                                <th>Berkas</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>TMPT LHR</th>
                                                <th>TGL LHR</th>
                                                <th>JK</th>
                                                <th>Alamat</th>
                                                <th>RT</th>
                                                <th>RW</th>
                                                <th>Provinsi</th>
                                                <th>Kabupaten</th>
                                                <th>Kecamatan</th>
                                                <th>No. HP</th>
                                                <th>Pekerjaan</th>
                                                <th>Agama</th>
                                                <th>Pendidikan</th>
                                                <th>Ibu Kandung</th>
                                                <th>Status Matrial</th>
                                                <th>Dibuat</th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $no=0;
                                          foreach($data as $datas){
                                              $no++;
                                              ?>
                                              <tr class="text-sm">
                                              <td><?= $no?></td>
                                              <td style="min-width:150px;" class="text-center">
                                              <button onclick="terima('<?= $datas->id?>','<?= $datas->nama?>')" class="btn btn-sm btn-success">Terima</button>
                                              <button onclick="tolak('<?= $datas->id?>','<?= $datas->nama?>')" class="btn btn-sm btn-danger">Tolak</button>
                                              </td>
                                              <td class="text-center"> <button onclick="popup('<?=base_url(BERKAS).@$datas->file?>')" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></button></td>
                                              <td><?= @$datas->nama?></td>
                                              <td><?= @$datas->nik?></td>
                                              <td><?= @$datas->tmplahir?></td>
                                              <td><?= @$datas->tgllahir?></td>
                                              <td><?= @$datas->kelamin?></td>
                                              <td><?= @$datas->alamat?></td>
                                              <td><?= @$datas->rt?></td>
                                              <td><?= @$datas->rw?></td>
                                              <td><?= @$datas->provinsi?></td>
                                              <td><?= @$datas->kabupaten?></td>
                                              <td><?= @$datas->kecamatan?></td>
                                              <td><?= @$datas->nohp?></td>
                                              <td><?= @$datas->nama_pekerjaan?></td>
                                              <td><?= @$datas->agama?></td>
                                              <td><?= @$datas->nama_pendidikan?></td>
                                              <td><?= @$datas->ibu_kandung?></td>
                                              <td><?= @$datas->status_martial?></td>
                                              <td><?= @$datas->create_by?></td>
                                              </tr>
                                          <?php } ?>
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
<?php $this->load->view('partials/script.php') ?>
<script>
    

$('#table').DataTable({
            });
        function popup(url){
  window.open(url,'popUpWindow','height=800,width=600,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
}
        function terima(id,nama){
            Swal.fire({
                icon: 'question',
                title: 'VERIFIKASI',
                text: 'Anda yakin telah membaca dengan benar data diri dari Pasien atas Nama: '+nama+' ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Terima',
                cancelButtonText: 'Batal'
            }).then(function(data){
                if(data.value === true){
                    $.ajax({
                    url: "<?= base_url('admin_registrasi/terima')?>",
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
                                icon: "success",
                                button: "OKE",
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
function tolak(id,nama){
            Swal.fire({
                icon: 'error',
                title: 'TOLAK',
                text: 'Anda yakin Menolak pendaftaran pasien atas nama : '+nama+' ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Tolak',
                cancelButtonText: 'Batal'
            }).then(function(data){
                    if(data.value === true){
                    Swal.fire({
                    title: 'Alasan Penolakan',
                    input: 'textarea',
                    inputPlaceholder: 'Ketik di sini...',
                    showCancelButton: true
                    }).then(function(text){
                        var alasan=text.value;
                        console.log(alasan);
                        if (!alasan) {
                    Swal.fire('Gagal, Penolakan tanpa alasan tidak bisa di lakukan !')
                    return 
                    }
                        $.ajax({
                                url: "<?= base_url('admin_registrasi/tolak')?>",
                                type:"post",
                                data: {
                                    "id": id,
                                    'alasan_penolakan':alasan
                                },
                                success: function(data){
                                Swal.fire({
                                        title: "Berhasil",
                                        icon: "success",
                                        button: "OKE",
                                        }).then(function() {
                                            location.reload();
                                            });
                            },

                error:function(response){
                    Swal.fire({
                        type: 'error',
                        title: 'Opps!',
                        text: 'Server Dalam Perbaikan'
                    });
                }
                })
                    });
                  
                    }
            });
            
};
</script>
</body>
</html>
