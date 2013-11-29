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
      CEP = <input type="text" id="cep" class="form-control" disabled="disabled" >
      </span>
  </p>
  <script>
    $('#unidad').on('blur', function(){ calculate(); });
    $('#pedido').on('blur', function(){ calculate(); });
    $('#mantenimiento').on('blur', function(){ calculate(); });

    var calculate = function (){
      if(!validate(['unidad', 'pedido', 'mantenimiento'])) return;
      $('#cep').val( Math.sqrt(( 2 * ($('#unidad').val()*1) * ($('#pedido').val()*1) ) / ($('#mantenimiento').val()*1) ));
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
  </{{scp}}>
</script>

<script id="pr-template" type="text/x-handlebars-template">
<p class="well"><b> PUNTO DE REORDEN : (PR) </b></p>
  <ul>
    <li><b>Punto de Reorden </b><ul><li> Días de tiempo de entrega * Unidades de Uso Diario</li></ul></li>
    <li><b>Punto de Reorden con inventario de Seguridad</b> <ul><li>( Unidades de uso diario * Días de Espera) + Inventario de Seguridad</li></ul> </li>
  </ul>
  <div style="text-align:center; width:100%;">
    <span class="alert alert-info" style="margin:10px; display:inline-block;">
    Punto de Reorden =  <input type="text" class="form-control" id="ppc_cce"  >  
                        <strong>*</strong>
                        <input type="text" class="form-control" id="epi_cce">
                        <strong>=</strong>
                        <input type="text" class="form-control" id="epi_cce">
    </span>
  </div>

  <div style="text-align:center; width:100%;">
    <span class="alert alert-info" style="margin:10px; display:inline-block;">
    Punto de Reorden =  <strong>(</strong>
                        <input type="text" class="form-control" id="ppc_cce" >  
                        <strong>*</strong>
                        <input type="text" class="form-control" id="epi_cce">
                        <strong>)</strong>
                        <strong>+</strong>
                        <input type="text" class="form-control" id="epi_cce">
                        <strong>=</strong>
                        <input type="text" class="form-control" id="epi_cce">
    </span>
  </div>

  <script>
    $('#epi_cce').on('blur', function(){ calculate(); });
    $('#ppp_cce').on('blur', function(){ calculate(); });
    $('#ppc_cce').on('blur', function(){ calculate(); });

    var calculate = function (){
      if(!validate()) return;
      $('#total').val(  ($('#epi_cce').val()*1) +
                        ($('#ppc_cce').val()*1) -
                        ($('#ppp_cce').val()*1)  )
    }
    var validate = function (){
      var boxes = ['epi_cce','ppc_cce', 'ppp_cce'];
      for(var i=0; i< boxes.length; i++){
        console.log($('#'+boxes[i]).val());
        if(isNaN($('#'+boxes[i]).val()))
        {
          $("#"+boxes[i]).val('0');
          return false;
        }
      }
      return true;
    }
  </script>
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
        var context = { scp : "script"};

      $('.starter-template').html(pretem(context));
    });
</script>