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
                     <li><a href="index.php">Inicio</a></li>
                     <li><a href="servicios.php">Servicios</a></li>
                     <li><a href="nosotros.php">Nosotros</a></li>
                     <li><a href="noticias.php">Noticias</a></li>
                    <li><a href="profesionales.php">Profesionales</a></li>
                    <li><a href="asociados.php">Asociados</a></li>
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
                     <img src="img/rondia-grande.jpg" alt=""> 
                         <div>
                             <p>
                             <h4>Rondía</h4>
                             <h6>Laboratorio bioquímico</h6>
                             <ul>
                                 <li>Química clínica</li>
                               Bacteriología. <br>
                               Hematología. <br>
                               Pesquita neonatal. <br>
                               Gases en sangre. <br>
                               Alta complejidad. <br>
                               Marcadores virales. <br>
                               Urgencias.</li>
                                 <li>Dirección: San Juan  570. - S.M. DE TUCUMÁN.</li>
                                 <li>Teléfonos: 0381-450 4515</li>
                                 <li>E-mail:rondialab@yahoo.com.ar</li>
                             </ul>
                         </div>
                  </article>
           </section>
           
           <section class="contenedor" id="mapa1">
               <h4>Ubicación</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.455166025804!2d-65.20658478536596!3d-26.825471583165275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225c1714310519%3A0x91d9f08d4e6171a4!2sSan+Juan+570%2C+T4000DPL+San+Miguel+de+Tucum%C3%A1n%2C+Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1477347477028" allowfullscreen></iframe>
               <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2sar!4v1477347527890!6m8!1m7!1s9KinT-SYYr2G0TPgi60krA!2m2!1d-26.8253889531458!2d-65.20439865091069!3f180.95274443352483!4f-4.541235371013528!5f0.7820865974627469" allowfullscreen></iframe>
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