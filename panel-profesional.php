<?php
session_start();

require_once('conn/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
    $id_usuario = $_SESSION['id_usuario'];
    
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    
    $consulta2 = "SELECT img FROM profesionales2 WHERE usuario_idUsuario = $id_usuario";
    $resultado2=$connect->query($consulta2);
    $fila2= mysqli_fetch_assoc($resultado2);
    
    $_SESSION['fila2'] = $fila2;
    
} else {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']!=1) {
                
            
    
                echo 'Usted no tiene persimo para acceder a esta página.';
                exit;
                
            } else {
                 $usuario='Ingresar';
                 $enlace='login.php';
                 header('Location: http://localhost/github/excelsius2/inicie-sesion.html');
    
    
            
            }
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
        <link rel="stylesheet" href="css/panel-medico.css">
       
      
        
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
         <a href="panel-profesional.php"><h1><?php echo $usuario ?><img src="<?php 
                if(isset($fila2['img'])){
                    $foto = $fila2['img'];
                    echo 'data:image/jpg;base64,'.base64_encode($foto);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""></h1></a>
         <ul>
             <li class="menu-paciente"><a href="editar-perfil-profesional.php">Editar Perfil</a></li>
             <li class="menu-paciente"><a href="profesionales.php">Derivar Turno</a></li>
             <li class="menu-paciente"><a href="configurar-turno.php">Configuración de turnos</a></li>
             <li class="menu-paciente"><a href="ver-turnos-profesional.php">Ver Turnos</a></li>
             <li class="menu-paciente"><a href="">Modificar Turno</a></li>
             <li class="menu-paciente"><a href="desactivar-horarios.php">Desactivar horarios</a></li>
             <li class="menu-paciente"><a href="logout.php">Cerrar sesión</a></li>
             
         </ul>
    </div>
    
    <div id="contenido">
       <div id="titulo"><h1>Perfil de <?php echo $usuario ?></h1></div>
       <article class="datos-personales">
           <img src="<?php 
                if(isset($fila2['img'])){
                    $foto = $fila2['img'];
                    echo 'data:image/jpg;base64,'.base64_encode($foto);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
            <ul>
                <?php $nombre_apellido ="{$fila['nombres']} {$fila['apellidos']}";?>
                <li><img src="img/icono-user.png" alt=""><span>Nombre de usuario:</span> <?php echo $usuario ?></li>
                <li><img src="img/icono-nombre.png" alt=""><span>Nombre:</span> <?php echo utf8_encode($nombre_apellido) ?></li>
                <li><img src="img/icono-mail.png" alt=""><span>E-mail:</span> <?php echo utf8_encode($fila ['correo']) ?></li>
                <li><img src="img/icono-turno.png" alt=""><span>Turnos:</span> <?php echo $privilegio ?></li>
<!--                <li><img src="img/icono-turno.png" alt=""><span>id_profe:</span> <?php //$idprofesi=$_SESSION['id_profesional_sesion']; echo $idprofesi?></li>-->
                
       </article>
       <div class="turnos">
           
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