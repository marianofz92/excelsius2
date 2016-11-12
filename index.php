<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    
} else {
    
    $usuario='Ingresar';
    $enlace='login.php';
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <link rel="stylesheet" href="css/estilo-buscador.css">
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/servicios_index.css">
      
        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
         <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
       
        
        
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

<li id="item-ingresar"><a href="login.html">ingresar<img src="img/user.png" alt=""></a></li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu"><a href="javascript:$.scrollTo('#equipo_m',700); ">Buscar<span class="icon-search"></span></a></li>
</li>
</nav> 
</div>

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>
        
        <main>
            <section id="principal">
                <div id="slides">
        <ul class="slides-container">
        <li>
        <img src="img/mision.jpg" alt="">
        
        </li>
        <li>
        <img src="img/EQUIPO.jpg" alt="">
       
        </li>
        <li>
        <img src="img/quienes.jpg" alt="">
        
        </li>
        <li>
        <img src="img/servicios.jpg" alt="">
        
        </li>
    </ul>
    <nav class="slides-navigation">
    <a href="#" class="next">&#62;</a>
    <a href="#" class="prev">&#60;</a>
  </nav>
</div>
               
        <script src ="js/jquery.superslides.js"></script>
                <div class="contenedor" id="excelencia">
                    <img src="img/logo.png" alt="">
                   
                  
                </div>
            </section>
            
            <section  id="equipo_m">
               <div id="buscador-nuevo" class="container">
   
        <div class="form center">
           <div  class="titulo_busqueda">
               <h1>Buscá tu profesional</h1>
           </div>
            <form action="" method="post" name="search_form" id="search_form">
               <br><br><br><br>
                <input placeholder="Ingresa nombre, apellido o especialidad.." type="text" name="search" id="search">



            </form>
       </div>
    <div id="resultados" class="formato-resultados"></div>
    
</div>
            </section>
            
            <section id="mapas">
               
                <div id="mapas_texto">
                    <h3>Encontrá toda la información de tu profesional</h3>
                    <img src="img/logo_ubicacion3.png" id="logo_ubicacion" alt="">
                    <img src="img/logo_informacion.png" alt="">
                </div>
            </section>
            
            <section id="contenedor33">
                     <div id="titulo">
                       <h1>Nuestros servicios</h1>
                       </div> 
                      <div id ="contenido">
                        <div  class="contenedor2" id="cirugia_general">
                          <h1>Cirugía General</h1>
                           <ul>
                           <li>Videolaparoscopía</li>
                           <li>Cirugía bariátrica (cirugía de la obesidad y metabólica)</li>
                           <li>Cirugía oncológica</li>
                           <li>Cirugía de reflujo gastroesofágico (hernias de hiato)</li>
                           <li>Cirugía de alta complejidad</li>
                           </ul>

                        </div>
                        <div class="contenedor2"  id="cirugia_cabeza_cuello">
                          <h1>Cirugía de cabeza y cuello</h1>
                           <ul><li>Cirugía Maxilo facial</li>
                           <li>Patología tiroidea (benigna y maligna)</li>
                           <li>Lesiones y fracturas faciales</li>
                           <li>Patología de glándulas salivales</li>
                           </ul> 
                        </div>
                        <div class="contenedor2"  id="cirugia_pediatrica">
                           <h1>Cirugía pediátrica</h1>
                            <ul><li>Cirugía torácica</li>
                            <li>Malformación de torax</li>
                            <li>Cirugía minimamente invasiva</li>
                            <li>Ergometrías</li></ul>
                        </div>
                        <div class="contenedor2"  id="cardiologia">
                           <h1>Cardiología</h1>
                            <ul><li>Hipertensión arterial</li>
                            <li>Electrocardiograma</li>
                            <li>Holter de presión arterial</li>
                            <li>Holter de arritmias</li>
                            <li>Ergometrías</li></ul>
                        </div>
                        <div class="contenedor2" id="ecografia">
                           <h1>Ecografía</h1>
                            <ul>
                                <li>Generales</li>
                                <li>Ginecológicas</li>
                                <li>Obstétricas</li>
                                <li>Doppler</li>
                            </ul>
                        </div>
                        <div class="contenedor2"  id="clinica">
                            <h1>Clínica</h1>
                            <ul>
                                <li>Clínica general</li>
                                <li>Obesidad</li>
                                <li>Trastornos funcionales digestivos</li>
                                <li>Control de diabetes</li>
                            </ul>
                        </div>
                        <div class="contenedor2" id="pediatria">
                           <h1>Pediatría</h1>
                            <ul>
                                <li>Clínica médica pediátrica</li>
                                <li>Crecimiento y desarrollo</li>
                                <li>Control del niño sano</li>
                            </ul>
                        </div>
                        <div class="contenedor2"  id="dermatologia">
                            <h1>Dermatología</h1>
                            <ul>
                                <li>Acné – Psoriasis – Vitiligo – Alopecia – Manchas</li>
                                <li>Estética: lifting sin cirugía – Botox – Ácido Hialurónico – Peeling – Masoterapia – IPL – Depilación </li>
                                <li>Laser- Circuitos reductores y modeladores – Masajes relax</li>
                            </ul>
                        </div>
                        <div class="contenedor2" id="reumatologia">
                           <h1>Reumatología</h1>
                           <ul>
                               <li>Artrocentesis</li>
                               <li>Clínimetría</li>
                               <li>Goniometría</li>
                               <li>Valoración funcional de incapacidad</li>
                           </ul>
                           </ul>

                        </div>
                        <div class="contenedor2" id="nutricion">
                           <h1>Nutrición</h1>
                           <ul>
                               <li>Clínica nutricional</li>
                               <li>Nutrición deportiva</li>
                               <li>Obesidad</li>
                               <li>Diabetes</li>
                           </ul>    
                        </div>
                        <div class="contenedor2" id="laboratorio">
                           <h1>Laboratorio</h1>
                           <ul>
                               <li>Química clínica</li>
                               <li>Bacteriología</li>
                               <li>Hematología</li>
                               <li>Pesquita neonatal</li>
                               <li>Gases en sangre</li>
                               <li>Alta complejidad</li>
                               <li>Marcadores virales</li>
                               <li>Urgencias</li>
                           </ul>

                        </div>
                        <div class="contenedor2" id="asesoria">
                            <h1>Equipo de asesoría</h1>
                            <ul>
                                <li>Abogados</li>
                                <li>Contadores</li>

                            </ul>
                        </div>

                        </div>
            </section>
            <section id="unete">
                
                <div id="contenedor_unete">
                    <h1>¿Es profesional de la salud?</h1>
                 <a href="contacto.html">¡Únase a nosotros!</a>
                    
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
</html>