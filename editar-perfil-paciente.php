
<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
    require_once('conn/connect.php');
    
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);

    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
    header('Location: http://localhost/excelsius-master/inicie-sesion.html');

    exit;
}
?>





<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <link rel="stylesheet" href="css/estilo-buscador.css">
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/panel-paciente.css">
        <link rel="stylesheet" href="css/editar-perfil-paciente.css">
      
        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
         <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
       
        
        
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
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
</li>
</nav>     
</div>

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>

   
  <section class="principal"> 
    <div class="sidebar" >
         <h1><?php echo $usuario ?><img src="img/default_avatar.png" alt=""></h1>
         <ul>
             <li class="menu-paciente"><a href="">Editar Perfil</a></li>
             <li class="menu-paciente"><a href="profesionales.php">Solicitar Turno</a></li>
             <li class="menu-paciente"><a href="">Mis Turnos</a></li>
             <li class="menu-paciente"><a href="logout.php">Cerrar sesión</a></li>
             
         </ul>
    </div>
    
    <div id="contenido">
       <div id="titulo"><h1>Editar datos personales</h1></div>
        <div id="contenedor_registro">
        <img src="img/default_avatar.png" alt="">
    <form action="registrar.php" method="post" class="form-register">
    
    <div class="contenedor-inputs">
    <input type="text"name="nombre" placeholder="Nombre" class="input-48" required>
    <input type="text" name="apellidos" placeholder="Apellidos" class="input-48" required>
    <input type="email" name="email" placeholder="E-mail" class="input-100" required>
    <input type="submit" value="Guardar" class="btn-enviar">
</div>
       
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