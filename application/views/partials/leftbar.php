<?php 
$model =& get_instance();
$model->load->model('M_pengalaman');
$model->load->model('M_master');
$role_id=$this->session->userdata('role_id');
$iduser=$this->session->userdata('iduser');

switch ($role_id){
  case '1';
  ?>
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <a href="index3.html" class="brand-link bg-success">
      <img src="<?=base_url('assets/')?>dist/img/logo.png" alt="Logo PDAM" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b><?=APP_NAME?></b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
          <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama');?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url('admin/dashboard')?>" class="nav-link <?php if($this->uri->segment('2')=='dashboard') { echo"active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/notifikasi')?>" class="nav-link <?php if($this->uri->segment('2')=='notifikasi') { echo"active";}?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notifikasi
              </p>
              <?php if($model->M_notifikasi->countnotifadmin()!==0){?>
                <span class="right badge badge-warning"><?php echo $model->M_notifikasi->countnotifadmin(); ?></span>
              <?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/verifakun')?>" class="nav-link <?php if($this->uri->segment('2')=='verifakun') { echo"active";}?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Verifikasi Akun Penyedia
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/datapenyedia')?>" class="nav-link <?php if($this->uri->segment('2')=='datapenyedia') { echo"active";}?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Penyedia
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/kelolaakun')?>" class="nav-link <?php if($this->uri->segment('2')=='kelolaakun') { echo"active";}?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Kelola Akun
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($this->uri->segment('2')=='master') { echo"menu-open";}?>"><a href="#" class="nav-link <?php if($this->uri->segment('2')=='master') { echo"active";}?>"><i class="nav-icon fas fa-database"></i><p>Master <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/bentukusaha'); ?>" class="nav-link <?php if($this->uri->segment('3')=='bentukusaha') { echo"active";}?>"><i class="far fa nav-icon"></i><p>Bentuk Usaha </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/jenisizinusaha'); ?>" class="nav-link <?php if($this->uri->segment('3')=='jenisizinusaha') { echo"active";}?>"><i class="far fa nav-icon"></i><p>Jenis Izin Usaha </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/jenisklasifikasi'); ?>" class="nav-link <?php if($this->uri->segment('3')=='jenisklasifikasi') { echo"active";}?>"><i class="far fa nav-icon"></i><p>Jenis Klasifikasi </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/jenispajak'); ?>" class="nav-link <?php if($this->uri->segment('3')=='jenispajak') { echo"active";}?>" ><i class="far fa nav-icon"></i><p>Jenis Pajak </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/informasi'); ?>" class="nav-link <?php if($this->uri->segment('3')=='informasi') { echo"active";}?>" ><i class="far fa nav-icon"></i><p>Informasi </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/master/tos'); ?>" class="nav-link <?php if($this->uri->segment('3')=='tos') { echo"active";}?>" ><i class="far fa nav-icon"></i><p>TOS(Term Of Use) </p></a></li>
                        </ul>
                    </li>
          <li class="nav-item text-center">
            <a href="#" id="logout" class="btn bg-danger">Log Out <i class="nav-icon fas fa-power-off"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <?php 
  break;
 case '4';
  ?>
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <a href="index3.html" class="brand-link bg-primary">
      <span class="brand-text font-weight-light"><b><?=APP_NAME?></b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
          <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama').'-'.$this->session->userdata('nama_role');?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url('admin/dashboard')?>" class="nav-link <?php if($this->uri->segment('2')=='dashboard') { echo"active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pic/poli')?>" class="nav-link <?php if($this->uri->segment('2')=='poli') { echo"active";}?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Poli
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pic/dokter')?>" class="nav-link <?php if($this->uri->segment('2')=='dokter') { echo"active";}?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Dokter
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pic/user')?>" class="nav-link <?php if($this->uri->segment('2')=='user') { echo"active";}?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pic/laporan_poli')?>" class="nav-link <?php if($this->uri->segment('2')=='laporan_poli') { echo"active";}?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan Poli
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?=base_url('pic/laporan_registrasi')?>" class="nav-link <?php if($this->uri->segment('2')=='laporan_registrasi') { echo"active";}?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan Registrasi
              </p>
            </a>
          </li>
          <li class="nav-item text-center">
            <a href="#" id="logout" class="btn bg-danger">Log Out <i class="nav-icon fas fa-power-off"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <?php 
  break;

   case '2';
  ?>
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <a href="index3.html" class="brand-link bg-primary">
      <img src="<?=base_url('assets/')?>dist/img/logo.png" alt="Logo PDAM" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SIKaP</b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
        <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama');?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url('penyedia/dashboard')?>" class="nav-link <?php if($this->uri->segment('2')=='dashboard') { echo"active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/notifikasi')?>" class="nav-link <?php if($this->uri->segment('2')=='notifikasi') { echo"active";}?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notifikasi
              </p>
              <?php if($model->M_notifikasi->countnotifpenyedia($iduser)!==0){?>
                <span class="right badge badge-warning"><?php echo $model->M_notifikasi->countnotifpenyedia($iduser); ?></span>
              <?php } ?>
            
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/identitaspenyedia')?>" class="nav-link <?php if($this->uri->segment('2')=='identitaspenyedia') { echo"active";}?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Identitas Penyedia
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/izinusaha')?>" class="nav-link <?php if($this->uri->segment('2')=='izinusaha') { echo"active";}?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Izin Usaha
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/akta')?>" class="nav-link <?php if($this->uri->segment('2')=='akta') { echo"active";}?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Akta
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/pemilik')?>" class="nav-link <?php if($this->uri->segment('2')=='pemilik') { echo"active";}?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Pemilik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/pengurus')?>" class="nav-link <?php if($this->uri->segment('2')=='pengurus') { echo"active";}?>">
              <i class="nav-icon fas fa-x-ray"></i>
              <p>
                Pengurus
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/personil')?>" class="nav-link <?php if($this->uri->segment('2')=='personil') { echo"active";}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Personil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/peralatan')?>" class="nav-link <?php if($this->uri->segment('2')=='peralatan') { echo"active";}?>">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Peralatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/pengalaman')?>" class="nav-link <?php if($this->uri->segment('2')=='pengalaman') { echo"active";}?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Pengalaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/pajak')?>" class="nav-link <?php if($this->uri->segment('2')=='pajak') { echo"active";}?>">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Pajak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('penyedia/keuangan')?>" class="nav-link <?php if($this->uri->segment('2')=='keuangan') { echo"active";}?>">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Keuangan
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item text-center">
            <a href="#" id="logout" class="btn bg-danger">Log Out <i class="nav-icon fas fa-power-off"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <?php 
  break;

  default:
  redirect('auth/logout');
}
?>
  

