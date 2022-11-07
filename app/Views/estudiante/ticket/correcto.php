<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>

    <title>SPM Postulación | Correcta</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo" src="<?php echo base_url() ?>/public/img/UTalca.png" alt="">
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo_wide" src="<?php echo base_url() ?>/public/img/RRII.png" alt="">
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="d-flex justify-content-center">
                    <img class="logo" src="<?php echo base_url() ?>/public/img/logo_spm.png" alt="">
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
            <center><h2 class="center">Solicitud #<span style="color:green;"><?=$postulacion['ID_POSTULACION']?></span> realizada correctamente</h2></center>
        </div>
        <div class="row" style="padding-top:15px; padding-bottom:15px">
                <div class="d-flex justify-content-center">
                <img src="/public/img/correcto.png" alt="">
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <center><span>Su postulación ha sido recibida exitosamente, puede descargar una copia como comprobante de la postulación.</span></center>
            </div>
        </div>

        <center><h4 class="center">Información del estudiante registrada</h4></center>

        <div class="row">
            <div class="col-md-6">
                <span>Info estudiante</span><br>
                <ul>
                    <li>Nombre: <?=$postulante['nombre']?></li>
                    <li>RUT: <?=$postulante['RUT']?></li>
                    <li>Nacimiento: <?=$postulante['nacimiento']?></li>
                    <li>SSO: <?=$postulante['id_estudiante']?></li>
                    <li>Email Institucional: <?=$postulante['email']?></li>
                    <li>Carrera: <?=$postulante['carrera']?></li>
                </ul>
            </div>

            <div class="col-md-6">
                <span>Solicitud</span><br>
                <ul>
                    <li>Convocatoria: <?=$postulacion['ID_CONVOCATORIA']?></li>
                    <li>Nacionalidad: <?=$postulacion['NACIONALIDAD']?></li>
                    <li>Teléfono: <?=$postulacion['N_TELEFONO']?></li>
                    <li>Email Personal: <?=$postulacion['EMAIL_PERSONAL']?></li>
                    <li>Nivel Inglés: <?=$postulacion['NIVEL_INGLES']?></li>
                    <li>Segundo Idioma: <?=$idioma['IDIOMA']?></li>
                    <li>1ra selección: <?=$universidad1['NOMBRE']?></li>
                    <li>2da selección: <?=$universidad2['NOMBRE']?></li>
                    <li>3ra selección: <?=$universidad3['NOMBRE']?></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="padding-top: 20px; padding-bottom: 20px;">
                <a href="<?=base_url()?>/estudiante/copia/<?=$postulacion['ID_POSTULACION']?>" target="_blank" class="btn btn-primary btn-circle w-100" role="button"><i class="fa-regular fa-file"></i> Descargar copia en PDF</a>
            </div>
        <div>
    </div>

    <div id="footer">
        <center>
                <p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p>
        </center>	
    </div>

</body>