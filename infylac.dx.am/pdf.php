<?php
//incluir libreria fpdf
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
 function Header() 
 {
   global $marca;  
   if($marca==2)
   {
  //logo
  $this->Image("imagenes/logo.png",10,8,25,10,"png");
  //Arial bold 15
  $this->SetFont('Courier','B',10);
  //Movernos a la derecha
  $this->Cell(150);
  //titulo
  switch($_GET['referencia'])
   {
    case 1:        
        $this->Cell(27,4,'Temas',0,1,'R');
        break;
    case 2:
        $this->Cell(27,4,'Linux',0,1,'R');
        break;
    case 3:
        $this->Cell(27,4,'Desarrollo Adaptado',0,1,'R');        
        break;
    case 4:
        $this->Cell(27,4,'POO',0,1,'R');
        break;
  }
  //$this->cell(27,4,'TEMAS',0,1,'R');
  //salto de línea
  $this->ln(20);
  }
 }
 
 //Pie de página
 function Footer()
 {
   global $marca2;   
   if($marca2==2)
   {
   //Posición: a 1,5 cm del final
   $this->SetY(-15);
   //Arial Italic 8
   $this->SetFont('Courier','I',8);
   //Número de página
   $np = $this->PageNo()-1;
   $this->Cell(0,10,'Page'.$np,0,0,'C');
   }
 }

function Caratula($car)
{ 
 $this->SetY(80);
 //Arial 48
 $this->SetFont('Helvetica',"B",48); 
 //caratula 
 switch($car)
 {
    case 1:        
        $this->Cell(0,10,'Temas',0,1,'C');
        break;
    case 2:
        $this->Cell(0,10,'Linux',0,1,'C');
        break;
    case 3:
        $this->Cell(0,10,'Desarrollo Adaptado',0,1,'C');
        break;
    case 4:
        $this->Cell(0,10,'POO',0,1,'C');
        break;
  }
    $this->SetFont('Helvetica',"B",14);
    $this->ln(2);
    $this->Cell(0,4,'www.infylac.com',0,1,'C');
}

function Titulo_articulo($tia,$aut,$fea)
{
    $this->Sety(20);
    //Arial 12
    $this->SetFont('Helvetica','B',12);
    //Color de fondo
    $this->SetFillColor(200,220,255);
    //titulo    
    $this->Cell(95,6,$tia,0,1,'L',true);
    //autores
    $this->Cell(80,6,'Autores: '.$aut,0,0,'L',false);
    //Salto de linea
    $this->ln(6);
    //fecha
    $this->Cell(50,6,'Fecha: '.$fea,0,1,'L');
    //Salto de linea
    $this->ln(1);
}

function Descripicion_articulo($dea)
{
  //Arial 12 italica
  $this->SetFont('Courier','I',12);
  //descripcion
 // $this->Cell(0,5,$dea,0,1,'L');
    $this->Write(5,$dea); 
  //salto de linea
  $this->ln(7);
}

function Titulo_item($tit)
{
    //arial 12
    $this->SetFont('Helvetica','B',12);
    //titulo
    //$this->Cell(70,5,$tit,0,1,'L');
   // $this->Write(5,$tit);
   $this->MultiCell(190,5,$tit,0,'L');
    //Salto de línea
    $this->ln(2);
}

function Cuerpo_item($cit)
{
    //fuente arial 12
    $this->SetFont('Helvetica',"",12);
    //contenido
   //$this->Cell(0,5,$cit,0,1,'L');
     //$this->Write(5,$cit);
     $this->MultiCell(0,5,$cit,0,'J');
    //salto de linea
    $this->ln(2);
}

function Imagenes_item($ini,$conexion1)
{
    $vector[1][1]=69;
    $vector[1][2]=28;
    $vector[2][1]=59;
    $vector[2][2]=59;
    $vector[4][1]=103;
    $vector[4][2]=60;
    $ssql3 = "select img_nom from imagenes where img_nit = $ini order by img_nro";
    $result3= $conexion1->query($ssql3)or die("Se ha producido un error en la ejecución de la consulta". mysql_error());
    while($row3 = $result3->fetch_object())
     {      
      $this->cell($vector[$_GET['referencia']][1],$vector[$_GET['referencia']][2],$this->Image('imagenes/'. $row3->img_nom,$this->GetX(),$this->GetY(),$vector[$_GET['referencia']][1],$vector[$_GET['referencia']][2],'PNG'),0,1);     
      $this->Ln(2);
    }
 }

}

//Creo un objeto PDF

$marca=1;
$marca2=1;
$pdf = new PDF('P','mm','A4');
//Consultar errores
ini_set('display_errors', 1);
error_reporting(E_ALL);
//definir constantes de conexion
define ("usuario","2347289_infylac"); define ("clave","22922965j");
define ("servidor","fdb16.awardspace.net"); define ("bd","2347289_infylac");
//creo una instancia
$conexion1 = new mysqli(servidor,usuario,clave,bd);
if($conexion1->connect_errno > 0)
die ("Imposible conectarse con la bd[" . $mysqli->connect_error . "]");
//para que funcione los acentos y la ñ
$conexion1->query("SET NAMES 'utf-8'"); 
//sumar una página
$pdf->AddPage();
//caratula
$pdf->Caratula($_GET['referencia']);
//Consulta en B.D.
$marca=2;
$ssql = "Select iyt_ndr,iyt_tit,iyt_aut,iyt_fec,iyt_des from infytemas where iyt_tar =  $_GET[referencia] order by iyt_ndr";
$result = $conexion1->query($ssql) or die("Se ha producido un error en la ejecución de la consulta". mysql_error());
while($row=$result->fetch_object())
{   
   $pdf->AddPage();
   $pdf->Titulo_articulo($row->iyt_tit,$row->iyt_aut,$row->iyt_fec);
   $pdf->Descripicion_articulo($row->iyt_des);   
   $ssql2 = "Select ite_tit,ite_con,ite_nro from items where ite_ndr = $row->iyt_ndr order by ite_nro";   
   $result2 = $conexion1->query($ssql2) or die("Se ha producido un error en la ejecución de la consulta". mysql_error());
   while($row2 = $result2->fetch_object())
          {
            $pdf->Titulo_item($row2->ite_tit);
            $pdf->Cuerpo_item($row2->ite_con);            
            $pdf->Imagenes_item($row2->ite_nro,$conexion1);          
            $marca2=2;            
          }     
}
$pdf->Output('TEMAS','I');
?>    