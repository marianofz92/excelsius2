<?php
session_start();

require_once('conn/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) { // es medico por lo tanto tiene asociada una cuenta y x ahi puedo sacar el id del medico.

    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
   $id_usuario= $_SESSION['id_usuario'];
    $ide_profe=$_SESSION['id_profesional_sesion'];
    $consulta3 = "SELECT img FROM profesionales2 WHERE usuario_idUsuario = $id_usuario";
    $resultado3=$connect->query($consulta3);
    $fila3= mysqli_fetch_assoc($resultado3);
    
    
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
        <link rel="stylesheet" href="css/configurar-turno.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/default.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
       
      
        <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        
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

<li id="item-ingresar"><a href="#"><img src="<?php 
                if(isset($fila3['img'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila3['img']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
<ul id="submenu-usuario">
    <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
    <li><a href="configurar-turno.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
    <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
    <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>
<!--    <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
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
    <li><a href="panel-profesional.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
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
                if(isset($fila3['img'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila3['img']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
                
        </div>
        
        <div id="nombre-sidebar">
            
            <h4><?php echo $usuario ?></h4>
            
        </div>
        
        
         <ul>
             <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
             <li><a href="configurar-turno.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
             <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
             <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>
<!--             <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
             <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
         </ul>
    </div>
    
    <style type="text/css">
        #panel-body {
            background-color: #fff
        }
        
        #panel-body table th {
            background-color: #C9F2EB;
        }
        
        #panel-body table td,  #panel-body table th {
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
        }
        
    </style>
    
    <div id="contenido">
     
       <div id="titulo"><h1>Lista de configuración de horarios</h1></div>
    <div class="col-md-8 col-md-offset-2">
     <div class="panel panel-default">
         <div class="panel-heading">
             Listado
         </div>
         <div class="panel-body " id="panel-body">
           <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Día</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Domicilio</th>
                </thead>
                <tbody>
                    <?php 
                    
    $consulta_listado="SELECT dia, desde, hasta, tipo, calle, numero, piso, dpto, provincia, localidad  FROM config_horario INNER JOIN domicilio ON Domicilio_idDomicilio=id_domicilio AND profesional_idProfesional=$ide_profe";
    $resultado_listado=$connect->query($consulta_listado);
    while($fila_l=mysqli_fetch_assoc($resultado_listado))
    {
        
        $dia=$fila_l['dia'];
        $desde=$fila_l['desde'];
        $hasta=$fila_l['hasta'];
        $tipo=$fila_l['tipo'];
        $calle=$fila_l['calle'];
        $numero=$fila_l['numero'];
        $piso=$fila_l['piso'];
        $dpto=$fila_l['dpto'];
        $provincia=$fila_l['provincia'];
        $localidad=$fila_l['localidad'];
        
        if($tipo=='departamento')
        { 
            $cadena=$calle.' '.$numero.' Piso:'.$piso.' Dpto:'.$dpto.' -'.$localidad.' -'.$provincia;
        }
        else
        {
              $cadena=$calle.' '.$numero.' -'.$localidad.' -'.$provincia;
        }
        
        echo ' <tr><td>'.$dia.'</td><td>'.$desde.'</td><td>'.$hasta.'</td><td>'.$cadena.'</td> </tr>';
    }
                    
                    ?>
                </tbody>
                
            </table>
            </div>
         </div>
     </div>
       <div class="alert alert-danger"> Para cambiar su configuración comuníquese info@excelsiussalud.com </div>
        
      

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
        <script src="js/jquery.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>