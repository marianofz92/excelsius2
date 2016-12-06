<?php
require_once('conn/connect.php');
$fecha=$_POST['lblfecha']; 
list($dia, $mes, $anio)= explode ("/", $fecha);
$fecha_consulta= $anio . '-' . $mes . '-' . $dia;

$consulta="SELECT * FROM turno WHERE '$fecha_consulta'=fecha";
$resultado=$connect->query($consulta);
$total=mysqli_num_rows($resultado);

echo $total;
while($fila=mysqli_fetch_assoc($resultado))
{
    $hora=$fila['hora'];
    
}

?>    