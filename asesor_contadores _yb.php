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
$consulta ="SELECT * FROM profesionales_asesores WHERE id_profesionales_asesores =2";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$insert="UPDATE profesionales_asesores SET vistas=vistas+1 WHERE id_profesionales_asesores=2";
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
             <a href="index.php#equipo_m"><label class="icon-search" for=""></label></a>
               <nav class="menu">
                
                  <ul>  
                     <li><a href="index.php">Inicio</a></li>
                     <li><a href="servicios.php">Servicios</a></li>
                     <li><a href="nosotros.php">Nosotros</a></li>
                     <li><a href="noticias.php">Noticias</a></li>
                    <li><a href="profesionales.php">Profesionales</a></li>
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
                     <img src="img/contadores_yb.jpg" alt=""> 
                         <div>
                             <p>
                             <h4>Contadores Asociados YB</h4>
                             <h6>Estudio Contable</h6>
                             <ul>
                                 <li>Servicios Impositivos <br>
                                     Servicios Contables <br>
                                     Servicios Administrativos <br>
                                     Servicios Laborales y Jubilatorios <br>
                                     Servicios Previsionales <br>
                                     Registros Societarios <br>
                                     Servicios Jurídicos <br>
                                     Servicios Inmobiliarios</li>
                                 <li>Dirección: Galería los Troncos - Oficina 10 - M. Belgrano 51 Yerba Buena - Tucumán</li>
                                 <li>Cels: 0381 – 156379007 / 155379151 / 154489405</li>
                                 <li>Twiter: Estudioekol@contadoresYB</li>
                                 <li>E-mail: estudioekol@gmail.com</li>
                                 <li>Visitas: <?php echo $fila['vistas']?></li>
                             </ul>
                         </div>
                  </article>
           </section>
           
           <section class="contenedor" id="mapa1">
               <h4>Ubicación</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.8297727803747!2d-65.295539758105!3d-26.81354835431949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x942242d7a99cf57f%3A0xd8d1ecadb23c5338!2sBelgrano+51%2C+T4107EQA+Yerba+Buena%2C+Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1476681858596" allowfullscreen></iframe>
               <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2sar!4v1476681938266!6m8!1m7!1se4Fg8qwKIVgXurnEywgCfA!2m2!1d-26.81365215655491!2d-65.29498909089705!3f291.54898545123956!4f-9.7350032799757!5f0.7820865974627469" allowfullscreen></iframe>
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