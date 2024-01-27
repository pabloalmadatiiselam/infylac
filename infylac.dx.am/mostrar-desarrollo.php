<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>   
    <title>Mostrar desarrollo</title>
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">
    <script language="javascript" type="text/css" src="verificarf.js">
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

        //llamo a funcion inicializar_vector
        $vector=inicializar_vector();

        //creo una instancia
        $conexion1 = new conexion();

        //Creo una conexion
        $conexion2 = $conexion1->conexion();

        //Secuencia sql para las cabeceras
         $ssql= "Select * from infytemas where iyt_ndr=" . $_GET['referencia']; 

         //ejecuto consulta        
         $resultado = $conexion1->consulta($ssql,$conexion2);

         //Verifico consulta
         if ($resultado->num_rows == 0)
         {
            echo "No se encontro el desarrollo de este articulo";
            exit();
         }
         //obtengo resultados
         $obj= $resultado->fetch_object(); 

         //muestro titulos de la cabecea
         $conexion1->mostrar_cabecera($obj);

         //Sentencia sql para los items
         $ssql2= "Select * from items where ite_ndr=$obj->iyt_ndr order by ite_nro";

         //Ejecuto consulta para items
         $resultado2= $conexion1->consulta($ssql2,$conexion2);
         
         //Muestro resultados items e imagenes
         while($row = $resultado2->fetch_object()){
         echo '<h3 class=titulos>' . $row->ite_tit . '</h3>' . nl2br($row->ite_con);
         $ssql3= "select * from imagenes where img_nit=" . $row->ite_nro;
         $resultado3=$conexion1->consulta($ssql3,$conexion2);
         while($row2=$resultado3->fetch_object())
         {            
         ?>
         <p class="imagen">
         <img src="imagenes/<?php echo $row2->img_nom;?>" width= "<?php $vector[$_GET['referencia2']][1];?>" height="<?php $vector[$_GET['referencia2']][2];?>">
         </p>
        <?php
        }
        }
        
        //ingresar comentarios           
        echo "<p><a href='comentario.php?referencia=$_GET[referencia]'>Ingresar comentario</a>";
        //Titulo de Mostrar comentarios
        echo "<h3 class='titulos'>"."Comentarios"."</h3>";
        //sentencia sql para mostrar comentarios
        $ssql4= "Select com_nom,com_fec,com_tem,com_des from comentarios where com_nua =" . $_GET['referencia'];
        //Ejecutar consulta para comentarios
        $resultado4 = $conexion1->consulta($ssql4,$conexion2);
        //verificar consulta
        if($resultado4->num_rows == 0)
            echo("No hay comentarios para este artículo.");
        else
            //Mostrar comentarios
            $conexion1->mostrar_comentarios($resultado4);
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
    La pagina de mostrar desarrollo &copy;. Todos los derechos reservados
    </div>    
</FOOTER>
</div>
</BODY>
</HTML>