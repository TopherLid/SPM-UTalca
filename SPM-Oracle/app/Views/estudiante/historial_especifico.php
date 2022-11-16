<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulación #<?=$postulacion['ID_POSTULACION']?></title>
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>
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

        <?php if ($postulacion['ESTADO']=="Modificable"): ?>

            <div class="row" style="padding-top:25px;">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Modificable:</strong> Su solicitud de modificación ha sido aceptada, por favor, modifique los campos correspondientes.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <div class="row" style="padding-top:25px;">
                <button type="button" class="btn btn-warning btn-circle w-100" data-bs-toggle="modal" data-bs-target="#postulacion">
                <i class="fa-solid fa-pen-to-square"></i> Modificar</button>
            </div>

        <?php endif; ?>

        <h4 class="center"><center>Estado</center></h4>
        
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Identificador de la postulación</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="number" name="email_institucional" size="30" readonly="true" value='<?=$postulacion['ID_POSTULACION']?>'>
            </div>
        </div>

        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Estado de la postulación</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="text" name="email_institucional" size="30" readonly="true" value='<?= $postulacion['ESTADO']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Universidad seleccionada</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="text" name="idioma_sec" size="30" readonly="true" value='<?php
                    if($postulacion['SELECCION']!=0) {
                        echo $seleccion['NOMBRE'];
                    } else {
                        if ($postulacion['ESTADO']!="En espera"){
                            echo "Su postulación ha sido rechazada";
                        } else {
                            if ($postulacion['ESTADO']=="Modificable"){
                                echo "Postulación habilitada para modificación.";
                            } else {
                                echo "Su postulación se encuentra en espera";

                            }
                        }
                    }
                ?>'>
            </div>
        </div>
        
        <h2 class="center"><center>Información del Postulante</center></h2>

        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Nombre Postulante</label> 
            <div class="col-md-8">
                <input class="form-control proh" type="text" name="nombre_estudiante" size="40" readonly="true" value='<?= $postulante['nombre']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="RUT">RUT Estudiante</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="number" name="RUT" size="15" readonly="true" value='<?= $postulante['RUT']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Fecha de Nacimiento</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="text" name="nacimiento" size="15" readonly="true" value='<?=$postulante['nacimiento']?>
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
            <label class="col-md-4 control-label" for="nacionalidad">Nacionalidad</span></label>
            <div class="col-md-8">
                <input class="form-control proh" type="text" name="nacionalidad" size="30" value='<?= $postulacion['NACIONALIDAD']; ?>'>
            </div>
        </div>
        
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
                <input class="form-control proh" type="email" name="idioma_sec" size="30" readonly="true" value='<?= $postulacion['IDIOMA_2']; ?>'>
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
        
            <?php if ($preguntas==false) :?>
                <p>Para esta convocatoria no se usaron preguntas adicionales.</p>
            <?php else : ?>

                <?php foreach ($preguntas as $pregunta): ?>

                    <div class="row">
                        <label class="col-md-4 control-label"><?=$pregunta['PREGUNTA']?></label>
                        <div clasS="col-md-8">
                            <input class="form-control proh" type="text" value='<?=$pregunta['RESPUESTA']; ?>'>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>
        
    </div>

    <?php if ($postulacion['ESTADO']=="Modificable"): ?>

        <div class="modal fade" id="postulacion" tabindex="-1" aria-labelledby="postulacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="needs-validation" action="<?= base_url() ?>/estudiante/historial/modificar" method="post" accept-charset="utf-8" id="modificar_postulacion_estudiante" novalidate>
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="modal-header">
                        <h5 class="modal-title" id="postulacionModalLabel">Modificar postulación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="d-grid gap-2">
                                <input class="form-control" id="id_postulacion" readonly="true" type="hidden" name="id_postulacion" value='<?= $postulacion['ID_POSTULACION']; ?>'>

                                <h4 class="center"><center>Información personal y de estadía</center></h4>

                                <div class="row">
                                    <label class="col-md-4 control-label" for="nacionalidad">Nacionalidad</span></label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="nacionalidad" size="30" value='<?= $postulacion['NACIONALIDAD']; ?>' required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 control-label" for="telefono">Telefono móvil</label>
                                    <div clasS="col-md-8">
                                        <input class="form-control" type="number" name="telefono" size="9" min="10000000" value='<?= $postulacion['N_TELEFONO']; ?>' required>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <label class="col-md-4 control-label" for="email_personal">Email personal</label>
                                    <div clasS="col-md-8">
                                        <input class="form-control" type="email" name="email_personal" size="30" value='<?= $postulacion['EMAIL_PERSONAL']; ?>' required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 control-label" for="nivel_ingles">Nivel de Inglés</label>
                                    <div clasS="col-md-8">
                                        <input class="form-control" type="text" name="nivel_ingles" size="30" value='<?= $postulacion['NIVEL_INGLES']; ?>' required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 control-label" for="idioma_sec">Segundo idioma</label>
                                    <div clasS="col-md-8">
                                        <input class="form-control" type="text" name="idioma_sec" size="30" value='<?= $postulacion['IDIOMA_2']; ?>' required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-md-4 control-label" for="1ra_opcion">Universidad de Preferencia 1</label>
                                    <div clasS="col-md-8">
                                        <select class="form-select" name="1ra_opcion" required>
                                            <?php foreach($universidades as $universidad){
                                                echo "<option value='".$universidad['ID_UNIVERSIDAD']."'>".$universidad['NOMBRE']." | ".$universidad['ID_PAIS']."</option>";
                                            }?>    
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 control-label" for="2da_opcion">Universidad de Preferencia 2</label>
                                    <div clasS="col-md-8">
                                    <select class="form-select" name="2da_opcion" required>
                                            <?php foreach($universidades as $universidad){
                                                echo "<option value='".$universidad['ID_UNIVERSIDAD']."'>".$universidad['NOMBRE']." | ".$universidad['ID_PAIS']."</option>";
                                            }?>    
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 control-label" for="3ra_opcion">Universidad de Preferencia 3</label>
                                    <div clasS="col-md-8">
                                        <select class="form-select" name="3ra_opcion"  required>
                                            <?php foreach($universidades as $universidad){
                                                echo "<option value='".$universidad['ID_UNIVERSIDAD']."'>".$universidad['NOMBRE']." | ".$universidad['ID_PAIS']."</option>";
                                            }?>    
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button class="btn btn-success" type="submit" id="boton_modificar"><i class="fa-solid fa-floppy-disk"></i> Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php endif; ?>

    

    <div id="footer">
        <center>
                <p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p>
        </center>	
    </div>
</body>
<script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    var submit_postulacion_estudiante = document.getElementById('modificar_postulacion_estudiante');

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            } else {
                boton_modificar.setAttribute('disabled', 'disabled');
            }
            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>

</html>