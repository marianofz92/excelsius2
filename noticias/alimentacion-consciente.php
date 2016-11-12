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
       <h1 class="titulo_noticia">Alimentación consciente. Hábitos saludables</h1>
       <p class="fecha">27/09/2016</p>
       <p>El planteo sobre lo que comemos día a día y su estrecha relación con el cuidado de la salud son temas de los que se habla cada vez más. Intolerancia al gluten, a la lactosa, sobrepeso, obesidad, celiaquía, colon irritable, colesterol alto, hipertensión son apenas algunos de los tantos términos que se escuchan cada vez más en las charlas de todos."Los alimentos que comes pueden ser la más poderosa y segura medicina para tu cuerpo o el más lento proceso de envenenamiento", escribió Anne Wigmore, médica nutricionista norteamericana, precursora de la alimentación consciente.
</p>
       <p>Ha llegado el momento de tomarse unos minutos al día y hacer un replanteo sobre lo que ingerimos, la responsabilidad que asumimos al hacerlo, sobre  el acto de comer y la estrecha relación entre comida y nuestra salud. La alimentación es un factor muy importante al cual debemos prestarle más atención de la que quizás le brindamos a diario. Del mismo modo que nos tomamos el tiempo para realizar las obligaciones diarias y los momentos de esparcimiento, debemos empezar a conocer el combustible de nuestro organismo (los alimentos)  su calidad, cantidad ingerida, procedencia, composición nutricional entre otros factores, ya que todos ellos impactan de manera directa o indirecta en nuestra salud.
</p>
       <p>En la actualidad contamos con diversas herramientas, recursos y profesionales de salud especializados, siendo educadores claves para el proceso de selección consciente de los alimentos, conductas y promotores de hábitos saludables, aspecto fundamental para la prevención y tratamiento de enfermedades. 
</p>
       <p>Consejos saludables como realizarse chequeos periódicos, no fumar,  reducir el consumo de sal, azúcar, el reemplazo de bebidas azucaradas por bebidas reducidas en calorías, incrementar la ingesta de vegetales, frutas frescas, fibra (salvado, semillas etc.) y agua segura, como así también promover la práctica regular de actividad física sin importar día ni horario buscando de este modo lo importante, ponerse en movimiento. </p>
<p>La lista mencionada es interminable, las formas, tiempos, métodos y estrategias para implementar hábitos de vida saludable son múltiples, lo importante es que tengas presente que todo cambio requiere de esfuerzo y recuerdes que el esfuerzo se nota. Entre todo lo mencionado destacamos que empezar a cuidarte, sin lugar a duda es el hábito más saludable. Anímate! 
</p>
<p class="autor-">
 Lic. Zarina Paz.
Nutricionista clínica -	MP. 753
Universidad del Norte Santo Tomás de Aquino.</p>
   
        
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