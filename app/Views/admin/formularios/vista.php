<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>

    <script src="<?= base_url() ?>/public/js/jquery2.1.1/jquery.min.js"></script>

    <title>SPM | Formulario</title>
    
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
                        <a class="nav-link" href="<?= base_url() ?>/admin/universidades"><i class="fa-solid fa-building-columns"></i> Universidades</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/admin/postulantes"><i class="fa-solid fa-people-group"></i> Postulantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>/admin/formulario"><i class="fa-solid fa-list-ul"></i> Formulario</a>
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
            <center><h2 class="center">Edición de formulario de postulación</h2></center>
        </div>

        <?php if ($preguntas == false):?>

            <div class="row" style="margin-top:200px; margin-bottom:200px;">
                <div class="alert alert-danger" role="alert">
                    <center>
                        No existen preguntas creadas.
                    </center>
                </div>
            </div>  

        <?php else: ?>

            <div class="row">
                <div class="col-md-12 info_box">
                    <table class="table  caption-top table-striped table-hover table-borderedless border-dark">
                        <caption>Preguntas adicionales existentes:</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Simple o múltiple</th>
                                <th scope="col">Tipo de pregunta</th>
                                <th scope="col">Opciones</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($preguntas as $pregunta): ?>
                                <tr>
                                    <td><?=$pregunta['ID_PREGUNTA']?></td>
                                    <td><?=$pregunta['TITULO']?></td>
                                    <td><?=$pregunta['TIPO']?></td>
                                    <td><?=$pregunta['TIPO_INPUT']?></td>

                                    <td>
                                    <?php if ($pregunta['TIPO']=="Simple"): ?>
                                        No posee opciones.
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" data-bs-target="#preguntaModal" 
                                        data-bs-id="<?=$pregunta['ID_PREGUNTA']?>" data-bs-titulo="<?=$pregunta['TITULO']?>"><i class="fa-solid fa-pen-to-square"></i> Modificar</button>
                                    <?php endif; ?>
                                    <?php if($pregunta['TIPO']=="Múltiple") : ?>

                                        <?php for ($i=1; $i < $pregunta['contador_opciones'] ; $i++) : ?>
                                            <?=$pregunta['opcion_'.$i]?><?php if ($i!=($pregunta['contador_opciones']-1)) : ?>, <?php endif; ?>
                                        <?php endfor; ?>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" data-bs-target="#preguntaMultipleModal" 
                                        data-bs-id="<?=$pregunta['ID_PREGUNTA']?>" data-bs-titulo="<?=$pregunta['TITULO']?>" data-bs-tipo="<?=$pregunta['TIPO']?>" > 
                                        <i class="fa-solid fa-pen-to-square"></i> Modificar </button>
                                    <?php endif; ?>
                                   </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $paginador->links();?>
                </div>
            </div>

            <div class="modal fade" id="preguntaMultipleModal" tabindex="-1" aria-labelledby="preguntaMultipleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="preguntaMultipleModalLabel">Modificar Pregunta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" action="<?= base_url() ?>/admin/formulario/multiple" method="post" accept-charset="utf-8" id="form_modificar_pregunta" novalidate>
                    <input type="hidden" name="_method" value="PUT"/>

                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <center><h4>Parámetros</h4></center>
                            <input class="form-control rest proh" id="id_pregunta" readonly="true" type="hidden" name="id_pregunta_m">
                            
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="tipo_multiple">Tipo</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="tipo_multiple" required>
                                        <option value='Checkbox'>Checkbox</option>
                                        <option value='Radio'>Radio</option>
                                        <option value='Dropdown'>Dropdown</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="titulo_pregunta">Titulo o etiqueta</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="titulo_pregunta_m" size="50" required>
                                </div>
                            </div>

                            <div class="row">
                                <div id="nuevo_label_m" class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Opcion 1..." name="m_nuevo_1" id="m_nuevo_1" style="margin-top:5px; margin-bottom:5px;" required>
                                </div>
                            </div>
                            <div class="row" style="padding-top:10px;">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success w-100" onclick="añadir_m()"><i class="fa-solid fa-circle-plus"></i> Añadir nuevo campo</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-danger w-100" onclick="remover_m()"><i class="fa-solid fa-circle-minus"></i> Remover campo</button>
                                </div>
                                <input type="hidden" value="1" id="total_campo_m" name="total_campo_m">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk" id="boton_modificar_pregunta"></i> Modificar</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            </div>





        
            <div class="modal fade" id="preguntaModal" tabindex="-1" aria-labelledby="preguntaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="preguntaModalLabel">Modificar Pregunta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" action="<?= base_url() ?>/admin/formulario/modificar/" method="post" accept-charset="utf-8" id="form_modificar_pregunta" novalidate>
                    <input type="hidden" name="_method" value="PUT"/>

                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <center><h4>Parámetros</h4></center>
                            <input class="form-control rest proh" id="id_pregunta" readonly="true" type="hidden" name="id_pregunta">
                            
                            <div class="row"> 
                                <label class="col-md-4 control-label" for="tipo_simple">Tipo</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="tipo_simple" required>
                                        <option value='Texto'>Texto</option>
                                        <option value='Numero'>Numero</option>
                                        <option value='Fecha'>Fecha</option>
                                        <option value='Email'>Email</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 control-label" for="titulo_pregunta">Titulo o etiqueta</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="titulo_pregunta" size="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk" id="boton_modificar_pregunta"></i> Modificar</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            </div>

        <?php endif; ?>
    </div>  

    <div class="container center">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-success btn-circle w-100" data-bs-toggle="modal" data-bs-target="#crearPreguntaInputModal"><i class="fa-solid fa-address-book"></i> Añadir nueva pregunta de Input</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-success btn-circle w-100" data-bs-toggle="modal" data-bs-target="#crearPreguntaMultipleModal"><i class="fa-solid fa-address-book"></i> Añadir nueva pregunta múltiple</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="crearPreguntaInputModal" tabindex="-1" aria-labelledby="crearPreguntaInputModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearPreguntaInputModalLabel">Nueva pregunta de Input</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="<?= base_url() ?>/admin/formulario/crear/input" method="post" accept-charset="utf-8" id="form_crear_pregunta" novalidate>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <center><h4>Parámetros</h4></center>
                        <div class="row"> 
                            <label class="col-md-4 control-label" for="tipo_pregunta">Tipo de pregunta</label>
                            <div class="col-md-8">
                                <select class="form-select" name="tipo_pregunta" required>
                                    <option value='Texto'>Texto</option>
                                    <option value='Numero'>Numero</option>
                                    <option value='Fecha'>Fecha</option>
                                    <option value='Email'>Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 control-label" for="titulo_pregunta">Nombre o etiqueta de la pregunta</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="titulo_pregunta" size="50" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="boton_crear_pregunta"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="crearPreguntaMultipleModal" tabindex="-1" aria-labelledby="crearPreguntaMultipleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearPreguntaMultipleModalLabel">Crear pregunta múltiple</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url() ?>/admin/formulario/crear/multiple" method="post" accept-charset="utf-8" id="form_crear_pregunta" novalidate>
        <div class="modal-body">
            <div class="contanier">
                
                <div class="row">
                    <label for="" class="col-md-4">Tipo de pregunta</label>
                    <div class="col-md-8">
                        <select class="form-control" name="tipo_pregunta">
                            <option value='Checkbox'>Checkbox</option>
                            <option value='Radio'>Radio</option>
                            <option value='Dropdown'>Dropdown</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="" class="col-md-4">Etiqueta principal</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="etiqueta" required>
                    </div>
                </div>
                <br>                    
                <center>Campos de selección</center>
                <br>
                <div class="row">
                    <div id="nuevo_label" class="col-md-12">
                        <input type="text" class="form-control" placeholder="Opcion 1..." name="nuevo_1" id="nuevo_1" style="margin-top:5px; margin-bottom:5px;" required>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success w-100" onclick="añadir()"><i class="fa-solid fa-circle-plus"></i> Añadir nuevo campo</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-danger w-100" onclick="remover()"><i class="fa-solid fa-circle-minus"></i> Remover campo</button>
                    </div>
                    <input type="hidden" value="1" id="total_campo" name="total_campo">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary" id="boton_crear_pregunta_m"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
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
function añadir(){
      var nuevo_label_no = parseInt($('#total_campo').val())+1;
      var nuevo_input="<input type='text' class='form-control' placeholder='Opcion "+nuevo_label_no+"...' style='margin-top:5px; margin-bottom:5px;' name='nuevo_"+nuevo_label_no+"' id='nuevo_"+nuevo_label_no+"' required>";
      $('#nuevo_label').append(nuevo_input);
      $('#total_campo').val(nuevo_label_no)
    }
    function remover(){
      var ultimo_label = $('#total_campo').val();
      if(ultimo_label>1){
        $('#nuevo_'+ultimo_label).remove();
        $('#total_campo').val(ultimo_label-1);
      }
    }
