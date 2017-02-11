<?php

	$token = $_GET['token'];
	$idusuario = $_GET['idusuario'];
	
	$conexion = new mysqli('localhost', 'root', '', 'bd_prueba');

	$sql = "SELECT * FROM tblreseteopass WHERE token = '$token'";
	$resultado = $conexion->query($sql);
	
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();

		if( sha1($usuario['idusuario']) == $idusuario ){
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
         <script src="js/validar.pass.js"></script>
         <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/default.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
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


  <body>
    <div class="container contenedor_todo" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4 contenedor_a">
       <div class="alert alert-info">Por favor, ingrese y confirme su nueva contraseña.</div>
        <form action="cambiarpassword.php" method="post" onsubmit="return validar();">
          <div class="panel panel-default">
            <div class="panel-heading"> Restaurar contraseña </div>
            <div class="panel-body">
              <p></p>
              <div class="form-group">
                <label for="password" > Nueva contraseña: </label>
                <input type="password" id="clave1"class="form-control" name="password1" required>
              </div>
              <div class="form-group">
                <label for="password2"> Confirmar contraseña: </label>
                <input type="password" id="clave2"class="form-control" name="password2" required>
              </div>
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Aceptar" >
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="col-md-4"></div>

    </div> <!-- /container -->

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
<?php
		}
		else{
			header('Location:index.html');
		}
	}
	else{
		header('Location:index.html');
	}
?>