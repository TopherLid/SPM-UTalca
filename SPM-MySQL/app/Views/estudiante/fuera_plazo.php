<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/default.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?php echo base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>
    
    <link href="<?php echo base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/public/fa/js/all.js"></script>
    <title>SPM | Fuera de plazo</title>
    
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
            <center><h2 class="center">Bienvenido/a Estudiante</h2></center>
        </div>

        <div class="row" style="padding-top:15px; padding-bottom:15px">
            <div class="d-flex justify-content-center">
                <img src="/public/img/prohibido.png" alt="">
            </div>
        </div>

        <div class="row" style="padding-top:10px; padding-bottom:10px">
            <center><h2 class="center">Fuera de plazo</h2></center>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <span class="text_box">En estos momentos no es posible realizar una postulación debido a que se encuentra fuera del plazo 
                    estipulado desde la última convocatoria creada, le invitamos a estar atento al email institucional en caso de que se 
                    extienda el plazo o se genere una nueva convocatoria para postular.
                </span>
                <br>
                <br>
                <br>
                <center><span class="text_box">Puedes acceder al historial de postulaciones previas en el botón inferior.</span></center>
            </div>
        </div>

        <div class="row" style="padding-top: 30px; padding-bottom: 30px;">
            <div class="col-md-12">
                <a class="btn btn-outline-primary w-100" href="/estudiante/historial" role="button">Acceder al historial de postulaciones</a>
            </div>
        </div>
    </div>

    <div id="footer">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>

</body>
</html>