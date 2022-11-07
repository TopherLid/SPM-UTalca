<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM | Postulaciones</title>
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/admin.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>

    <link href="<?= base_url() ?>/public/fa/css/all.css" rel="stylesheet">
    <script src="<?= base_url() ?>/public/fa/js/all.js"></script>



</head>
<?php $contador=1; ?>
<body  style="background-color: #E4DCCF;">
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
                <center><h2 class="center">Ver tickets de postulantes</h2></center>
            </div>
        
        
        <?php if ($postulaciones==false): ?>
            
            <div class="row" style="margin-top:200px; margin-bottom:200px;">
                <div class="alert alert-danger" role="alert">
                    <center>
                        No existen postulaciones registradas.
                    </center>
                </div>
            </div>
            
        <?php else : ?>
                                
            <div class="row">
                <label class="col-md-4" for="periodo_postulacion">Periodo de postulación:</label>
                <div class="col-md-8">
                    <select id="periodo_convocatoria" class="table-filter form-control" onchange="val()"> <!-- onchange="filter_rows()" -->
                        <option value="all">Todas las convocatorias</option>
                        <?php foreach($convocatorias as $conv): ?>
                           <option value='<?=$conv['ID_CONVOCATORIA']?>'>Convocatoria: <?=$conv['ID_CONVOCATORIA']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 info_box">
                    <div class="table-responsive">
                        <table id="tabla_lista_estudiantes" class="table caption-top table-striped table-hover table-borderedless border-dark">
                            <caption>Lista de estudiantes registrados:</caption>
                            <thead>
                                <tr>
                                    <th col-index=1 scope="col">#num</th>
                                    <th col-index=2 scope="col">Nombre estudiante</th>
                                    <th col-index=3 scope="col">N°Matrícula</th>
                                    <th col-index=4 scope="col">Convocatoria</th>
                                    <th col-index=5 scope="col">#</th>
                                    <th col-index=6 scope="col">Estado</th>
                                    <th col-index=7 scope="col">Programa</th>
                                    <th col-index=8 scope="col">Detalle</th>
                                    <th col-index=9 scope="col">Selección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador=1; foreach ($postulaciones as $postulacion): ?>
                                    <tr>
                                        <th>#<?=$contador?></th>
                                        <td><?=$postulacion['NOMBRE']?></td>
                                        <td><?=$postulacion['MATRICULA']?></td>
                                        <td><?=$postulacion['NOMBRE_CONVOCATORIA']?></td>
                                        <td><?=$postulacion['ID_CONVOCATORIA']?></td>
                                        <td><?=$postulacion['ESTADO_POSTULACION']?></td>
                                        <td><?=$postulacion['NOMBRE_PROGRAMA']?></td>
                                        <td>
                                            <a href='<?=base_url();?>/admin/postulantes/<?=$postulacion['ID_POSTULACION'];?>' class='btn btn-primary btn-circle' target="_blank" role='button'><i class="fa-solid fa-file"></i> Detalle</a>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-id="<?=$postulacion['ID_POSTULACION']?>" 
                                        data-bs-target="#exampleModal2">Selección</button>
                                        </td>
                                    </tr>
                                <?php $contador++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo $paginador->links(); ?>
                </div>
            </div>

            <br>

            <div id="hider" class="row">
                <div class="alert alert-danger" role="alert">
                Para ver las opciones, porfavor, seleccione un periodo de postulación.
                </div>
            </div>

            <div class="row gy-2">
                <div class="col-6">
                    <button id="btn_notificar" type="button" class="btn btn-info btn-circle w-100" style="display:none;" 
                    data-bs-toggle="modal" data-bs-target="#notificacionModal"><i class="fa-solid fa-share"></i> <i class="fa-regular fa-envelope"></i> Notificar estudiantes</button>
                    
                </div>
                <div class="col-6">
                    <a id="boton_exportar" class="btn btn-info btn-circle w-100" style="display:none;" role="button"><i class="fa-regular fa-file-excel"></i> Descargar planilla Excel</a>
                </div>
            </div>
            



<div class="modal fade" id="notificacionModal" tabindex="-1" aria-labelledby="notificacionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificacionModalLabel">Notificar estudiantes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="needs-validation" action="<?= base_url()?>/admin/movilidad/modificar" method="post" accept-charset="utf-8" id="form_modificar_programa" novalidate>
      <input type="hidden" name="_method" value="PUT"/>
      <div class="modal-body">
          <input class="form-control rest proh" id="id_notif" readonly="true" type="hidden" name="id_notif">
        ¿Está seguro/a de realizar la notificación de la convocatoria?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-info"><i class="fa-solid fa-share"></i> <i class="fa-regular fa-envelope"></i> Notificar estudiantes</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Modal2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">




        <form class="needs-validation" action="<?= base_url()?>/admin/movilidad/modificar" method="post" accept-charset="utf-8" id="form_modificar_programa" novalidate>
            <input type="hidden" name="_method" value="PUT"/>
            <input class="form-control rest proh" id="id_programa" readonly="true" type="hidden" name="id_programa">



            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">a</button>
        </div>
    </form>
    </div>
  </div>
</div>









                
            <?php endif; ?>
                
        </div>

    <div id="footer" style="padding-top: 150px; padding-bottom:50px; background-color: #E4DCCF;">
        <center><p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center>	
    </div>

<script> 
function val() 
{ 
    value = document.getElementById("periodo_convocatoria").value;
    
    notificacion = document.getElementById("boton_notificacion");
    hider = document.getElementById("hider");


    console.log(value)


    id_notif = document.getElementById("id_notif");
    

    var exampleModal = document.getElementById('notificacionModal')
    var modalBodyID = exampleModal.querySelector(".modal-body input[name='id_notif']");





    btn_notificar = document.getElementById("btn_notificar");
    
    exceldoc = document.getElementById("boton_exportar");
    exceldoc.target ="_blank";

    if (value != "all") {

        btn_notificar.style.display = "block" ;
        exceldoc.style.display = "block" ;

        hider.style.display = "none";
        modalBodyID.value = value;

        notificacion.href="<?=base_url()?>/admin/postulantes/notificar/"+value;
        exceldoc.href ="<?=base_url()?>/admin/postulantes/exportar/"+value;
    } else {

        hider.style.display = "block";

        modalBodyID.value = 0;

        btn_notificar.style.display = "none" ;
        exceldoc.style.display = "none" ;
    }

    let dropdown, table, rows, cells, convocatoria, filter;
    dropdown = document.getElementById("periodo_convocatoria");
    table = document.getElementById("tabla_lista_estudiantes");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;

    for (let row of rows) { 

        cells = row.getElementsByTagName("td");

        convocatoria = cells[3] || null; 
        if (filter === "all" || !convocatoria || (filter === convocatoria.textContent)) {
        row.style.display = "";
        }
        else {
        row.style.display = "none";
        }
    }

} 
</script> 
</body>
<style>
.modal-content {
    background: #576F72;
    color : #ffffff;
}
</style>
</html>