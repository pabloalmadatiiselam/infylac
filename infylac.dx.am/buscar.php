<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">           
    <title>Resultados de la búsqueda</title>
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">    
    <script language="javascript" type="text/javascript" src="verificarf.js">
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
<?php    
//incluyo libreria
require_once("libreria.php");
//mostrar errores
ini_set('display_errors', 1);
error_reporting(-1);
//instanciar objeto
$conexion1 = new conexion();
// llamar el metodo conexion y retornar obeto de conexion
$conexion2=$conexion1->conexion();
//contar palabras
$numero=$conexion1->contar_palabras($_POST["criterio"]);
$busqueda = $_POST["criterio"];      
if($numero == 1){
        //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCCION CON LIKE
        $cadbusca = "SELECT iyt_ndr, iyt_tit, iyt_des, iyt_pac, iyt_tar FROM infytemas WHERE iyt_pac LIKE '%$busqueda%' OR iyt_tit LIKE '%$busqueda%' ORDER BY iyt_tar LIMIT 50 ";

    }elseif($numero > 1){
        //SI HAY UNA FRASE SE UTILIZA EL ALGORITMO DE BUSQUEDA AVANZADO DE MATCH AGAINST.
        //busqueda de frases con mas de una palabra y un algoritmo especializado       
        $cadbusca = "SELECT iyt_ndr, iyt_tit, iyt_des, iyt_pac, iyt_tar ,MATCH (iyt_tit, iyt_pac) AGAINST ( '$busqueda' ) AS Score FROM infytemas WHERE MATCH (iyt_tit, iyt_pac) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50";
    } 
   //LLAMAR AL METODO CONSULTA
   $result= $conexion1->consulta($cadbusca,$conexion2);          
   //MOSTRAR ARTICULOS
   $conexion1->mostrar_articulos($result);                     
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
    <div id= "visitas">
        <h3 class ="titvis">Visitas</h3>
        <?php
        //incluyo al archivo
        require_once("libreria.php");
        //llamo a la función
        contador();    
        ?>
    </div> 
    <div id= "copy">   
    La pagina de resultados de la búsqueda &copy;. Todos los derechos reservados
    </div>
</FOOTER>
</div>
</BODY>
</HTML>