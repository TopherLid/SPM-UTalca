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
    <title>SPM Postulación | Formulario</title>
    
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
            <?php if ($postulaciones==false) :?>
                <div class="col-12" style="padding-top:150px; padding-bottom:150px;">
                    <div class="alert alert-danger" role="alert">
                        <center>
                            <span><i class="fa-solid fa-triangle-exclamation"></i> Usted no posee ningún registro de postulación previo.</span>
                        </center>
                    </div>
                </div>
                
                <?php else : ?>
                    
                    <div class="col-md-12 info_box">
                        <div class="table-responsive">
                            <table id="historial" class="table caption-top table-striped table-hover table-borderedless border-dark">
                                <caption>Historial de postulación:</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Identificador</th>
                                        <th scope="col">Convocatoria</th>
                                        <th scope="col">Programa</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Universidad</th>
                                        <th scope="col">Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $contador=1; foreach($postulaciones as $postulacion): ?>
                                        <tr>
                                            <th>#<?=$contador?></th>
                                            <td><?=$postulacion['ID_POSTULACION']?></td>
                                            <td><?=$postulacion['CONVOCATORIA']?></td>
                                            <td><?=$postulacion['PROGRAMA']?></td>
                                            <td><?=$postulacion['ESTADO']?></td>
                                            <td><?=$postulacion['SELECCION']?></td>
                                            <td>
                                                <a href='<?= base_url();?>/estudiante/historial/<?=$postulacion['ID_POSTULACION'];?>' class='btn btn-primary btn-circle' target="_blank" role='button'>Ver más</a>
                                            </td>
                                        </tr>
                                    <?php $contador++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top: 15px;">
                <a class="btn btn-danger w-100" href="<?= base_url();?>/estudiante/salir" role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div id="footer">
        <center>
                <p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p>
        </center>	
    </div>
</body>
</html>