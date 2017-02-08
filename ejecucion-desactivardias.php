<?php
require_once('conn/connect.php');
?>


<?php

session_start();

$cadena=$_GET['valor'];
$fecha=$_GET['fecha'];
list($dia, $mes, $anio)= explode ("/", $fecha);
$fecha_consulta= $anio . '-' . $mes . '-' . $dia;
$id_usuario=$_SESSION['id_usuario'];
$ide_profe= $_SESSION['id_profesional_sesion'];
$derivador=$ide_profe;//estandar
$horas=explode("/", $cadena);
for($i=0; $i<(count($horas)); $i++){
   $consulta="INSERT INTO turno (fecha,hora,estado,usuario_idUsuario,profesional_idProfesional, domicilio, obra_social, nombres_paciente, apellidos_paciente, dni_paciente, tel_paciente, id_profesionalDerivador) VALUES ('$fecha_consulta','$horas[$i]','DESACTIVADO', $id_usuario, $ide_profe, '', '' ,'','','','',$derivador)";
$resultado=$connect->query($consulta);
    
}



?>