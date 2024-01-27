<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">
        <style>
        table{
            background:  background: -webkit-radial-gradient(#ffffff, #b3b3b3);
            background: -moz-radial-gradient(#ffffff, #b3b3b3);
            background: -o-radial-gradient(#ffffff, #b3b3b3);
            border:3px solid #660319;
            color:#660319;
            border-radius: 5px;
            margin:auto;
            }
        td{
            border:1px solid #660319;
            border-radius: 5px;
            text-align: left;
        }
        input{
            border:1px solid #660319;
            border-radius: 5px;
        }
        textarea{
            border:1px solid #660319;
            border-radius: 5px;
        }
        
        SECTION{          
          margin-bottom: 23px;          
        }
        .titulos{
          text-align: center;
        }
        
    </style>
    <script language="javascript">
        function verificar_blanco(){        
           if(document.comentario.nombre.value.length == 0) {
            alert("Ingrese su nombre");
            document.comentario.focus();
            return false;        
           }
           if(document.comentario.email.value.length == 0) {
            alert("Ingrese su email");
            document.comentario.focus();
            return false;           
           }
            if(document.comentario.asunto.value.length == 0) {
            alert("Ingrese el asunto");
            document.comentario.focus();
            return false;           
           }
           if(document.comentario.comentario.value.length == 0) {
            alert("Ingrese su comentario");
            document.comentario.focus();
            return false;           
           }
         return true;
        }
    </script>     
</HEAD>
<BODY>
<div id="contenedor">   
<HEADER>
<div id = "cabecera"> 
    <div id="logo">
        <img src="imagenes/logo.png" width=240px height=90px >        
    </div>
    <div id="busblo">
        <div id="blog">
            <!--<h3 class="titlat">Blog</h3>-->
            <a href="wordpress">Infylacblog</a>
        </div>
        <div id="buscador">        
        <FORM name="fbuscador" method="post" action="buscar.php" onsubmit="return verificar_blanco()">
            <div id="campotexto"><input type ="text" name="criterio" class="campob"></div>
            <div id="botonbuscar"><input class="botonb" type="submit" value="Buscar" class="botonb"></div>
        </FORM>
        </div>                  
    </div>
</div>
<div id = "cabcel">
    <div id= "logblocel">
       <div id="logocel">
        <img src="imagenes/logo.png" width=240px height=90px >        
        </div>
        <div id="blogcel">
            <a href="wordpress">Infylacblog</a>
        </div> 
    </div>
    <div id="buscadorcel">        
        <FORM name="fbuscadorcel" method="post" action="buscar.php" onsubmit="return verificar_blanco()">
            <div id="campotextocel"><input type ="text" name="criterio" class="campobcel"></div>
            <div id="botonbuscarcel"><input type="submit" value="Buscar" class="botonbcel"></div>
        </FORM>
    </div> 
<div>
<script type ="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type ="text/javascript" src="js/jquery.lazyload.min.js"></script>
<script type = "text/javascript" src = "menu.js"></script>  
</HEADER>
<div id="menubar"> 
        <div id="menutext">Menu </div>         
        <!--<div id ="bt-menu"><a href="#"><span class="icon-menu"</span></a></div>-->
        <div id ="bt-menu"><img src ="imagenes/bt-menu.png" width="27" height="20"></div>
</div>
<NAV id = "menu">
<ul>   
<li><a class="enlacenav" href="index.php">INICIO</a></li>
<li><a class="enlacenav" href="linux.php">LINUX</a></li>
<li><a class="enlacenav" href="desarrollo-adaptado.php">DISEÑO</a></li>
<li><a class="enlacenav" href="programacion.php">PROGRAMACION</a></li>
<li><a class="enlacenav" href="mensaje.php">MENSAJE</a></li>
<li><a class="enlacenav" href="temas.php">TEMAS</a></li>
<li><a class ="enlacenav" href ="contacto.php">CONTACTO</a></li>
<li><a class ="enlacenav" href ="autor.php">AUTOR</a></li>
</ul>
</NAV>
<SECTION>
<ARTICLE>
<h3 class="titulos">Comentarios</h3>  
<?php
//mostrar errores de php en pantalla
error_reporting(E_ALL);
ini_set('display_errors', '1');
//si no pasan las variables entonces vuelvo a mostrar el formulario
if(!$_POST)
{
?>    
<form name="comentario" method="post" action="comentario.php" onSubmit="return verificar_blanco()">
  <table>
  <tr>
    <td>Numero de articulo:</td>
    <td><input type="text" name="articulo" value = "<?php echo $_GET['referencia']; ?>"></td>
  </tr>  
  <tr>
    <td>Nombre:</td>
    <td><input type="text" name="nombre"></td>
  </tr>
  <tr>
    <td> Email:</td>
    <td><input type="text" name="email"></td>
  </tr>
 <tr>
    <td>Asunto:</td>
    <td><input type="text" name="asunto"></td></tr>
 <tr>
    <td>Comentario:</td>
    <td><textarea name="comentario"></textarea></td>
 </tr>
 <tr>
    <td><input type="reset" value="Cancelar"</td>
    <td><input type="submit" value="Guardar"</td>
 </tr>   
 </table>  
</form>
<?php
}
else
{
//los datos pasaron bien a la otra pagina , en este caso es misma pagina //autollamada    
//incluyo al archivo
require_once("libreria.php");
//Crear una clase conexion
$conexion1= new conexion();
//llamar a funcion conexion
$conexion2= $conexion1->conexion();
//obtener fecha actual
$fecha_actual = date('Y-m-d');
//sentencia sql insertar comentario
$ssql="INSERT INTO comentarios(com_fec,com_des,com_ema,com_nom,com_tem,com_nua)VALUES('$fecha_actual','$_POST[comentario]','$_POST[email]','$_POST[nombre]','$_POST[asunto]',$_POST[articulo])";
//ejecutar consulta comentarios
$conexion1->consulta($ssql,$conexion2);
//mensaje se guardo bien los datos.
echo ("El comentario se guardó correctamente");
//cerrar conexion
$conexion2->close();
}
?>
</ARTICLE>
</SECTION>
<FOOTER>
    <div id= "contactos">
        <ul>
            <h3 class = "titcon">Contactos</h3>
            <li>Dirección: Mendoza 1680 Posadas Misiones Argentina</li>
            <li>Telefono: 11-03764360178</li>
            <li>Email: pabloj94g@gmail.com</li>            
        </ul>        
    </div>
    <div id = "visitas">
        <h3 class ="titvis">Visitas</h3>        
        <?php
        //incluyo al archivo
        require_once("libreria.php");
        //llamo a la función
        contador();
        ?>
    </div> 
    <div id= "copy">   
    La pagina de inicio &copy;. Todos los derechos reservados
    </div>  
</FOOTER>
</div>
</BODY>
</HTML>