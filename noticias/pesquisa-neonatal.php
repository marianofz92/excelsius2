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
<a href="index.php"><img src="../img/logoblancosolo.png" id="logo" ></a>
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
       <h1 class="titulo_noticia">Pesquisa Neonatal ¿Qué es?
</h1>
<p class="fecha">05/11/2016</p>
<p> La Pesquisa Neonatal es un conjunto de análisis clínicos de carácter preventivo que se realiza en los

recién nacidos, después de las 48 hs de vida y antes del 7mo día, debiendo considerarse el tipo de

alimentación que recibe el paciente, la ingesta de antibióticos y algún otro tipo de procedimientos como

transfusiones, pues estos pueden generar falsos negativos.</p>
<p> Su objetivo es evitar el daño cerebral y físico que ciertas enfermedades provocan, por lo que ha sido

incorporada definitivamente a la medicina preventiva de igual manera que las vacunaciones. </p>
<p> Se lleva a cabo a partir de unas gotas de sangre que se extraen del talón o de la manito del bebé, y se

colocan en un papel de filtro especial. En países desarrollados, el Screening Neonatal forma parte

esencial de los Programas de Prevención de la salud.</p>

<p> En Argentina por la  legislación vigente se declara la obligatoriedad del examen de Pesquisa Neonatal en
todos los recién nacidos, a fin de instaurar un tratamiento precoz.</p> <br>

<p class="fecha">¿Cuáles son las enfermedades que se pueden detectar con la Pesquisa Neonatal?</p> <br>

<p class="negrita">Hipotiroidismo Congénito:</p> 

<p>Enfermedad congénita que se produce por falta de la hormona tiroidea. Esta hormona interviene en el

desarrollo y el crecimiento del niño y su falta durante las primeras semanas de vida produce daño al

cerebro, provocando discapacidad mental. Detectado inicialmente permite un tratamiento precoz que evita

el daño. Incidencia: 1 en 2.000 aproximadamente.</p> <br>

<p class="negrita">Fenilcetonuria:</p>

<p>Enfermedad hereditaria del metabolismo de las proteínas, que produce acumulación de fenilalanina en el

organismo y lesiona el cerebro del niño, con secuelas neurológicas entre otras. Su detección temprana

permite iniciar un tratamiento a tiempo, y así evitar el daño.</p>

<p>Incidencia: 1 en 11.500 aproximadamente.</p> <br>

<p class="negrita">Galactosemia:</p>

<p>Enfermedad hereditaria caracterizada por la imposibilidad de degradar la galactosa (sustancia presente

principalmente en la leche). Su detección temprana, antes del primer mes de vida, permite iniciar un

tratamiento con una dieta libre de lactosa, es decir sin leche ni productos lácteos y así evitar los daños

que puede producir.</p>

<p>Incidencia: 1 en 25.500 aproximadamente.</p> <br>

<p class="negrita">Hiperplasia Suprarrenal Congénita:</p>

<p>Enfermedad hereditaria que por un defecto en el metabolismo de las hormonas suprarrenales puede

producir deshidratación y muerte en el periodo neonatal, o trastornos en el crecimiento y desarrollo de los

niños. El diagnóstico precoz y el inmediato tratamiento previenen el cuadro grave y permiten la correcta

asignación del sexo de los niños afectados.</p>

<p>Incidencia: 1 en 11.500 aproximadamente.</p> <br>

<p class="negrita">Deficiencia de Biotinidasa:</p>

<p>Enfermedad hereditaria causada por el déficit o ausencia de la enzima biotinidasa, lo que provoca

alteraciones en el metabolismo de la biotina. Esto origina trastornos en el metabolismo de las grasas,

carbohidratos y proteínas. La detección precoz de esta enfermedad y su tratamiento, previene los

síntomas de la misma y el daño que puede producir.</p>

<p>Incidencia: 1 en 99.500 aproximadamente.</p> <br>

<p class="negrita">Fibrosis Quística del páncreas:</p>

<p>Enfermedad hereditaria que cuando se manifiesta en sus formas más severas produce graves dificultades

respiratorias e intestinales. Su detección precoz asegura un mejor asesoramiento pediátrico y una mejor

calidad de vida.</p>

<p>Incidencia: 1 en 6.500 aproximadamente.</p>

<p>Las normas recomiendan iniciarlo antes de los 10 días de vida para asegurar la ausencia de secuelas

neurológicas.</p> <br>

<div class="imagen">
<img  src="../noticias/img-notic/bebe-noticia-rondia.jpg" alt="">
</div>
   
 <p class="autor-">Rondía - Laboratorio bioquímico.</p>
               
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