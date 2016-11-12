
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
       <h1 class="titulo_noticia">"Importancia de contar con un buen sistema de gestión de salud"
      
</h1>
 <p class="fecha">10/10/2016</p>
<p>La resolución de un problema de salud de una persona, por parte del profesional de la salud, cualquiera sea su especialidad o actividad dentro de este ámbito, ya no sólo debe concentrarse en la atención y solución de la enfermedad sino también en la calidad del proceso general del servicio brindado.</p>
<p>Actualmente la innovación en los distintos sistemas de información, comunicación y en la tecnología, hace que los usuarios exijan mejores servicios. Esta presión busca como resultado una atención amable y eficiente; en donde el paciente se sienta contenido, no solamente con la esperanza de que el profesional solucione su estado transitorio de enfermedad sino también en el contacto e interacción con el resto de las personas implicadas en este proceso.</p>
<p>Las herramientas que conforman un sistema de gestión de salud, tienen por objetivo conocer y entender al paciente, para poder ofrecer los resultados esperados por los usuarios de este sistema.</p> 
<p>En este aspecto los servidores de la salud deben tener en cuenta que deben contar con las herramientas adecuadas para que el proceso por donde ha de transitar  la persona que solicita su servicio, sea lo más sensible a la necesidad del usuario, brindando la calidad de servicio esperado.</p>
 <p>Por esto, contar con un buen sistema de gestión de salud, no solo es una herramienta para mejorar la calidad de atención, sino que es un cambio cultural que agrega valor al quehacer de los profesionales y a las organizaciones dedicadas a esta importante actividad: cuidar la salud de las personas. </p>


<p class="autor-">Dr. José Carlos Ruiz Mostacero. Cirujano General.Especialista Certificado U.N.T.
Diplomado en Gestión y Dirección de Servicios de Salud.
Diplomado en Recursos Humanos en el Contexto Organizacional.</p>
   
        
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