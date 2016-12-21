<?php
require_once('conn/connect.php');
?>


<?php

session_start();

$id_profesional = $_SESSION['id_profesional'];
$id_dom = $_SESSION['id_dom']; 
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
    
    //consultar id_domicilio
    
    //$id_domicilio = $_SESSION['id_domicilio'];
    
    echo $desde;
    echo $hasta; 
    echo $direccion;
    echo "id del domicilio = ".$id_dom[$i];
    echo $id_profesional; 
    
    //echo $fila[$i];
    
    for($j = 0; $j < (count($dia)); $j++) {
        echo $dia[$j];
        //validar que no se solapen los rangos de horarios
        $consulta = "INSERT INTO config_horario (dia, desde, hasta, Domicilio_idDomicilio, profesional_idProfesional)  VALUES('$dia[$j]','$desde.:00','$hasta.:00','4','$id_profesional')";
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