<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Convocatoria #<?= $convocatoria['ID_CONVOCATORIA'] ?></title>

    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>
</head>

<body style="background-color: #E4DCCF;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>/admin">
                <img src="<?= base_url() ?>/public/ico/u-logo-white.png" alt="" width="30" height="30" class="d-inline-block align-text-top"> SPM UTalca
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin"><i class="fa-solid fa-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/admin/convocatorias"><i class="fa-solid fa-calendar-check"></i> Convocatorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/programas"><i class="fa-solid fa-address-book"></i> Programas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/universidades"><i class="fa-solid fa-building-columns"></i> Universidades</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/postulantes"><i class="fa-solid fa-people-group"></i> Postulantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/formulario"><i class="fa-solid fa-list-ul"></i> Formulario</a>
                    </li>  
                    <li class="nav-item d-block d-sm-none">
                        <div class="div-line">
                        </div>
                    </li>
                    <li class="nav-item d-block d-sm-none">
                        <span class="nav_mobile nav-link"><i class="fa-solid fa-user"></i> <?=$usuario['nombre']?></span> <a class="nav-link" href="<?= base_url() ?>/admin/salir"><i class="fa-solid fa-right-to-bracket"></i> Salir</a>
                    </li>      
                </ul>
            </div>
            <div class="d-none d-sm-block">
                <div class="dropdown">
                    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><i class="fa-solid fa-user"></i> <?=$usuario['nombre']?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="<?= base_url() ?>/admin/salir"><i class="fa-solid fa-right-to-bracket"></i> Salir</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">

        <?php if(isset($_SESSION['status'])):?>
    
            <div class="row" style="padding-top:25px;">
                <div class="alert <?= $_SESSION['status_action'];?> alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['status_alert'];?></strong> <?=$_SESSION['status']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
    
            <?php unset($_SESSION['status']);?>
            <?php unset($_SESSION['status_action']);?>
            <?php unset($_SESSION['status_alert']);?>
    
        <?php endif;?>
        
        <center><h2 class="center">Convocatoria #<span style="color:green;"><?=$convocatoria['ID_CONVOCATORIA']?></span></h2></center>

            <div class="row">
                <label class="col-md-5 control-label">Nombre de la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$convocatoria['NOMBRE'] ?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label">Programa de la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$programa['NOMBRE'] ?>" required>
                </div>
            </div>
            
            <div class="row">
                <label class="col-md-5 control-label">Fecha de inicio de la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="date" readonly="true" value="<?=$convocatoria['FECHA_INICIO'] ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="col-md-5 control-label">Fecha de finalización de la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="date" readonly="true" value="<?=$convocatoria['FECHA_FIN'] ?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label">Estado de la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$convocatoria['ESTADO'] ?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label" for="ramos_reprobados">Ramos reprobados máximos</label>
                <div clasS="col-md-7">
                    <input class="form-control" type="number" id="ramos_reprobados" name="ramos_reprobados" value="<?=$convocatoria['RAMOS_REPROBADOS']?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label">Mínimo de créditos para la postulación a la convocatoria</label>
                <div class="col-md-7">
                    <input class="form-control" type="number" readonly="true" value="<?=$convocatoria['MIN_CREDITO_SCT'] ?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label">Máximo de créditos para la postulación a la convocatoria (en %)</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$convocatoria['MAX_CREDITO_SCT'] ?> %" required>
                </div>
            </div>
        
            <div class="row">
                <label class="col-md-5 control-label">Programa asociado</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$programa['NOMBRE'] ?>" required>
                </div>
            </div>

            <div class="row">
                <label class="col-md-5 control-label">¿Se ha realizado la notificación a los postulantes?</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" readonly="true" value="<?=$convocatoria['NOTIFICACION'] ?>" required>
                </div>
            </div>

            <br>
            <br>

            <br>
                <?php if($pregunta_asignada==false):?>

                    <div class="row">
                        <center><h2>Preguntas adicionales</h2></center>
                        <br><br><br><br>
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                <center><h4><i class="fa-solid fa-triangle-exclamation"></i> La convocatoria actual no posee preguntas adicionales para el formulario.</h4></center>
                            </div>
                        </div>

                    </div>
            
                <?php else : ?>

                    <div class="row">
                        <center><h2>Preguntas adicionales</h2></center>
                        <br><br><br><br>


                        <?php foreach ($pregunta_asignada as $pa) : ?>

                            <div class="alert alert-dark col-6" role="alert">
                                <center> <span>Pregunta: <?=$pa['NOMBRE']?> - Tipo: <?=$pa['TIPO']?></span></center>
                            </div>



                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>



            <br>
            <br>

            <?php if($convocatoria['ESTADO']=="Próximamente"):?>

                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#modificarModal">Modificar formulario para la convocatoria</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar convocatoria</button>
                    </div>
                </div>

                <div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="modificarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modificarModalLabel">Modificar preguntas adicionales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url() ?>/admin/convocatoria/modificarformulario" method="post" accept-charset="utf-8">
                    <input class="form-control" id="id_conv" readonly="true" type="hidden" name="id_conv" value="<?=$convocatoria['ID_CONVOCATORIA']?>">
                    <div class="modal-body">
                        <div class="container">

                            <?php if ($preguntas==false): ?>
                            
                                <div class="row">
                                    <div class="alert alert-danger" role="alert">
                                        <center>No existen preguntas creadas.</center>
                                    </div>
                                </div>

                            <?php else: ?>

                                <div class="row row-cols-4 gy-4"> 
                                    <?php foreach ($preguntas as $pregunta): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name='pregunta[]' value="<?=$pregunta['ID_PREGUNTA']?>" id="<?=$pregunta['TITULO_PREGUNTA']?>">
                                            <label class="form-check-label" for="<?=$pregunta['TITULO_PREGUNTA']?>"><?=$pregunta['TITULO_PREGUNTA']?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Modificar</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>

                <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarModalLabel2">Eliminar Convocatoria #<?=$convocatoria['ID_CONVOCATORIA']?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url() ?>/admin/convocatoria/eliminar" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input class="form-control" id="id_conv" readonly="true" type="hidden" name="id_conv" value="<?=$convocatoria['ID_CONVOCATORIA']?>">
                    <div class="modal-body">
                        ¿Está seguro de que desea eliminar "<?=$convocatoria['NOMBRE_CONVOCATORIA'] ?>"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
            <?php else:?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <center>
                                <h4 class="alert-heading"><i class="fa-solid fa-triangle-exclamation"></i> Estado de la convocatoria modificado</h4>
                            </center>
                            <hr>
                            <center>
                                <p>El estado de la convocatoria ha cambiado, no puede ser modificado el formulario asociado ni ser eliminada.</p>
                            </center>
                        </div>

                    </div>
                </div>

            <?php endif;?>
    </div>

    <div id="footer" style="padding-top: 150px; padding-bottom:50px; background-color: #E4DCCF;">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>

</body>
</html>