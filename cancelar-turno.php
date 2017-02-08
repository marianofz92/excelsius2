<?php 

session_start();
require_once('conn/connect.php');

$idturno = $_GET['idturno'];
$origen=$_GET['origen'];
$consulta = "DELETE FROM turno WHERE id_turno =$idturno";
$resultado=$connect->query($consulta) or die ("ERROR");
   if($origen=='desactivar')

        echo '<script type="text/javascript">
history.back();
</script>';
else
{
    if($origen=='cancel-med')
    {
        echo '<script type="text/javascript">
history.back();
</script>';
    }
        
        else
        {
        header('Location: http://localhost:8080/excelsius2/panel-paciente.php');
        }
}


?>