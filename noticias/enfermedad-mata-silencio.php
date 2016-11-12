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
       <h1 class="titulo_noticia">Una enfermedad que mata en silencio, una crisis de salud pública mundial.</h1>
       <p class="fecha">10/10/2016</p>

<p>Vivimos en un entorno que cambia rápidamente, sobre la salud humana influyen en todo el mundo los mismos factores poderosos: envejecimiento de la población, urbanización acelerada y generalización de modos de vida malsanos. Cada vez más, los países ricos y pobres se enfrentan a los mismos problemas de salud. Uno de los ejemplos más notables de este cambio es que las enfermedades no transmisibles, como las enfermedades cardiovasculares, el cáncer, la diabetes o las enfermedades pulmonares crónicas han superado a las enfermedades infecciosas como principales causas de mortalidad en el mundo. Uno de los factores de riesgo clave de las enfermedades cardiovasculares es la hipertensión (tensión arterial elevada). La hipertensión afecta ya a mil millones de personas en el mundo, puede provocar infartos de miocardio y accidentes cerebrovasculares. Los investigadores calculan que la hipertensión es la causa por la que mueren anualmente nueve millones de personas. Sin embargo, este riesgo no tiene que ser necesariamente tan elevado. La hipertensión se puede prevenir. La prevención es mucho menos costosa y mucho más segura para los pacientes, que intervenciones como la cirugía de revascularización miocárdica o la diálisis, que a veces son necesarias cuando la hipertensión no se diagnostica y no se trata. Los esfuerzos mundiales para hacer frente al reto que plantean las enfermedades no transmisibles han cobrado impulso a partir de la Declaración Política de las Naciones Unidas sobre la Prevención y el Control de las Enfermedades No Transmisibles de 2011. La Organización Mundial de la Salud está elaborando un Plan de Acción Mundial 2013-2020, con el fin de definir una hoja de ruta para las acciones encabezadas por los países en materia de prevención y control de las enfermedades no transmisibles. Los Estados Miembros de la OMS están consensuando un marco mundial de vigilancia para seguir los progresos en materia de prevención y control de estas enfermedades y sus principales factores de riesgo. Uno de los objetivos previstos es una reducción considerable del número de personas hipertensas. La hipertensión es una enfermedad letal, silenciosa e invisible, que rara vez provoca síntomas. Fomentar la sensibilización pública es clave, como lo es el acceso a la detección temprana. La hipertensión es un signo de alerta importante que indica que son necesarios cambios urgentes y significativos en el modo de vida. Las personas deben saber por qué el aumento de la tensión arterial es peligroso, y cuáles son los pasos para controlarla. También deben saber que la hipertensión y otros factores de riesgo como la diabetes a menudo aparecen juntos. Para aumentar este conocimiento, los países deben disponer de sistemas y servicios para promover la cobertura sanitaria universal y apoyar modos de vida saludables: adoptar un régimen alimentario equilibrado, consumir menos sal, evitar el uso nocivo del alcohol, realizar ejercicio físico regularmente y no fumar. El acceso a medicamentos de buena calidad, eficaces y baratos también es vital, particularmente en el nivel de la atención primaria. Como ocurre con otras enfermedades no transmisibles, la sensibilización ayuda a la detección temprana, y la autoasistencia contribuye a garantizar la observancia del tratamiento farmacológico, los comportamientos saludables y un mejor control de la enfermedad. Los países de ingresos elevados han comenzado a reducir la hipertensión en sus poblaciones mediante políticas enérgicas de salud pública, como la reducción de la sal en los alimentos procesados y la amplia disponibilidad de servicios de diagnóstico, tratamiento de la hipertensión y otros factores de riesgo. Se pueden mencionar numerosos ejemplos de acciones conjuntas, intersectoriales, que enfrentan con eficacia los factores de riesgo de la hipertensión. En cambio, en muchos países en desarrollo aumenta el número de personas que sufren infartos de miocardio y accidentes cerebrovasculares provocados por factores de riesgo no diagnosticados ni controlados, como la hipertensión. El nuevo documento de la OMS de información sobre la hipertensión en el mundo busca contribuir a los esfuerzos de todos los Estados Miembros para elaborar y aplicar políticas dirigidas a reducir la mortalidad y la discapacidad que causan las enfermedades no transmisibles. La prevención y el control de la hipertensión son piedras angulares para ello.</p>

<p class="autor-">Dra. Gabriela Pérez. Medica Cardióloga. MP 6567.
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