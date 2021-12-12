<?php
  $servidor="localhost";
  $usuario="root";
  $password="";
  $baseDeDatos="base";
  $enlace=mysqli_connect($servidor,$usuario,$password,$baseDeDatos);
  if(!$enlace)
  {
    echo"Error en la conexion con el servidor";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <title>REGISTRO</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript"> 
    function registro(){
      var barra=document.getElementById('barra')
      barra.value +=10
      
    }
  </script> <!--Script para barra de progreso -->
</head>
<body class="vid">
 

<div class="iconos" fixed-bottom> <!-- BOTON FLOTANTE-->
<a href="https://www.instagram.com/miltonsalgado16/?hl=es-la" target="_blank"><img loading="lazy" alt="Sígueme en Instagram" height="45" width="45" src="https://1.bp.blogspot.com/-VFfOISywV0c/YPhkeRXuRQI/AAAAAAAAA1M/L75S9Usg5AovunH2Y-VzqJbaaY1LuK3eACPcBGAYYCw/s0/Instagram-icono.png" title="Sígueme en Instagram"/></a>

<main>
<div align="center">
<h1 style="color: white;">R E G I S T R O </h1>
<form  class="needs-validation" id="log" method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nombre</label><br>
        <input name="nombre" type="text" class="form-control" id="validationCustom01" placeholder="Nombre"required>
        <div class="valid-feedback">
          Correcto
          </div>
    </div>
    </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Email</label>
      <input name="correo" type="email" class="form-control" id="validationCustom02" align="center" placeholder="Correo Electronico" required>
       <div class="invalid-feedback">
        ERROR  
      </div>  <!-- ALERTS -->
    </div> 
  <button type="submit" class="btn btn-primary" name="registro" type="button" value="registro" id="registro" onclick="setInterval('registro()',500)"/>Registrarse</button>
  <br><br>
<form action="?" method="POST"> <!-- ReCaptcha -->
<div class="g-recaptcha" data-sitekey="6LeMwn4dAAAAAFZi6yDMzHh_DmSrelvRAv7Q2QGM"></div>
      <br/>
    </form> 
     
<div>
  <progress value="0"  max="100" id="barra" class="barrastyle"></progress>
</div> <!-- Barra de Progreso -->






</form>
<!-- <div class="g-recaptcha" data-sitekey="6LeMwn4dAAAAAFZi6yDMzHh_DmSrelvRAv7Q2QGM"></div>
      <br/>
      <input type="submit" value="registro"> -->
</main>
<video src="sabana.mp4" autoplay loop muted>
  
</video>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</body>
</html>

<?php

if(isset($_POST['registro']))
  {
    $nom=$_POST["nombre"];
    $to=$_POST["correo"];
    $subject="ZOOLOGICO BALAM";
    $message="Gracias por Registrarte ".$nom;

    mail($to,$subject,$message);
    
  }
  if(isset($_POST['registro']))
  {
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];

    $insertardatos="INSERT INTO prue VALUES('$nombre','$correo');";
    $ejecutar= mysqli_query($enlace,$insertardatos);
    if(!$ejecutar)
    {
      echo"Error en SQL";
    }
    else
    {
      header("Location: Pagina.html");
    }
  }
?>