   <?php
session_start();
require_once('conn/connect.php');
?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario=$_SESSION['username']; 
    $privilegio=$_SESSION['privilegio'];
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
        <link rel="stylesheet" href="css/confirmar-turno-prof.css">
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
                      <h1 class="cabecera">CONFIRME EL TURNO DERIVADO</h1>
                     <div class="contenedor-inputs">

                      <p>Por favor verifique los datos del turno:</p>
                       
                       <label>PROFESIONAL: '; echo utf8_encode($profesional);echo'</label><br>
                      <label>FECHA:'; echo $fecha;echo'</label><br>
                      <label>HORA:'; echo $hora;echo'</label><br>
                      <label>NOMBRES :</label><input  name="nombres_p"required type="text" class="datos"><br>
                      <label>APELLIDOS:</label><input   name="apellidos_p"required type="text" class="datos"   > <br>
                      <label>TELÉFONO: <input  name="tel_p" type="text" class="datos"  required></label><br> 
                      <input type="hidden" name="fecha_p" id="fecha_p" value="';echo $fecha_consulta; echo '">   
                      <input type="hidden" name="hora_p" id="hora_p" value="';echo $hora; echo '">
                         <input type="hidden" name="domicilio_p" value="'; echo $domicilio;echo '">
                         <input type="hidden" name="derivado" value="'; echo $derivado;echo '">
                         
                       <label>OBRA SOCIAL:</label><input type="text" class="datos" name="obrasocial" id="obrasocial" required placeholder="Ingrese  obra social" > <br>
                       <label>DNI PACIENTE:</label><input type="text" class="datos" name="dni_p" required > <br>
                       <label>DOMICILIO CONSULTA:';echo utf8_encode($domicilio);echo'</label><br>
                       <label>PROFESIONAL DERIVADOR: ';echo $usuario; echo '</label><br> 
                   
                    <input type="submit" value="CONFIRMAR" class="btn-confirmar"> 
                    <div class="link-form">¿Desea modificar su consulta? <a href="ver-turnos-profesional.php">Clic aquí.</a></div>
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
                      <h1 class="cabecera">CONFIRME SU TURNO</h1>
                     <div class="contenedor-inputs">

                      <p>Por favor verifique los datos de su turno:</p>
                      <label>FECHA: '; echo $fecha;echo '</label><br>
                      <label>HORA:';echo $hora ;echo '</label><br>
                      
                      <label>PROFESIONAL: '; echo utf8_encode($profesional);echo'</label><br>
                      <label>DOMICILIO CONSULTA: ';echo utf8_encode($domicilio);echo '</label><br>
                       <label>OBRA SOCIAL:</label><input type="text" class="input-obra" name="obrasocial" id="obrasocial" required placeholder="Ingrese su obra social" > <br>
                      <label>USUARIO: '; echo $usuario; echo'</label><br> ';  
                      
                      
                       
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
                       
                      <label>NOMBRE: ';echo $nombres; echo'</label><br>
                      <label>APELLIDO: ';echo $apellidos; echo'</label><br>
                      <label>CORREO: ';echo $mail; echo '</label>
                       <input type="submit" value="CONFIRMAR" class="btn-confirmar">
                       <input type="hidden" name="derivado" value="'; echo $derivado;echo '">
                    <div class="link-form">¿Desea modificar su consulta? <a href="profesionales.php">Clic aquí.</a></div>
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
    </body>
</html>