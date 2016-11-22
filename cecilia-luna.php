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
                     <li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario ?><img src="img/user.png" alt=""></a></li> 
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
                     <img src="img/consultora-2.jpg" alt=""> 
                         <div>
                             <p>
                             <h4>Cecilia Luna</h4>
                             <h6>Consultora</h6>
                             <ul>
                                 <li>Técnica en RR HH.</li>
                                 <li>Diplomada en: <br>
                                    Gestión y Dirección en servicios de Salud. <br>
                                    Auditoría y Calidad en organizaciones de salud. <br>
                                    Gestión y Administración de RR HH en el contexto organizacional. <br>
                                    Habilidades Directivas y Liderazgo. <br>
                                 </li>    
                                 <li>Servicios: <br>
                                 Adminsitración y Gestión de RR HH, Marketing, Comunicación. <br>
                                 Organización de eventos corporativos, jornadas de capacitación y congresos.<br>
                                 </li>
                                 <li>Dirección: Monteagudo 857 4° C.</li>
                                 <li>Teléfonos: 381-4225733 / 381-154401774.</li>
                                 <li>E-mail: lunamc1106@gmail.com</li>
                             </ul>
                         </div>
                  </article>
           </section>
           
           <section class="contenedor" id="mapa1">
               <h4>Ubicación</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.6229804357217!2d-65.19970458495708!3d-26.820130883167412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225c18a86de617%3A0xe65fbbdff1e9e8e3!2sMonteagudo+857%2C+San+Miguel+de+Tucum%C3%A1n%2C+Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1478196727087" allowfullscreen></iframe>
               <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2sar!4v1478196859508!6m8!1m7!1sAx3zlIxHpsOsARaGBPHgRQ!2m2!1d-26.82019736113863!2d-65.19752442035694!3f126.11795906449989!4f4.165092086749638!5f0.942667663825729" allowfullscreen></iframe>
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