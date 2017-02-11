<?php 

require_once('conn/connect.php');
$asistencia=$_GET['asistencia'];
$id_turno=$_GET['id_turno'];

if($asistencia=='si')
{
$consulta="UPDATE turno SET estado='asistio' WHERE id_turno=$id_turno";
    $resultado=$connect->query($consulta);
        echo '
    
    <script>
    window.history.back();
    
    </script>';

}
else
{
    $consulta="UPDATE turno SET estado='no_asistio' WHERE id_turno=$id_turno";
    $resultado=$connect->query($consulta);
        echo '
    
    <script>
     window.history.back();
    </script>';

}


?>