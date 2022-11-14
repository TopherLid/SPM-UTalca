<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Universidades</title>
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
                        <a class="nav-link" href="<?= base_url() ?>/admin/programas"><i class="fa-solid fa-address-book"></i> Programas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/admin/universidades"><i class="fa-solid fa-building-columns"></i> Universidades</a>
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

        <center><h2 class="center">Universidades asociadas</h2></center>

        <?php if ($universidades == false): ?>

            <div class="row" style="margin-top:200px; margin-bottom:200px;">
                <div class="alert alert-danger" role="alert">
                    <center>
                        No existen Universidades asociadas.
                    </center>
                </div>
            </div>

        <?php else : ?>

            <div class="row">
                <div class="col-md-12 info_box">
                    <div class="table-responsive">

                        <table class="table table-striped table-hover table-borderedless border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Universidad</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Programas pertenecientes</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ajax para actualizar -->
                                <?php $contador=1; foreach($universidades as $universidad):?>
                                    <tr scope='row'>
                                        <th>#<?=$contador?></th>
                                        <td><?=$universidad['NOMBRE']?></td>
                                        <td><?=$universidad['NOMBRE_PAIS']?>
                                        <td><?=$universidad['ESTADO']?></td>
                                        </td>
                                        <td>

                                        <?php for ($i=1; $i < $universidad['programas_contador']; $i++) : ?>
                                            
                                            <?=$universidad['programa_'.$i]?>
                                            <br>
                                        <?php endfor; ?>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" data-bs-target="#universidadModal" data-bs-id="<?=$universidad['ID_UNIVERSIDAD']?>"
                                            data-bs-nombre="<?=$universidad['NOMBRE']?>"><i class="fa-solid fa-pen-to-square"></i> Modificar</button>
                                        </td>
                                    </tr> 
                                <?php $contador++; endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                    <?php echo $paginador->links();?>
                </div>
            </div>



            <div class="modal fade" id="universidadModal" tabindex="-1" aria-labelledby="universidadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="universidadModalLabel">Modificar universidad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="needs-validation" action="<?= base_url() ?>/admin/universidades/modificar" method="post" accept-charset="utf-8" id="form_modificar_universidad" novalidate>
                            <div class="modal-body">
                                <div class="container">
                                    <center><h4>Parámetros</h4></center>
                                    <div class="d-grid gap-2">
                                        <input class="form-control rest proh" id="id_universidad" readonly="true" type="hidden" name="id_universidad">
                                        <div class="row">
                                            <label class="col-md-4 control-label" for="nombre_universidad">Nombre Universidad</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="nombre_universidad" placeholder="Universidad de Talca" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4 control-label" for="estado_universidad">Estado</label>
                                            <div class="col-md-8">
                                                <select class="form-select" name="estado">
                                                    <option value="Activo">Activo</option>
                                                    <option value="En espera">En espera</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <label class="col-md-4 control-label" for="pais">Pais perteneciente</label>


                                            <?php if ($paises==false) : ?>

                                                <div class="col-md-8">
                                                    No existen países asociados, por favor, añada los correspondientes.
                                                </div>

                                            <?php else : ?>

                                                <div class="col-md-8">
                                                    <select class="form-select" name="pais" required>
                                                        <?php foreach($paises as $pais):?>
                                                            <option value='<?=$pais['ID_PAIS']?>'><?=$pais['NOMBRE']?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>

                                            <?php endif; ?>

                                        </div> 

                                        <?php if ($programas == false): ?>

                                            <div class="row">
                                                <div class="alert alert-danger" role="alert">
                                                    <center>
                                                        No existen programas.
                                                    </center>
                                                </div>
                                            </div>

                                        <?php else : ?>

                                            <div class="row row-cols-4 gy-4"> 
                                                <?php foreach ($programas as $programa): ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="programa[]" value="<?=$programa['ID_PROGRAMA']?>" id="<?=$programa['NOMBRE']?>">
                                                        <label class="form-check-label" for="programa[]"><?=$programa['NOMBRE']?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div> 

                                        <?php endif; ?>


                                    </div>
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                                <button class="btn btn-success" type="submit" id="boton_modificar_universidad"><i class="fa-solid fa-floppy-disk"></i> Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif ; ?>

    </div>

    <div class="container center">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success btn-circle w-100" data-bs-toggle="modal" data-bs-target="#crearUniversidadModal"><i class="fa-solid fa-address-book"></i> Añadir nueva universidad asociada</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#crearPaisModal"><i class="fa-solid fa-address-book"></i> Añadir Pais al sistema</button>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="crearUniversidadModal" tabindex="-1" aria-labelledby="crearUniversidadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearUniversidadModalLabel">Añadir Universidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="needs-validation" action="<?= base_url() ?>/admin/universidades/crear" method="post" id="form_crear_universidad" accept-charset="utf-8" novalidate> 
                    <div class="modal-body">
                        <div class="container">
                            <center><h4>Parámetros</h4></center>
                            <div class="d-grid gap-2"> 
                                
                                <div class="row">
                                    <label class="col-md-4 control-label" for="nombre_universidad">Nombre Universidad</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="nombre_universidad" placeholder="Universidad de Talca" required>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <label class="col-md-4 control-label" for="pais">Pais perteneciente</label>

                                    <?php if ($paises==false) : ?>

                                        <div class="col-md-8">
                                            No existen países asociados, por favor, añada los correspondientes.
                                        </div>

                                    <?php else : ?>

                                        <div class="col-md-8">
                                            <select class="form-select" name="pais" required>
                                                <?php foreach($paises as $pais):?>
                                                    <option value='<?=$pais['ID_PAIS']?>'><?=$pais['NOMBRE']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                    <?php endif; ?>

                                </div> 
                                <br>

                                <center><h4>Programas asociados</h4></center>
                                
                                <br>

                                <div class="row row-cols-4 gy-4"> 
                                    <?php foreach ($programas as $programa): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="programa[]" value="<?=$programa['ID_PROGRAMA']?>" id="<?=$programa['NOMBRE']?>">
                                            <label class="form-check-label" for="programa[]"><?=$programa['NOMBRE']?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="boton_crear_universidad"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="crearPaisModal" tabindex="-1" aria-labelledby="crearPaisModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearPaisModalLabel">Añadir país</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="<?= base_url() ?>/admin/pais/crear" method="post" id="form_crear_pais" accept-charset="utf-8" novalidate> 
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <label class="col-md-4 control-label" for="nombre_pais">Nombre del país</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="nombre_pais" placeholder="Chile" required>
                                </div>
                            </div>
                        </div>                                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="boton_crear_pais"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                    </div>
                </form>
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
        var submit_formulario = document.getElementById('boton_crear_pais')
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
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        var submit_formulario = document.getElementById('boton_crear_universidad')
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
var modificarUniversidadModal = document.getElementById('universidadModal')
    modificarUniversidadModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id_universidad = button.getAttribute('data-bs-id')
  var nombre_universidad = button.getAttribute('data-bs-nombre')

  var id_modal = modificarUniversidadModal.querySelector(".modal-body input[name='id_universidad']")
  var nombre_modal = modificarUniversidadModal.querySelector(".modal-body input[name='nombre_universidad']")

  id_modal.value = id_universidad
  nombre_modal.value = nombre_universidad

})

</script>

<style>
.modal-content {
    background: #576F72;
    color : #ffffff;
}
</style>

</html>