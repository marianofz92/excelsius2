<?php

session_start();
?>
<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    global $id;
    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
    header('Location: http://localhost/excelsius2/inicie-sesion.html');

    exit;
}
?>

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

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>
<section id="contenedor_s">
<<<<<<< HEAD
  <div id="divs">
      <p>SELECCIONE DIA Y HORA DEL TURNO CON <?php echo utf8_encode($_SESSION['apynom'])?></p>
      <?php  $time = time();

//echo date("d-m-Y ", $time);
$dia= date("d")+1;
$mes=date("m");
$anio= date("Y") ; ?>
      
    <div id="turnos">
        <ul >
            <li class="dias"><div class="ancho-dias">LUNES <?php echo $dia.'-' .$mes ?>
            </div>
               <ul class="horarios">
                   <li class="horarios-li"><a href="">08:30</a></li>
                   <li class="horarios-li"><a href="">09:00</a></li>
                   <li class="horarios-li"><a href="">09:30</a></li>
                   <li class="horarios-li"><a href="">10:30</a></li>
                   <li class="horarios-li"><a href="">11:00</a></li>
                   <li class="horarios-li"><a href="">11:30</a></li>
                   <li class="horarios-li"><a href="">12:00</a></li>
                   <li class="horarios-li"><a href="">12:30</a></li>
                   <li class="horarios-li"><a href="">13:00</a></li>
                   
                    
                     
            </ul>
            </li>
            <li class="dias"><div class="ancho-dias">LUNES</div>
               <ul class="horarios">
                   <li class="horarios-li"><a href="">08:30</a></li>
                   <li class="horarios-li"><a href="">09:00</a></li>
                   <li class="horarios-li"><a href="">09:30</a></li>
                   <li class="horarios-li"><a href="">10:30</a></li>
                   <li class="horarios-li"><a href="">11:00</a></li>
                   <li class="horarios-li"><a href="">11:30</a></li>
                   <li class="horarios-li"><a href="">12:00</a></li>
                   <li class="horarios-li"><a href="">12:30</a></li>
                   <li class="horarios-li"><a href="">13:00</a></li>
=======
 <div id="contenido">
  <div id="titulo">
      <p>SELECCIONE LA FECHA DEL TURNO CON <?php echo utf8_encode($_SESSION['prof'])  ?></p>
    </div> 
    <form class="formulario" action="consultar-fecha.php" method="post" >
      
      <label >Fecha: </label> 
      <input id="lblfecha" class="fecha-inp"  placeholder="SELECCIONE LA FECHA DEL TURNO" type="text" required  name="lblfecha">
      <input type="submit" value="CONSULTAR" class="btnconsulta" >
     <script src="js/jquery-ui.min.js"></script>
        <script>
        $("#lblfecha").datepicker();
    
    </script>
      
  </form>
  <div id="resultado">
      <form action="" method="post" class="formulario-resultado" >
        <ul class="horarios">
            <li><p class="hora1"> HORA </p> <p class="estado1"> ESTADO</p> <p class="lugar1">LUGAR</p></li>
            <li><p class="hora">08:00</p> <p class="estado"> DISPONIBLE</p></li> <p class="lugar1">San Juan 889</p>
            <li><p class="hora">08:15</p> <p class="estado-nd">NO DISPONIBLE</p></li>
            <li><p class="hora">08:30</p></li>
            <li><p class="hora">08:45</p></li>
            <li><p class="hora">09:00</p></li>
            <li><p class="hora">09:15</p></li>
            <li><p class="hora">09:30</p></li>
            <li><p class="hora">09:45</p></li>
            <li><p class="hora">10:15</p></li>
            <li><p class="hora">10:30</p></li>
            <li><p class="hora">10:45</p></li>
            <li><p class="hora">11:00</p></li>
            <li><p class="hora">11:15</p></li>
            <li><p class="hora">11:30</p></li>
            <li><p class="hora">11:45</p></li>
            <li><p class="hora">12:00</p></li>
            <li><p class="hora">12:15</p></li>
            <li><p class="hora">12:30</p></li>
           
       
            
>>>>>>> origin/master
            
        </ul>
          
          
      </form>
  </div>
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