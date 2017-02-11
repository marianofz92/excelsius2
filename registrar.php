
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/default.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
      
        <script src="js/validar.js"></script>
        <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script type="text/javascript">
        //override defaults
        alertify.defaults.transition = "zoom";
        </script>
</head>
<body>

</body>
</html>

<?php
require_once('conn/connect.php');
?>
<?php
$nombre = $_POST["nombre"];
$apellidos= $_POST["apellidos"];
$email= $_POST["email"];
$usuario= $_POST["usuario"];
$clave= $_POST["clave"];
$telefono=$_POST["telefono"];



$consulta = "INSERT INTO usuario (nombres, apellidos, correo, nombre_usuario, clave, privilegio,fecha_creacion, telefono_usuario)  VALUES('$nombre','$apellidos', '$email','$usuario', '$clave','0', NOW(), $telefono)";
$consulta1="SELECT * FROM usuario WHERE nombre_usuario='$usuario'";
$consulta2="SELECT * FROM usuario WHERE correo='$email'";
$verificar1=$connect->query($consulta1);
$verificar2=$connect->query($consulta2);
$fila_usuario=mysqli_num_rows($verificar1);
$fila_correo=mysqli_num_rows($verificar2);


    if($fila_usuario>0)
    {
        echo '<script>
        alert("Nombre de usuario no se encuentra disponible");
        location.href="registro-formulario.php";
        </script>';
    }
        else

    {
        if($fila_correo>0)
           echo '<script>
            alertify.alert("¡Atención!", "Email en uso");
            location.href="registro-formulario.php";
        </script>';
        else
        {
            $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error al registrarse';
            }
            else{
                header('Location: http://localhost:8080/excelsius2/registro-exitoso.php');
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
        }
        }
    }


