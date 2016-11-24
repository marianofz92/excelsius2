<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $usuario=$_SESSION['username']; 
    $enlace='../contacto.php';
    
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
       <h1 class="titulo_noticia">"Sobrepeso, obesidad y su abordaje : método NO dieta."
      
</h1>
 <p class="fecha">13/10/2016</p>
<p>El sobrepeso y la obesidad están fuera de control. En la Argentina, más del 20% de la población presenta obesidad y más del 60% padece sobrepeso. A nivel global existen aproximadamente 2300 millones de adultos con sobrepeso y más de 700 millones con obesidad. Todo indica que la obesidad es una escandalosa <strong>crisis de muerte lenta</strong>.</p>
<p>La obesidad afecta cada uno de los aspectos de la vida. Su prevención, la detección temprana y su tratamiento poseen efectos saludables a largo plazo no solo sobre la calidad de vida de las personas, sino que implica además una estrategia fundamental para evitar la bancarrota de los sistemas de salud, que no podrán afrontar los costos acoplados al exceso peso crónico.</p>
<p>Los profesionales de la salud debemos ser activos, cambiando entre todos, nuestra mirada sobre la obesidad y su paradigma terapéutico. Para ello, considerarla una de las patologías crónicas metabólicas de mayor prevalencia y no un mero problema estético, es, sin duda, un imprescindible primer paso.</p>
<p>La obesidad habitual en la consulta clínica del paciente adulto es <strong>de origen multifactorial</strong>. Su etiología incluye factores genéticos, metabólicos, endocrinológicos y ambientales. Dentro de estos, la sobrealimentación asociada al sedentarismo constituyen los <i>big two</i>, es decir los dos principales detonantes actuales de la enfermedad. En los últimos años, tanto en los países industrializados como en los países en vías de desarrollo, se está presentando un cambio fundamental: <strong>la transición nutricional.</strong> Se trata del paso del consumo de alimentos con alta densidad nutricional, caseros y asociados a vidas activas, a la ingesta de alimentos de alta densidad calórica y baja densidad nutricional, sumados a un alto nivel de sedentarismo casi obligado.</p>
<p>La transición nutricional es resultado de la interacción de factores de índole económico, cultural y emocional. Entre otros, se pueden citar la variedad de alimentos, el aumento en el tamaño de las porciones, las limitaciones de tiempo para preparar alimentos y comer en casa comida casera, el ritmo de vida cada vez más aceleradoy la predominancia del mercado del espectáculo en el escaso tiempo disponible de ocio (en detrimento de la actividad física), la tecnología y el progreso junto con la difusión de un ideal de belleza con eje en la delgadez y la perfección como sinónimo de éxito.</p>
<br>

<h1 class="titulo_noticia">"Método NO dieta"</h1>
<p>El método No Dieta surge como <strong>una alternativa frente al fracaso de las dietas tradicionales para perder peso.</strong> Durante muchos años, cuando un paciente demandaba tratamiento para perder peso, la estrategia era siempre la misma: restringir excesivamente las calorías para perder peso rápidamente, anulando el placer de comer sabroso y prescribiendo actividad física tan exigente que no resultaba factible o sostenible para un paciente obeso.</p>
<p>Así es que durante años ese paciente fracasaba una y otra vez en el intento de alcanzar el peso ideal soñado que algún profesional le había indicado alguna vez como objetivo. Como en un espiral, la persona comenzaba la dieta, llegaba a un punto cumbre, y luego volvía inexorablemente al mismo punto de partida.
<p>De hecho, numerosos estudios demuestran que “dietar” es el mejor predictor de ganancia de peso.</p>
<p>Pero lo más grave es que la pandemia de obesidad desencadena otras patologías crónicas metabólicas: enfermedad cardiovascular, algunos tipos de cáncer, diabetes tipo 2, síndrome metabólico, entre otras.</p>
<p class="recuadro">No existe el peso ideal. <strong>Solo existe el mejor peso posible.</strong> Este es el   asociado al menor nivel de riesgo y a la mayor expectativa de vida.</p>

<p>Desde el ámbito científico y académico se comenzó a notar un crecimiento paralelo de la obesidad y el “dietismo”. Es decir, cuanta más dieta restrictiva o milagrosa, mayor índice de obesidad.</p>
<p class="recuadro">Si las dietas tradicionales funcionaran, entonces no habría necesidad de tantas.</p>
<p>Su mejor definición es volver al sentido común, abandonar los ciclos de demonización para jerarquizar el patrón dietario.</p>
<p>No Dieta propone legalizar el placer, entendiendo al alimento solo como una fuente de supervivencia, sino como punto de partida del bienestar y la salud, como punto de partida de una vida plena.</p>
<p>No Dieta surgió de la práctica. De la interacción diaria con pacientes. De su padecer, de su dificultad, de su angustia. Pero también de sus logros, de sus cambios, de sus palabras. La experiencia sin teoría es ciega y la teoría sin experiencia es un simple ejercicio intelectual.</p>
<p class="negrita">No Dieta es una propuesta práctica basada en evidencia científica.</p>
<br>
<div class="imagen-dieta">
<img src="../noticias/img-notic/no_dieta1.png" alt="">
</div>
<p>No Dieta parte de una simple certeza: la indulgencia es un derecho innato, <strong>comer sabroso es un derecho</strong>. Nacemos con ese derecho, y por esa razón no debemos quitárselo al paciente por mas obeso que sea. Si la obesidad es una patología crónica, ¿cómo podemos pensar que una persona es capaz de sostener durante largos periodos o toda su vida la privación de placer?</p>
<p class="negrita">No Dieta propone comer de todo, la comida preferida, en porciones controladas, en la porción “justa”.</p>
<p>El eje del método es el cambio, perder  peso es resultado de cambiar.</p>
<p>Para volverlo posible se debe trabajar sobre otros tres ejes de igual importancia: LA ALIMENTACION, LA ACTIVIDAD FISICA Y EL ABORDAJE DE LAS EMOCIONES Y EL ESTRES.</p>
<p>A partir de estos tres pilares, el profesional acompaña al paciente en un camino en el que la meta final es cambiar comportamientos poco saludables y reemplazarlos por otros en la medida y la velocidad que cada persona sea capaz de cambiar. Se trabaja desde donde cada paciente está.</p>
<div class="imagen-dieta">
<img src="../noticias/img-notic/no_dieta2.png" alt="">
</div>
<p>El objetivo es el cambio. El resultado es la pérdida de peso.</p>
<p>No Dieta está basado en la <strong>toma de conciencia</strong> y el <strong>cambio</strong>a partir de la toma de conciencia. Se trata de que el paciente tome conciencia de:</p>
<p>1- Cuán activo es.</p>
<p>2- Qué y cuánto come.</p>
<p>3- Si es capaz de diferenciar hambre de emociones o estrés.</p>
<p>Para tomar conciencia, se utilizarán diferentes estrategias (fotografías de platos) y objetos (podómetro). A partir de estos registros comienza la posibilidad del cambio. Siempre se comienza desde donde se encuentra el paciente.</p>
<br>
<p><strong>Fuente:</strong> Material extraido del postgrado No dieta, dictado por la Dra. Monica Katz (año 2016).</p>

<p class="autor-">Dra. Solana Piliponsky.</p>
   
        
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