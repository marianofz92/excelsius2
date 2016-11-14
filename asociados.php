
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
        <title>Excelsius Salud</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/asociados.css">
        <link rel="stylesheet" href="css/modal-asociados.css">
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

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario ?><img src="img/user.png" alt=""></a></li>
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
        
       <main>
           <section id="asociados">
              <h1>Marcas asociadas</h1>
              <div id="contenedor-asociados">
               <div id="rondia" class="asociados-">
                   <a href="rondia-laboratorio.php"><article><img src="img/rondia.JPG" alt="" class="boton-modal"></article></a>
                   <!-- <article><img src="img/rondia.JPG" alt="" class="boton-modal"></article> -->
                   <div class="descripcion-asociado">
                      <p class="titulo-asociado"> RONDIA LABORATORIO BIOQUIMICO. <br></p>
                       San Juan  570. TEL 381-450 4515 - S.M. DE TUCUMÁN. <br>
                       E-mail:rondialab@yahoo.com.ar <br>
                   </div>  
               </div>
             
                <div id="osdepym" class="asociados-">
                   <article><a href="osdepym.php"><img src="img/osdepym.jpg" alt=""></a></article>
                   <div class="descripcion-asociado">
                      <p class="titulo-asociado"> OSDEPYM OBRA SOCIAL. <br></p>
                       Córdoba 1001 - S.M. DE TUCUMÁN.<br>
                    Web: <a href="http://www.osdepym.com.ar/index.html" target="_blank"> www.osdepym.com.ar </a><br>
                   </div> 
               </div>
               
                <div id="cecilia-luna" class="asociados-">
                   <article><a href="cecilia-luna.php"><img src="img/Consultora.jpg" alt=""></a></article>
                   <div class="descripcion-asociado">
                      <p class="titulo-asociado"> CECILIA LUNA TECNICA EN RRHH. <br></p>
                       Monteagudo 857 4° C. <br>
                       TEL: (381)4225733 - (381)154401774.<br>
                       E-mail: lunamc1106@gmail.com <br>
                   </div> 
               </div>

               </div>
           </section>
       </main>
       
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('.boton-modal').on('click', function(){
            $('.contenedor-modal').addClass('mostrar-modal');                   
        })  
        $('.cerrar-modal').on('click', function(){
            $('.contenedor-modal').removeClass('mostrar-modal');                   
        })    
    </script>
</html>