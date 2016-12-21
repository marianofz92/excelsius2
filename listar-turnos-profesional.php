<?php
session_start();

require_once('conn/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
    
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    
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
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/panel-medico.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
         <link rel="stylesheet" href="css/listar-turnos-profesional.css">

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
         <a href="panel-profesional.php"><h1><?php echo $usuario ?><img src="img/default_avatar.png" alt=""></h1></a>
         <ul>
             <li class="menu-paciente"><a href="editar-perfil-profesional.php">Editar Perfil</a></li>
             <li class="menu-paciente"><a href="">Nuevo Turno</a></li>
             <li class="menu-paciente"><a href="configurar-turno.php">Configuración de turnos</a></li>
             <li class="menu-paciente"><a href="ver-turnos-profesional.php">Ver Turnos</a></li>
             <li class="menu-paciente"><a href="">Modificar Turno</a></li>
             <li class="menu-paciente"><a href="">Eliminar Turno</a></li>
             <li class="menu-paciente"><a href="logout.php">Cerrar sesión</a></li>
             
         </ul>
    </div>
    <div id="contenido">
    <div class="contenido_tabla">
       
  <?php
       
$fecha=$_POST['fecha_ver_turnos']; 
echo '<h3>TURNOS DEL DIA :'; echo $fecha; echo'</h3>'; 
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
 $id_profesional=$_SESSION['id_profesional_sesion'];  
 $consulta1="SELECT * FROM config_horario WHERE dia ='$dia_c' AND profesional_idProfesional=$id_profesional  ORDER BY  'desde' ASC";
//$consulta="SELECT * FROM config_horario INNER JOIN profesionales2 ON profesional_idProfesional =id_profesional AND profesional_idProfesional=$id_profesional AND dia =$dia_c"; ES NECESARIO EL JOIN????--------NO!
 $resultado1=$connect->query($consulta1);
   
    
?> <div  class="table-responsive"id="tabla">
    
     <div class="col-md-12">

      <table class="table table-hover table-bordered">
    <thead>
        <tr>
        <th class="col-md-1">HORA</th>
        <th class="col-md-2" >ESTADO</th>
        <th class="col-md-3">CONSULTORIO</th>
         <th class="col-md-3">PACIENTE</th>
         <th class="col-md-3">O.SOCIAL</th>
        </tr>
    </thead>
    <tbody>
          
<?php       
  while($fila1=mysqli_fetch_assoc($resultado1)) // ACA SE DIVIDE POR RANGO
  { 
   $desde=$fila1['desde']; 
   $hasta=$fila1['hasta'];
  $domicilio_rango=$fila1['Domicilio_idDomicilio'];
  $consulta4="SELECT * FROM domicilio WHERE id_domicilio =$domicilio_rango";
  $resultado4=$connect->query($consulta4);
  $fila4=mysqli_fetch_assoc($resultado4);
  if($fila4['tipo']=='departamento')
  {
      $domicilio_consulta="{$fila4['calle']} {$fila4['numero']} Piso:{$fila4['piso']} Dpto: {$fila4['dpto']} ";
      
  }
      else
      {
          $domicilio_consulta="{$fila4['calle']} {$fila4['numero']}";
      }
      
   
   $segundos_horaInicial=strtotime($desde);
   $segundos_horaFinal=strtotime($hasta);
   $segundos_intervalo= 15*60; //15 es la cantidad de minutos entre turno y turno.
   

while($segundos_horaInicial<=$segundos_horaFinal) //con < si quieren salir a su hora puntual.
  {
     $nuevaHora=date("H:i:s",$segundos_horaInicial);
      
          $consulta2="SELECT * FROM turno WHERE profesional_idProfesional=$id_profesional AND fecha='$fecha_consulta'";
          $resultado2=$connect->query($consulta2);                                      

?>
  <tr> <td><?php echo $nuevaHora ?></td>
  
  <?php
     $busca=0; 
    
   while($fila2=mysqli_fetch_assoc($resultado2))//compara la cantidad de turnos del dia con la hora(nuevahora)
    {  
       $obra_social=$fila2['obra_social'];
       
     if($fila2['hora']==$nuevaHora)
     {
         $busca=1;
       
     }
    
     }
    if($busca==1)
    {
        echo '<td class="danger ocupado">OCUPADO</td>';
             echo '<td>';echo $domicilio_consulta;echo'</td>';
            echo '<td>PACIENTE</td>';
            echo '<td>';echo $obra_social ;echo'</td>';
        echo '</tr>';
    }
    else
    { //TURNO LIBRE. TENGO TODO LO Q NECESITO PARA SACAR EL TURNO (DOMICILIO, HORA)
        echo '<td class="success disponible">DISPONIBLE</td>';
        echo '<td>';echo $domicilio_consulta;echo'</td>';
      //  echo '<td><a class="solic-turno"href="confirmar-turno.php?hora=';echo $nuevaHora;echo'&domicilio=';echo $domicilio_consulta;echo'">SOLICITAR TURNO</a> </td>
        //</tr>';
       echo '<td>PACIENTE</td>';
      echo '<td>';echo '';echo'</td>';
        echo '</tr>';
        
    }
    
    
     $segundos_horaInicial=$segundos_horaInicial+$segundos_intervalo; 
  }//while de los rangos
  }//while de los registros encontrados.
?>

 </tbody>
</table>
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