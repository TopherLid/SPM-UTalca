<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Home</title>
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin_index.css">

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
                        <a class="nav-link active" href="<?= base_url() ?>/admin"><i class="fa-solid fa-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/convocatorias"><i class="fa-solid fa-calendar-check"></i> Convocatorias</a>
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

    <br>

    <div class="container">
        
        <?php if($no_info==false): ?>
            <div class="row">

                <div class="alert <?php
                if($convocatoria['ESTADO']=="Activa"){
                    echo "alert-success";
                }
                if($convocatoria['ESTADO']=="Próximamente"){
                    echo "alert-warning";
                }
                if($convocatoria['ESTADO']=="Cerrada"){
                    echo "alert-danger";
                }
            ?>" roles="alert">
                La convocatoria <?=$convocatoria['NOMBRE']?> se encuentra: <?=$convocatoria['ESTADO']?> con fecha límite de <?php 
                $fin_convocatoria = new DateTime ($convocatoria['FECHA_FIN']);
                echo date_format($fin_convocatoria, "d-m-Y")?>
                
                </div>
            </div>
        <?php else: ?>

            <div class="alert alert-danger" role="alert">
                No existen convocatorias creadas. Para mostrar la información relevante, cree una convocatoria.
            </div>

        <?php endif;?>
             
            <div class="row info_box gy-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fa-solid fa-calendar-check"></i> Convocatoria</h3>
                            <?php if($no_info==false): ?>
                                <p class="card-text"> Última convocatoria: <?=$convocatoria['NOMBRE']?></p>
                                <p class="card-text">Fecha de inicio: <?=$convocatoria['FECHA_INICIO']?></p>
                                <p class="card-text">Fecha de Término: <?=$convocatoria['FECHA_FIN']?></p>
                                <a href="<?= base_url() ?>/admin/convocatorias/<?=$convocatoria['ID_CONVOCATORIA']?>" class="btn btn-primary">Más información</a>
                            <?php else: ?>
                                <p class="card-text">No existen convocatorias, porfavor, cree una.</p>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa-solid fa-address-book"></i> Programa asociado</h4>
                            <?php if($no_info==false): ?>
                                <p class="card-text">Nombre: <?=$programa['NOMBRE']?></p>
                                <p class="card-text">Estado: <?=$programa['ESTADO']?></p>
                                <p class="card-text">Descripción: <?=$programa['DESCRIPCION']?></p>
                                <p class="card-text">Postulantes en la convocatoria: <?=$contador?> estudiantes</p>
                            <?php else: ?>
                                <p class="card-text">No existen convocatorias, porfavor, cree una.</p>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa-solid fa-plane-departure"></i> Movilidad Preparada</h4>
                            <?php if($no_info==false): ?>
                                <p class="card-text">Estudiantes aceptados con beca: <?=$postulaciones_contadas['Becados']?> estudiantes</p>
                                <p class="card-text">Estudiantes aceptados con crédito: <?=$postulaciones_contadas['Aceptadas']?> estudiantes</p>
                                <p class="card-text">Estudiantes rechazados: <?=$postulaciones_contadas['Rechazadas']?> estudiantes</p>
                                <p class="card-text">Movilidad Preparada:<?=$movilidad_contadas['Preparacion']?> estudiantes</p>
                            <?php else: ?>
                                <p class="card-text">No existe movilidad.</p>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa-solid fa-plane-arrival"></i> Movilidad Activa</h4>
                            <?php if($no_info==false): ?>
                                <p class="card-text">Movilidad En curso: <?=$movilidad_contadas['Curso']?> estudiantes</p>
                                <p class="card-text">Movilidad Cancelada: <?=$movilidad_contadas['Cancelada']?> estudiantes</p>
                                <p class="card-text">Movilidad Correcta: <?=$movilidad_contadas['Correcta']?> estudiantes</p>
                                <p class="card-text">Movilidad Finalizada: <?=$movilidad_contadas['Finalizada']?> estudiantes</p>
                            <?php else: ?>
                                <p class="card-text">No existe movilidad.</p>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <div id="footer">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>
    
</body> 
</html>