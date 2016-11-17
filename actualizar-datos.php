
<?php

session_start();
require_once('conn/connect.php');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
  

    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
    header('Location: http://localhost/excelsius-master/inicie-sesion.html');

    exit;
}

?>

<?php
$nombre = $_POST["nombre"];
$apellidos= $_POST["apellidos"];
$email= $_POST["email"];



$usuario = $_SESSION["username"];
$id=$_SESSION['idusuario'];


$consulta = "UPDATE usuario SET nombres = '$nombre', apellidos = '$apellidos', correo = '$email' WHERE id_usuario =$id";
$resultado=$connect->query($consulta) or die ("ERROR");

header('Location: http://localhost/github/excelsius2/panel-paciente.php');

?>