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
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/registro.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/default.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
      
        <script src="js/validar.js"></script>
        <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script type="text/javascript">
        //override defaults
        alertify.defaults.transition = "zoom";
        </script>
        
        
     
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
<main>
   <div id="contenedor_registro">
      <h1>Registrate en nuestro sistema</h1>
<form action="registrar.php" method="post" class="form-register" onsubmit="return validar();">
<h2 class="form-titulo">CREA UNA CUENTA EN EXCELSIUS SALUD</h2>
<div class="contenedor-inputs">
    <input type="text"name="nombre" placeholder="Nombre" class="input-48" id="nombre" required>
    <input type="text" name="apellidos" placeholder="Apellidos" class="input-48" id="apellidos" required>
    <input type="text" name="telefono" placeholder="Teléfono" class="input-100"id="telefono" required>
    <input type="email" name="email" placeholder="E-mail" class="input-100" id="email" required>
    <input type="text" name="usuario" placeholder="Usuario" class="input-100"id="usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" class="input-48" id="clave" required>
    <input type="password" name="clave2" placeholder="Repita contraseña" class="input-48" id="clave2" required>
 
    <input type="submit" value="Registrar" class="btn-enviar">
    <p class="form-link">¿Ya tiene una cuenta?<a href="login.php">Ingrese aqui</a></p>
    <p class="form-link"><a href="recuperar-contra.php">¿Olvidó su contraseña?</a></p>
    
</div>
      <div class="alert alert-info">
          Cuenta sólo para pacientes. Para registrarse como profesional, comuníquese <a href="contacto.php">AQUÍ.</a>
      </div>
       
   </div>
    
</main>
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