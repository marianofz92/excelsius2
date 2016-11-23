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
$consulta ="SELECT * FROM profesionales_asesores WHERE id_profesionales_asesores =1";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$insert="UPDATE profesionales_asesores SET vistas=vistas+1 WHERE id_profesionales_asesores=1";
$update= $connect->query($insert) or die ("No se ha podido actualizar la pagina");
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
        <link rel="stylesheet" href="css/medico1.css">
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
           <section class="contendeor" id="medico1">
                  <article>
                     <img src="img/estudio_del_carril.jpg" alt=""> 
                         <div>
                             <p>
                             <h4>Estudio Jurídico del Carril</h4>
                             <h6>Abogados</h6>
                             <ul>
                                 <li>Daños y perjuicios <br>
                                    Laboral <br>
                                    Mala praxis médica <br>
                                    Familia <br>
                                    Penal <br>
                                    Civil y comercial</li>
                                 <li>Dirección: Av. Mitre n° 355 – Altos – San Miguel de Tucumán</li>
                                 <li>Teléfonos: 0381 – 4233371 / 156610886</li>
                                 <li>E- mail: estudiodelcarril@gmail.com</li>
                                 <li>Visitas: <?php echo $fila['vistas']?></li>
                             </ul>
                         </div>
                  </article>
           </section>
           
           <section class="contenedor" id="mapa1">
               <h4>Ubicación</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.5251555626232!2d-65.21937608495699!3d-26.8232442831661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225c402d897be3%3A0xe0c16d883c68fbd6!2sAv.+Mitre+355%2C+San+Miguel+de+Tucum%C3%A1n%2C+Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1476679866079" allowfullscreen></iframe>
               <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses!2sus!4v1476682700240!6m8!1m7!1s26ARkQDLL2jwZar_aLDsSw!2m2!1d-26.82289623001798!2d-65.21724278412644!3f265.9494836412701!4f2.8313169021948!5f0.7820865974627469" allowfullscreen></iframe>
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
</html>