
<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
     $enlace='panel-paciente.php';
    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
}
?>


<?php require_once('conn/connect.php');

?>
<?php
    $search='';
if(isset ($_GET['search'])){
    $search=$_GET['search'];
    
}
$id_profesional='';
if(isset ($_GET['id_profesional'])){
    $id_profesional=$_GET['id_profesional'];
}

$consulta ="SELECT * FROM profesionales2 WHERE id_profesional =".$id_profesional."";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);
$insert="UPDATE profesionales2 SET visitas=visitas+1 WHERE id_profesional=".$id_profesional."";
$_SESSION['idprofesional']=$id_profesional;

$update= $connect->query($insert) or die ("No se ha podido actualizar la pagina");



?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<link rel="stylesheet" href="css/articulo.css">
<link rel="shortcut icon" href="img/icono.ico">        
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<link rel="stylesheet" href="css/fontello.css">        
<link rel="stylesheet" href="css/estilos.css">
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<title>Excelsius Salud</title>
       
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
<li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario ?><img src="img/user.png" alt=""></a></li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.html">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.html">Asociados</a></li>
<li><a href="servicios.html">Servicios</a></li>
<li><a href="noticias.html">Noticias</a></li>
<li><a href="contacto.html">Contacto</a></li>
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

<div id="contenedor" class="center">
   <main>
    
        <section  id="resultados">
         <article> 
            <img src="data:image/jpg;base64,<?php echo base64_encode($fila['img']); ?>"/>                
       <div id="texto_resultados">
       <?php $nombre_apellido ="{$fila['nombre1']} {$fila['nombre2']} {$fila['apellido1']} {$fila['apellido2']} ";?>
        <h1><?php echo utf8_encode($nombre_apellido)?></h1>
        
        
        <ul style="circle">
         
            <li>Especialidad: <?php echo utf8_encode ($fila['especialidad'])?> </li>
            <li> <?php echo utf8_encode ($fila['descripcion'])?> </li>
            <li>Teléfono: <?php echo $fila['telefono']?></li>
            <li>Dirección: <?php echo utf8_encode ($fila['domicilio_laboral'])?></li>
            <li>Mail: <?php echo $fila['mail']?></li>
            <li>Visitas: <?php echo $fila['visitas']?></li>
            <li>Otro: <?php echo utf8_encode ($fila['otro'])?></li>
            
            
        </ul>
        
        <a  class="solicitar-turno"href="solicitar-turno.php">SOLICITAR TURNO</a>
        <?php ?>
        </div>
  
                       
     </article>
           </section>
           
           <section  id="mapa-street">
               <h4>Ubicación</h4>
               <iframe src="<?php echo $fila['maps']?>" allowfullscreen></iframe>
               <iframe src="<?php echo  $fila['street']?>" allowfullscreen></iframe>
           </section>

  
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
</html>