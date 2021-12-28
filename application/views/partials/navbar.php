<nav class="main-header navbar navbar-expand navbar-<?php
$role=$this->session->userdata('role');
if($role=='1'){
  echo 'success';
}else{
  echo 'primary';
}
?> navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>  
    </ul>
  </nav>