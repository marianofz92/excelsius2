<?php
    $destino = "info@excelsiussalud.com";
    $nombre = $_POST["nombre"]; 
    $asunto= $_POST["asunto"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];
    $contenido = "\n\tNombre: " . $nombre .  "\t\n\nAsunto: " . $asunto . "\t\n\nCorreo: " . $correo . "\t\n\nTelefono: " . $telefono . "\t\n\nMensaje:" . "\n\n\t\t\t\t\t" . $mensaje;
    mail($destino,$asunto,$contenido, "From: info@excelsiussalud.com\nReply-To:".$correo);
    header("Location:gracias.php");
?>