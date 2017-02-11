<?php 

session_start();
require_once('conn/connect.php');
$id_profesional=$_SESSION['id_profesional_sesion'];
$desde = $_POST['desde'];
$hasta=$_POST['hasta'];
list($dia, $mes, $anio)= explode ("/", $desde);
$fecha_desde= $anio . '-' . $mes . '-' . $dia;
list($diah, $mesh, $anioh)= explode ("/", $hasta);
$fecha_hasta= $anioh . '-' . $mesh . '-' . $diah;


$consulta = "INSERT INTO dias_desact (id_dias_desact, desde, hasta, Profesional_idProfesional) VALUES (NULL, '$fecha_desde', '$fecha_hasta', $id_profesional)";
$resultado=$connect->query($consulta);
if($resultado>0)
   {
        header('Location: http://localhost/github/excelsius2/desactivar-rango.php');
   }



?>