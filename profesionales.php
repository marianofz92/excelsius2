<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
} else {
    
    $usuario='ingresar';
    $enlace='login.php';
}
?>


<?php
require_once('conn/connect.php');



$consulta ="SELECT * FROM profesionales2";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/profesionales.css">
    </head>
    <body>
        <header>

<div id="barramenu" class="contenedor">
<a href="index.php"><img src="img/logoblancosolo.png" id="logo" ></a>
<a id="textologo" href="javascript:$.scrollTo('0px',700);"><h1>Excelsius</h1></a>
<input type="checkbox" id="menu-bar">
<label class="icon-menu" for="menu-bar"></label>
<a href="index.php#equipo_m"><label class="icon-search" for=""></label></a>

<nav class="menu">

<ul> 

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario ?><img src="img/user.png" alt=""></a></li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
<ul>
<li>Especialidad<select name="" id="">
<option value="">Cardiología</option>
<option value="">Odontología</option>
</select>
</li>
<li id="nombre-buscador">Nombre<input type="text"><input type="submit" value="Buscar" id="buscar-menu"></li>

</ul> 
</li>

</ul> 
</nav> 
</div>

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>
        <main>
            <section id="equipo">
               
                <section class="contenedor" id="titulo-equipo">
                   <div>
                     <h1>Nuestros profesionales</h1>
                     <h2>Somos un equipo de profesionales integrados que brindamos servicios de salud.</h2>
                   </div>    
                   <section id="buscar_profesionales">
                    <div>
                        <form action="buscador_profesionales.php" method="post" class="formulario-busqueda" >
                        
                         <label class="titulo_busqueda">Buscá tu profesional<br></label>
                        <div id="seleccion_busqueda">
                       <label>Especialidad:</label> 
                         <select name="especialidad">
                         <option>Selecciona una especialidad.. </option> 
                         </select>
                         <label>Nombre y Apellido:</label>
                         </div>
                          <input class="input-lbl" type="text" name="a_buscar_p" id="a_buscar_p" placeholder="Ingrese nombre o apellido"  >
                       
                        <input type="submit" value="Buscar" class="btn-buscar"> 
                      
                    </form>
                    </div>
                </section> 
               
                <div class="contenedor" id="medicos"> 
                 <?php do {?>    
                <article>
                  <a href="articulo.php?id_profesional=<?php echo $fila['id_profesional']?>"><img src="data:image/jpg;base64,<?php echo base64_encode($fila['img']); ?>"/></a> 
                   <?php $nombre_apellido="{$fila['nombre1']} {$fila['nombre2']} {$fila['apellido1']} {$fila['apellido2']}";?>
                    <a href="articulo.php?id_profesional=<?php echo $fila['id_profesional']?>"><h4><?php echo utf8_encode($nombre_apellido)?>  </h4></a>
                </article>
 
<?php } while ($fila=mysqli_fetch_assoc($resultado));?>

                   </div>
            </section>
            
            <section id="asesores">
                <h1>Pofesionales asesores</h1>
                <h2>Contamos con un equipo de asesoría legal y contable.</h2>
                <div>
                    <article>
                        <a href="asesor_carril.php"><img src="img/estudio_del_carril.jpg" alt=""></a>  
                        <a href="asesor_carril.php"><h4>Estudio del Carril</h4></a>
                    </article>
                    <article>
                        <a href="asesor_contadores%20_yb.php"> <img src="img/contadores_yb.jpg" alt=""> </a>
                        <a href="asesor_contadores%20_yb.php"><h4>Contadores Asociados YB</h4></a>
                    </article>
                </div>
            </section>
            
        </main>
    
        <footer>
            <div class="contenedor">
               <p class="copy">Excelsius salud &copy; 2016</p>
                <div class="sociales">
                    <a class="icon-facebook" href="https://www.facebook.com/excelsius.salud?fref=ts" target="_blank"></a>
                    <a class="icon-twitter" href=""></a>
                    <a class="icon-instagram" href="https://www.instagram.com/excelsiussalud/" target="_blank"></a>
                </div>
            </div>
        </footer>     
    </body>