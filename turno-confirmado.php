<?php
require_once('conn/connect.php');
session_start();
//PRIMERO HACER VALIDACION QUE EL TURNO NO SE ENCUENTRE ASIGNADO EN EL MISMO MOMENTO. CASO CONTRATIO, ELSE---->
$fecha=$_SESSION['fecha_turno'];
$hora=$_SESSION['hora_turno'];
$id_usuario=$_SESSION['id_usuario'];   
$ide_profe=$_SESSION['id_profesional_turno'];
$domicilio=$_SESSION['domicilio_turno'];  


$consulta="INSERT INTO turno(fecha,hora,estado,usuario_idUsuario,profesional_idProfesional, domicilio) VALUES ('$fecha','$hora','asignado', $id_usuario, $ide_profe, '$domicilio')";
$resultado=$connect->query($consulta);
if($resultado>0)
echo 'turno registrado con exito';









?>