
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

//$errors = '';
//$resultado = 0;


/*if(!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    
    $errors = "Ha ocurrido un error";
    
} else{
    
    $permitidos = array("image/png");
    $limite_kb = 16384;
    
    if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
        
        $info_img = pathinfo($_FILES['imagen']['name']);
        $idImagen = $mysqli->insert_id;
        
        copy($_FILES['imagen']['tmp_name'], $idImagen.'.'.$info_img['extension']);
        
    }else{
        $errors = "Archivo no permitido, es un tipo de archivo prohibido o excede el tamaño de $limite_kb Kilobytes";
    }
    
}*/


$nombreImagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];
$folder = 'imagenes-usuarios';

move_uploaded_file($tmp, $folder.'/'.$nombreImagen);

$bytesArchivo = file_get_contents($folder.'/'.$nombreImagen);

$bytesArchivo = mysql_escape_string($bytesArchivo);

$consulta = "UPDATE usuario SET nombres = '$nombre', apellidos = '$apellidos', correo = '$email', img_paciente = '$bytesArchivo' WHERE id_usuario =$id";
$resultado=$connect->query($consulta) or die ("ERROR");

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==0) {

   
header('Location: http://localhost/github/excelsius2/editar-perfil-paciente.php');
    
} else {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) {
                
            
    
                header('Location: http://localhost/github/excelsius2/editar-perfil-paciente.php');
                exit;
                
            } else {
                 $usuario='Ingresar';
                 $enlace='login.php';
                 header('Location: http://localhost/github/excelsius2/inicie-sesion.html');
    
            }
        }



?>