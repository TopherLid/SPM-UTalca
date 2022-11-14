<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="box" style="display:flex;">
        <img style="width:100%;" src="<?=base_url();?>/public/img/banner.png">
    </div>

    <center><h3>Postulación #<span style="color:green"><?=$postulacion['ID_POSTULACION']?></span><h3></center>
    <br>
    <span>El siguiente documento corrobora que la postulación del estudiante ha sido realizada de manera exitosa con la siguiente información en caso de ocurrir algún problema, puede utilizar este documento para acreditar los datos.</span>
            
    <br>
    <center><h4>Información personal</h4></center>
    <ul>
        <li>Nombre: <?=$estudiante['nombre']?></li>
        <li>RUT: <?=$estudiante['RUT']?></li>
        <li>Nacimiento: <?=$estudiante['nacimiento']?></li>
        <li>SSO: <?=$estudiante['id_estudiante']?></li>
        <li>Email Institucional: <?=$estudiante['email']?></li>
        <li>Carrera: <?=$estudiante['carrera']?></li>
    </ul>
    <br>
    <center><h4>Información registrada</h4></center>
    <ul>
        <li>Convocatoria: <?=$postulacion['ID_CONVOCATORIA']?></li>
        <li>Nacionalidad: <?=$postulacion['NACIONALIDAD']?></li>
        <li>Telefono: <?=$postulacion['N_TELEFONO']?></li>
        <li>Email Personal: <?=$postulacion['EMAIL_PERSONAL']?></li>
        <li>Nivel Inglés: <?=$postulacion['NIVEL_INGLES']?></li>
        <li>Segundo Idioma: <?=$idioma['IDIOMA']?></li>
        <li>1ra selección: <?=$universidad1['NOMBRE']?></li>
        <li>2da selección: <?=$universidad2['NOMBRE']?></li>
        <li>3ra selección: <?=$universidad3['NOMBRE']?></li>
    </ul>

    <span style="padding-top 15px; padding-bottom 15px;">Nota: las respuestas de la convocatoria especófica no se verán reflejadas en este documento, sin embargo, el personal tiene acceso a éstas.</span>
    <center><span><h6>© 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA</h6></span></center>

</body>        
        
    
</html>

