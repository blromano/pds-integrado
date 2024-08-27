<?php
require('fpdf.php');



$USU_CODIGO =$id;


include './classes/DAO/usuariosDAO.php';
$obj_usu_dao = new usuariosDAO;
$resultado = $obj_usu_dao->selecionarEmail($USU_CODIGO);


include './classes/DAO/fichas_treinamento_dao.php';
$obj_ft_dao/*ft.pitbull/mrworldwide*/ = new fichas_treinamento_dao;
$resultadoft = $obj_ft_dao->selecionar($USU_CODIGO);

$nome= $resultado[0]["USU_NOME"];
$email= $resultado[0]["USU_EMAIL"];
$ex1=$resultadoft[0]["FTR_NOME"];
$dura1=$resultadoft[0]["FTR_DATA_INICIO"];
//$repet=$resultado[0]["FTR_DATA_INICIO"];
$validade=$resultadoft[0]["FTR_DATA_TERMINO"];
$iduser=$resultado[0]["USU_CODIGO"];



class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
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
$validade = $date->format('d-m-Y');

$date2 = new DateTime($dura1);
$dura1 = $date2->format('d-m-Y');

//CRIA O PDF// 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('Arial','',14);
$txtnome = "Nome: ".$nome;
$txtemail = "Email: ".$email;
$txtExercicio1="Exercicio 1: ".$ex1;
$txtduracao="Inicio Exercicio: ".$dura1;
//$txtrepeticao="Repetições: ".$repet;
$txtvalidade="validade: ".$validade;

$pdf->Cell(40,10,$txtnome,0,1);
$pdf->Cell(50,10,$txtemail,0,1);
$pdf->Cell(40,10,$txtExercicio1,0,1);
$pdf->Cell(40,10,$txtduracao,0,1);
//$pdf->Cell(40,10,$txtrepeticao,0,1);
$pdf->Cell(40,10,$txtvalidade,0,1);

$filename="./views/modules/Treinos/fichas/Ficha".$iduser.".pdf";
$pdf->Output($filename,'F');

?>