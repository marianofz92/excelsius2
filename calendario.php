<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title>Excelsius Salud - Nuestros Servicios</title>
	<link rel="shortcut icon" href="img/icono.ico">
	<link rel="stylesheet" href="css/solicitar-turno.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <script src="js/jquery.js"></script>
    
</head>
<body>
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
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
<ul>
<li>Especialidad<select name="" id="">
<option value="">Cardiología</option>
<option value="">Odontología</option>
</select>
</li>
<li id="nombre-buscador">Nombre<input type="text"><input type="submit" value="Buscar" id="buscar-menu"></li>

</ul> 
</li>

</ul> 
</nav> 
</div>

<a href="<?php ?>" class="etiqueta-ingresar"> <?php ?> <img src="img/user.png" alt=""> </a>

</header>
<section id="contenedor_s">
 <div id="contenido">
  <div id="divs">
      <p>SELECCIONE DIA Y HORA DEL TURNO CON <?php global $id ;echo $id; ?></p>
      
   
  </div>
    <form class="formulario" action="consultar-fecha.php" method="post" >
      
      <p>Fecha</p> <input id="lblfecha" class="fecha-inp"  placeholder="SELECCIONE LA FECHA DEL TURNO" type="text" required  name="lblfecha">
      <input type="submit" value="CONSULTAR" class="btnconsulta" >
     <script src="js/jquery-ui.min.js"></script>
        <script>
        $("#lblfecha").datepicker();
    
    </script>
      
  </form>
 </div>
</section>
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