</script>

<script>
function añadir_m(){
      var nuevo_label_no = parseInt($('#total_campo_m').val())+1;
      var nuevo_input="<input type='text' class='form-control' placeholder='Opcion "+nuevo_label_no+"...' style='margin-top:5px; margin-bottom:5px;' name='m_nuevo_"+nuevo_label_no+"' id='nuevo_"+nuevo_label_no+"' required>";
      $('#nuevo_label_m').append(nuevo_input);
      $('#total_campo_m').val(nuevo_label_no)
    }
    function remover_m(){
      var ultimo_label = $('#total_campo_m').val();
      if(ultimo_label>1){
        $('#nuevo_m_'+ultimo_label).remove();
        $('#total_campo_m').val(ultimo_label-1);
      }
    }
</script>

<script>
    //cada script es para un formulario distinto, modificar
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        var submit_formulario = document.getElementById('boton_crear_pregunta_m')
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
    //cada script es para un formulario distinto, modificar
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        var submit_formulario = document.getElementById('boton_crear_pregunta')
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
var preguntaModal = document.getElementById('preguntaModal')
preguntaModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id_pregunta = button.getAttribute('data-bs-id')
  var nombre_pregunta = button.getAttribute('data-bs-titulo')

  var modalBodyID = preguntaModal.querySelector(".modal-body input[name='id_pregunta']")
  var modalBodyTitulo = preguntaModal.querySelector(".modal-body input[name='titulo_pregunta']")

  modalBodyID.value = id_pregunta
  modalBodyTitulo.value = nombre_pregunta
})
</script>

