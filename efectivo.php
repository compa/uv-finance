<?php require 'finance.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Veracruzana</title>
    <link rel="stylesheet" href="<?= SUBPATH; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SUBPATH; ?>/css/style.css">
    <script type="text/javascript" src="<?= SUBPATH; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= SUBPATH; ?>/js/handlebars.min.js"></script>
    <script type="text/javascript" src="<?= SUBPATH; ?>/js/mustache.min.js"></script>
    <script src="/finance_app/js/general.js"></script>
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
            <li class="active" style="background-color:#463265;">
                <a href="<?= SUBPATH; ?>/index.php?destroy=true" id="exit"  style="background-color:#463265;">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container" style="width:1024px;padding:0;margin 40px auto;">
        <div style="width: 200px; display:inline-block; border:0; margin:40px 10px 10px 10px; float:left;">
            <ul class="nav nav-pills nav-stacked" >
                <li id="cce"><a href="#/cce">Ciclo de Conversión del Efectivo.</a></li>
                <li id="co" ><a href="#">Ciclo Operativo.</a></li>
                <li id="epi"><a href="#">Edad Promedio del Inventario.</a></li>
                <li id="ppc"><a href="#">Periodo Promedio de Cobro.</a></li>
                <li id="ppp"><a href="#">Periodo Promedio de Pago.</a></li>
                <li id="mb" ><a href="#">Modelo Baumol</a></li>
            </ul>
        </div>
        <div class="starter-template">
        </div>
    </div>
    <a href="index.php" class="btn btn-danger btn-lg" style="display:block;margin:15px auto;width:100px;" > &laquo; Atras </a>
  </body>
</html>

<script id="cce-template" type="text/x-handlebars-template">
  <p class="well"><b>CICLO DE CONVERSIÓN DEL EFECTIVO: (CCE) </b></p>
  <p>Es la cantidad del tiempo que los recursos de una empresa se mantienen invertidos.</p>
  <div style="text-align:center; width:100%;">
    <span class="alert alert-success" style="margin:10px; display:inline-block;">
    <strong>CCE = EPI (días) + PPC (días) – PPP</strong>
    </span>
  </div>
  <ul>
    <li><b>PPP</b> = Periodo Promedio de Pago (Tiempo en que me tardo en Pagar a los Proveedores)</li>
    <li><b>EPI</b> = Edad promedio de inventario ó antigüedad del inventario (Días que tarda el inventario desde que lo compro hasta el día que lo vendo)</li>
    <li><b>PPC</b> = Periodo Promedio de Cobro</li>
  </ul>
  <div style="text-align:center; width:100%;">
  <span class="alert alert-info" style="margin:10px; display:inline-block;">
    CCE = <input type="text" class="form-control" id="epi_cce"> días <strong>+</strong>
    <input type="text" class="form-control" id="ppc_cce"> días <strong>-</strong>
    <input type="text" class="form-control" id="ppp_cce"> días
    </span>
  </div>
  <p style="text-align:right;">
      <span class="alert alert-warning" style="margin:10px; display:inline-block;">
      El ciclo de conversión del Efectivo es: <input type="text" id="total" class="form-control" disabled="disabled" >
      </span>
  </p>
  <script>
    $('#epi_cce').on('blur', function(){ calculate(); });
    $('#ppp_cce').on('blur', function(){ calculate(); });
    $('#ppc_cce').on('blur', function(){ calculate(); });

    var calculate = function (){
      if(!validate( ['epi_cce','ppc_cce', 'ppp_cce'])) return;
      $('#total').val(  ($('#epi_cce').val()*1) +
                        ($('#ppc_cce').val()*1) -
                        ($('#ppp_cce').val()*1)  )
    }
    
  </{{s}}>
</script>

