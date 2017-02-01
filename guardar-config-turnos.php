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
    
}


$res = array_diff($arrayDias, array_diff(array_unique($arrayDias), array_diff_assoc($arrayDias, array_unique($arrayDias))));
 
 $solapa = 0;

foreach(array_unique($res) as $v) {
    
    //echo "Duplicado $v en la posicion: " .  implode(', ', array_keys($res, $v)) . '<br>';  
    
    $claves = array_keys($res, $v);
    
    for($cont = 0; $cont < (count($claves)); $cont++) {
        
        //echo "De:".$arrayDesde[$claves[$cont]] . "Hasta:" . $arrayHasta[$claves[$cont]] . "<br>";
        
        for($cont2 = 0; $cont2 < (count($claves)); $cont2++) {    
        
            if(($arrayDesde[$claves[$cont]] <= $arrayDesde[$claves[$cont2]]) && ($arrayHasta[$claves[$cont]] > $arrayDesde[$claves[$cont2]]) && $cont != $cont2) {

                $solapa = 1;

            } 
            
            if(($arrayHasta[$claves[$cont]] >= $arrayHasta[$claves[$cont2]]) && ($arrayDesde[$claves[$cont]] < $arrayHasta[$claves[$cont2]]) && $cont != $cont2) {

                $solapa = 1;

            } 
        }
    } 
}

if($solapa == 1){
    //echo 'Existen intervalos solapados';
    echo '<script>alertify.alert("¡Atención!", "Existen intervalos de horarios solapados. <br> Por favor revise su configuración y vuelva a intentarlo.");</script>';
    
    
} else {
    //meter toda la consulta aquí ------- soy un craaaaaaaaaaaaaaaaaaaaack!!!!
    
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
    
    
    
    for($j = 0; $j < (count($dia)); $j++) {
        //echo $dia[$j];
        //validar que no se solapen los rangos de horarios
        $consulta = "INSERT INTO config_horario (dia, desde, hasta, Domicilio_idDomicilio, profesional_idProfesional)  VALUES('$dia[$j]','$desde.:00','$hasta.:00','$idDom[$i]','$id_profesional')";
        $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo '<div>
      <script> swal({
                      title: "",
                      text: "Hubo un problema con la conexión. Por favor inténtelo nuevamente.",
                      type: "warning",
                      allowOutsideClick: true,
                    }); </script>
      </div>';
            }
            else{
                echo '<div>
      <script> swal({
                      title: "",
                      text: "Su configuración se ha guardado correctamente.",
                      type: "success",
                      timer: 3000,
                      showConfirmButton: false,
                      allowOutsideClick: true,
                    }); </script>
      </div>';
                //AQUI SE DEBERIA CREAR LA SESION DE USUARIO..
            }
    }
        
    //echo $dias;
    }
    
}



?>