<script>
    var form_crear_pregunta = document.getElementById('form_crear_pregunta');
    var boton_crear_pregunta = document.getElementById('boton_crear_pregunta');
    form_crear_pregunta.addEventListener('submit', function() {
        boton_crear_pregunta.setAttribute('disabled', 'disabled');
    }, false);
</script>

<script>
    var form_modificar_pregunta = document.getElementById('form_modificar_pregunta');
    var boton_modificar_pregunta = document.getElementById('boton_modificar_pregunta');
    form_modificar_pregunta.addEventListener('submit', function() {
        boton_modificar_pregunta.setAttribute('disabled', 'disabled');
    }, false);
</script>

<script>
    var preguntaMultipleModal = document.getElementById('preguntaMultipleModal')
    preguntaMultipleModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    
    var id_pregunta = button.getAttribute('data-bs-id')
    var titulo_pregunta = button.getAttribute('data-bs-titulo')
    var contador = button.getAttribute('data-bs-op')
    
    var modalMBodyID = preguntaMultipleModal.querySelector(".modal-body input[name='id_pregunta_m']")
    var modalMBodyTitulo = preguntaMultipleModal.querySelector(".modal-body input[name='titulo_pregunta_m']")
    modalMBodyID.value = id_pregunta
    modalMBodyTitulo.value = titulo_pregunta

})
</script>

<style>
.modal-content {
    background: #576F72;
    color : #ffffff;
}
</style>

</html>