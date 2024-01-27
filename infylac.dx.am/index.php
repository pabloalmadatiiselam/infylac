<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Infylac.com</title>
    <link rel="stylesheet" href="estilos/estilo2.css" type="text/css">
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
<h3 class="titulos">¿Qué es infylac?</h3>
<p>
   Es un sitio web que contiene información didáctica sobre informática.
   Pero también es un sitio que habla de temas espirituales y sobre el gran
   mensaje de Dios a los hombres, que es la Cruz de Cristo.           
</p>
<h3 class="titulos">¿Para qué infylac?</h3>
<p>
    El propósito de infylac es hacer conocer el mensaje de la cruz de Cristo a  todos
    los visitantes de esta web por medio de un hilo de conversación o un puente que es
    la informática.
</p>
<h3 class="titulos">¿Por qué infylac?</h3>
<p>
El hombre necesita encontrarse con Dios, relacionarse y conocer su amor.
Y esto se consigue partiendo del mensaje de la cruz de Cristo a la humanidad.
Hoy la gente escapa a las cosas de Dios, por eso infylac es una ayuda para
que el hombre se acerque a su creador.
</p>
</ARTICLE>
</SECTION>
<ASIDE>
</ASIDE>
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
    La pagina de inicio &copy;. Todos los derechos reservados
    </div>
</FOOTER>
</div>
</body>
</html>