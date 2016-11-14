<?php
require_once('../conn/connect.php');



$search='';
if(isset ($_POST['search'])){
    $search=$_POST['search'];
    
}

$searcht = trim( $search, " ");


$searchsn = str_replace(' ', '', $searcht);


$consulta ="SELECT * FROM profesionales2 WHERE  CONCAT (nombre1, '',nombre2, '', apellido1, '', apellido2) LIKE '%".$searchsn."%' OR especialidad LIKE '%".$search."%'  ORDER BY visitas DESC";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);

?>
<?php 
if($total>0 && $search != ''){ ?>
<h2 class="resultados_busq">Resultados de la búsqueda:</h2>
<?php do {?>
<div class="art">
 <a href="articulo.php?id_profesional=<?php echo $fila['id_profesional']?>&search=<?php echo $search ?>">
  <span class="titulo"><?php echo utf8_encode ($fila ['nombre1'])?>  
  <?php echo utf8_encode ($fila ['nombre2'])  ?>  
  <?php echo utf8_encode ($fila ['apellido1'])  ?>  
  <?php echo utf8_encode ($fila ['apellido2'])  ?> 
  <?php echo ':' ?>   
  <?php echo utf8_encode ($fila ['especialidad'])?></span> <br>
  <span class="contenido">  <?php echo utf8_encode ($fila ['descripcion'])?>   </span>
 </a>
</div>


<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?> 
<?php } 
elseif($total>0 && $search == '') echo '<h2>Ingresa  un parámetro de búsqueda</h2><p>Ingresa el nombre, apellido o especialidad del profesional.</p>';
else echo '<h2>No se encontraron resultados</h2><p>Vuelve a intentarlo.</p>';
?>