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

    <script src="<?= base_url() ?>/public/js/3.6.1/jquery-3.6.1.min.js"></script>

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

    <form class="needs-validation" action="<?= base_url() ?>/postulacion/estado" method="post" accept-charset="utf-8" id="formulario_postulacion" enctype="multipart/form-data" novalidate>

    
    <div class="container">
        <center><h4 class="center">Formulario de Postulación a Movilidad Estudiantil Saliente</h4></center>

            <!--Información prevista por la API-->                
        <center><h4 class="center">Información Académica del Estudiante</h4></center>
        <div class="d-grid gap-2">

        <div class="row">
                <label class="col-md-4 control-label" for="nombre">Nombre Estudiante</label> 
                <div clasS="col-md-8">
                    <input class="form-control proh" type="text" name="nombre_estudiante" size="40" readonly="true" value="<?php echo $postulante['nombre']; ?>">
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label" for="RUT">RUT Estudiante</label>
                <div clasS="col-md-8">
                    <input class="form-control proh" type="number" name="RUT" readonly="true" value='<?php echo $postulante['RUT']; ?>'>
                </div>
            </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Fecha de Nacimiento</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="text" name="nacimiento" readonly="true" value='<?php 
                    $nacimiento = new DateTime ($postulante['nacimiento']);
                    echo date_format($nacimiento, "d-m-Y"); 
                ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">N° de matrícula</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="number" name="matricula" size="10" readonly="true" value='<?php echo $postulante['matricula']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Email Institucional</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="email" name="email_institucional" size="30" readonly="true" value='<?php echo $postulante['email']; ?>'>
            </div>
        </div>
        <div class="row">
            <label class="col-md-4 control-label" for="nombre">Carrera</label>
            <div clasS="col-md-8">
                <input class="form-control proh" type="carrera" name="carrera" size="10" readonly="true" value='<?php echo $postulante['carrera']; ?>'>
            </div>
        </div>
            <div class="row">
                <label class="col-md-4 control-label" for="nombre">Programa de Movilidad</label>
                <div class="col-md-8">
                    <input class="form-control proh" type="text" name="programa" size="25" readonly="true" value='<?php  echo $programa['NOMBRE'];  ?>'>
                </div>
            </div>
        </div>
    </div> 
        
        <!--Información del estudiante-->
    <div class="container">
        <center><h4 class="center">Información personal y de estadía</h4></center>
        <div class="d-grid gap-2">
            <div class="row" >
                <label class="col-md-4 control-label" for="nacionalidad">Nacionalidad <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="nacionalidad" size="30" placeholder="Chilena" required>
                    <div class="invalid-feedback">
                        Campo no válido.
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-md-4 control-label" for="telefono">Telefono móvil <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control number_input" type="number" name="telefono" size="9" min="100000000" placeholder="989898989" required>
                    <div class="invalid-feedback">
                        Número de teléfono no válido.
                    </div>
                </div>
            </div>
                
            <div class="row">
                <label class="col-md-4 control-label" for="email_personal">Email personal <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control" type="email" name="email_personal" size="30" placeholder="emailpersonal@gmail.com" required>

                    <div class="invalid-feedback">
                        Email no válido.    
                    </div>
                </div>
            </div>
            
            <div class="row"> 
                <label class="col-md-4 control-label" for="nivel_ingles">Nivel de Inglés <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <select class="form-select" name="nivel_ingles">
                        <option value="Inglés A1">Inglés A1</option>
                        <option value="Inglés A2">Inglés A2</option>
                        <option value="Inglés B1">Inglés B1</option>
                        <option value="Inglés B2">Inglés B2</option>
                        <option value="Inglés C1">Inglés C1</option>
                        <option value="Inglés C2">Inglés C2</option>
                        <option value="Inglés C3">Inglés C3</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <label class="col-md-4 control-label" for="idioma_sec">Idioma adicional</label>
                <div class="col-md-8">
                    <select class="form-select" name="idioma_sec">
                        <?php foreach($idiomas as $idioma){
                            echo "<option value='".$idioma['ID_IDIOMA']."'>".$idioma['IDIOMA']."</option>";
                        }?>    
                    </select>
                </div>
            </div>
        
            <div class="row">
                <label class="col-md-4 control-label" for="1ra_opcion">Universidad de preferencia 1 <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <select class="form-select" name="1ra_opcion">
                        <?php foreach($universidad as $planuniversidad){
                            echo "<option value='".$planuniversidad['ID_UNIVERSIDAD']."'>".$planuniversidad['NOMBRE']." | ".$planuniversidad['ID_PAIS']."</option>";
                        }?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label" for="2da_opcion">Universidad de preferencia 2</label>
                <div class="col-md-8">
                    <select class="form-select" name="2da_opcion">
                    <?php foreach($universidad as $planuniversidad){
                            echo "<option value='".$planuniversidad['ID_UNIVERSIDAD']."'>".$planuniversidad['NOMBRE']." | ".$planuniversidad['ID_PAIS']."</option>";
                        }?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label" for="3ra_opcion">Universidad de preferencia 3</label>
                <div class="col-md-8">
                    <select class="form-select" name="3ra_opcion">
                        <?php foreach($universidad as $planuniversidad){
                            echo "<option value='".$planuniversidad['ID_UNIVERSIDAD']."'>".$planuniversidad['NOMBRE']." | ".$planuniversidad['ID_PAIS']."</option>";
                        }?>    
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <center><h4 class="center">Preguntas adicionales</h4></center>

        <?php if ($preguntas_lista==false): ?>
            <div class="row">
                <div class="col-md-12">
                    <center><span>No existen preguntas adicionales para esta convocatoria.</span></center>
                </div>
            </div>
        <?php else: ?>
            <?php $contador_preguntas = 1; ?>

            <div class="d-grid gap-2">
                <?php foreach($preguntas as $pregunta): ?>

                    <?php if($pregunta['TIPO']=="Individual"): ?>

                        <div class="row">
                            <label class="col-md-4 control-label" for="pregunta_<?=$contador_preguntas?>"><?=$pregunta['TITULO']?></label>
                            <div class="col-md-8">
                                <input class="form-control" name="pregunta_<?=$contador_preguntas?>" type="
                            
                                <?php if($pregunta['TIPO_INPUT']=="Texto"){
                                        echo "text";
                                    }

                                    if($pregunta['TIPO_INPUT']=="Numero"){
                                        echo "number";
                                    }

                                    if($pregunta['TIPO_INPUT']=="Fecha"){
                                        echo "date";
                                    }

                                    if($pregunta['TIPO_INPUT']=="Email"){
                                        echo "email";
                                    } ?> " required>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?php if($pregunta['TIPO']=="Múltiple"): ?>

                        <?php if ($pregunta['TIPO_INPUT']=="Checkbox") : ?>

                            <div class="row">
                                <label class="col-md-4 control-label" for="pregunta_<?=$contador_preguntas?>"><?=$pregunta['TITULO']?></label>
                                <div class="col-md-8">
                                    <div class="row row-cols-4 gy-4">
                                        <?php for ($i=1; $i < $pregunta['contador_opciones'] ; $i++) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pregunta_<?=$contador_preguntas?>[]" value="<?=$pregunta['opcion_'.$i]?>" >
                                                <label class="form-check-label" for="<?=$pregunta['TITULO']?>"><?=$pregunta['opcion_'.$i]?></label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if ($pregunta['TIPO_INPUT']=="Radio") : ?>
                            <div class="row">
                                <label class="col-md-4 control-label" for="pregunta_<?=$contador_preguntas?>"><?=$pregunta['TITULO']?></label>
                                <div class="col-md-8">
                                    <div class="row row-cols-4 gy-4">

                                        <?php for ($i=1; $i < $pregunta['contador_opciones'] ; $i++) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pregunta_<?=$contador_preguntas?>[]" value="<?=$pregunta['opcion_'.$i]?>">
                                                <label class="form-check-label" for="<?=$pregunta['TITULO']?>"><?=$pregunta['opcion_'.$i]?></label>
                                            </div>
                                        <?php endfor; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($pregunta['TIPO_INPUT']=="Dropdown") : ?>
                            <div class="row">
                                <label class="col-md-4 control-label" for="pregunta_<?=$contador_preguntas?>"><?=$pregunta['TITULO']?></label>
                                <div class="col-md-8">
                                    <select class="form-select" name="pregunta_<?=$contador_preguntas?>">
                                        <?php for ($i=1; $i < $pregunta['contador_opciones'] ; $i++) : ?>
                                            <option value="<?=$pregunta['opcion_'.$i]?>"><?=$pregunta['opcion_'.$i]?></option>
                                        <?php endfor;?> 
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>  

                <?php $contador_preguntas++;?>
                <?php endforeach;?>
            </div>
            <?php $contador_preguntas--;?>
            <input type="hidden" value="<?=$contador_preguntas?>" name="respuestas_cant">
        <?php endif; ?>
    </div>

    <div class="container">
        <center><h4 class="center">Archivos necesarios antes de terminar la postulación</h4></center>
        <div class="d-grid gap-2">
            <div class="row">
                <label class="col-md-4 control-label">Curriculum Vitae <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input type="file" name="cv" id="input_cv" class="form-control" onchange="return cvValidador()" required>
                    <span id="cv_invalido" class="invalid-feedback" style="display:hide; color:red;">Archivo inválido: No es PDF.</span>
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label">Documento Antecedentes <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control" type="file" id="pdf_antecedente" name="antecedente" size="20" onchange="return antecedentesValidador()" required>
                    <span id="antecedente_invalido" class="invalid-feedback" style="display:hide; color:red;">Archivo inválido: No es PDF.</span>
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label">Carta de Interés <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control" type="file" id="pdf_cinteres" name="cinteres" size="20" onchange="return cInteresValidador()" required>
                    <span id="cinteres_invalido" class="invalid-feedback" style="display:hide; color:red;">Archivo inválido: No es PDF.</span>
                </div>

            </div>
            <?php if($postulante['deuda_dafe']=="Si"): ?>

            <div class="row">
                <span class="text_box">
                    Su situación no se encuentra regularizada, sin embargo, puede realizar la postulación de manera normal siempre 
                    y cuando acredite que usted tiene algún tipo de beneficio
                    y éste aún no se ha cargado (por ejemplo, el beneficio de gratuidad)
                </span>
            </div>
            <div class="row">
                <label class="col-md-4 control-label">Verificador <span style="color:#ff0000;">(*)</span></label>
                <div class="col-md-8">
                    <input class="form-control" type="file" id="pdf_verificador" name="verificador" size="20" onchange="return verificadoValidador()" required>
                    <span id="verificado_invalido" class="invalid-feedback" style="display:hide; color:red;">Archivo inválido: No es PDF.</span>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="container center">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary w-100" type="submit" id="submit_formulario"><i class="fa-regular fa-paper-plane"></i> Enviar su postulación</button>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

    <div id="footer">
        <center>
                <p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p>
        </center>	
    </div>

