<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
   $enlace='../panel-paciente.php';
    
} else {
    
    $usuario='ingresar';
    $enlace='../login.php';
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="../img/icono.ico">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Excelsius Salud</title>
<link rel="stylesheet" href="../css/noticia_nota.css">	
<link rel="stylesheet" href="../css/fontello.css">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<header>

<div id="barramenu" class="contenedor">
<a href="../index.php"><img src="../img/logoblancosolo.png" id="logo" ></a>
<a id="textologo" href="javascript:$.scrollTo('0px',700);"><h1>Excelsius</h1></a>
<input type="checkbox" id="menu-bar">
<label class="icon-menu" for="menu-bar"></label>
<a href="../index.php#equipo_m"><label class="icon-search" for=""></label></a>

<nav class="menu">

<ul> 

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario ?><img src="../img/user.png" alt=""></a></li>
<li><a href="../index.php">Inicio</a></li>
<li><a href="../nosotros.php">Nosotros</a></li>
<li><a href="../profesionales.php">Profesionales</a></li>
<li><a href="../asociados.php">Asociados</a></li>
<li><a href="../servicios.php">Servicios</a></li>
<li><a href="../noticias.php">Noticias</a></li>
<li><a href="../contacto.php">Contacto</a></li>
<li class="submenu"><a href="../index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
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

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="../img/user.png" alt=""> </a>

</header>
<section id="contenido_noticia">
    <div id="noticia">
       <h1 class="titulo_noticia">Eventos Institucionales Coorporativos</h1>
       <p class="fecha">24/11/2016</p>
       <br>
<img src="../noticias/img-notic/eventos-institucionales.png" class="eventos-corp" alt="">
<p><i><srtrong>Un Evento Corporativo:
<ul class="evento-corp">
    <li>Constituye una presencia pública de imagen Institucional. </li>
    <li>Permite posicionamiento corporativo en el mercado interno y externo.</li>
    <li>No es un pasatiempo sino una apuesta profesional y de negocios.</li>
</ul></srtrong></i></p> <br>
<p>Un evento es una actividad pública y social, que para las organizaciones, instituciones y personas son actos no habituales. Estos encuentros promueven el contacto con el público de la organización y ponen en juego la fortaleza de las acciones corporativas de la comunicación global. El encuentro se transforma en una expresión institucional, que en su celebración pone en juego los sistemas de imagen e identidad de la organización y articula los mecanismos culturales para darle un carácter propio. Según esta perspectiva moderna, un evento siempre es una herramienta y una actitud de comunicación corporativa de alto impacto, que sólo puede entenderse integrado a las estrategias de comunicación global de la Organización. El mensaje, los colores, la música, los carteles y el ambiente se conjugan para celebrar, capacitar, integrar o presentar un producto, proyecto o su gente en cada evento que produce. La filosofía, sus valores, su cultura impregna cada una de sus realizaciones haciéndola única. – Silvia Graciela Molinari.</p>
<p>Desde mi consultora desarrollamos eventos que ponen en juego todos los sentidos a partir de entornos y contenidos desafiantes para que los participantes experimenten momentos que perduren en sus mentes y organizamos Actividades de alto impacto dirigidas a la motivación e integración de equipos de trabajo y celebraciones corporativas.


</p> <br>
<img  class="imagen-cec" src="../noticias/img-notic/cecilia-luna.png" alt="">

<p class="autor-">Cecilia Luna- Técnica en RR HH.
</p>
   
        
    </div>
   
</section>


<footer>
            <div class="contenedor">
               <p class="copy">Excelsius salud &copy; 2016</p>
                <div class="sociales">
                    <a class="icon-facebook" href="#"></a>
                    <a class="icon-twitter" href="#"></a>
                    <a class="icon-instagram" href="#"></a>
                    <a class="icon-googleplus" href="#"></a>
                </div>
            </div>
        </footer>  
</body>
</html>