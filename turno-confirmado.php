<?php
require_once('conn/connect.php');
session_start();

$fecha=$_SESSION['fecha_turno'];
$hora=$_SESSION['hora_turno'];
$id_usuario=$_SESSION['id_usuario'];   
$ide_profe=$_SESSION['id_profesional_turno'];
$domicilio=$_SESSION['domicilio_turno'];  
$obra_social=$_POST['obrasocial'];
$consulta2="SELECT id_turno FROM turno WHERE fecha ='$fecha' AND hora='$hora' AND profesional_idProfesional=$ide_profe";
$resultado2=$connect->query($consulta2);
if
$derivador=34;//derivador estandar.

if(mysqli_num_rows($resultado2)!=0)//encontro algo
{
   header('Location: http://localhost:8080/excelsius2/error-turno.php');
    
    
}
else{


$consulta="INSERT INTO turnofecha,hora,estado,usuario_idUsuario,profesional_idProfesional, domicilio, obra_social, nombres_paciente, apellidos_paciente, dni_paciente, tel_paciente, id_profesionalDerivador) VALUES ('$fecha','$hora','asignado', $id_usuario, $ide_profe, '$domicilio', '$obra_social' ,'','','','',$derivador)";
$resultado=$connect->query($consulta);
if($resultado>0)
{
    header('Location: http://localhost:8080/excelsius2/turno-exitoso.php');
}

}


?>