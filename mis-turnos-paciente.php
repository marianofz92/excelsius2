<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==0) {

    $usuario=$_SESSION['username']; 
    $enlace='panel-paciente.php';
    $privilegio=$_SESSION['privilegio'];
    $id_usuario=$_SESSION['id_usuario']; 
    
    require_once('conn/connect.php');

    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    
    $consulta2 = "SELECT * FROM turno WHERE usuario_idUsuario = $id_usuario";
    $resultado2=$connect->query($consulta2);
    $fila2= mysqli_fetch_assoc($resultado2);
    
    
} else {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']!=0) {
                
            
    
                echo 'Usted no tiene persimo para acceder a esta página.';
                exit;
                
            } else {
                 $usuario='Ingresar';
                 $enlace='login.php';
                 header('Location: http://localhost/github/excelsius2/inicie-sesion.html');
    
    
            
            }
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
        <link rel="stylesheet" href="css/mis-turnos-paciente.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!--        <link rel="stylesheet" href="sweetalert/sweetalert.css">-->
        <link rel="stylesheet" href="alertify/css/alertify.css">
        <link rel="stylesheet" href="alertify/css/themes/semantic.css">
       
        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script type="text/javascript">
        //override defaults
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "btn btn-success";
        alertify.defaults.theme.cancel = "btn btn-danger";
        </script>
       
        
        
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
</li>
</nav>     
</div>

<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>

</header>

   
  <section class="principal"> 
    <div class="sidebar" >
         <a href="panel-paciente.php"><h1><?php echo $usuario ?><img src="img/default_avatar.png" alt=""></h1></a>
         <ul>
             <li class="menu-paciente"><a href="editar-perfil-paciente.php">Editar Perfil</a></li>
             <li class="menu-paciente"><a href="profesionales.php">Solicitar Turno</a></li>
             <li class="menu-paciente"><a href="">Mis Turnos</a></li>
             <li class="menu-paciente"><a href="logout.php">Cerrar sesión</a></li>
             
         </ul>
    </div>
    
    <div id="contenido">
       <div id="titulo"><h1>Mis turnos</h1></div>
       <div class="col-md-10 table-responsive">
           <table class="table table-hover table-bordered" id="mis-turnos">
               <thead>
                   <th>Fecha</th>
                   <th>Hora</th>
                   <th>Profesional</th>
                   <th>Lugar</th>
                   <th>Estado</th>
                   <th></th>
               </thead>
               <tbody>
                  <?php do 
                        


                    { ?>
                   <tr>
                       <td><?php 
                            $date = $fila2['fecha'];
                            $fecha = explode("-", $date);
                            $anio = $fecha[0];
                            $mes = $fecha[1];
                            $dia = $fecha[2];
                     
                            echo $dia.'-'.$mes.'-'.$anio;
                           ?>
                       </td>
                       <td><?php echo $fila2['hora'] ?></td>
                       <td><?php                     
                                $id_prof = $fila2['profesional_idProfesional'];
                                $consulta3 = "SELECT nombre1, nombre2, apellido1, apellido2 FROM profesionales2 WHERE id_profesional = $id_prof";
                                $resultado3=$connect->query($consulta3);
                                $fila3= mysqli_fetch_assoc($resultado3);    
                                echo $fila3['nombre1']." ".$fila3['nombre2']." ".$fila3['apellido1']." ".$fila3['apellido2'] 
                            ?>
                       </td>
                       <td><?php echo $fila2['domicilio'] ?></td>
                          <?php
                                $c = 0;
                                if( date("Y-m-d") <= $fila2['fecha'] and $fila2['estado'] != 'cancelado')
                                 {
                                     echo '<td class = "warning"> Por atender </td>';
                                 }
                                    else { 
                                        
                                        if($fila2['estado'] == 'cancelado'){
                                            echo '<td class = "danger"> Cancelado </td>';
                                            $c = 1;
                                        }
                                            else {
                                                echo '<td class = "success"> Atendido </td>';
                                                $c = 1;
                                            }    
                                    }
                           ?>
                       <td>
                           <?php 
                                if($c == 1){
                                    echo '';
                                }
                                    else {
                                        
                                        echo '<button  type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target=".bs-example-modal-sm" onclick="
                                        
                                      alertify.confirm(\'¡Atención!\', \'¿Seguro que desea cancelar el turno?\', function(){
                                      window.location = \'cancelar-turno.php?idturno='.$fila2['id_turno'].'\';
                                      }, function(){}).set(\'labels\', {ok:\'Si\', cancel:\'No\'});
    
                                        ">Cancelar turno</button>';
                                        
                                        /*echo '<button  type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target=".bs-example-modal-sm" onclick="
                                        
                                        swal({
                                                title: \'¿Seguro que desea cancelar el turno?\',
                                                type: \'warning\',
                                                showCancelButton: true,
                                                confirmButtonColor: \'#5cb85c\',
                                                confirmButtonText: \'Si, cancelar\',
                                                cancelButtonColor: \'#d9534f\',
                                                cancelButtonText: \'No\',
                                                closeOnConfirm: \'false\',
                                                closeOnCancel: \'false\',
                                                allowOutsideClick: true,
                                                },
                                                function(isConfirm)
                                                {
                                                    if(isConfirm)
                                                    {
                                                        window.location = \'cancelar-turno.php?idturno='.$fila2['id_turno'].'\';
                                                    } 
                                                }
                                                
                                                
                                                )
    
                                        ">Cancelar turno</button>';*/
                                    }
                            ?>
                       </td>
                   </tr>
                   <?php } while ($fila2=mysqli_fetch_assoc($resultado2));?> 
               </tbody>
           </table>
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
        
    </body>
</html>
