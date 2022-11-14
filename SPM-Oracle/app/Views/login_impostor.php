<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="<?= base_url() ?>/public/bs/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/public/bs/js/bootstrap.bundle.js"></script>
    <title>Portal de Identidad - Universidad de Talca</title>
    <link rel="icon" href="<?= base_url() ?>/public/ico/logo.ico">

    <link rel="stylesheet" href="<?= base_url() ?>/public/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/style_login.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login UTalca</title>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                <center><img src="/public/img/logo_utalca.png" style="padding-top: 40px"></center>
                <div class="card card-signin my-5">
                <!--<p class="pregunta">-->
                    <center>
                    SPM UTalca Login Impostor, para ingresar como estudiante, su nombre de usuario es su RUT sin dígito verificador. <br>
                    Para ingresar como administrativo, su nombre de usuario es su número único.<br>
                    La contraseña no funciona, debido a que no podemos utilizar el sistema de login de la universidad por el momento.
                    </center>
			    <!--</p>-->
		        <br><br>


                

                
            <?php if(isset($_SESSION['estado'])):?>

                <div class="row">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> <?=$_SESSION['estado']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <?php unset($_SESSION['estado']);?>

            <?php endif;?>

                <div class="card-body">
                    <h5 class="card-title text-center">PORTAL DE IDENTIDAD</h5>
                    <form action="<?= base_url() ?>/verificador" method="post" name="f" class="form">
		            <div class="form-group">
                	    <label for="login">NOMBRE DE USUARIO</label>                
                	    <input id="usuario" type="text" class="form-control form-control-lg" name="login" required="">
                    </div>
                    
                    <div class="form-group">
                	    <label for="pw">CONTRASEÑA DE ADMINISTRATIVO</label>                
                	    <input id="usuario" type="password" class="form-control form-control-lg" name="pw">
                    </div>

		            <div style="float: right; padding-bottom: 2rem; padding-top: 1rem;">
		                <img src="<?= base_url() ?>/public/img/btn.png" class="alinear">
		                <input type="submit" value="INICIAR SESION" class="texto_sesion">
                    </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <p class="texto_rojo">
                    <strong>Mesa de ayuda SPM/Helpdesk SPM</strong> <br>
                    +56989896187 - cparedes16@alumnos.utalca.cl
                </p>
            </div>
        </div>
    </div>

    <div id="footer">
        <center>
                <p class="texto_footer"> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p>
        </center>	
    </div>

</body>


</html>