<?php
session_start();

require_once('conn/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) { // es medico por lo tanto tiene asociada una cuenta y x ahi puedo sacar el id del medico.

    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
   $id_usuario= $_SESSION['id_usuario'];
    $consulta ="SELECT * FROM profesionales2 WHERE usuario_idUsuario=$id_usuario";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    $id_profesional_session=$fila['id_profesional'];
    $_SESSION['id_profesional'] = $id_profesional_session;
    $fila3 = $_SESSION['fila2'];
    
    $consulta2 = "SELECT * FROM profesional_domicilio INNER JOIN domicilio ON domicilio_idDomicilio=id_domicilio AND profesional_idProfesional=$id_profesional_session";
    $resultado2=$connect->query($consulta2);
    $fila2= mysqli_fetch_assoc($resultado2);
//  $domicilios=$fila2['calle'];
    
} else {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']!=1) {
                
            
    
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
        <link rel="stylesheet" href="css/configurar-turno.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       
      
        
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

<li id="item-ingresar"><a href="<?php echo $enlace ?>"><?php echo $usuario?><img src="img/user.png" alt=""></a></li>
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
         <a href="panel-profesional.php" id="sidebar-usuario"><h1><?php echo $usuario ?><img src="<?php 
                if(isset($fila3['img'])){
                    $foto = $fila3['img'];
                    echo 'data:image/jpg;base64,'.base64_encode($foto);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""></h1></a>
         <ul>
             <li class="menu-paciente"><a href="editar-perfil-profesional.php">Editar Perfil</a></li>
             <li class="menu-paciente"><a href="">Nuevo Turno</a></li>
             <li class="menu-paciente"><a href="">Configuración de turnos</a></li>
             <li class="menu-paciente"><a href="">Ver Turnos</a></li>
             <li class="menu-paciente"><a href="">Modificar Turno</a></li>
             <li class="menu-paciente"><a href="">Eliminar Turno</a></li>
             <li class="menu-paciente"><a href="logout.php">Cerrar sesión</a></li>
             
         </ul>
    </div>
    
    <div id="contenido">
       <div id="titulo"><h1>Configuración de turnos</h1></div>
      
      <div class="container-fluid col-md-12 col-sm-12" id="seleccionar-datos"> 
       <div class="container col-md-3" id="dias-turnos">
        <h4>Seleccione los días</h4>
         <table>
         <tbody>
          <tr>
              <td><div class="checkbox">
                        <input id="checkbox1" type="checkbox" name="orderbox[]" value="Lunes" class="checkbox-success">
                        <label for="checkbox1">
                           Lun
                        </label>
            </div></td>
              <td><div class="checkbox">
                        <input id="checkbox2" type="checkbox" name="orderbox[]" value="Martes">
                        <label for="checkbox2">
                           Mar
                        </label>
            </div></td>
              <td><div class="checkbox">
                        <input id="checkbox3" type="checkbox" name="orderbox[]" value="Miercoles">
                        <label for="checkbox3">
                           Mie
                        </label>
            </div></td>
          </tr>

          <tr>
            <td><div class="checkbox">
                        <input id="checkbox4" type="checkbox" name="orderbox[]" value="Jueves">
                        <label for="checkbox4">
                           Jue
                        </label>
            </div></td>
            <td><div class="checkbox">
                        <input id="checkbox5" type="checkbox" name="orderbox[]" value="Viernes">
                        <label for="checkbox5">
                           Vie
                        </label>
            </div></td>
            <td><div class="checkbox">
                        <input id="checkbox6" type="checkbox" name="orderbox[]" value="Sabado">
                        <label for="checkbox6">
                           Sab
                        </label>
            </div></td> 
          </tr>
          
          <tr>
              <td><div class="checkbox">
                        <input id="checkbox7" type="checkbox" name="orderbox[]" value="Domingo">
                        <label for="checkbox7">
                           Dom
                        </label>
            </div></td>
          </tr>
          </tbody>
           </table>
       </div>
       
       <div class="container col-md-3" id="intervalos">
        <h4>Seleccione un intervalo</h4>
         <table>
         <tbody>
          <tr>
              <td><div class="form-desde">
                      <label for="desde">Desde</label>
                      <select class="form-control" id="desde">
                        <option>00:00</option>
                        <option>01:00</option>
                        <option>02:00</option>
                        <option>03:00</option>
                        <option>04:00</option>
                        <option>05:00</option>
                        <option>06:00</option>
                        <option>07:00</option>
                        <option>08:00</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>
                      </select>
                    </div>
              </td>
                    
                    
               <td><div class="form-hasta">
                      <label for="hasta">Hasta</label>
                      <select class="form-control" id="hasta">
                        <option>01:00</option>
                        <option>02:00</option>
                        <option>03:00</option>
                        <option>04:00</option>
                        <option>05:00</option>
                        <option>06:00</option>
                        <option>07:00</option>
                        <option>08:00</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>
                        <option>24:00</option>
                      </select>
                    </div>
              </td>
          </tr>
          </tbody>
           </table>
       </div>
       
       <div class="container col-md-4" id="direcciones">
        <h4>Seleccione un domicilio</h4>
         <table>
         <tbody>
          <tr>
              <td><div class="form-direccion">
                      <select class="form-control" id="direccion">
                       <?php do {?> 
                       <option value="<?php echo $fila2['id_domicilio'] ?>" ><?php echo $fila2['calle']." ".$fila2['numero']." - piso: ".$fila2['piso']." - depto: ".$fila2['dpto']." -  ".$fila2['localidad'].", ".$fila2['provincia'] ?></option>
                       
                        <?php } while ($fila2=mysqli_fetch_assoc($resultado2));?>
                        
                          
                                    
                      </select>
                    </div>
              </td>
          </tr>
              </tbody>
               </table>
           </div>
    <button  onclick="mostrarTabla(); agregar();"  type="button" class="btn btn-primary">Agregar</button>

 </div> 
      
        
      <div id="turnos" class="turnos-disponibles col-md-11">
       <form action="guardar-config-turnos.php" method="POST" id="enviar-turnos" >
        <table  class="table table-bordered table-hover" id="turnos-config">
           <thead>
               <th>Día</th>
               <th>Horario</th>
               <th>Dirección</th>
               <th></th>
           </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
        <script src="tabla-configuracion-turnos.js"></script>
        </form>
      </div>
      <button id="guardar" class="btn btn-primary" >Guardar configuración</button>
      
      
     <div id='response' class="col-md-10">
      
     </div>
     
      <script>
          
        $(function () {
            $("#guardar").click(function () 
            {
                 var campo1='', campo2='', campo3='';
                 var fila = '';
                 var n = 0;
                 var m =0;
                 var filas = ''; 
                 var id = '';
                 var ids = '';
                
                $("#turnos-config tbody tr").each(function (index) 
                {
                    n = index;
                    $(this).children("td").each(function (index2) 
                    {
                        m = index2; 
                        switch (index2) 
                        {
                            case 0: campo1 = $(this).text();
                                    break;
                            case 1: campo2 = $(this).text();
                                    break;
                            case 2: campo3 = $(this).text();
                                    break;  
                        }
                     fila = campo1 + ' - ' + campo2 + ' -- ' + campo3;
                     
                    })
                      
                    //if(campo2)
                    
                    filas = (filas + ' / ' + fila); 
                    
                   
                })
                $('input[name="oculto[]"]').each(function() {
                        id += $(this).val() + ",";
                        ids = id.substring(0, id.length-1);
                        });
                
                alert(filas);
                alert(ids);
                
                $.ajax({
                                    type: 'get', 
                                    url: 'guardar-config-turnos.php?filas='+filas+'&ids='+ids, //mandar los id de los domicilios seleccionados en orden
                                    success: function(data){
                                        $("#response") .html(data)
                                    },
                                    error: function(data){
                                    $("#response") .html(data) 
                                    }
                        })
            })
        })

        
      </script>

     
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
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>