<?php 

require_once('conn/connect.php');
$asistencia=$_GET['asistencia'];
$id_turno=$_GET['id_turno'];

if($asistencia=='si')
{
$consulta="UPDATE turno SET estado='atendido' WHERE id_turno=$id_turno";
    $resultado=$connect->query($consulta);
        echo '
    
    <script>
    alert("Paciente ATENDIDO.")
    
    </script>';

}
else
{
    $consulta="UPDATE turno SET estado='ausente' WHERE id_turno=$id_turno";
    $resultado=$connect->query($consulta);
        echo '
    
    <script>
    alert("Paciente AUSENTE.")
    
    </script>';

}


?>