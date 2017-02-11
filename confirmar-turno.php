   <?php
session_start();
require_once('conn/connect.php');
?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario=$_SESSION['username']; 
    $id_usuario= $_SESSION['id_usuario'];
    $consulta="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $privilegio=$fila['privilegio'];
    
    $consulta3 = "SELECT img FROM profesionales2 WHERE usuario_idUsuario = $id_usuario";
    $resultado3=$connect->query($consulta3);
    $fila3= mysqli_fetch_assoc($resultado3);
    
    if($privilegio ==1)//MEDICO TIENE PRIVILEGIO 1
    {
        $enlace='#';
    }
    else{//ES PACIENTE (por ahora, luego se implementaran secretarias.)
        $enlace='#';
    }
    
    
}
else {
    
    $usuario='Ingresar';
    $enlace='login.php';
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
        <link rel="stylesheet" href="css/confirmar-turno-prof.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      
        <script src="js/validar-form-turno.js"></script>
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

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><img src="<?php 
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==0){
    
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                } else {
        
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1){
                             echo 'data:image/jpg;base64,'.base64_encode($fila3['img']);
                        }
        
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
                <style type="text/css"> #dropdownMenu1 .glyphicon-user { margin-right: 8.4px;}
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
        
        <main id="main">
            <section>
                <div id="contenido">
                    <?php 
    
                    $hora=$_GET['hora'];
                    $domicilio=$_GET['domicilio'];
                    $profesional=$_SESSION['prof'];
                    $ide=$_SESSION['idprofesional'];
                    $fecha=$_SESSION['fecha_pantalla'];
                    $usuario= $_SESSION['username'];
                           $_SESSION['id_profesional_turno']=$ide; 
                 list($dia, $mes, $anio)= explode ("/", $fecha);
                 $fecha_consulta= $anio . '-' . $mes . '-' . $dia; 
                    
                    if($privilegio==1)//existe medico derivador.
                    {
                        $derivado=1;
                         echo '<div id="formulario">
                   <form action="turno-profesional-confirmado.php" method="post" class="form-confirmacion">
                      <h1 class="cabecera">Confirme el turno derivado</h1>
                     <div class="contenedor-inputs">

                      <div class="alert alert-info" id="alerta">Por favor verifique los datos del turno:</div>
                       
                       <label>PROFESIONAL: </label>'; echo ' '.utf8_encode($profesional);echo'<br>
                      <label>FECHA: </label>'; echo ' '.$fecha;echo'<br>
                      <label>HORA: </label>'; echo ' '.$hora;echo'<br><br>
                      <label>NOMBRES :</label><input  name="nombres_p"required type="text" class="datos"><br>
                      <label>APELLIDOS:</label><input   name="apellidos_p"required type="text" class="datos"> <br>
                      <label>TELÉFONO: <input  name="tel_p" type="text" class="datos"  required id="telefono"></label><br>
                      <input type="hidden" name="fecha_p" id="fecha_p" value="';echo $fecha_consulta; echo '">   
                      <input type="hidden" name="hora_p" id="hora_p" value="';echo $hora; echo '">
                         <input type="hidden" name="domicilio_p" value="'; echo $domicilio;echo '">
                         <input type="hidden" name="derivado" value="'; echo $derivado;echo '">
                         
                       <label>OBRA SOCIAL:</label><input type="text" class="datos" name="obrasocial" id="obrasocial" required placeholder="Ingrese  obra social" > <br>
                       <label>DNI PACIENTE:</label><input type="text" class="datos" name="dni_p" required id="dni"> <br><br>
                       <label>DOMICILIO CONSULTA: </label>';echo ' '.utf8_encode($domicilio);echo'<br>
                       <label>PROFESIONAL DERIVADOR: </label>';echo ' '.$usuario; echo '<br><br> 
                   
                    <input type="submit" value="Confirmar" class="btn-confirmar"> 
                    <div class="link-form">¿Desea modificar su consulta? <a href="ver-turnos-profesional.php">Click aquí.</a></div>
                   </form>
                  </div>
                    </div>
                </div>';
                        
                     
                        
                    }
                    
                    
                    else
                    {$derivado=0;
                    echo '
                    <div id="formulario">
                   <form action="turno-confirmado.php" method="post" class="form-confirmacion">
                      <h1 class="cabecera">Confirme su turno</h1>
                     <div class="contenedor-inputs">
                        
                          
                      <div class="alert alert-info" id="alerta">Por favor verifique los datos del turno:</div>
                      <label>FECHA: </label>'; echo ' '.$fecha;echo '<br>
                      <label>HORA: </label>';echo ' '.$hora ;echo '<br>
                      
                      <label>PROFESIONAL: </label>'; echo ' '.utf8_encode($profesional);echo'<br>
                      <label>DOMICILIO CONSULTA: </label>';echo ' '.utf8_encode($domicilio);echo '<br>
                       <label>OBRA SOCIAL: </label><input type="text" class="input-obra" name="obrasocial" id="obrasocial" required placeholder="Ingrese su obra social" > <br>
                      <label>USUARIO: </label>'; echo ' '.$usuario; echo'<br> ';  
                      
                      
                       
    $consulta1 ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado1=$connect->query($consulta1);
    $fila1 = mysqli_fetch_assoc($resultado1);
    $nombres=$fila1['nombres'];
    $apellidos=$fila1['apellidos'];
    $mail=$fila1['correo'];
                     // puedo pasar x el formulario las variables sin hacer variables session.
    $_SESSION['fecha_turno']=$fecha_consulta;
    $_SESSION['hora_turno']=$hora;           
   
    $_SESSION['domicilio_turno']=$domicilio;       
                       
                    echo'
                       
                      <label>NOMBRE: </label>';echo ' '.$nombres; echo'<br>
                      <label>APELLIDO: </label>';echo ' '.$apellidos; echo'<br>
                      <label>CORREO: </label>';echo ' '.$mail; echo '
                       <input type="submit" value="CONFIRMAR" class="btn-confirmar">
                       <input type="hidden" name="derivado" value="'; echo $derivado;echo '">
                    <div class="link-form">¿Desea modificar su consulta? <a href="profesionales.php">Click aquí.</a></div>
                   </form>
                  </div>
                    </div>';}
                          ?>
                </div>
           
            </section>
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
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script> 
    </body>
</html>