<?php
session_start();
require_once('conn/connect.php');
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
        $enlace='panel-profesional.php';
    }
    else{//ES PACIENTE (por ahora, luego se implementaran secretarias.)
        $enlace='panel-paciente.php';
    }
    
    
}
else {
    
    $usuario='Ingresar';
    $enlace='login.php';
}// HACER VALIDACIONES SI EXISTE EL ID DEL PROFESIONAL EN LA SESSION, LA FECHA ETC.PARA Q NO SE MANDEN LOS PARAMETROS X GET.
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">       
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/confirmar-turno.css">
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
<li class="submenu"><a href="javascript:$.scrollTo('#equipo_m',700); ">Buscar<span class="icon-search"></span></a></li>
</li>
</nav> 
</div>

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>
        
        <main>
            <section>
                <div id="contenido">
                    <?php 
                    $hora=$_GET['hora'];
                    $domicilio=$_GET['domicilio'];
                    $id_profesional=$_SESSION['id_profesional_sesion'];
                    $fecha=$_GET['fecha_consulta'];
            
                    ?>
                    <div id="formulario">
                   <form action="turno-confirmado.php" method="post" class="form-confirmacion">
                      <h1 class="cabecera">CONFIRME SU TURNO</h1>
                     <div class="contenedor-inputs">

                      <p>Por favor verifique los datos de su turno:</p>
                      <label>FECHA:<?php echo $fecha ?></label><br>
                      <label>HORA:<?php echo $hora ?></label><br>
                      
                      <label>PROFESIONAL:<?php echo utf8_encode($profesional)?></label><br>
                      <label>DOMICILIO CONSULTA:<?php echo utf8_encode($domicilio)?></label><br>
                       <label>OBRA SOCIAL:</label><input type="text" class="input-obra" name="obrasocial" id="obrasocial" required placeholder="Ingrese su obra social" > <br>
                      <label>USUARIO:<?php echo $usuario; ?></label><br>   
                      
                      <?php
                       
    $consulta1 ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado1=$connect->query($consulta1);
    $fila1 = mysqli_fetch_assoc($resultado1);
    $nombres=$fila['nombres'];
    $apellidos=$fila['apellidos'];
    $mail=$fila['correo'];
    $_SESSION['fecha_turno']=$fecha_consulta;
    $_SESSION['hora_turno']=$hora;           
    $_SESSION['id_profesional_turno']=$ide; 
    $_SESSION['domicilio_turno']=$domicilio;       
                       
                       ?>
                      <label>NOMBRE:<?php echo $nombres ?></label><br>
                      <label>APELLIDO:<?php echo $apellidos ?></label><br>
                      <label>CORREO: <?php echo $mail?></label>
                       <input type="submit" value="CONFIRMAR" class="btn-confirmar">
                    <div class="link-form">¿Desea modificar su consulta? <a href="profesionales.php">Clic aquí.</a></div>
                   </form>
                  </div>
                    </div>
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
    </body>
</html>