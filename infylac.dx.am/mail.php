<!DOCTYPE HTML>
<HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">    
    <title>Mandanos tus comentarios</title>
    <style>
        table{
            background:  background: -webkit-radial-gradient(#ffffff, #b3b3b3);
            background: -moz-radial-gradient(#ffffff, #b3b3b3);
            background: -o-radial-gradient(#ffffff, #b3b3b3);
            border:3px solid #660319;
            color:#660319;
            border-radius: 5px;
            margin: auto;
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
          float: none;
          width: 800px;
          margin-bottom: 7px;
        }

        FOOTER{
          clear: none; 
          text-align: center;
        }
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
<HEADER>
  <a href="index.php"><img src="imagenes/logo.png" width=240px height=90px></a>
</HEADER>
<SECTION>
<?php
if(!$_POST)
{
?>
<form name="femail" action="mail.php" method="post" onSubmit="return verificar_datos()">
<table>   
<tr>
<td> Nombre:</td>   
<td><input type="text" name="nombre" size=16></td>
</tr>
<tr><td>Correo:</td>
<td><input type="text" name="email" size=16></td>
</tr>
<tr>
<td>Confirmación:</td>
<td><input type="text" name="confirmacion" size=16>  </td>
</tr>  
<tr>
<td>Comentarios:</td>
<td><textarea name="comentario" cols=32 rows=6></textarea></td>
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
</SECTION>
<FOOTER>
    La pagina de mail&copy;. Todos los derechos reservados.
</FOOTER>
</BODY>
</HTML>