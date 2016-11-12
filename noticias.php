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
<title>Noticias</title>
<link rel="shortcut icon" href="img/icono.ico">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<link rel="stylesheet" href="css/fontello.css">
<link rel="stylesheet" href="css/estilos.css">

<link rel="stylesheet" href="css/estilo_noticias.css">
	
</head>
<body id="body_noticias">
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
<section id="contenedor">
   <div id="titulo">
    <h1>Noticias </h1>
     
     <h2>Explora las ultimas noticias de la empresa<h2>
     </div>
     <div id="contenedor_noticias">
    <section id="noticias">
         <article id="noticia3">
         <img src="img/fotos/mostacero.jpg" alt="">  
         <h4> <a  class="titulo_link" href="noticias/importancia-sistema-gestion.php"><p class="fecha"> 10/10/2016</p>Importancia de  contar con un buen sistema de gestión  de salud</a></h4>
          <p>La resolución de un problema de salud de una persona, por parte del profesional de la salud, cualquiera sea su especialidad o actividad dentro de este ámbito, ya..</p>
          <a href="noticias/importancia-sistema-gestion.php"class="leer_mas">Leer más..</a>
     </article>
     <article id="noticia1">
       
      <img src="img/fotos/paz.jpg">
         <h4> <a  class="titulo_link" href="noticias/alimentacion-consciente.php"><p class="fecha"> 27/09/2016</p> Alimentación consciente-hábitos saludables</a> </h4>
         <p>El planteo sobre lo que comemos día a día y su estrecha relación con el cuidado de la salud son temas de los que se habla cada vez más. Intolerancia al gluten, a la lactosa, sobrepeso..
<p>
         <a href="noticias/alimentacion-consciente.php" class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia2">
      <img src="img/fotos/castrodiego.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/ecografia-embarazo.php"><p class="fecha"> 03/10/2016</p>¿Para qué sirven las ecografías en el embarazo? ¿Cuáles son las eco morfológicas?</a></h4>
      <p>La ecografía es uno de los métodos de diagnóstico más importantes que permiten controlar a tu bebé. Es un método que no produce dolor, que no daña a tu hijo, y que permite ..</p>
      <a href="noticias/ecografia-embarazo.php"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia1">
         <img src="img/fotos/rojano.jpg">
         <h4> <a  class="titulo_link" href="noticias/vesicula-biliar.php"><p class="fecha"> 10/10/2016</p>Vesícula Biliar</a></h4>
         <p>La vesícula biliar es un órgano que se encuentra por debajo del hígado. Tiene forma de pera y su función es la de ser un reservorio de la bilis producida por el hígado. La bilis es un líquido que ..</p>
         <a href="noticias/vesicula-biliar.php"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia2">
      <img src="img/fotos/perez.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/enfermedad-mata-silencio.php"><p class="fecha"> 10/10/2016</p>Una enfermedad que mata en silencio, una crisis de salud pública mundial</a></h4>
      <p>Vivimos en un entorno que cambia rápidamente, sobre la salud humana influyen en todo el mundo los mismos factores poderosos: envejecimiento de la población, urbanización acelerada y ..</p>
      <a href="noticias/enfermedad-mata-silencio.php"class="leer_mas">Leer más..</a>
     </article>
     <article id="noticia6">
      <img src="img/fotos/piliponsky.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/obesidad-sobrepeso-nodieta.php"><p class="fecha"> 13/10/2016</p>Sobrepeso, obesidad y su abordaje: método NO dieta</a></h4>
      <p>El sobrepeso y la obesidad están fuera de control. En la Argentina, más del 20% de la población presenta obesidad y más del 60% padece sobrepeso..</p>
      <a href="noticias/obesidad-sobrepeso-nodieta.php"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia7">
      <img src="img/rondia-grande.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/pesquisa-neonatal.php"><p class="fecha"> 13/10/2016</p>Pesquisa Neonatal ¿Qué es?</a></h4>
      <p>La Pesquisa Neonatal es un conjunto de análisis clínicos de carácter preventivo que se realiza en los recién nacidos, después de las 48 hs de vida y antes del 7mo día,..</p>
      <a href="noticias/pesquisa-neonatal.php"class="leer_mas">Leer más..</a>
     </article>
     
     </div>
    </section>   
 
</section>
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