<script id="co-template" type="text/x-handlebars-template">
  <p class="well"><b>CICLO OPERATIVO: (CO) </b></p>
  <p>Es el tiempo que transcurre desde el inicio del proceso de producción hasta el cobro del dinero por la venta del producto terminado. Comprende los inventarios y las cuentas por cobrar.</p>
  <div style="text-align:center; width:100%;">
    <span class="alert alert-success" style="margin:10px; display:inline-block;">
    <strong>CO = EPI + PPC</strong>
    </span>
  </div>
  <ul>
    <li><b>CO</b> = Ciclo Operativo (Días que tardan los clientes en pagarme)</li>
    <li><b>PPC</b> = Periodo promedio de cobro</li>
    <li><b>EPI</b> = Edad promedio de inventario ó antigüedad del inventario (Días que tarda el inventario desde que lo compro hasta el día que lo vendo)</li>
  </ul>
  <div style="text-align:center; width:100%;">
  <span class="alert alert-info" style="margin:10px; display:inline-block;">
    CCE = <input type="text" class="form-control" id="epi_co"> días <strong>+</strong>
    <input type="text" class="form-control" id="ppc_co"> días 
    </span>
  </div>
  <p style="text-align:right;">
      <span class="alert alert-warning" style="margin:10px; display:inline-block;">
      El ciclo Operativo es igual a: <input type="text" id="total" class="form-control" disabled="disabled" > Días
      </span>
  </p>
  <script>
    $('#epi_co').on('blur', function(){ calculate(); });
    $('#ppc_co').on('blur', function(){ calculate(); });

    var calculate = function (){
      if(!validate(['epi_co','ppc_co'])) return;
      $('#total').val(  ($('#epi_co').val()*1) +
                        ($('#ppc_co').val()*1))
    }
  </{{s}}>
</script>

