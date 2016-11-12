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
<meta charset="utf-8">
<link rel="shortcut icon" href="img/icono.ico">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Excelsius Salud - Nosotros</title>
	<link rel="stylesheet" href="css/estilo_nosotros.css">
	 <link rel="stylesheet" href="css/fontello.css">
<link rel="stylesheet" href="css/estilos.css">
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
<section id="contenedor_body">
   <div id="contenedor_nosotros">
   <div id="mision_vision">
    <div id="titulo_mision">
       <h1>Visión</h1>
        <p>Que la experiencia de la persona en el tratamiento de su problema de salud sea lo más eficiente y amable en todo el proceso.</p>
       
    </div>
   
    <div id="titulo_vision">
        <h1>Misión</h1>
        
        <p>Brindar una excelente atención a través del logro de la mayor eficiencia posible.</p>
        </div>
    </div>
    
        <div id="titulo_quienes">
            <h1>Quienes somos</h1>
            <p>Generada como una necesidad empresarial y estrechamente ligada a una sociedad que demanda servicios médicos de alta performance, nace esta marca.
Integrada por profesionales de la medicina especializada y en carrera ascendente, busca reflejar el compromiso con su entorno en los ámbitos de calidad de vida.
La historia, en un futuro, nos contará que a principios del año 2016, un grupo de médicos fortalecidos en sus experiencias y expectativas le dio impulso a esta idea que es la base y fortaleza del emprendimiento; siendo su centro geográfico una urbe en expansión como San Miguel de Tucumán, “Cuna de la Independencia” Argentina quien celebrando su bicentenario va paralela al alcance regional donde también se dirigen sus pretensiones.
Esta marca es salud.
Y refleja su sinónimo más amplio y significativo, aquel que engloba sus propósitos y la vocación del servicio al prójimo.
Sus pilares son la medicina, la tecnología y la sociedad, tres conceptos que desarrollaron esta marca.
</p>

    </div> 
    
    <div id="eequipo">
       <div id="titulo_nequipo">
           <h1>Nuestro equipo</h1>
       </div>
        <div  id="contenedor_equipo"> 
           <article>
                    <img src="img/mostacero.jpg">
                    <h4>Dr. José C. Ruiz Mostacero</h4>
                    <p>Fundador</p>
                </article>
                    <article>
                    <img src="img/juan_ruizmostacero.jpg">
                    <h4>Juan Amaro Ruiz Mostacero</h4>
                    <p>Co. Fundador</p>
                </article>
                <article>
                    <img src="img/maximiliano_cardozo.jpg">
                    <h4>Maximiliano Cardozo</h4>
                    <br> 
                    <p>Sistemas de información</p>
                </article>
               
                <article>
                    <img src="img/mariano_flores.jpg">
                <h4>Mariano Flores Zárate</h4>
                 <br>
                <p>Sistemas de información</p>
                </article>
        </div>
        
    </div>
   
    </div>
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