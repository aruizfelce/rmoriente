<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet"  href="<?php echo base_url();?>css/bootstrap.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>css/estilos.css">  
    
    <style>
        input:required {
            box-shadow:  "0 0 3px blue";    
            border-color: "#ff3716";
            
        }  
        
               
     </style>
  <script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
         
   <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script> 
   <script src="<?php echo base_url();?>js/fontawesome-all.js"></script>
      

      <script>
        
             
        
        function darcita(dia,turno){
          document.getElementById("diacita").value = dia;
          document.getElementById("turno").value = turno;
          
        }

        
    </script>  

    <title>Resonancia Magnética Oriente</title>
  </head>
  
  <body>
   <!-- BANNER -->
    <div class="container-fluid banner" >
      <div class="row text-white  align-items-center">
        <div class="col-3">
             <img src="http://localhost/rmoriente/images/logo.png" id="imagen" >
        </div>

        <div class="col-9 align-self-center">     
          <h1 class="stroke"> Resonancia Magnética Oriente C.A.</h1>
        </div>  
      </div>  
    </div>
  <!-- -->
  <!-- BARRA NAVEGACION -->
    <nav class="navbar navbar-expand-md navbar-light fondo_navbar" >
         <a class="navbar-brand" href="#"></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"  aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <div class="navbar-nav  ml-auto text-center">
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>">Inicio</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>solicitar/citas">Citas</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>solicitar/presupuestos">Presupuestos</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>solicitar/resultados">Resultados</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>informacion/estudios">Estudios</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>informacion/preguntas">Preguntas</a>
            <a class="nav-item nav-link font-weight-bold" href="<?php echo base_url();?>informacion/nosotros">Nosotros</a>

          </div>
        </div>
    </nav>
<!-- FIN BARRA NAVEGACION -->