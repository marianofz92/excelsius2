<?php 

session_start();
require_once('conn/connect.php');

$id_dd = $_GET['id_dd'];
$consulta = "DELETE FROM dias_desact WHERE id_dias_desact =$id_dd";
$resultado=$connect->query($consulta) or die ("ERROR");
   if($resultado>0)
   {
        header('Location: http://localhost/github/excelsius2/desactivar-rango.php');
   }

?>