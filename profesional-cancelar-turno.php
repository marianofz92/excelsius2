<?php
require_once('conn/connect.php');

$var='<script>
var mensaje = confirm("¿Desea  cancelar el turno?");
var bandera=0;
if (mensaje) {
alert("¡Turno cancelado!");
bandera=1;

}

else {
alert("¡Haz denegado el mensaje!");
bandera=0;
}

document.writeln (bandera);
</script>';
echo $var;

if($var==0)
{
  $id_turno=$_GET['id_turno'];
    $consulta="UPDATE turno  SET estado='cancelado' WHERE id_turno=$id_turno";
    $resultado=$connect->query($consulta);
    
    
}
else
{
   // header('Location: http://localhost:8080/excelsius2/ver-turnos-profesional.php');
}
    
       
    
?>