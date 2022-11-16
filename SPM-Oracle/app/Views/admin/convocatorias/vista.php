<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Convocatoria</title>

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
                        <a class="nav-link " href="<?= base_url() ?>/admin"><i class="fa-solid fa-house"></i> Inicio</a>
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
    
            <div class="row session_container">
                <div class="alert <?= $_SESSION['status_action'];?> alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['status_alert'];?></strong> <?=$_SESSION['status']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
    
            <?php unset($_SESSION['status']);?>
            <?php unset($_SESSION['status_action']);?>
            <?php unset($_SESSION['status_alert']);?>
    
        <?php endif;?>

        <center><h2 class="center">Convocatorias</h2></center>

        <?php if ($convocatorias == false):?>

            <div class="row" style="margin-top:200px; margin-bottom:200px;">
                <div class="alert alert-danger" role="alert">
                    <center>
                        No existen convocatorias creadas. Para mostrar la información relevante, cree una convocatoria.
                    </center>
                </div>
            </div>

        <?php else: ?>

            <div class="row">
                <div class="col-md-12 info_box">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderedless border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre Convocatoria</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Termino</th>
                                    <th scope="col">Postulantes</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                    <th scope="col">Vista</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador=1; foreach($convocatorias as $convocatoria): ?>
                                <tr scope='row'>
                                    <th>#<?=$contador?></th>
                                    <td><?=$convocatoria['NOMBRE']?></td>
                                    <td><?=$convocatoria['FECHA_INICIO']?></td>
                                    <td><?=$convocatoria['FECHA_FIN']?></td>
                                    <td><?=$convocatoria['CONTADOR']?></td>
                                    <td><?=$convocatoria['ESTADO']?></td> 
                                    <?php if ($convocatoria['ESTADO']!='Cerrada'): ?>
                                    <td> 
                                        <button type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" data-bs-target="#convocatoriaModal" data-bs-id="<?=$convocatoria['ID_CONVOCATORIA']?>" 
                                        data-bs-nombre="<?=$convocatoria['NOMBRE']?>" data-bs-inicio="<?php
                                        # Workaround por problemas con date y Oracle, acepta hasta 2099
                                        $data = explode("/", $convocatoria['FECHA_INICIO']);
                                        $data = array_reverse($data);
                                        $data[0] = "20".$data[0];
                                        $data = implode("-",$data);
                                        echo $data;?>" data-bs-fin="<?php
                                        # Workaround por problemas con date y Oracle, acepta hasta 2099
                                        $data = explode("/", $convocatoria['FECHA_FIN']);
                                        $data = array_reverse($data);
                                        $data[0] = "20".$data[0];
                                        $data = implode("-",$data);
                                        echo $data;?>" 
                                        data-bs-estado="<?=$convocatoria['ESTADO']?>" data-bs-minSCT="<?=$convocatoria['MIN_CREDITO_SCT']?>" data-bs-maxSCT="<?=$convocatoria['MAX_CREDITO_SCT']?>" 
                                        data-bs-reprobado="<?=$convocatoria['RAMOS_REPROBADOS']?>"><i class="fa-solid fa-pen-to-square"></i> Modificar</button>
                                    </td>
                                    <?php else:?>
                                    <td class="concluido">Ha concluido</td>
                                    <?php endif; ?>
                                    <td><a href="<?=base_url()?>/admin/convocatorias/<?=$convocatoria['ID_CONVOCATORIA']?>" class="btn btn-primary">Detalle</a></td>
                                </tr>
                                <?php $contador++;?>
                                <?php endforeach; ?>         
                            </tbody>
                        </table>
                    </div>
                    <?php echo $paginador->links();?>
                </div>
            </div>
        <?php endif;?>
    </div>

    <?php if(! $convocatorias == false) : ?>

        <div class="modal fade" id="convocatoriaModal" tabindex="-1" aria-labelledby="convocatoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="convocatoriaModalLabel">Modificar Convocatoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="<?= base_url() ?>/admin/convocatoria/modificar" method="post" accept-charset="utf-8" id="form_modificar_convocatoria" novalidate>
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="modal-body">  
                        <center><h4>Parámetros</h4></center>
                        <div class="d-grid gap-2">
                            <input class="form-control rest proh" id="id_conv" readonly="true" type="hidden" name="id_conv">
                            <div class="row">
                                <label class="col-md-4 control-label" for="nombre_convocatoria">Nombre Convocatoria</label>
                                <div clasS="col-md-8">
                                    <input class="form-control" type="text" name="nombre_convocatoria" required>
                                </div>
                            </div>
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="tipo_convocatoria">Tipo de movilidad</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="tipo_convocatoria" required>
                                        <?php foreach($programas as $prog):?>
                                        <option value='<?=$prog['ID_PROGRAMA'];?>'><?=$prog['NOMBRE'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="f_inicio">Fecha de inicio</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="f_inicio" name="f_inicio" min="2021-01-01" max="2099-12-31" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="f_fin">Fecha de término</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="f_fin" name="f_fin" min="2021-01-02" max="2099-12-31" required>
                                </div>
                            </div>
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="estado_convocatoria">Estado de la convocatoria</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="estado_convocatoria" required>
                                        <option value='Activa'>Activa</option>
                                        <option value='En pausa'>En pausa</option>
                                        <option value='Cerrada'>Finalizada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="ramos_reprobados">Ramos reprobados máximos</label>
                                <div clasS="col-md-8">
                                    <input class="form-control rest2" type="number" id="reprobado" name="ramos_reprobados" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="min_sct_creditos">Mínimo de créditos SCT</label>
                                <div clasS="col-md-8">
                                    <input class="form-control rest2" type="number" id="min_sct_creditos" name="min_sct_creditos" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="max_sct_creditos">Máximo de créditos SCT (ingrese el valor porcentual %)</label>
                                <div clasS="col-md-8">
                                    <input class="form-control rest3" type="number" id="max_sct_creditos" name="max_sct_creditos" max="100" required>
                                    <div class="invalid-feedback">
                                        <span style="color:white">Valor máximo de 100 %.</span>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk" id="form_modificar_boton"></i> Modificar</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>  

    <?php endif; ?>



    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success btn-circle w-100" data-bs-toggle="modal" data-bs-target="#crearConvocatoriaModal"><i class="fa-solid fa-address-book"></i> Añadir nueva convocatoria</button>    
            </div>
        </div>
    </div>


    <div class="modal fade" id="crearConvocatoriaModal" tabindex="-1" aria-labelledby="crearConvocatoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearConvocatoriaModalLabel">Crear Convocatoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form_crear_convocatoria" action="<?= base_url() ?>/admin/convocatorias/crear" method="post" accept-charset="utf-8" novalidate>
                <div class="modal-body">
                    <center><h4>Parámetros</h4></center>
                    <div class="d-grid gap-2">
                            <div class="row">
                                <label class="col-md-4 control-label" for="nombre_convocatoria">Nombre Convocatoria</label>
                                <div clasS="col-md-8">
                                    <input class="form-control" type="text" name="nombre_convocatoria" required>
                                </div>
                            </div>
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="tipo_convocatoria">Tipo de movilidad</label>
                                <div class="col-md-8">
                                    
                                    <?php if ($programas == false) : ?>
                                        <span>No existen programas creados, porfavor, cree uno para generar la convocatoria.</span>
                                    <?php else : ?>
                                        <select class="form-select" name="tipo_convocatoria" required>
                                            <?php foreach($programas as $prog):?>
                                            <option value='<?=$prog['ID_PROGRAMA'];?>'><?=$prog['NOMBRE'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="f_inicio">Fecha de inicio</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="f_inicio" name="f_inicio" min="2021-01-01" max="2099-12-31" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="f_fin">Fecha de término</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="f_fin" name="f_fin" min="2021-01-02" max="2099-12-31" required>
                                </div>
                            </div>
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="estado_convocatoria">Estado de la convocatoria</label>
                                <div class="col-md-8">
                                    <input class="form-control proh" type="text" name="estado_convocatoria" readonly="true" value="Próximamente...">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="reprobado">Ramos reprobados máximos</label>
                                <div clasS="col-md-8">
                                    <input class="form-control rest7" type="number" id="reprobado" name="ramos_reprobados" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="min_sct_creditos">Mínimo de créditos SCT</label>
                                <div class="col-md-8">
                                    <input class="form-control rest5" type="number" id="min_sct_creditos" name="min_sct_creditos" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="max_sct_creditos">Máximo de créditos SCT (ingrese el valor porcentual %)</label>
                                <div clasS="col-md-8">
                                    <input class="form-control rest3" type="number" id="max_sct_creditos" name="max_sct_creditos" max="100" required>
                                    <div class="invalid-feedback">
                                        <span style="color:white">Valor máximo de 100 %.</span>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                               <center><h4>Preguntas Adicionales</h4></center>
                            </div>  
                            
                            <?php if ($preguntas == false) : ?>
                                <center><span>No existen preguntas creadas.</span></center>
                            <?php else : ?>
                                <div class="row row-cols-4 gy-4"> 
                                <?php foreach ($preguntas as $pregunta): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name='pregunta[]' value="<?=$pregunta['ID_PREGUNTA']?>">
                                        <label class="form-check-label"><?=$pregunta['TITULO']?></label>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="form_crear_boton"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div id="footer" style="padding-top: 150px; padding-bottom:50px; background-color: #E4DCCF;">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>
    
</body>

<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        var submit_formulario = document.getElementById('form_crear_boton')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    submit_formulario.setAttribute('disabled', 'disabled')
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script>
    document.querySelector(".rest").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
    document.querySelector(".rest2").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
    document.querySelector(".rest3").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
    document.querySelector(".rest4").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
    document.querySelector(".rest5").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
    document.querySelector(".rest6").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
</script>

<script>
    var ModalEditar = document.getElementById('convocatoriaModal')
    ModalEditar.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var id_convocatoria = button.getAttribute('data-bs-id')
    var nombre_convocatoria = button.getAttribute('data-bs-nombre')
    var inicio_convocatoria = button.getAttribute('data-bs-inicio')
    var fin_convocatoria = button.getAttribute('data-bs-fin')
    var min_convocatoria = button.getAttribute('data-bs-minSCT')
    var max_convocatoria = button.getAttribute('data-bs-maxSCT')
    var reprobado = button.getAttribute('data-bs-reprobado')

    var modalBodyID_hidden = ModalEditar.querySelector(".modal-body input[name='id_conv']")
    var modalBodyNombre = ModalEditar.querySelector(".modal-body input[name='nombre_convocatoria']")
    var modalBodyInicio = ModalEditar.querySelector(".modal-body input[name='f_inicio']")
    var modalBodyFin = ModalEditar.querySelector(".modal-body input[name='f_fin']")
    var modalBodyMinSCT = ModalEditar.querySelector(".modal-body input[id='min_sct_creditos']")
    var modalBodyMaxSCT = ModalEditar.querySelector(".modal-body input[id='max_sct_creditos']")
    var modalBodyReprobado = ModalEditar.querySelector(".modal-body input[id='reprobado']")

    modalBodyID_hidden.value = id_convocatoria
    modalBodyNombre.value = nombre_convocatoria
    modalBodyInicio.value = inicio_convocatoria 
    modalBodyFin.value = fin_convocatoria 
    modalBodyMinSCT.value = min_convocatoria 
    modalBodyMaxSCT.value = max_convocatoria 
    modalBodyReprobado.value = reprobado 
})
</script>
</html>