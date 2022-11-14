<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>
    
    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>
    <title>SPM Verificación | Correcta</title>
</head>
    
<body>

<div class="container">
        <div class="row">
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo" src="<?= base_url() ?>/public/img/UTalca.png" alt="">
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo_wide" src="<?= base_url() ?>/public/img/RRII.png" alt="">
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo" src="<?= base_url() ?>/public/img/logo_spm.png" alt="">
                </div>
            </div>
            <div class="col-md-12 d-sm-block d-md-none">
                <div class="d-flex justify-content-center">
                    <img class="logo_wide" style="max-width:100%; height:100px;" src="<?php echo base_url() ?>/public/img/banner.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <center><h2 class="center">Bienvenido/a Estudiante</h2></center>
        </div>
        <div class="row">
            <span class="text_box">Felicidades, usted se encuentra habilitado para realizar la postulación al programa de movilidad: <?= $programa['NOMBRE']; ?><br>Verificar si la información suya es correcta, en caso contrario, favor de contactar a soporte@utalca.cl</span>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <center><h4 class="center">Información Académica del Estudiante</h4></center>
        </div>
        <div class="d-grid gap-2">
            <div class="row">
                <label class="col-md-4 control-label" for="nombre">Nombre Estudiante</label> 
                <div clasS="col-md-8">
                    <input class="form-control proh" type="text" name="nombre_estudiante" size="40" readonly="true" value="<?= $postulante['nombre']; ?>">
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label" for="RUT">RUT Estudiante</label>
                <div clasS="col-md-8">
                    <input class="form-control proh" type="number" name="RUT" readonly="true" value='<?= $postulante['RUT']; ?>'>
                </div>
            </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Fecha de Nacimiento</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="text" name="nacimiento" readonly="true" value='<?php 
                    $nacimiento = new DateTime ($postulante['nacimiento']);
                    echo date_format($nacimiento, "d-m-Y"); 
                    ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">N° de matrícula</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="number" name="matricula" size="10" readonly="true" value='<?= $postulante['matricula']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Email Institucional</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="email" name="email_institucional" size="30" readonly="true" value='<?= $postulante['email']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Carrera</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="carrera" name="carrera" size="10" readonly="true" value='<?= $postulante['carrera']; ?>'>
            </div>
        </div>
    </div>

    <div class="container center">
        <div class="row gy-2">
            <div class="col-6">
                <a class="btn btn-primary w-100" href="<?= base_url()?>/estudiante/formulario" role="button"><i class="fa-solid fa-circle-check"></i> Acceder al formulario</a>
            </div>
            <div class="col-6">
                <a class="btn btn-outline-primary w-100" href="<?= base_url()?>/estudiante/historial" role="button"><i class="fa-regular fa-folder-open"></i> Historial de postulación</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top: 15px;">
                <a class="btn btn-danger w-100" href="<?= base_url()?>/estudiante/salir" role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div id="footer">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>

</body>
</html>