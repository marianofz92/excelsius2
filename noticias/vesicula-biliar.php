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
       <h1 class="titulo_noticia">"Vesicula Biliar"
       
</h1>
<p class="fecha">10/10/2016</p>
<p>La vesícula biliar es un órgano que se encuentra por debajo del hígado. Tiene forma de pera y su función es la de ser un reservorio de la bilis producida por el hígado. La bilis es un líquido que actúa en la digestión de diferentes alimentos, principalmente aquellos que son ricos en contenido graso. La vesícula puede verse afectada por diferentes patologías como por ejemplo litiasis biliar (presencia de piedras en el interior de la vesícula), esta es la más frecuente de las afecciones vesiculares; que a su vez puede producir complicaciones como por ejemplo pancreatitis aguda u obstrucción de la vía biliar, entre otras. También y menos frecuente es el cáncer de vesícula. </p>
<p>Los síntomas principales de afección biliar son la intolerancia a los alimentos con contenido graso, el dolor abdominal y pueden estar acompañados de náuseas o vómitos.</p>
<p>Para el diagnóstico preciso se pueden utilizar estudios complementarios como el laboratorio de sangre. La ecografía abdominal es el método de imágenes más utilizado y el más accesible. 
Existen diferentes técnicas quirúrgicas para la solución de las patologías de la vesícula biliar que así lo requieran. Hoy en día la cirugía más utilizada en nuestro medio es la videolaparascopía.</p>
<p>La colecistectomía videolaparoscópica (extracción de la vesícula mediante esta técnica) es una cirugía mínimamente invasiva que ofrece muy buenos resultados con recuperación pos operatoria rápida, haciendo que la internación en la institución de salud, sea de corta estadía, y la recuperación en el domicilio sea cómoda; ya que el paciente  puede movilizarse y realizar sus actividades básicas en forma independiente.</p>
<p>En nuestro medio contamos con la tecnología y la capacitación adecuada para brindar seguridad y excelentes resultados. Consúltenos.</p>



<p class="autor-">Dr. Rojano Juan Pablo. Cirujano General. Cirujano Instituto Maternidad Nuestra Señora de las Mercedes. Ex Residente Hospital San Martin de la Plata. Ex jefe de Residentes Sanatorio Modelo de Lanus (Bs. As.).
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