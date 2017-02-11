<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
} else {
    
    $usuario='ingresar';
    $enlace='login.php';
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Recuperar contraseña-Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/registro.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/recuperar-contra.css">
 
        
        
     
    </head>
    <body>
        <header>

<div id="barramenu" class="contenedor">
<a href="index.php"><img src="img/logoblancosolo.png" id="logo" ></a>
<a id="textologo" href="javascript:$.scrollTo('0px',700);"><h1>Excelsius</h1></a>
<input type="checkbox" id="menu-bar">
<label class="icon-menu" for="menu-bar"></label>
<a href="index.php#equipo_m"><label class="icon-search" for=""></label></a>

<nav class="menu">

<ul> 


<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.html">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.html">Asociados</a></li>
<li><a href="servicios.html">Servicios</a></li>
<li><a href="noticias.html">Noticias</a></li>
<li><a href="contacto.html">Contacto</a></li>
<li class="submenu"><a href="javascript:$.scrollTo('#equipo_m',700); ">Buscar<span class="icon-search"></span></a></li>
</li>
</nav> 
</div>



</header>

  <body>
    <div class="container contenedor_todo" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4 contenedor_a" >
        <form id="frmRestablecer" action="validaremail.php" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"> Recuperar contraseña </div>
            <div class="panel-body">
              <p></p>
              <div class="form-group">
                <label  for="email">Por favor, ingrese el email asociado a su cuenta para recuperar la contraseña y aguarde unos instantes. </label>
                <input type="email" style="margin-top:20px" id="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
              </div>
            </div>
          </div>
        </form>
        <div id="mensaje">
          
        </div>
      </div>
      <div class="col-md-4"></div>

    </div> <!-- /container -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#frmRestablecer").submit(function(event){
          event.preventDefault();
          $.ajax({
            url:'validaremail.php',
            type:'post',
            dataType:'json',
            data:$("#frmRestablecer").serializeArray()
          }).done(function(respuesta){
            $("#mensaje").html(respuesta.mensaje);
            $("#email").val('');
          });
        });
      });
    </script>
    <footer>
            <div class="contenedor">
               <p class="copy">Excelsius salud &copy; 2016</p>
                <div class="sociales">
                    <a class="icon-facebook" href="https://www.facebook.com/excelsius.salud?fref=ts" target="_blank"></a>
                    <a class="icon-twitter" href=""></a>
                    <a class="icon-instagram" href="https://www.instagram.com/excelsiussalud/" target="_blank"></a>
                </div>
            </div>
        </footer> 
  </body>
</html>