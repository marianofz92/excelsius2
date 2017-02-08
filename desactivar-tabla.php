<?php
session_start();

require_once('conn/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) { // es medico por lo tanto tiene asociada una cuenta y x ahi puedo sacar el id del medico.

    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
   $id_usuario= $_SESSION['id_usuario'];
    $consulta ="SELECT * FROM profesionales2 WHERE usuario_idUsuario=$id_usuario";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    $id_profesional_session=$fila['id_profesional'];
    $_SESSION['id_profesional'] = $id_profesional_session;
    
      
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
        <link rel="stylesheet" href="css/desactivar-tabla.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/default.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
       
      
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
    <li><a href="panel-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
    <li><a href="profesionales.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
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
    
    <div id="contenido">
    <div class="panel panel-default" id="panel-turnos">
    <div class="panel-heading"><h4>Turnos del dia: <?php $fecha=$_GET['fecha_desactivar']; echo $fecha; ?></h4></div>  
    <div class="contenido_tabla panel-body">
    
    <div class="alert alert-danger">
    Recuerde cancelar los turnos antes de desactivar los horarios.
   </div>
    
       
  <?php
       
$fecha=$_GET['fecha_desactivar']; 

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
   
    
?> 
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
        echo '<td class="danger ocupado">'.$estado_turno.'</td>';
             echo '<td>';echo $domicilio_consulta;echo'</td>';
            echo '<td>';echo $paciente;echo'</td>';
             echo '<td>';echo $telefono;echo'</td>';
            echo '<td>';echo $obra_social ;echo'</td>';
            echo '<td>';echo $nombre_derivador ;echo'</td>';
        if($estado_turno=='DESACTIVADO')
        {
            $boton="Revertir";
            
        }
        else
        {
            $boton="Cancelar Turno";
        }
        echo  '<td><button  type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target=".bs-example-modal-sm" onclick="
                                        
                                      alertify.confirm(\'¡Atención!\', \'¿Seguro que desea cancelar el turno?\', function(){
                                      window.location = \'cancelar-turno.php?idturno='.$id_turno.'&origen='.$origen.'\';
                                      }, function(){}).set(\'labels\', {ok:\'Si\', cancel:\'No\'});
    
                                        ">'.$boton.'</button></td>';
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

<!--<button onclick=""></button>-->

 </tbody>
</table>

</div> 

</div>

<script src="js/desactivar-turno.js"></script>
               
           <button id="aceptar" type="button" class="btn btn-success " style="margin-top: 15px;" onclick="desactivarTurnos(); recargar()">Desactivar selección</button>
                   <input type="text" value="<?php echo $fecha ?>" hidden="hidden" name="oculto">
 </div>
                
                    
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
        
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/main.js"></script>    
                
    </body>

</html>