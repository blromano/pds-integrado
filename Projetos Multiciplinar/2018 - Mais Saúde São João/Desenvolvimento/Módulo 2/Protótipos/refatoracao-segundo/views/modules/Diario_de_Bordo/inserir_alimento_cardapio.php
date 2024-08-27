<?php

include_once 'conection.php';
date_default_timezone_set('America/Sao_Paulo');

$alimento = $_POST['alimentos'];
$porcao = $_POST['porcao'];
$porcao2 = $_POST['porcao2'];
$data = $_POST['dataCardapio'];
$hora = $_POST['horaCardapio'];
$refeicao = $_POST['txt'];
$codRefeicao = 1;
$tcalorias = $_POST['tcalorias'];
$idAlimento = $_POST['idAlimento'];
$totalcm = 0;
$totallm = 0;
$totala = 0;
$totallt = 0;
$totalct = 0;
$totalj = 0;
$totalln = 0;
$contador = 0;

echo $data;
$rs = $conn->query("SELECT DIB_TOTAL_DIA, DIB_TOTAL_CAFE_MANHA, DIB_TOTAL_LANCHE_MANHA, DIB_TOTAL_ALMOCO, DIB_TOTAL_LANCHE_TARDE, DIB_TOTAL_CAFE_TARDE, DIB_TOTAL_JANTAR, DIB_TOTAL_LANCHE_NOITE, DIB_CODIGO, DATE_FORMAT(DIB_DIB_DATA_CRIACAO, '%Y-%m-%d') as DIB_DIB_DATA_CRIACAO, FK_USUARIOS_USU_CODIGO FROM DIARIOS_BORDO");

while ($result = $rs->fetch(PDO::FETCH_OBJ)) {
        echo "<br>bbbbbbb" . $dibdata = $result->DIB_DIB_DATA_CRIACAO;
        echo "<br>ccccccccc" . $id = $result->DIB_CODIGO;
    if ($dibdata == $data AND $tcalorias != 0) {
        $contador = 1;
        
        $totalcm = $result->DIB_TOTAL_CAFE_MANHA;
        $totallm = $result->DIB_TOTAL_LANCHE_MANHA;
        $totala = $result->DIB_TOTAL_ALMOCO;
        $totallt = $result->DIB_TOTAL_LANCHE_TARDE;
        $totalct = $result->DIB_TOTAL_CAFE_TARDE;
        $totalj = $result->DIB_TOTAL_JANTAR;
        $totalln = $result->DIB_TOTAL_LANCHE_NOITE;

        if ($refeicao == "Café da Manhã") {
            $codRefeicao = 1;
            $totalcm += $tcalorias;
        } else if ($refeicao == "Lance da Manhã") {
            $codRefeicao = 2;
            $totallm += $tcalorias;
        } else if ($refeicao == "Almoço") {
            $codRefeicao = 3;
            $totala += $tcalorias;
        } else if ($refeicao == "Lanche da Tarde") {
            $codRefeicao = 4;
            $totallt += $tcalorias;
        } else if ($refeicao == "Café da Tarde") {
            $codRefeicao = 5;
            $totalct += $tcalorias;
        } else if ($refeicao == "Jantar") {
            $codRefeicao = 6;
            $totalj += $tcalorias;
        } else if ($refeicao == "Lanche da Noite") {
            $codRefeicao = 7;
            $totalln += $tcalorias;
        }

        $totald = $totalcm + $totallm + $totala + $totallt + $totalct + $totalj + $totalln;
        echo "<br>" . $dibdata;
        echo "<br>" . $data;

        $sql1 = "UPDATE DIARIOS_BORDO SET DIB_TOTAL_DIA='$totald', DIB_TOTAL_CAFE_MANHA='$totalcm', DIB_TOTAL_LANCHE_MANHA='$totallm', DIB_TOTAL_ALMOCO='$totala', DIB_TOTAL_LANCHE_TARDE='$totallt', DIB_TOTAL_CAFE_TARDE='$totalct', DIB_TOTAL_JANTAR='$totalj', DIB_TOTAL_LANCHE_NOITE='$totalln' WHERE DIB_CODIGO='$id'";
        if ($conn->query($sql1) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }



        $sql3 = "INSERT INTO ALIMENTOS_DIARIOS_BORDO (ALI_DIB_TOTAL_CALORICO, ALI_DIB_CODIGO, ALI_DIB_CODIGO_REFEICAO, ALI_DIB_PORCAO_INTEIRA, ALI_DIB_PORCAO_FRACIONADA, ALI_DIB_HORARIO, FK_ALIMENTOS_ALI_CODIGO, FK_DIARIOS_BORDO_DIB_CODIGO) VALUES ('$tcalorias', '', '$codRefeicao', '$porcao', '$porcao2', '$hora', '$idAlimento', '$id')";
        if ($conn->query($sql3) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }

    }
}
if ($contador == 0 AND $tcalorias != 0) {
        $totalcm = 0;
        $totallm = 0;
        $totala = 0;
        $totallt = 0;
        $totalct = 0;
        $totalj = 0;
        $totalln = 0;

        if ($refeicao == "Café da Manhã") {
            $codRefeicao = 1;
            $totalcm += $tcalorias;
        } else if ($refeicao == "Lance da Manhã") {
            $codRefeicao = 2;
            $totallm += $tcalorias;
        } else if ($refeicao == "Almoço") {
            $codRefeicao = 3;
            $totala += $tcalorias;
        } else if ($refeicao == "Lanche da Tarde") {
            $codRefeicao = 4;
            $totallt += $tcalorias;
        } else if ($refeicao == "Café da Tarde") {
            $codRefeicao = 5;
            $totalct += $tcalorias;
        } else if ($refeicao == "Jantar") {
            $codRefeicao = 6;
            $totalj += $tcalorias;
        } else if ($refeicao == "Lanche da Noite") {
            $codRefeicao = 7;
            $totalln += $tcalorias;
        }

        $totald = $totalcm + $totallm + $totala + $totallt + $totalct + $totalj + $totalln;
        
    $sql2 = "INSERT INTO DIARIOS_BORDO (DIB_TOTAL_DIA, DIB_TOTAL_CAFE_MANHA, DIB_TOTAL_LANCHE_MANHA, DIB_TOTAL_ALMOCO, DIB_TOTAL_LANCHE_TARDE, DIB_TOTAL_CAFE_TARDE, DIB_TOTAL_JANTAR, DIB_TOTAL_LANCHE_NOITE, DIB_CODIGO, DIB_DIB_DATA_CRIACAO, FK_USUARIOS_USU_CODIGO) VALUES ('$totald', '$totalcm', '$totallm', '$totala', '$totallt', '$totalct', '$totalj', '$totalln', DEFAULT, '$data', '1')";

    if ($conn->query($sql2) == TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }

    
    $sql3 = "INSERT INTO ALIMENTOS_DIARIOS_BORDO (ALI_DIB_TOTAL_CALORICO, ALI_DIB_CODIGO, ALI_DIB_CODIGO_REFEICAO, ALI_DIB_PORCAO_INTEIRA, ALI_DIB_PORCAO_FRACIONADA, ALI_DIB_HORARIO, FK_ALIMENTOS_ALI_CODIGO, FK_DIARIOS_BORDO_DIB_CODIGO) VALUES ('$tcalorias', '', '$codRefeicao', '$porcao', '$porcao2', '$hora', '$idAlimento', 'DEFAULT')";
        if ($conn->query($sql3) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
        
}
header("location:?mod=dbordo&sub=inserir_refeicao&txt=".$refeicao);
?>

