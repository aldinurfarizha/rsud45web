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
                            <h3 class="card-title"><i class="fas fa-users"></i> Personil</h3>
                        </div>
                            <div class="card-body">
                          
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('penyedia/personil/tambah')?>"class="btn btn-success"><i class="fa fa-plus"></i> Tambah Personil</a>
                                        </div>

                               <br>
                               <p class="text-center text-lg"><i class="fa fa-users"></i> Daftar Personil</p>
                               <?php 
                               $no=1;
                               foreach($data as $datas){
                                   ?>
                               
                               <div class="col-md-12">
                                    <div class="card collapsed-card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-1"><span class='badge badge-primary'><strong class='text-lg'><?=$no?></strong></span></div>
                                        <div class="col-md-2"><i class="fa fa-user"></i> <?=$datas->nama?></p></div>
                                        <div class="col-md-2"><i class="fa fa-phone"></i> <?=$datas->telp?></p></div>
                                        <div class="col-md-3"><i class="fa fa-graduation-cap"></i> <span class='badge badge-info'><strong class='text-md'><?=$datas->type_personil?></strong></span></div>
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
                                            <div class="col-md-4"><p ><i class="fa fa-envelope"></i> <b><?=$datas->email?></b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-globe"></i> <b><?=$datas->website?></b></p></div>
                                            <div class="col-md-4"><p ><i class="fa fa-map-marker"></i> <b><?=$datas->alamat?></b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-globe"></i> <b><?=$datas->negara?></b></p></div>
                                            <div class="col-md-4"><p ><i class="fa fa-clock"></i> Pengalaman Kerja : <b><?=$datas->lama_tahun_pengalaman_kerja?> Tahun</b></p> </div>
                                            <div class="col-md-4"><p> <i class="fa fa-graduation-cap"></i> <?=$datas->pendidikan_akhir?></b></p></div>
                                            <div class="col-md-4"><p > Kabupaten Kota : <b><?=$datas->kabupaten?></b></p> </div>
                                            <div class="col-md-4"><p > No. Identitas : <b><?=$datas->no_identitas?></b></p> </div>
                                            <div class="col-md-4"><p> NPWP : <b><?=$datas->npwp?></b></p></div>
                                            <div class="col-md-4"><p >No. BPJS Kesehatan : <b><?=$datas->no_bpjs_kesehatan?></b></p> </div>
                                            <div class="col-md-4"><p > No. BPJS Ketenagakerjaan : <b><?=$datas->no_bpjs_ketenagakerjaan?></b></p></div>
                                            <div class="col-md-4"><p > Kota Lahir :<b><?=$datas->kabupatenlahir?> </b></p></div>
                                            <div class="col-md-4"><p>Tanggal Lahir :<b><?=$datas->tanggal_lahir?></b></p></div>
                                            <div class="col-md-4"><p><b><?=$datas->jenis_kelamin?></b></p> </div>
                                            <div class="col-md-4"><p > Jenis Tenaga Ahli : <b><?=$datas->jenis_tenaga?></b></p> </div>
                                            <div class="col-md-4"><p> Provinsi : <b><?=$datas->provinsi?></b></p></div>
                                            <div class="col-md-4"><p> Status Kepegawaian : <b><?=$datas->status_kepegawaian ? "Tetap" : "Tidak Tetap"?></b></p></div>
                                            <div class="col-md-4"><p >Profesi Keahlian:<b> <?=$datas->profesi_keahlian?></b></p> </div>
                                           <div class="col-md-6 text-center"><button onclick="hapus(<?=$datas->id_personil?>)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </button></div>
                                           <div class="col-md-6 text-center"><a href="<?=base_url('penyedia/personil/vieweditpersonil/').$datas->id_personil?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></div>
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
    </section>
  </div>
  <?php $this->load->view('partials/footer.php') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php $this->load->view('partials/script.php') ?>
</body>
</html>
<script>
       function hapus(id){
    Swal.fire({
                icon: 'question',
                title: 'Hapus',
                text: 'Anda yakin ingin Menghapus Personil ini ?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Hapus',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('penyedia/personil/hapus/')?>"+id;
                }
            });
            
};
</script>
