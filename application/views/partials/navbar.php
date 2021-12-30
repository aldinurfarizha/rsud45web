<?php
$model =& get_instance();
$model->load->model('Global_model');
?>
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
     <ul class="navbar-nav ml-auto">
    <li class="nav-item">
         <li class="nav-item d-none d-sm-inline-block">
        <a href="#" style="pointer-events: none;" class="nav-link active"><?php
        if($this->session->userdata('role_id')=="1"){
          $poli_id=$this->session->userdata('poli_id');
          $param=array(
            'poli_id'=>$poli_id
          );
        echo $this->Global_model->getiddetail('poli',$param)->row()->nama_poli;
        }
        ;?></a>
      </li>
      </li>
    </ul>
</nav>