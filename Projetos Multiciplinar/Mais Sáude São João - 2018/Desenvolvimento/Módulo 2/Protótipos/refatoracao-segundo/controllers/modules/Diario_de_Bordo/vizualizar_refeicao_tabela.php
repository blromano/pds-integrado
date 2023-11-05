<?php
require_once 'models/Diario_de_Bordo/DAO/ALIMENTOS_DIARIOS_BORDO_DAO.php';

Class Controller {

    function interpreta($operacao) {
        $txt = $operacao;
    }

}

if ($txt == "Café da Manhã") {
    $codRefeicao = 1;
} else if ($txt == "Lance da Manhã") {
    $codRefeicao = 2;
} else if ($txt == "Almoço") {
    $codRefeicao = 3;
} else if ($txt == "Lanche da Tarde") {
    $codRefeicao = 4;
} else if ($txt == "Café da Tarde") {
    $codRefeicao = 5;
} else if ($txt == "Jantar") {
    $codRefeicao = 6;
} else if ($txt == "Lanche da Noite") {
    $codRefeicao = 7;
}

$obj_can_dao = new ALIMENTOS_DIARIOS_BORDO_DAO();
$alimentos_diarios_bordo = $obj_can_dao->lista_alimentos_tabela($codRefeicao);


