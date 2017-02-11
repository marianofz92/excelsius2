<?php
require_once('conn/connect.php');
session_start();

?>
<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $consulta="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $privilegio=$fila['privilegio'];
    
    
    if($privilegio ==1)//MEDICO TIENE PRIVILEGIO 1
    {
        $enlace='#';
    }
    else{//ES PACIENTE (por ahora, luego se implementaran secretarias.)
        $enlace='#';
    }
    
    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
    header('Location: http://localhost/github/excelsius2/inicie-sesion.html');

    exit;
}//VALIDACIONES PARA QUE NO SE PUEDA INGRESAR SI NO SE SELECCIONO ALGUM MEDICO.<--------------EXACTO!!
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
        <link rel="stylesheet" href="css/solicitar-turno.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
      
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
         <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
       
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
     
        
        
        
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

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><img src="<?php 
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
   
    
                                          
<?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==0) {
                
   echo '<ul id="submenu-usuario">
            <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-list-alt"></span>Mis turnos</a></li>
            <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Solicitar turno</a></li>
            <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
        </ul>';
} else {
    
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) {
       
        echo '<ul id="submenu-usuario">
                <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
                <li><a href="configurar-turno.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
                <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
                <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>
            <!--    <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
            </ul>';
            
    } else{
        echo '<style type="text/css"> #item-ingresar span { display: none} </style>';
    }
}
    
    
?>    
      
</li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu" id="item-buscar"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
    
    <?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==0) {
    
        echo  '<div class="dropdown">
              <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="glyphicon glyphicon-user"></span>'.$usuario.'
                <span class="caret"></span>
                <style type="text/css"> #dropdownMenu1 .glyphicon-user { margin-right: 8.6px;}
                </style>
              </button>
              <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>cambiar contraseña</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
              </ul>
            </div>';
    } else {
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==1){
                
               echo  '<div class="dropdown">
              <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="glyphicon glyphicon-user"></span>'.$usuario.'
                <span class="caret"></span>
                <style type="text/css"> #dropdownMenu1 .glyphicon-user { margin-right: 8.6px;}
                </style>
              </button>
              <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>cambiar contraseña</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
              </ul>
            </div>';  
                
            } else {
            echo '<a  id="dropdownMenu1" href="login.php">
              <span class="glyphicon glyphicon-user"></span>Ingresar
              </a> 
              <style type="text/css"> #dropdownMenu1:before { background: none}
              
              </style>';
            }
        }
    ?>
  
</ul>



</nav>     
</div>

<!--<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>-->

</header>
<section id="contenedor_s" class="container-fluid">
 <div id="contenido">
 
 <?php 
    $id_profesional=$_SESSION['idprofesional'];
    $consulta7="SELECT img FROM profesionales2 WHERE id_profesional ='$id_profesional'";
    $resultado7=$connect->query($consulta7);
    $fila7=mysqli_fetch_assoc($resultado7);
    
  ?>
 
 <div id="imagen"><img class="" src="<?php echo 'data:image/jpg;base64,'.base64_encode($fila7['img']); ?>"></div>
  <div id="titulo">
      <p>Solicite su turno con <?php echo utf8_encode($_SESSION['prof'])  ?></p>
    </div> 
    
    <div class="col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1  col-xs-12">
    <div class="panel panel-default" id="panel-consulta">
    <div class="panel-heading">Fecha del turno</div>
    <div class="panel-body">
    <div class="alert alert-info">Seleccione la fecha deseada para su turno y consulte su disponibilidad.</div>
    <form class="formulario"  method="post" id="formulario" action="prueba-tabla.php">
      
      
      <input id="lblfecha" class="fecha-inp col-md-8"  placeholder="Seleccione una fecha"  type="text" required name="lblfecha">
      <input type="submit" value="Consultar" class=" btn btn-primary col-md-3 pull-right"  id="btnconsultar">
      
      <?php 
   
        $id_usuario= $_SESSION['id_usuario']; 
        $consulta1 ="SELECT * FROM profesionales2 WHERE usuario_idUsuario=$id_usuario";
        $resultado1=$connect->query($consulta1);
        $fila1= mysqli_fetch_assoc($resultado1);
        $id_profesional=$_SESSION['idprofesional'];
   
        //$id_profesional=$fila1['id_profesional'];
        $consulta5 ="SELECT * FROM dias_desact WHERE Profesional_idProfesional = $id_profesional";
        $resultado5=$connect->query($consulta5);
        
        $cadenaFinal = ""; 
        while($fila5= mysqli_fetch_assoc($resultado5)){
   
        $desde = date("d-m-Y", strtotime($fila5['desde']));
        $hasta = date("d-m-Y", strtotime($fila5['hasta']));
   
        $fechaInicio=strtotime($desde);
        $fechaFin=strtotime($hasta);
        $cadenaFechas="";    
        for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
            //echo date("d-m-Y", $i)."<br>";
            $cadenaFechas=$cadenaFechas.'*'.date("d-m-Y", $i);
        }
            
        $cadenaFechas0=substr($cadenaFechas, 1);
        $cadenaFechas1=$cadenaFechas0.'*';
        $cadenaFinal=$cadenaFinal.$cadenaFechas1;     
        }    
        
            echo' <input type="hidden" name="fechas" value="'.$cadenaFinal.'; ">';

        ?>
      
       <script src="js/main.js"></script>  
       <script src="js/jquery-ui.min.js"></script>
     
       <script src="js/datepicker-es.js"></script>
        <script>
        $("#lblfecha").datepicker( $.datepicker.regional[ "es" ]);
    
    </script>
    
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
        
</body>
</html>