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
    <a href="index3.html" class="brand-link text-center bg-primary">
      <span class="brand-text font-weight-light"><b><?=APP_NAME?></b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
          <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama');?></a>
          <span class="badge badge-success"><?=$this->session->userdata('nama_role')?></span>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url('admin_poli/dashboard')?>" class="nav-link <?php if($this->uri->segment('2')=='dashboard') { echo"active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin_poli/daftar_pasien')?>" class="nav-link <?php if($this->uri->segment('2')=='poli') { echo"active";}?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Daftar Pasien
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
 case '4';
  ?>
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <a href="index3.html" class="brand-link text-center bg-primary">
      <span class="brand-text font-weight-light"><b><?=APP_NAME?></b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
          <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama');?></a>
          <span class="badge badge-success"><?=$this->session->userdata('nama_role')?></span>
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
    <a href="index3.html" class="brand-link text-center bg-primary">
      <span class="brand-text font-weight-light"><b><?=APP_NAME?></b></span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info ">
          <a href="#" class="d-block text-lg"><?=$this->session->userdata('nama');?></a>
          <span class="badge badge-success"><?=$this->session->userdata('nama_role')?></span>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url('admin_registrasi/dashboard')?>" class="nav-link <?php if($this->uri->segment('2')=='dashboard') { echo"active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin_registrasi/data_pasien')?>" class="nav-link <?php if($this->uri->segment('2')=='data_pasien') { echo"active";}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin_registrasi/verifikasi_online')?>" class="nav-link <?php if($this->uri->segment('2')=='verifikasi_online') { echo"active";}?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Verifikasi Register Online
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

  default:
  redirect('auth/logout');
}
?>
  