<script id="epi-template" type="text/x-handlebars-template">
  <p class="well"><b>{{title}}</b></p>
  <ul>
        {{#each attributes}} 
             <li><b> {{a}} </b> = {{b}} </li>
        {{/each}}
  </ul>
  <div style="text-align:center; width:100%;">
      <span class="alert alert-info" style="margin:10px; display:inline-block;">
      {{one}} = <input type="text" class="form-control" id="ii"> <strong>+</strong>
      <input type="text" class="form-control" id="if"> <strong>/</strong> <input type="text" class="form-control" value="2" disabled="disabled">
      <strong> = </strong> <input type="text" class="form-control" id="total_ip" disabled="disabled">
      </span>
  </div>

  <div style="text-align:center; width:100%;">
      <span class="alert alert-info" style="margin:10px; display:inline-block;">
      {{two}} = <input type="text" class="form-control" id="cv"> <strong>/</strong>
      <input type="text" class="form-control" id="ip" disabled="disabled">
      <strong> = </strong> <input type="text" class="form-control" id="total_ri" disabled="disabled">

      <img  id="lock-ri" src="img/lock-close.png" >
      </span>
  </div>

  <div style="text-align:center; width:100%;">
      <span class="alert alert-info" style="margin:10px; display:inline-block;">
      {{three}} = <input type="text" class="form-control" id="ii" disabled="disabled" value="360"> <strong>/</strong>
       <input type="text" class="form-control" id="ri" disabled="disabled"> 
      <strong> = </strong> <input type="text" class="form-control" id="total_epi" disabled="disabled">
      <img  id="lock-epi" src="img/lock-close.png" >
      </span>
  </div>
  <script>
      // 
      $('#lock-ri').on('click', function(){ 
        if($(this).attr('src') == 'img/lock-close.png'){
            $(this).attr('src', 'img/lock-open.png');
            $('#ip').removeAttr('disabled');
        } else {
            $(this).attr('src', 'img/lock-close.png');
            $('#ip').attr('disabled', 'disabled');
        }
      });
      //
      $('#lock-epi').on('click', function(){ 
        if($(this).attr('src') == 'img/lock-close.png'){
            $(this).attr('src', 'img/lock-open.png');
            $('#ri').removeAttr('disabled');
        } else {
            $(this).attr('src', 'img/lock-close.png');
            $('#ri').attr('disabled', 'disabled');
        }
      });
      //IP
      $('#ii').on('blur', function(){ calculate_ip(); });
      $('#if').on('blur', function(){ calculate_ip(); });
      var calculate_ip = function (){
          if(!validate(['ii','if'])) return;
          var cantidad = (($('#ii').val()*1) + ($('#if').val()*1)) / 2 ;
          $('#total_ip').val(cantidad);
          $('#ip').val(cantidad);
          calculate_ri();
      }
      // RI (Rotacion de Inventario)
      $('#cv').on('blur', function(){ calculate_ri(); });
      $('#ip').on('change', function(){ calculate_ri(); });
      var calculate_ri = function (){
          if(!validate(['cv','ip'])) return;
          var cantidad = (($('#cv').val()*1) / ($('#ip').val()*1));
          $('#total_ri').val(cantidad);
          $('#ri').val(cantidad);
          calculate_epi();
      }
      // EPI (Edad promedio del Inventario)
      $('#ri').on('change', function(){ calculate_epi(); });
      var calculate_epi = function (){
          if(!validate(['ri'])) return;
          $('#total_epi').val(  360 / ($('#ri').val()*1) ) ;

      }
    </{{s}}>
</script>

<script id="mb-template" type="text/x-handlebars-template"></script>

<script type="text/javascript">
    var template = function(name) {
        return Handlebars.compile($('#'+name +"-template").html());
    };

    $(".nav-pills li").on('click',function(event){
        event.preventDefault();
        var id_template = $(this).attr('id');
        var id_template_r = id_template;
        id_template = (id_template == 'ppc' || id_template == 'ppp') ? "epi" : id_template; 
        var pretem = template(id_template);
        $( "li" ).each(function() {
            $( this ).removeClass( "active" );
        });
        $(this).addClass('active');
        var context = { s: 'script'};
        switch(id_template_r)
        {
            case "epi":
                context = { title : "EDAD PROMEDIO DEL INVENTARIO: (EPI)",
                        attributes : [
                                        { a : "EPI", b : "360 / RI"},
                                        { a : "RI" , b : "Rotación de Inventario" },
                                        { a : "RI" , b : "Costo de Ventas/Inventario Promedio" },
                                        { a : "IP" , b : " (Inventario Inicial + Inventario Final) / 2" }
                                    ],
                        one : "IP",
                        two : "RI",
                        three : "EPI",
                        s : "script" 
                        };
            break;

            case "ppc":
                context = { title : "PERIODO PROMEDIO DE COBRO: (PPC)",
                            attributes : [
                                        { a : "PPC", b : "360 / RCxC"},
                                        { a : "RCxC" , b : "Rotación de Cuentas por Cobrar" },
                                        { a : "RCxC" , b : "Ventas a Crédito / Promedio CxC" },
                                        { a : "PCxC" , b : " (Saldo Inicial + Saldo Final) / 2" }
                                    ],
                            one : "PCxC",
                            two : "RCxC",
                            three : "PPC",
                            s : "script"
                            };
                break;
            case  "ppp":
                context = { title : "PERIODO PROMEDIO DE PAGO: (PPP)",
                            attributes : [
                                        { a : "PPP", b : "360 / RCxP"},
                                        { a : "RCxP" , b : "Rotación de Cuentas por Pagar" },
                                        { a : "RCxP" , b : "Compras a Crédito / Promedio CxP" },
                                        { a : "PCxP" , b : " (Saldo Inicial + Saldo Final) / 2" }
                                    ],
                            one : "PCxP",
                            two : "RCxP",
                            three : "PPP" ,
                            s : "script"
                        };
                break;
        default:
            break;
      }
      $('.starter-template').html(pretem(context));
    });
</script>