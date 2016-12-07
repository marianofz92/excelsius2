<?php
require_once('conn/connect.php');
session_start();

?>
<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
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
 <div id="contenido">
  <div id="titulo">
      <p>SELECCIONE LA FECHA DEL TURNO CON <?php echo utf8_encode($_SESSION['prof'])  ?></p>
    </div> 
    <form class="formulario"  method="post" id="formulario">
      
      <label >Fecha: </label> 
      <input id="lblfecha" class="fecha-inp"  placeholder="SELECCIONE LA FECHA DEL TURNO"  type="text" required name="lblfechaa">
      <input type="submit" value="CONSULTAR" class="btnconsulta"  id="btnconsultar" >
      <input type="submit" value ="PROBAR" id="probar_btn">
     <script src="js/jquery-ui.min.js"></script>
       <script src="js/datepicker-es.js"></script>
        <script>
        $("#lblfecha").datepicker( $.datepicker.regional[ "es" ]);
    
    </script>
    
  </form>    
  <script src="js/jquery-ui.min.js"></script>

  <script>
      $(document).ready(function(){
        $("#probar_btn").click(function(){
            alert("<?php  echo cargarListaDias();?>"); 
		    
	});
});
     </script> 
  <div id="resultado">
   
      <form action="" method="post" class="formulario-resultado" >
<?php
 
    function cargarListaDias()
{
        
 $fecha=$_POST['lblfecha']; 
list($dia, $mes, $anio)= explode ("/", $fecha);
$fecha_consulta= $anio . '-' . $mes . '-' . $dia;
$fechats=strtotime($fecha_consulta);
switch (date('w', $fechats))
{ 
    case 0: $dia_c="Domingo"; break; 
    case 1: $dia_c="Lunes"; break; 
    case 2: $dia_c="Martes"; break; 
    case 3: $dia_c="Miercoles"; break; 
    case 4: $dia_c="Jueves"; break; 
    case 5: $dia_c="Viernes"; break; 
    case 6: $dia_c="Sabado"; break; 
   
}  
 $id_profesional=$_SESSION['idprofesional'];  
 $consulta="SELECT * FROM config_horario WHERE profesional_idProfesional=$id_profesional AND dia =$dia_c";
//$consulta="SELECT * FROM config_horario INNER JOIN profesionales2 ON profesional_idProfesional =id_profesional AND profesional_idProfesional=$id_profesional AND dia =$dia_c"; ES NECESARIO EL JOIN????
 $resultado=$connect->query($consulta);
    
?>
        <ul id="listas" class="horarios">
         <li><p class="hora1"> HORA </p> <p class="estado1"> ESTADO</p> <p class="lugar1">LUGAR</p></li>
<?php       
  while($fila=mysqli_fetch_assoc($resultado)) // ACA SE DIVIDE POR RANGO
  { 
   $desde=$fila['desde']; 
   $hasta=$fila['hasta'];
    $rango=$hasta-$desde;
   $segundos_horaInicial=strtotime($desde);
   $segundos_horaFinal=strtotime($hasta);
   $segundos_intervalo= 15*60; //15 es la cantidad de minutos entre turno y turno.
   

while($segundos_horaInicial<=$segundos_horaFinal) //con < si quieren salir a su hora puntual.
  {
     $nuevaHora=date("H:i",$segundos_horaInicial);
      ?> <li class="hora"><p> <?php echo $nuevaHora ?></p>
      <?php 
          $consulta2="SELECT hora FROM turno WHERE profesional_idProfesional='$id_profesional' AND fecha='$fecha'";
          $resultado2=$connect->query($consulta2);
          while($fila2=mysqli_fetch_assoc($resultado2)) // TODOS LOS TURNOS DE ESE DIA Y SE ESE PROFESIONAL Y LOS COMPARA CON LA FECHA
          {
             if($fila2['hora']=$nuevaHora)//
             {
                echo "<p> NO DISPONIBLE </p>";
                    
             }
    else
    {
        echo "<p> DISPONIBLE </p>";
        
    }
          }
               
    ?> 
     </li>
   <?php
    $segundos_horaInicial=$segundos_horaInicial+$segundos_intervalo; 
        
  }//while de los rangos
  }//while de los registros encontrados.
}
   
  
?>
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