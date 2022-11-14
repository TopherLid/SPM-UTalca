<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulación #<?=$postulacion['ID_POSTULACION']?></title>
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>
</head>
<?php $contador=1; ?>
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
                        <a class="nav-link" href="<?= base_url() ?>/admin/universidades"><i class="fa-solid fa-building-columns"></i> Universidades</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/admin/postulantes"><i class="fa-solid fa-people-group"></i> Postulantes</a>
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

    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10">
            
            <h2 class="center"><center>Información del Postulante</center></h2>
            <div class="container-fluid">
                <div class="row">
                    <label class="col-md-4 control-label" for="id_conv">Convocatoria de la postulación</label> 
                    <div class="col-md-8">
                        <input class="form-control proh" type="text" name="id_conv" size="40" readonly="true" value='<?= $convocatoria['NOMBRE']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Nombre Postulante</label> 
                    <div class="col-md-8">
                        <input class="form-control proh" type="text" name="nombre_estudiante" size="40" readonly="true" value='<?= $estudiante['NOMBRE']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="RUT">RUT Estudiante</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="number" name="RUT" size="15" readonly="true" value='<?= $estudiante['RUT']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Fecha de Nacimiento</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="text" name="nacimiento" size="15" readonly="true" value='<?php
                            $nacimiento = new DateTime ($estudiante['NACIMIENTO']);
                            echo date_format($nacimiento, "d-m-Y"); 
                         ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">N° de matrícula</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="number" name="matricula" size="10" readonly="true" value='<?= $estudiante['MATRICULA']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Email Institucional</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="email_institucional" size="30" readonly="true" value='<?= $estudiante['EMAIL_INSTITUCIONAL']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Carrera</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="text" name="carrera" size="10" readonly="true" value='<?= $carrera['NOMBRE']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Programa de Movilidad</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="text" name="programa" size="25" readonly="true" value='<?= $programa['NOMBRE']; ?>'>
                    </div>
                </div>
                
                <!--Información del estudiante-->
         
                <h4 class="center"><center>Información personal y de estadía</center></h4>
                
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Telefono móvil</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="number" name="telefono" size="9" readonly="true" min="1000000000" value='<?= $postulacion['N_TELEFONO']; ?>'>
                    </div>
                </div>
        
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Email personal</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="email_personal" size="30" readonly="true" value='<?= $postulacion['EMAIL_PERSONAL']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Nivel de Inglés</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="email_personal" size="30" readonly="true" value='<?= $postulacion['NIVEL_INGLES']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Segundo idioma</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="idioma_sec" size="30" readonly="true" value='<?= $idioma['IDIOMA']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Universidad de Preferencia 1</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="idioma_sec" size="30" readonly="true" value='<?= $universidad1['NOMBRE']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Universidad de Preferencia 2</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="idioma_sec" size="30" readonly="true" value='<?= $universidad2['NOMBRE']; ?>'>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label" for="nombre">Universidad de Preferencia 3</label>
                    <div clasS="col-md-8">
                        <input class="form-control proh" type="email" name="idioma_sec" size="30" readonly="true" value='<?= $universidad3['NOMBRE']; ?>'>
                    </div>
                </div>
                <center><h4 class="center">Información adicional</h4></center>

                <?php if ($preguntas==false) : ?>

                    <div class="row">
                        <center><span>Durante la convocatoria asignada no se han generado preguntas adicionales al formulario.</span></center>
                    </div>

                <?php else: foreach ($preguntas as $pr): ?>
                    <div class="row">
                        <label class="col-md-4 control-label"><?=$pr['PREGUNTA']?></label>
                        <div clasS="col-md-8">
                            <input class="form-control proh" type="text"readonly="true" value="<?=$pr['RESPUESTA']?>">
                        </div>
                    </div>
                <?php endforeach; endif;?>

            </div>    
        </div>    
        <div class="col-lg-2">
            <table class="table"> 
                <tr><th scope="row"><center><h4 class="center">Docs</center></h4></th>
                <tr><td><a href="<?=base_url()?>/postulante/cv/<?=$postulacion['ID_POSTULACION']?>" class="btn btn-primary btn-circle w-100" role="button">Curriculum</a></td></tr>
                <tr><td><a href="<?=base_url()?>/postulante/antecedente/<?=$postulacion['ID_POSTULACION']?>" class="btn btn-primary btn-circle w-100" role="button">C. Interés</a></td></tr>

                <tr><td><a href="<?=base_url()?>/postulante/cinteres/<?=$postulacion['ID_POSTULACION']?>" class="btn btn-primary btn-circle w-100" role="button">Antecedentes</a></td></tr>

                <?php if ($estudiante['DEUDOR_DAFE']=="Si"): ?>
                    <tr><td><a href="<?=base_url()?>/postulante/verificador/<?=$postulacion['ID_POSTULACION']?>" class="btn btn-primary btn-circle w-100" role="button">Validador</a></td></tr>
                <?php endif;?>
            </table> 

            <?php if($postulacion['ESTADO']=='En espera'): ?>

                <h4><center>Opciones</center></h4>
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#estadoModal" 
                data-bs-id="<?=$postulacion['ID_POSTULACION']?>" data-bs-nombre="<?=$estudiante['NOMBRE']?>">Actualizar estado</button>
           
                <?php else : ?> 
                <center><h4>Estado actual:<br> <?=$postulacion['ESTADO'] ?></h4></center>
            <?php endif; ?>

            <?php if ($postulacion['ESTADO']=='Modificable'):?>
                <center><p>Debe esperar a que el estudiante modifique para validar la información.</p></center>
            <?php endif; ?>
        </div>     
    </div>   
    
    <div class="modal fade" id="estadoModal" tabindex="-1" aria-labelledby="estadoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="estadoModalLabel">Actualizar situación del postulante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="<?=base_url()?>/admin/estudiante/estado" method="post" accept-charset="utf-8" id="form_estado_postulante" novalidate>
                <input type="hidden" name="_method" value="PUT"/>
                <div class="modal-body">
                    <input id="id_postulacion" name="id_postulacion" type="hidden">
                    <div class="mb-3">
                        <label for="nombre_post" class="col-form-label">Estudiante</label>
                        <input type="text" class="form-control" id="nombre_post" readonly="true">
                    </div>

                    <!-- cambiar por checkbox bien implementado -->

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado_post" id="estado_post_becado" required value="Aceptado con Beca" >
                        <label class="form-check-label" for="estado_post_becado">Aceptado con Beca</label> <!-- required -->
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado_post" id="estado_post_seleccion" required value="Aceptado" >
                        <label class="form-check-label" for="estado_post_seleccion" >Aceptado</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado_post" id="estado_post_rechazado" required value="Rechazado" >
                        <label class="form-check-label" for="estado_post_rechazado">Rechazada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado_post" id="estado_post_modificable" required value="Modificable" >
                        <label class="form-check-label" for="estado_post_modificable">Modificable</label>
                    </div>

                    <br>

                    <div class="mb-3 dropdown_universidades">
                        <label for="seleccion">Universidad seleccionada</label>
                        <select class="form-select" name="seleccion" required>
                            <option value='0' selected>No seleccionado (Rechazado o Modificable)</option>
                            <?php foreach($universidades as $planuniversidad){
                                echo "<option value='".$planuniversidad['ID_UNIVERSIDAD']."'>".$planuniversidad['NOMBRE']." | ".$planuniversidad['PAIS']."</option>";
                            }?>    
                        </select>
                    </div>
                    
                    <span>Al enviar, no podrá volver a cambiar el estado y la universidad</span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="boton_estado_postulante">Enviar cambios</button>
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

if(document.getElementById('estado_post_rechazado').checked) {
    dropdown_universidades
}
if(document.getElementById('estado_post_modificable').checked) {
    dropdown_universidades
}

const estadoModal = document.getElementById('estadoModal')
estadoModal.addEventListener('show.bs.modal', event => {

  const button = event.relatedTarget

  const id_postulante = button.getAttribute('data-bs-id')
  const nombre_postulante = button.getAttribute('data-bs-nombre')

  const modal_id = estadoModal.querySelector(".modal-body input[id='id_postulacion']")
  const modal_nombre = estadoModal.querySelector(".modal-body input[id='nombre_post']")

  modal_id.value = id_postulante
  modal_nombre.value = nombre_postulante

})
</script>

<script>
    var form_estado_postulante = document.getElementById('form_estado_postulante');
    var boton_estado_postulante = document.getElementById('boton_estado_postulante');
    form_estado_postulante.addEventListener('submit', function() {
        boton_estado_postulante.setAttribute('disabled', 'disabled');
    }, false);
</script>

<style>
.modal-content {
    background: #576F72;
    color : #ffffff;
}
</style>

</html>