</body>

<script>
    function cvValidador() {
        var cvInput = document.getElementById('input_cv');
        var fileCvValidator = document.getElementById('cv_invalido');
        var rutaCv = cvInput.value;
        var allowedExtensions =/(\.pdf)$/i;
         
        if (!allowedExtensions.exec(rutaCv)) {
            fileCvValidator.style.display = "block",
            cvInput.value = '';
            return false;
        }
    }
</script>

<script>
    function antecedentesValidador() {
        var antecedenteInput = document.getElementById('pdf_antecedente');
        var fileAntValidator = document.getElementById('antecedente_invalido');
        var rutaAnt = antecedenteInput.value;
        var allowedExtensions =/(\.pdf)$/i;
         
        if (!allowedExtensions.exec(rutaAnt)) {
            fileAntValidator.style.display = "block",
            antecedenteInput.value = '';
            return false;
        }
    }
</script>

<script>
    function cInteresValidador() {
        var cInteresInput = document.getElementById('pdf_cinteres');
        var fileCiValidator = document.getElementById('cinteres_invalido');
        var rutaCiPath = cInteresInput.value;
        var allowedExtensions =/(\.pdf)$/i;
         
        if (!allowedExtensions.exec(rutaCiPath)) {
            fileCiValidator.style.display = "block",
            cInteresInput.value = '';
            return false;
        }
    }
</script>

<?php if ($postulante['deuda_dafe']=="Si") : ?>

    <script>
        function verificadoValidador() {
            var VInput = document.getElementById('pdf_verificador');
            var fileVValidator = document.getElementById('verificado_invalido');
            var fileVPath = VInput.value;
            var allowedExtensions =/(\.pdf)$/i;
            
            if (!allowedExtensions.exec(fileVPath)) {
                fileVValidator.style.display = "block",
                VInput.value = '';
                return false;
            }
        }
    </script>

<?php endif; ?>

<script>
    document.querySelector(".number_input").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
            evt.preventDefault();
        }
    });
</script>
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        var submit_formulario = document.getElementById('submit_formulario')
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
</html>