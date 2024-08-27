<?php
require('tfpdf.php');
$nome= $_POST["Nome"];
$email= $_POST["Email"];
$ex1=$_POST["exercicio1"];
$dura1=$_POST["duracao"];
$repet=$_POST["repeticao"];
$validade=$_POST["validade"];
$iduser=$_POST["id"];
class PDF extends TFPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Sua Ficha',1,0,'C');
    // Line break
    $this->Ln(40);
}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$date = new DateTime($validade);
$validade = $date->format('d-m-y');
//CRIA O PDF// 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);
$txtnome = "Nome: ".$nome;
$txtemail = "Email: ".$email;
$txtExercicio1="Exercicio 1: ".$ex1;
$txtduracao="Duração do exercicio: ".$dura1." minutos";
$txtrepeticao="Repetições: ".$repet;
$txtvalidade="validade: ".$validade;
$pdf->Cell(40,10,$txtnome,0,1);
$pdf->Cell(50,10,$txtemail,0,1);
$pdf->Cell(40,10,$txtExercicio1,0,1);
$pdf->Cell(40,10,$txtduracao,0,1);
$pdf->Cell(40,10,$txtrepeticao,0,1);
$pdf->Cell(40,10,$txtvalidade,0,1);
$filename="/xampp/htdocs/fpdf/Ficha".$iduser.".pdf";
$pdf->Output($filename,'F');

?>