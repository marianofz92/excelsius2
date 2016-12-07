<?php
session_start(); ?>
<?php
require_once('conn/connect.php');
$fecha=$_POST['lblfecha']; 
list($dia, $mes, $anio)= explode ("/", $fecha);
$fecha_consulta= $anio . '-' . $mes . '-' . $dia;
//$_SESSION['dia_consulta']="";

$consulta2="SELECT * FROM turno WHERE '$fecha_consulta'=fecha";
$resultado=$connect->query($consulta2);
$total=mysqli_num_rows($resultado);
//recorer la tabla con los horarios primero y comparar ese horario. U obtener los horarios primero y fijarlos en la tabla.
while($fila=mysqli_fetch_assoc($resultado))
    
{ 
    
    if($hora=$fila['hora']);
    {
    $estado='no disponible';
    }
    
}
$fechats=strtotime($fecha_consulta);
switch (date('w', $fechats)){ 
    case 0: $dia="Domingo"; break; 
    case 1: $dia="Lunes"; break; 
    case 2: $dia="Martes"; break; 
    case 3: $dia="Miercoles"; break; 
    case 4: $dia="Jueves"; break; 
    case 5: $dia="Viernes"; break; 
    case 6: $dia="Sabado"; break; 
   
}  
 $_SESSION['dia_consulta']=$dia;
 

    ?>