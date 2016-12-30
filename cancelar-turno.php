<?php 

session_start();
require_once('conn/connect.php');

$idturno = $_GET['idturno'];

$consulta = "DELETE turno WHERE id_turno =$idturno";
$resultado=$connect->query($consulta) or die ("ERROR");
   
header('Location: http://localhost/github/excelsius2/mis-turnos-paciente.php');

?>