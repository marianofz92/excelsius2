<?php
require_once('conn/connect.php');
?>


<?php

$filas = $_GET['filas'];
$filalimpia = substr($filas, 5);

//echo $filalimpia;

$fila = explode(" / ", $filalimpia);

//echo "-----" . $fila[0];


for ($i = 0; $i < (count($fila)); $i++) {
      
    
    $pos = strpos($fila[$i], '-');
    $dias = substr($fila[$i], 0, $pos);
    $dia = explode(",", $dias);
    
    $pdesde = strpos($fila[$i], 'De');
    $desde = substr($fila[$i], $pdesde+3, 5);
    
    $hasta = substr($fila[$i], $pdesde+11, 5);
    
    $pdir = strpos($fila[$i], '--');
    $direccion = substr($fila[$i], $pdir+2);
    
    echo $desde;
    echo $hasta; 
    echo $direccion;
    
      
    //echo $fila[$i];
    
    for($j = 0; $j < (count($dia)); $j++) {
        echo $dia[$j];
        //armar aquí la consulta
        //validar que no se solapen los rangos de horarios
        $consulta = "INSERT INTO config_horario (dia, desde, hasta, Domicilio_idDomicilio, profesional_idProfesional)  VALUES('$dia[$j]','$desde.:00','$hasta.:00','3','1')";
        $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error';
            }
            else{
                echo 'configuracion guardada correctamente';
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
            }
    }
    //echo $dias;
}

?>