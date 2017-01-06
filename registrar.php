<?php
require_once('conn/connect.php');
?>
<?php
$nombre = $_POST["nombre"];
$apellidos= $_POST["apellidos"];
$email= $_POST["email"];
$usuario= $_POST["usuario"];
$clave= $_POST["clave"];



$consulta = "INSERT INTO usuario (nombres, apellidos, correo, nombre_usuario, clave, privilegio,fecha_creacion)  VALUES('$nombre','$apellidos', '$email','$usuario', '$clave','0', NOW())";
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
        windows.history.go(-1);
        </script>';
    }
        else

    {
        if($fila_correo>0)
           echo '<script>
        alert("Email en uso");
        windows.history.go(-1);
        </script>';
        else
        {
            $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error al registrarse';
            }
            else{
                header('Location: http://localhost/github/excelsius2/registro-exitoso.php');
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
        }
        }
    }


