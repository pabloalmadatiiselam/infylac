<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <title>Inicio</title>
    <link rel="stylesheet" media="screen" href="estilos/estilo.css" type="text/css">
    <script language="javascript" type="text/css" src="verificarf.js">             
    </script>
    <style>
    .imagen{
        text-align: center;
    } 
    </style>
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
        <h3 class="titulos" align="center">Mensaje de salvación</h3>
        <p>
           1- En el principio Dios creo al hombre a su imagen. El hombre
           vivia en comunión con Dios. Había una relación íntima entre ambos.
           Génesis 1:27.
        </p>
        <p class="imagen">
         <img src="imagenes/armonia.png">
        </p>   
        <p>
            2- Luego el hombre desobedece a Dios y la relación con Dios se rompe
            a causa del pecado, y el hombre se aleja del creador. Génesis 3.
        </p>
        <p class="imagen">
        <img src="imagenes/desarmonia.png">
        </p>    
        <p>
        3- Dios por su amor establece un plan para restaurar la relación.
        Envía a su hijo Jesucristo para morir en la cruz por nuestros pecados  y acercarnos
        nuevamente a el. Romanos 5:8.
        </p>
        <p class="imagen">
        <img src="imagenes/plansalvacion.png">
        </p>    
        <p>
        4- Si creemos en Cristo y en su sacrificio en la cruz somos salvados
        de vivir eternamente alejado de Dios y heredamos la vida eterna. Juan 3:16.
        </p>
        <p class="imagen">
        <img src="imagenes/creerencristo.png">
        </p>
        <p>
        5- Si no quieres pasar la eternidad lejos de Dios, toma hoy la decisión de recibir
         en tu vida a Cristo como único Salvador diciendo esta oración.   
        </p>
        <p>
        <br>Dios me arrepiento de mis maldades,
        <br>perdona todos mis pecados.
        <br>Recibo a Cristo en mi vida
        <br>como único Salvador y Señor.
        <br>Ayúdame desde ahora y en adelante a vivir
        <br>en santidad y en obediencia a ti.
        <br>Amén.
        </p>
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
    La página de mensaje &copy;. Todos los derechos reservados
    </div>
</FOOTER>
</div>
</BODY>
</HTML>