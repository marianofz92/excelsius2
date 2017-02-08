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
        <link rel="stylesheet" href="css/servicios_index.css">
        <link rel="stylesheet" href="css/consulta-orientacion.css">
        <link rel="stylesheet" href="css/estilo_nosotros.css">
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
        
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script>
        
</body>
</html>