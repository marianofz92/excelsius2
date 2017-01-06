<?php
require_once('conn/connect.php');
?>


<?php

session_start();

$id_profesional = $_SESSION['id_profesional'];
$filas = $_GET['filas'];
$ids = $_GET['ids'];
$filalimpia = substr($filas, 5);

//echo $filalimpia;

$fila = explode(" / ", $filalimpia);

//echo "-----" . $fila[0];

$idDom = explode(",", $ids);

$arrayDias = array();
$k = 0;

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
    
    //echo $desde;
    //echo $hasta; 
    //echo $direccion;
    //echo "id del domicilio = ".$idDom[$i];
    //echo $id_profesional; 
    
    //echo $fila[$i];
    
    //inicio validacion
    
    for($j = 0; $j < (count($dia)); $j++) {
        //echo  $dia[$j].' de: '.$desde. ' hasta: '. $hasta. '<br>';
        
        $diaSP = trim($dia[$j]); // elimino espacios en blanco al principio y final de cada elemento.
        $arrayDias[$k] = $diaSP;
        $arrayDesde[$k] = $desde;
        $arrayHasta[$k] = $hasta;
        $k = $k + 1;
    }
    
    //fin validacion
    
    /*----------------------
    
    for($j = 0; $j < (count($dia)); $j++) {
        //echo $dia[$j];
        //validar que no se solapen los rangos de horarios
        $consulta = "INSERT INTO config_horario (dia, desde, hasta, Domicilio_idDomicilio, profesional_idProfesional)  VALUES('$dia[$j]','$desde.:00','$hasta.:00','$idDom[$i]','$id_profesional')";
        $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error';
            }
            else{
                echo '<div  class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      configuracion guardada correctamente
      </div>';
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
            }
    }
    
    ---------------------- */
    //echo $dias;
}


for($m = 0; $m < (count($arrayDias)); $m++) {
        //echo  $dia[$j].' de: '.$desde. ' hasta: '. $hasta. '<br>';
        
}


/*if( (count($arrayDias))!=(count(array_unique($arrayDias)))) {
    
    echo "Existen dias repetidos";
} 
*/

$res = array_diff($arrayDias, array_diff(array_unique($arrayDias), array_diff_assoc($arrayDias, array_unique($arrayDias))));
 
foreach(array_unique($res) as $v) {
    
    echo "Duplicado $v en la posicion: " .  implode(', ', array_keys($res, $v)) . '<br>';  
    
    $claves = array_keys($res, $v);
    
    for($cont = 0; $cont < (count($claves)); $cont++) {
        
        echo "De:".$arrayDesde[$claves[$cont]] . "Hasta:" . $arrayHasta[$claves[$cont]] . "<br>";
        
        if()
        
    } 
}

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
    
    //echo $desde;
    //echo $hasta; 
    //echo $direccion;
    //echo "id del domicilio = ".$idDom[$i];
    //echo $id_profesional; 
    
    //echo $fila[$i];
    
    //inicio validacion
    
    //fin validacion
    
    /*----------------------
    
    for($j = 0; $j < (count($dia)); $j++) {
        //echo $dia[$j];
        //validar que no se solapen los rangos de horarios
        $consulta = "INSERT INTO config_horario (dia, desde, hasta, Domicilio_idDomicilio, profesional_idProfesional)  VALUES('$dia[$j]','$desde.:00','$hasta.:00','$idDom[$i]','$id_profesional')";
        $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error';
            }
            else{
                echo '<div  class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      configuracion guardada correctamente
      </div>';
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
            }
    }
    
    ---------------------- */
    //echo $dias;
}

?>