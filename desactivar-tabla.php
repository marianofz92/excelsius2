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
     
         <link rel="stylesheet" href="css/listar-turnos-profesional.css">
         <link rel="stylesheet" href="css/desactivar-tabla.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="alertify/css/alertify.css">
    
        <link rel="stylesheet" href="alertify/css/themes/semantic.css">
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/ajax.js"></script>
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
       
$fecha=$_GET['fecha_desactivar']; 
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
 $consulta1="SELECT * FROM config_horario INNER JOIN domicilio ON dia ='$dia_c' AND profesional_idProfesional=$id_profesional  AND Domicilio_idDomicilio=id_domicilio  ORDER BY  'desde' ASC";
//$consulta="SELECT * FROM config_horario INNER JOIN profesionales2 ON profesional_idProfesional =id_profesional AND profesional_idProfesional=$id_profesional AND dia =$dia_c"; ES NECESARIO EL JOIN????--------NO!
 $resultado1=$connect->query($consulta1);
   
    
?> <div class="aclaracion"><p>
    Recuerde cancelar los turnos antes de desactivar los horarios.
</p></div>
   <div  class="table-responsive"id="tabla">
    
     <div class="col-md-12">

      <table class="table table-hover table-bordered">
    <thead>
        <tr>
        <th class="col-md-1">HORA</th>
        <th class="col-md-1" >ESTADO</th>
        <th class="col-md-1">CONSULTORIO</th>
         <th class="col-md-2">PACIENTE</th>
          <th class="col-md-1">TELÉFONO</th>
         <th class="col-md-2">O.SOCIAL</th>
         <th class="col-md-1">DERIVADO POR:</th>
         <th class="col-md-2"></th>
         <th class="col-md-1"> DESACTIVAR</th>
         
        </tr>
    </thead>
    <tbody>
          
<?php       
  while($fila1=mysqli_fetch_assoc($resultado1)) // ACA SE DIVIDE POR RANGO
  { 
   $desde=$fila1['desde']; 
   $hasta=$fila1['hasta'];
  //$domicilio_rango=$fila1['Domicilio_idDomicilio'];
//  $consulta4="SELECT * FROM domicilio WHERE id_domicilio =$domicilio_rango";
  //$resultado4=$connect->query($consulta4);
  //$fila4=mysqli_fetch_assoc($resultado4);
  if($fila1['tipo']=='departamento')
  {
      $domicilio_consulta="{$fila1['calle']} {$fila1['numero']} Piso:{$fila1['piso']} Dpto: {$fila1['dpto']} ";
      
  }
      else
      {
          $domicilio_consulta="{$fila1['calle']} {$fila1['numero']}";
      }
      
   
   $segundos_horaInicial=strtotime($desde);
   $segundos_horaFinal=strtotime($hasta);
   $segundos_intervalo= 15*60; //15 es la cantidad de minutos entre turno y turno.
   

while($segundos_horaInicial<=$segundos_horaFinal) //con < si quieren salir a su hora puntual.
  {
     $nuevaHora=date("H:i:s",$segundos_horaInicial);
      
          $consulta2="SELECT * FROM turno INNER JOIN usuario ON id_usuario=usuario_idUsuario AND profesional_idProfesional=$id_profesional AND fecha='$fecha_consulta'";
          $resultado2=$connect->query($consulta2); 
        

?>
  <tr> <td><?php echo $nuevaHora ?></td>
  
  <?php
     $busca=0; 
    
   while($fila2=mysqli_fetch_assoc($resultado2))//compara la cantidad de turnos del dia con la hora(nuevahora)
    {  
       
       
     if($fila2['hora']==$nuevaHora)
     {
         $busca=1;
         $obra_social=$fila2['obra_social'];
        
         $id_turno=$fila2['id_turno'];
         $derivado=$fila2['id_profesionalDerivador'];
         $estado_turno=$fila2['estado'];
         $consulta_der="SELECT nombre1, nombre2, apellido1, apellido2 FROM profesionales2 WHERE id_profesional=$derivado";
         $resultado_der=$connect->query($consulta_der);
         $fila_der=mysqli_fetch_assoc($resultado_der);
         
         if($derivado!=34) // algun medico q no es el generico lo derivo a otro profesional.; medico se saca turno para el mismo.
         {
             $paciente="{$fila2['nombres_paciente']} {$fila2['apellidos_paciente']} ";
             $nombre_derivador="{$fila_der['nombre1']} {$fila_der['nombre2']} {$fila_der['apellido1']} {$fila_der['apellido2']} ";
              $telefono=$fila2['tel_paciente'];
         }
         else // el paciente se saca turno
         {
               $paciente="{$fila2['nombres']} {$fila2['apellidos']} ";
              $nombre_derivador='Paciente';
              $telefono=$fila2['telefono_usuario'];
              
         }
     }
    
     }
    if($busca==1) //  cancelado: x medico o paciente.. manejar 4 estados: asignado, atendido.
    {
       
       $origen='desactivar';
        echo '<td class="danger ocupado">OCUPADO</td>';
             echo '<td>';echo $domicilio_consulta;echo'</td>';
            echo '<td>';echo $paciente;echo'</td>';
             echo '<td>';echo $telefono;echo'</td>';
            echo '<td>';echo $obra_social ;echo'</td>';
            echo '<td>';echo $nombre_derivador ;echo'</td>';
        echo  '<td><button  type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target=".bs-example-modal-sm" onclick="
                                        
                                      alertify.confirm(\'¡Atención!\', \'¿Seguro que desea cancelar el turno?\', function(){
                                      window.location = \'cancelar-turno.php?idturno='.$id_turno.'&origen='.$origen.'\';
                                      }, function(){}).set(\'labels\', {ok:\'Si\', cancel:\'No\'});
    
                                        ">Cancelar turno</button></td>';
        echo  '<td> <p> </p></td>';
        echo '</tr>';
    }
    else
    { //TURNO LIBRE. TENGO TODO LO Q NECESITO PARA SACAR EL TURNO (DOMICILIO, HORA)
        echo '<td class="success disponible">DISPONIBLE</td>';
        echo '<td>';echo $domicilio_consulta;echo'</td>';
      //  echo '<td><a class="solic-turno"href="confirmar-turno.php?hora=';echo $nuevaHora;echo'&domicilio=';echo $domicilio_consulta;echo'">SOLICITAR TURNO</a> </td>
        //</tr>';
       echo '<td> </td>';
      echo '<td>';echo '';echo'</td>';
        echo '<td>';echo '' ;echo'</td>';
        echo '<td> <a href="confirmar-turno-profesional.php?fecha=';echo $fecha_consulta;echo'&hora=';echo $nuevaHora;echo'&domicilio=';echo $domicilio_consulta;echo'"></a></td>';
        echo '<td>';echo '' ;echo'</td>';
         echo  '<td> <input type="checkbox" name="nombre2[]" value="'.$nuevaHora.'"></td>';
        echo '</tr>';
       
        
    }
    
    
     $segundos_horaInicial=$segundos_horaInicial+$segundos_intervalo; 
  }//while de los rangos
  }//while de los registros encontrados.
?>

<button onclick=""></button>

 </tbody>
</table>

</div> 

</div>
 </div>
                <script src="js/desactivar-turno.js"></script>
               
             <button type="button" class="btn btn-success " style="margin-top: 15px;" onclick="desactivarTurnos()">ACEPTAR</button>
                   <input type="text" value="<?php echo $fecha ?>" hidden="hidden" name="oculto">
                    
        <div id="response"> </div>
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