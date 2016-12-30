<?php
    $destino = "consulta@excelsiussalud.com";
    $nombre = $_POST["nombre"]; 
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];
    $contenido = "\n\tNombre: " . $nombre .  "\t\n\nAsunto: " . $correo . "\n\n\t\t\t\t\t" . $mensaje;
    mail($destino,$asunto,$contenido, "From: consulta@excelsiussalud.com\nReply-To:".$correo);
    header("Location:gracias.php");
?>