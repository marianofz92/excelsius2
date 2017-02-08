 <?php
session_start();
require_once('conn/connect.php');
?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario=$_SESSION['username']; 
    $consulta="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $privilegio=$fila['privilegio'];
    if($privilegio ==1)//MEDICO TIENE PRIVILEGIO 1
    {
        $enlace='#';
    }
    else{//ES PACIENTE (por ahora, luego se implementaran secretarias.)
        $enlace='#';
    }
    
    
}
else {
    
    $usuario='Ingresar';
    $enlace='login.php';
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <link rel="stylesheet" href="css/estilo-buscador.css">
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/estilo_noticias.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      
        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
         <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
       
        
        
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

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><img src="<?php 
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
   
    
                                          
<?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==0) {
                
   echo '<ul id="submenu-usuario">
            <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-list-alt"></span>Mis turnos</a></li>
            <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Solicitar turno</a></li>
            <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
        </ul>';
} else {
    
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) {
       
        echo '<ul id="submenu-usuario">
                <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
                <li><a href="configurar-turno.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
                <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
                <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>
            <!--    <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
            </ul>';
            
    } else{
        echo '<style type="text/css"> #item-ingresar span { display: none} </style>';
    }
}
    
    
?>    
      
</li>
<li><a href="index.php">Inicio</a></li>
<li><a href="nosotros.php">Nosotros</a></li>
<li><a href="profesionales.php">Profesionales</a></li>
<li><a href="asociados.php">Asociados</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="noticias.php">Noticias</a></li>
<li><a href="contacto.php">Contacto</a></li>
<li class="submenu" id="item-buscar"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
    
    <?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==0) {
    
        echo  '<div class="dropdown">
              <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="glyphicon glyphicon-user"></span>'.$usuario.'
                <span class="caret"></span>
                <style type="text/css"> #dropdownMenu1 .glyphicon-user { margin-right: 8.6px;}
                </style>
              </button>
              <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>cambiar contraseña</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
              </ul>
            </div>';
    } else {
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==1){
                
               echo  '<div class="dropdown">
              <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="glyphicon glyphicon-user"></span>'.$usuario.'
                <span class="caret"></span>
                <style type="text/css"> #dropdownMenu1 .glyphicon-user { margin-right: 8.6px;}
                </style>
              </button>
              <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>cambiar contraseña</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
              </ul>
            </div>';  
                
            } else {
            echo '<a  id="dropdownMenu1" href="login.php">
              <span class="glyphicon glyphicon-user"></span>Ingresar
              </a> 
              <style type="text/css"> #dropdownMenu1:before { background: none}
              
              </style>';
            }
        }
    ?>
  
</ul>



</nav>     
</div>

<!--<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>-->

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
     
      <article id="noticia9">
      <img src="img/osdepym2.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/apertura-filial-osdepym.html"><p class="fecha"> 17/11/2016</p>Apertura filial OSDEPyM sede S.M. de Tucumán</a></h4>
      <p>Excelsius Salud estuvo presente el día 17 de Noviembre, en la apertura de la filial Osdepym en San Miguel de Tucumán, situada en Córdoba 1001 (Esq. Catamarca)..</p>
      <a href="noticias/apertura-filial-osdepym.html"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia10">
      <img src="img/consultora-2.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/eventos-institucionales-corporativos.php"><p class="fecha"> 17/11/2016</p>Eventos institucionales corporativos</a></h4>
      <p>Un evento es una actividad pública y social, que para las organizaciones, instituciones y personas son actos no habituales. Estos encuentros..</p>
      <a href="noticias/eventos-institucionales-corporativos.php"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia11">
      <img src="noticias/img-notic/dia-medico-img.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/dia-del-medico.html"><p class="fecha"> 3/12/2016</p>Acto por el día del médico</a></h4>
      <p>Estuvimos presentes en el acto por el Día del Médico que se realizó en el Colegio Médico. El mismo contó con la presencia de autoridades de nuestro medio y..</p>
      <a href="noticias/dia-del-medico.html"class="leer_mas">Leer más..</a>
     </article>
     
      <article id="noticia12">
      <img src="img/fotos/ruiz-pinto.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/naturaleza-fuente-vida.html"><p class="fecha"> 10/12/2016</p>Acto por el día del médico</a></h4>
      <p>La naturaleza es nuestra fuente de vida, en la cual el hombre, encontró su alimento, su hábitat y conservación. El
      agua indispensable para los seres vivos...</p>
      <a href="noticias/naturaleza-fuente-vida.html"class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia13">
      <img src="noticias/img-notic/excelsius-portada.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/consideraciones-seguridad-cirugia-plastica-estetica.html"><p class="fecha"> 19/12/2016</p>Consideraciones sobre Seguridad del Paciente en Cirugía Plástica y Estética</a></h4>
      <p>Aunque selectiva, la cirugía estética implica Riesgos y Posibles Efectos Secundarios. Numerosas sociedades que nuclean a los profesionales formados en la especialidad...</p>
      <a href="noticias/consideraciones-seguridad-cirugia-plastica-estetica.html" class="leer_mas">Leer más..</a>
     </article>
     
      <article id="noticia14">
      <img src="img/fotos/perez.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/guias-prevencion-cardiovascular.html"><p class="fecha"> 21/12/2016</p>Guías europeas 2016 para la prevención cardiovascular: 6ª documentos de consenso de 10 sociedades.</a></h4>
      <p>Si bien son sociedades europeas las que avalan este consenso, es importante conocer la opinión y concepto del control y manejo del riesgo cardiovascular en la población adulta...</p>
      <a href="noticias/guias-prevencion-cardiovascular.html" class="leer_mas">Leer más..</a>
     </article>
     
     <article id="noticia15">
      <img src="img/fotos/paz.jpg" alt=""> 
         <h4> <a  class="titulo_link" href="noticias/dieta.html"><p class="fecha"> 9/1/2017</p>D.I.E.T.A.</a></h4>
      <p>“No recuperar el peso perdido requiere el mismo esfuerzo y compromiso, que perderlo”. Es la afirmación que cada vez más hacemos los profesionales de la salud y se escucha de las personas que hicieron tratamiento...</p>
      <a href="noticias/dieta.html" class="leer_mas">Leer más..</a>
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
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script>
</body>
</html>