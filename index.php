<?php require 'finance.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Universidad Veracruzana</title>
        <script type="text/javascript" src="<?= SUBPATH; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= SUBPATH; ?>/js/general.js"></script>
        <link rel="stylesheet" href="<?= SUBPATH; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= SUBPATH; ?>/css/style.css">
        <!--[if lt IE 9]>
          <script src="<?= SUBPATH; ?>/js/html5shiv.js"></script>
          <script src="<?= SUBPATH; ?>/js/respond.min.js"></script>
        <![endif]-->    
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <img src="<?= SUBPATH; ?>/img/uv.png" style="height:50px;width:40px;float:left;">
                    <a class="navbar-brand" href="#">Universidad Veracruzana</a>
                </div>
                <div class="collapse navbar-collapse" style="float:right;background-color:#463265;">
                    <ul class="nav navbar-nav" >
                        <li class="active" style="background-color:#463265;"><a href="<?= SUBPATH; ?>/index.php?destroy=true"  style="background-color:#463265;">Salir</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="container">
            <div class="starter-template-main">
                <h3>Universidad Veracruzana</h3>
                <h4>Facultad de Contaduría y Administración</h4>
                <div class="clearfix"></div>
                <p><b>Licenciatura en Sistemas Computacionales Administrativos</b></p>
                <p><b>Administración Financiera.</b></p>
                <p><b>Sección 503</b></p>
                <p class="well">Seleccione la Operación que desea Realizar:</p>
                <p><a href="<?= SUBPATH; ?>/efectivo.php" class="btn btn-primary" style="width:300px;"> Administración del Efectivo.</a></p>
                <p><a href="<?= SUBPATH; ?>/inventario.php" class="btn btn-primary" style="width:300px;"> Administración del Inventario.</a></p>
                <p><a href="#" class="btn btn-primary" style="width:300px;"> Administración de Cuentas por Cobrar.</a></p>
            </div>
        </div>
    </body>
</html>