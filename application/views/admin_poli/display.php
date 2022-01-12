<?php
$model =& get_instance();
$model->load->model('Global_model');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div {
        width: 500px;
        padding: 10px;
        border: 5px solid white;
        margin: 0;
        }
        .blink {
        animation: blink 1s steps(1, end) 3;
        }

        @keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

    </style>
    </style>
    <title>ANTRIAN</title>
</head>
<body  class="blink" style="background-color:aquamarine">
    <center>
        <h1><?=APP_NAME?></h1>
        <h1><?php
        if($this->session->userdata('role_id')=="1"){
          $poli_id=$this->session->userdata('poli_id');
          $param=array(
            'poli_id'=>$poli_id
          );
        echo $this->Global_model->getiddetail('poli',$param)->row()->nama_poli;
        }
        ;?></h1>
        <div>
            <h1>No Antrian:<h1><?=$no_antrian?></h1></h1>
            <h1><?=$nama_pasien?></h1>
        </div>
    </center>
</body>
</html>