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
       <h1 class="titulo_noticia">¿Para qué sirven las ecografías en el embarazo? ¿Cuáles son las eco morfológicas?
</h1>
<p class="fecha">03/10/2016</p>
<p> La ecografía es uno de los métodos de diagnóstico más importantes que permiten controlar a tu bebé. Es un método que no produce dolor, que no daña a tu hijo, y que permite controlar su desarrollo desde el momento en que lo “creaste” con amor. </p>
<p> La importancia del control del embarazo junto a tu ginecólogo, y con las ecografías, es decisivo, ya que permitirá detectar problemas rápidamente, y evaluar las posibles soluciones.  Es así, que desde hace algunos años, y con el mejoramiento de los equipos de ecografía, la posibilidad de estudiar detalladamente a los bebes durante los embarazos se hizo posible. Actualmente, existen 2 ecografías muy importantes que se deben realizar, y que se denominan morfológicas, ya que se encargan de estudiar muy cuidadosamente, la anatomía de tu bebé. Una de ellas se realiza a los 3 meses del embarazo, y tiene múltiples nombres: “ecografía de las 11 a 13 semanas”, “ecografía con marcadores de aneuploidías”, etc., y en la cual se estudia el desarrollo cerebral y de su cabeza, el desarrollo de los aparatos gastrointestinal, urinario y genital, la correcta formación de brazos y piernas, la formación de corazón y pulmones, etc. Es necesario que sepas, que se miden algunos elementos que podrían hacer pensar en una anomalía genética, como algunos Síndromes, pero es necesario que sepas que la ecografía NO HACE DIAGNOSTICO DE SINDROME DE DOWN. La única forma de saberlo, es haciendo una punción o “pinchando” tu panza para sacar un pedacito de placenta, y hacerle un ADN. Solo así se sabe si tu hijo tiene síndrome de Down. </p>
<p> La otra ecografía importante, es la que se realiza en las semanas 18 a 23, es decir entre el 5° y 6° mes de embarazo. Aquí se ve con mucho más detalle, los diferentes órganos, es decir, mejor que en la de los 3 meses, simplemente porque el bebé es mucho más grande. Con este estudio podremos saber si tiene labio leporino, si tiene alguna alteración cerebral, si sus riñones se desarrollaron normalmente, podremos saber específicamente el sexo, cómo esta la placenta y el líquido amniótico, y demás elementos importantísimos para un desarrollo adecuado. </p>
<p> Lo más importante, es que con el estudio, te sientas segura y puedas evacuar todas las dudas necesarias para tu tranquilidad. Acá te mostramos algunas fotos de las dos ecografías. </p>
<div class="imagen">
<img  src="../noticias/img-notic/ecografia.png" alt="">
</div>
<p>Ecografía de las semanas 11 a 13 semanas. En las fotos se ve: la cabecita del bebe, las ondas del corazón, la columnita normal y las formación de las piernas. 
</p>
<p class="autor-">Dr. Diego Sebastián de Jesús Castro. Médico Ecografísta.Hospital Centro de Salud. Docente de la Facultad de Medicina. UNT. Certificado por Fetal Medicine  Foundation.</p>
   
        
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