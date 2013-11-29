<?php session_start(); ?>
<?php define("SUBPATH", "/finance_app"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Veracruzana</title>
    <link rel="stylesheet" href="<?= SUBPATH; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SUBPATH; ?>/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.0/backbone-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
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
          <a class="navbar-brand" href="index.php">Universidad Veracruzana</a>
        </div>
        <div class="collapse navbar-collapse" style="float:right;background-color:#463265;">
          <ul class="nav navbar-nav" >
            <li class="active" style="background-color:#463265;">
                <a href="<?= SUBPATH; ?>/index.php?destroy=true"  style="background-color:#463265;">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container" style="width:1024px;padding:0;margin 40px auto;">
        <div style="width: 200px; display:inline-block; border:0; margin:40px 10px 10px 10px; float:left;">
            <ul class="nav nav-pills nav-stacked" >
                <li id="cep"><a href="#/cce">Cantidad Económica de Pedido.</a></li>
                <li id="pr" ><a href="#">Punto de Reorden.</a></li>
            </ul>
        </div>
        <div class="starter-template">
        </div>
    </div>
  </body>
</html>

<script id="cep-template" type="text/x-handlebars-template">
  <p class="well"><b> CANTIDAD ECONÓMICA DE PEDIDO : (CEP) </b></p>
 
  <ul>
    <li><b>CEP</b> = &#8730; (2 * U * P) / M </li>
    <li><b>U</b> = Uso de Unidades por Periodo </li>
    <li><b>P</b> = Costo de Pedido de Orden </li>
    <li><b>M</b> = Costo de Mantenimiento por Unidad por Periodo</li>
  </ul>
  <div style="text-align:center; width:100%;">
  <span class="alert alert-info" style="margin:10px; display:inline-block;">
    CEP = <b style="font-size:25px;"> &#8730; </b> <strong>(</strong>
          <input type="text" class="form-control" id="ppc_cce" value="2" disabled="disabled" style="width:35px;">
          <strong>*</strong>  
          <input type="text" class="form-control" id="unidad"> 
          
          <strong>*</strong>
          <input type="text" class="form-control" id="pedido">
          <strong>)</strong> / 
          <input type="text" class="form-control" id="mantenimiento"> 
    </span>
  </div>
  <p style="text-align:right;">
      <span class="alert alert-warning" style="margin:10px; display:inline-block;">
      CEP = <input type="text" id="cep_total" class="form-control" disabled="disabled" >
      </span>
  </p>
  <script>
    $('#unidad').on('blur', function(){ calculate(); });
    $('#pedido').on('blur', function(){ calculate(); });
    $('#mantenimiento').on('blur', function(){ calculate(); });

    var calculate = function (){
      if(!validate(['unidad', 'pedido', 'mantenimiento'])) return;
      var tot = Math.sqrt(( 2 * ($('#unidad').val()*1) * ($('#pedido').val()*1) ) / ($('#mantenimiento').val()*1) );
      //alert(tot);
      $('#cep_total').val( tot);
    }
    var validate = function (boxes){
        for(var i=0; i< boxes.length; i++){
            if(isNaN($('#'+boxes[i]).val()))
            {
                $("#"+boxes[i]).val('0');
                return false;
            }else if($("#"+boxes[i]).val() == ''){
                 return false;
            }
        }
        return true;
      }
  </{{s}}>
</script>

<script id="pr-template" type="text/x-handlebars-template">
<p class="well"><b> PUNTO DE REORDEN : (PR) </b></p>
  <ul>
    <li><b>Punto de Reorden </b><ul><li> Días de tiempo de entrega * Unidades de Uso Diario</li></ul></li>
    <li><b>Punto de Reorden con inventario de Seguridad</b> <ul><li>( Unidades de uso diario * Días de Espera) + Inventario de Seguridad</li></ul> </li>
  </ul>
  <div style="text-align:center; width:100%;">
    <span class="alert alert-info" style="margin:10px; display:inline-block;">
    Punto de Reorden =  <input type="text" class="form-control" id="dias"  >  
                        <strong>*</strong>
                        <input type="text" class="form-control" id="unidades">
                        <strong>=</strong>
                        <input type="text" class="form-control" id="pr_total" disabled="disabled">
    </span>
  </div>

  <div style="text-align:center; width:100%;">
    <span class="alert alert-info" style="margin:10px; display:inline-block;">
    Punto de Reorden =  <strong>(</strong>
                        <input type="text" class="form-control" id="uud" >  
                        <strong>*</strong>
                        <input type="text" class="form-control" id="de">
                        <strong>)</strong>
                        <strong>+</strong>
                        <input type="text" class="form-control" id="is" >
                        <strong>=</strong>
                        <input type="text" class="form-control" id="pris_total" disabled="disabled">
    </span>
  </div>

  <script>
    $('#dias').on('blur', function(){ calculate_pr(); });
    $('#unidades').on('blur', function(){ calculate_pr(); });

    var calculate_pr = function (){
      if(!validate(['dias','unidades'])) return;
      $('#pr_total').val(  ($('#dias').val()*1) *
                        ($('#unidades').val()*1) );
    }

    $('#uud').on('blur', function(){ calculate_pris(); });
    $('#de').on('blur', function(){ calculate_pris(); });
    $('#is').on('blur', function(){ calculate_pris(); });

    var calculate_pris = function (){
      if(!validate(['uud','de','is'])) return;
      $('#pris_total').val(  (($('#uud').val()*1) * ($('#de').val()*1)) + ($('#is').val()*1) );
    }
  </{{s}}>
</script>


<script type="text/javascript">
    var template = function(name) {
        return Handlebars.compile($('#'+name +"-template").html());
    };

    $(".nav li").on('click',function(event){
        event.preventDefault();
        var id_template = $(this).attr('id');
        var pretem = template(id_template);
        $( "li" ).each(function() {
            $( this ).removeClass( "active" );
        });
        $(this).addClass('active');
        var context = { s : "script"};

      $('.starter-template').html(pretem(context));
    });
</script>