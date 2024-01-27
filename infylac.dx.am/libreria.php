    <?php
    function contador(){ 
    $archivo = "contador_mejorado.txt"; 
    $info = array(); 
    //comprobar si existe el archivo 
    if (file_exists($archivo)){ 
    // abrir archivo de texto y introducir los datos en el array $info 
    $fp = fopen($archivo,"r"); 
    $contador = fgets($fp, 26); 
    $info = explode(" ",$contador); 
    fclose($fp); 
    // poner nombre a cada dato 
    $mes_actual = date("m"); 
    $mes_ultimo = $info[0]; 
    $visitas_mes = $info[1]; 
    $visitas_totales = $info[2]; 
    }else{ 
    // inicializar valores 
    $mes_actual = date("m"); 
    $mes_ultimo = "0"; 
    $visitas_mes = 0; 
    $visitas_totales = 0; 
    } 
    // incrementar las visitas del mes según si estamos en el mismo 
    // mes o no que el de la ultima visita, o ponerlas a cero 
    if ($mes_actual==$mes_ultimo){ 
        $visitas_mes++; 
    }else{ 
        $visitas_mes=1; 
    } 
    $visitas_totales++; 
    // reconstruir el array con los nuevos valores 
    $info[0] = $mes_actual; 
    $info[1] = $visitas_mes; 
    $info[2] = $visitas_totales;    
    
    // grabar los valores en el archivo de nuevo 
    $info_nueva = implode(" ",$info); 
    $fp = fopen($archivo,"w+"); 
    fwrite($fp, $info_nueva, 26); 
    fclose($fp);     
    //muestro los datos del contador 
    /*      
    echo "<font color='#660319'>Mes: $info[0] </font><br>";
    echo "<font color='#660319'>Visitas: $info[1] </font><br>";
    echo "<font color='#660319'>Total visitas: $info[2] </font><br>";  
    */ 
     echo "Mes: " . $info[0] . " Cantidad: " . $info[1] . " Total: " . $info[2];
    }

    function inicializar_vector(){
     $vector[1][1]=69;$vector[1][2]=28;
     $vector[2][1]=59;$vector[2][2]=59;
     $vector[4][1]=103;$vector[4][2]=60;
     $vector;
    }

    class conexion {
           private $servidor="fdb16.awardspace.net";private $usuario="2347289_infylac";
            private $clave="22922965j";private $bd="2347289_infylac";            
            //funcion  conexion
            public function conexion(){
                $conexion2= new mysqli($this->servidor,$this->usuario,$this->clave,$this->bd);
                if($conexion2->errno>0)
                    die ("Imposible conectar base de datos[". $conexion2->error . "]");
                   else return $conexion2; 
            }
            public function consulta($ssql,$conexion2){
                 //para que funcione los acentos y la ñ
                $conexion2->query("SET NAMES 'utf8'");
                //ejecutar consulta y retorna objeto $mysqli_result
                return $conexion2->query($ssql);
            }
            public function mostrar_items($result,$item){
                while($row=$result->fetch_object()){
                $array_palabras = explode(".",$row->iyt_des);   
                /*echo "<p>".$row->iyt_ndr . "-";*/
                echo "<p><a href='mostrar-desarrollo.php?referencia=$row->iyt_ndr & referencia2=$item'>$row->iyt_tit</a><br><font class='descripcion'>$array_palabras[0]...</font>";                
                }
            }
            public function mostrar_cabecera($obj){
             echo '<h3 class=titulos>Titulo:'. $obj->iyt_tit. '</h3> Autor:' .$obj->iyt_aut. '<br>Fecha:' .$obj->iyt_fec. '<p>' . '<h3 class= titulos>Descripcion</h3>' . $obj->iyt_des . '</p>';
            }
            public function mostrar_comentarios($resultado4){
                while($row = $resultado4->fetch_object()){
                echo "<p><b>". $row->com_nom. "</b>";   
                echo "<br>" . $row->com_fec;
                echo "<br>". $row->com_tem;
                echo "<br>" . $row->com_des;  
                }          
             }
            public function contar_palabras($palabra){
                if($palabra<>""){
                //cuenta el numero de palabras
                $trozos = explode(" ",$palabra);
                $numero = count($trozos);                
                return $numero;
                }
            }
                public function mostrar_articulos($result){
                //MOSTRAR SUBTITULOS y articulos
                 $aux=0;
                $tipart = array("Temas", "Linux", "Diseño adaptado", "Programación");
                while($row = $result->fetch_object()){
                //mostramos los articulos de los articulos o lo que deseamos...
                $refer = $row->iyt_ndr;
                $titulo = $row->iyt_tit;
                $articulo=$row->iyt_tar;
                if($aux != $articulo){                    
                    echo "<h3 class='titulos'>" . $tipart[$articulo-1] . "</h3>";
                    $aux = $articulo;
                }
                $desarrollo = $row->iyt_des;
                $array_palabras = explode(".",$desarrollo);                
                echo $refer . "-";
                echo "<a href='mostrar-desarrollo.php?referencia=".$refer."'>".$titulo."</a><br><font class='descripcion'>".$array_palabras[0]."...</font><p>";
            } 
            }
        }
?>