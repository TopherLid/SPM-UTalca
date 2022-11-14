<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Programas</title>

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
                        <a class="nav-link" href="<?= base_url() ?>/admin/convocatorias"><i class="fa-solid fa-calendar-check"></i> Convocatorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/admin/programas"><i class="fa-solid fa-address-book"></i> Programas</a>
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


        <div class="row">
            <center><h2 class="center">Programas</h2></center>
        </div>

        <?php if ($programas == false): ?>

            <div class="row" style="margin-top:200px; margin-bottom:200px;">
                <div class="alert alert-danger" role="alert">
                    <center>
                        No existen programas creados.
                    </center>
                </div>
            </div>

        <?php else : ?>

            <div class="row">
                <div class="col-md-12 info_box table-responsive">
                    <table class="table table-striped table-hover table-borderedless border-dark ">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Programa</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($programas as $prog): ?>
                                <tr>
                                    <th scope='row'>#<?=$prog['ID_PROGRAMA']?></th>
                                    <td><?=$prog['NOMBRE']?></td>
                                    <td><?=$prog['DESCRIPCION']?></td>
                                    <td>Estado: <?=$prog['ESTADO']?></td>
                                    <td>
                                    <button type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" data-bs-id="<?=$prog['ID_PROGRAMA']?>" data-bs-nombre="<?=$prog['NOMBRE']?>" 
                                    data-bs-desc="<?=$prog['DESCRIPCION']?>"><i class="fa-solid fa-pen-to-square"></i> Modificar</button>
                                </td>
                                </tr>
                            <?php endforeach; ?>   
                        </tbody>
                    </table>
                    <?php echo $paginador->links();?>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar Programa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form class="needs-validation" action="<?= base_url() ?>/admin/programas/modificar" method="post" accept-charset="utf-8" id="form_modificar_programa" novalidate>
                        <input type="hidden" name="_method" value="PUT"/>
                        <div class="modal-body">
                            <div class="container">                        
                                <center><h4>Parámetros</h4></center>
                                <div class="d-grid gap-2">
                                    <input class="form-control rest proh" id="id_programa" readonly="true" type="hidden" name="id_programa">
                                    <div class="row">
                                        <label class="col-md-4 control-label" for="nombre_programa">Nombre del programa</label>
                                        <div clasS="col-md-8">
                                            <input type="text" class="form-control" id="nombre_programa" name="nombre_programa" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4 control-label" for="descripcion_programa">Descripción</label>
                                        <div clasS="col-md-8">
                                            <input type="text" class="form-control" id="descripcion_programa" name="descripcion_programa" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4 control-label" for="estado_programa">Estado</label>
                                        <div clasS="col-md-8">
                                            <select class="form-select" name="estado_programa" id="estado_programa" required>
                                                <option value="Activo">Activo</option>
                                                <option value="En espera">En espera</option>
                                                <option value="Cerrado">Cerrado</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                            <button class="btn btn-success" type="submit" id="boton_modificar_programa"><i class="fa-solid fa-floppy-disk"></i> Modificar Programa</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>





    <div class="container center">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success btn-circle w-100" data-bs-toggle="modal" data-bs-target="#crearProgramaModal"><i class="fa-solid fa-address-book"></i> Añadir programa</button>
            </div>
        </div>
    </div>

<!-- Modal -->
    <div class="modal fade" id="crearProgramaModal" tabindex="-1" aria-labelledby="crearProgramaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProgramaModalLabel">Crear Programa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="<?= base_url() ?>/admin/programas/crear" method="post" accept-charset="utf-8" id="form_crear_programa" novalidate>
                <div class="modal-body">
                    <div class="container">
                        <center><h4>Parámetros</h4></center>
                        <div class="d-grid gap-2">
                            <div class="row">
                                <label class="col-md-4 control-label" for="nombre_programa">Nombre del programa</label>
                                <div clasS="col-md-8">
                                    <input type="text" class="form-control" id="nombre_programa" name="nombre_programa" placeholder="Beca Juan Abate Molina" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="descripcion_programa">Descripción</label>
                                <div clasS="col-md-8">
                                    <input type="text" class="form-control" id="descripcion_programa" name="descripcion_programa" placeholder="Información asociada al programa" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="estado_programa">Estado</label>
                                <div clasS="col-md-8">
                                    <input type="text" class="form-control" id="estado_programa" name="estado_programa" readonly="true" value="Activo">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="boton_crear_programa"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                </div>
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
        var submit_formulario = document.getElementById('boton_crear_programa')
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
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var id_programa = button.getAttribute('data-bs-id')
    var nombre_programa = button.getAttribute('data-bs-nombre')
    var desc_programa = button.getAttribute('data-bs-desc')

    var modalBodyID = exampleModal.querySelector(".modal-body input[name='id_programa']")
    var modalBodyNombre = exampleModal.querySelector(".modal-body input[name='nombre_programa']")
    var modalBodyDesc = exampleModal.querySelector(".modal-body input[name='descripcion_programa']")

    modalBodyID.value = id_programa
    modalBodyNombre.value = nombre_programa
    modalBodyDesc.value = desc_programa
})

</script>

<style>
.modal-content {
    background: #576F72;
    color : #ffffff;
}
</style>
</html>