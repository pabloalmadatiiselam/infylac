<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Infylac.com</title>
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">
    <script language="javascript" type="text/javascript" src="verificarf.js">
    </script>
    <style>
        table{
            background:  background: -webkit-radial-gradient(#ffffff, #b3b3b3);
            background: -moz-radial-gradient(#ffffff, #b3b3b3);
            background: -o-radial-gradient(#ffffff, #b3b3b3);
            border:3px solid #660319;
            color:#660319;
            border-radius: 5px;
            margin: auto;
            margin-top: 17px;
            margin-bottom: 17px;
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
        .titulos{
          text-align: center;
        }
        /*
        SECTION{
          float: none;
          width: 800px;
          margin-bottom: 7px;
        } 
        */       
    </style>
    <script language="javascript">
       function verificar_datos(){
        if(document.femail.nombre.value.length ==0) {
            alert("complete su nombre");
            return false;
        }
        if(document.femail.email.value.length ==0) {    
            alert("complete su correo");
            return false;
        }
        if(document.femail.confirmacion.value.length ==0){
            alert("complete confirmacion de correo");
            return false; 
        }
        if(document.femail.comentario.value.length ==0){
            alert("complete su comentario");
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
<h3 class="titulos">Envia tu consulta</h3>
<?php
if(!$_POST)
{
?>
<form name="femail" action="mail.php" method="post" onSubmit="return verificar_datos()">
<table>   
<tr>
<td> Nombre:</td>   
<td><input type="text" name="nombre"</td>
</tr>
<tr>
<td>Correo:</td>
<td><input type="text" name="email" </td>
</tr>
<tr>
<td>Confirmación:</td>
<td><input type="text" name="confirmacion"</td>
</tr>  
<tr>
<td>Consulta:</td>
<td><textarea name="comentario"></textarea></td>
</tr>
<tr>
<td><input type="reset" value="Restablecer"></td>
<td><input type="submit" value="Enviar"></td>
</tr>
</table>    
</form>
<?php
}else {
  //verico si esta bien escrito los 2 correos
  if($_POST["email"]!=$_POST["confirmacion"])
    echo "Error:Los correos no coinciden";
  else{
  //estoy recibiendo el formulario compongo el cuerpo
  $cuerpo = "Formulario enviado\n";
  $cuerpo .= "Nombre: " . $_POST["nombre"] . "\n";
  $cuerpo .= "Email:" . $_POST["email"] . "\n";
  $cuerpo .= "Comentarios: " . $_POST["comentario"] . "\n";   
  //la variable $_POST[email]no va con la comilla doble o sea $_POST["email"] ya que cerraria la cadena
  //com la primer comilla doble antes de email, tampoco va comilla simples como $_POST['email']
  //Puede ir comillas simples parecidas como cuando usamos la Sentencia Insert o Update de Sql
  // o sea de esta manera '$_POST[email]'.
  //Esta mal hacer esto  '$_POST['email']'. Esto ultimo es incorrecto
  // Otra forma correcta y mas simple es como dejo en el codigo solo colocar
  //$_POST[email] sin ninguna comillas simples y dobles . Esto lo aprendi en el
  //capitulo de cadenas del manual de php. Directamente se coloca la varialbes o sea $_POST[email]
  //dentro de la cadena y nada más. El navegador entiende que tiene que ir el contenido de la 
  //variable $_POST[email] y no la palabra literal $_POST[email].  
  
  //mando el correo...
  if(mail("infylac@gmail.com","Comentario",$cuerpo)){
    //doy gracias por el envio
  echo "Gracias por rellenar el formulario. Se ha enviado correctamente.";
  }else{
    echo "Falla al enviar el mensaje";
  }
  }
}
?>
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
    La pagina de contacto &copy;. Todos los derechos reservados
    </div>
</FOOTER>
</div>
</body>
</html>