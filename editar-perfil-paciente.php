
<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
    require_once('conn/connect.php');
    
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    $nombre= $fila['nombres'];
    $apellido = $fila['apellidos'];
    $email = $fila['correo'];
    $img = $fila['img_paciente'];
    $_SESSION['idusuario'] = $fila['id_usuario'];

    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
    header('Location: http://localhost/github/excelsius2/inicie-sesion.html');

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
        <link rel="stylesheet" href="css/prueba-estilos-paneles.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/semantic.css">
        <link rel="stylesheet" href="css/editar-perfil-paciente.css">
        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script type="text/javascript">
        //override defaults
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "btn btn-success";
        alertify.defaults.theme.cancel = "btn btn-danger";
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

<li id="item-ingresar"><a href="#"><img src="<?php 
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
<ul id="submenu-usuario">
    <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-list-alt"></span>Mis turnos</a></li>
    <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Solicitar turno</a></li>
    <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
</ul>
</li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu" id="item-buscar"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
<div class="dropdown">
  <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <span class="glyphicon glyphicon-user"></span> <?php echo $usuario ?>
    <span class="caret"></span>
  </button>
  <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-cog"></span>cambiar contraseña</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
  </ul>
</div>
<!--<li><a href=""><span class="glyphicon glyphicon-user"></span>Ingresar</a></li>-->
</ul>


</nav>     
</div>

<!--<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>-->



</header>
   
  <section class="principal"> 
   <div class="sidebar" >
        <div id="usuario-sidebar">
         <img src="<?php 
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
                
        </div>
        
        <div id="nombre-sidebar">
            
            <h4><?php echo $usuario ?></h4>
            
        </div>
        
        
         <ul>
             <li class="menu-paciente"><a href="panel-paciente.php"> <span class="glyphicon glyphicon-list-alt"></span> Mis Turnos</a></li>
             <li class="menu-paciente"><a href="profesionales.php"> <span class="glyphicon glyphicon-paste"></span> Solicitar Turno</a></li>
             <li class="menu-paciente"><a href="editar-perfil-paciente.php"> <span class="glyphicon glyphicon-edit"></span> Editar Perfil</a></li>
             <li class="menu-paciente"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
         </ul>
    </div>
    
    <div id="contenido" class="container-fluid">
      
       <div class="col-md-6 col-md-offset-3  col-sm-8 col-sm-offset-2  col-xs-10 col-xs-offset-1" id="contenedor-panel">
       <div class="panel panel-default ">
       <div class="panel-heading">Editar datos personales</div>
        <br>
        <div id="contenedor_imagen" class="col-md-12">
        <img src="<?php 
                if(isset($fila['img_paciente'])){
                    //$foto = $fila['img_paciente'];
                    echo 'data:image/jpg;base64,'.base64_encode($img);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
        </div>
    

    <div class="contenedor-inputs input-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    
    <form action="actualizar-datos.php" method="post" class="form-register" enctype="multipart/form-data">
    <br>
    <label for="">Cambiar foto de perfil</label>
    <input type="file" name="imagen" id="imagen" accept="image/*" class="">
    <input type="text"name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>"  class="" required> 
    <input type="text" name="apellidos" placeholder="Apellido" value="<?php echo $apellido ?>" class="" required>
    <input type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>" class="" required>
    <br>
    <br>
    <input type="submit" value="Guardar" class="btn btn-primary ">
    </form>
    
    </div>
       
   
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
        
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script>  
              
    </body>
</html>