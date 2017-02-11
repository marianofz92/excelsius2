<?php 

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];

if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="author" content="denker" charset="utf-8">
    <title> Recuperar contraseña- Excelsius Salud </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php

	
	$conexion = new mysqli('localhost', 'root', '', 'bd_prueba');
	$sql = " SELECT * FROM tblreseteopass WHERE token = '$token' ";

	$resultado = $conexion->query($sql);
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();
		if( sha1( $usuario['idusuario'] === $idusuario ) ){
			if( $password1 === $password2 ){
				$sql = "UPDATE usuario SET clave='".($password1)."' WHERE id_usuario = ".$usuario['idusuario'];
				$resultado = $conexion->query($sql);
				if($resultado){
					$sql = "DELETE FROM tblreseteopass WHERE token = '$token';";
					$resultado = $conexion->query( $sql );
				?>
					<script>
                        
                       alertify.alert("¡Atención!", "La contraseña se cambió correctamente.",function(){
                       location.href='http://localhost:8080/excelsius2/login.php';} );
                        //location.href='http://localhost:8080/excelsius2/login.php';
                        
          </script>
				<?php
				}
				else{
				?>
					<script>a alertify.alert("¡Atención!", "Error.",function(){
                       location.href='http://localhost:8080/excelsius2/index.php';  } );
          </script><?php
				
				}
			}
			else{
			?>
			<p> Las contraseñas no coinciden </p>
			<?php
			}

		}
		else{
?>
<script> alertify.alert("¡Atención!", "Token no existe.",function(){
                       location.href='http://localhost:8080/excelsius2/login.php':  } );
          </script>
<?php
		}	
	}
	else{
?>
<script>
    alertify.alert("¡Atención!", "Token no existe.",function(){
                       location.href='http://localhost:8080/excelsius2/login.php':  } );
          </script>
<?php
	}
	?>
	</div>
<div class="col-md-2"></div>
	</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
else{
	header('Location:login.php');
}
?>