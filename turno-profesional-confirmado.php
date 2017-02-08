
<?php 
session_start();
require_once('conn/connect.php');

$hora=$_POST['hora_p'];
$fecha=$_POST['fecha_p'];
$domicilio=$_POST['domicilio_p'];
$nombres=$_POST['nombres_p'];
$apellidos=$_POST['apellidos_p'];
$ob_sc=$_POST['obrasocial'];
$tel=$_POST['tel_p'];
$dni=$_POST['dni_p'];

$id_prof_der=$_SESSION['id_profesional_sesion'];
$derivado=$_POST['derivado'];

if($derivado==1)// es derivado por un profesional a otro.
{
    $id_usuario=$_SESSION['id_usuario'];
    $id_profesional=$_SESSION['id_profesional_turno'];
    
}
else //profeisonal saca turno para el mismo.
    
{
    $id_profesional=$_SESSION['id_profesional_sesion'];
    $id_usuario=35;//usuario de paciente generico.
    
}
$consulta2="SELECT id_turno  FROM turno WHERE fecha ='$fecha' AND hora='$hora' AND profesional_idProfesional=$id_profesional";
$resultado2=$connect->query($consulta2);



if(mysqli_num_rows($resultado2)>0)//encontro algo--- VALIDAR CUANDO ESTE ONLINE DESDE 2 PERFILES.
    
{
        header('Location: http://localhost:8080/excelsius2/error-turno.php');
              
    }
   
else{

$consulta="INSERT INTO turno(fecha,hora,estado,usuario_idUsuario,profesional_idProfesional, domicilio, obra_social, nombres_paciente, apellidos_paciente, dni_paciente, tel_paciente, id_profesionalDerivador) VALUES ('$fecha','$hora','asignado', $id_usuario, $id_profesional, '$domicilio', '$ob_sc', '$nombres', '$apellidos', $dni, $tel, $id_prof_der)";
$resultado=$connect->query($consulta);
if($resultado>0)
{
    header('Location: http://localhost:8080/excelsius2/turno-sacado-exitoso.php');
}

}

?>
