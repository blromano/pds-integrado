<?php

require_once '../../../classes/DAO/ALIMENTOS_DAO.php';

if (isset($_GET["idaddr"]) && ($_GET["idaddr"] != "")) {
    $idaddr = $_GET["idaddr"];
    $idaddr = str_replace('\'', '', $idaddr);
    $obj_can_dao = new ALIMENTOS_DAO();
    $select_alimento_codigo = $obj_can_dao->select_alimentos_codigo($idaddr);

    foreach ($select_alimento_codigo as $row) {

        $array = array([
                "nome_alimento" => $row["ALI_NOME"],
                "caloria_alimento" => $row["ALI_CALORIAS"],
                "carboidratos_alimento" => $row["ALI_CARBOIDRATOS"],
                "gordura_trans_alimento" => $row["ALI_GORDURA_TRANS"],
                "gordura_saturada_alimento" => $row["ALI_GORDURA_SATURADA"],
                "fibras_alimento" => $row["ALI_FIBRAS"],
                "sodio_alimento" => $row["ALI_SODIO"],
                "proteinas_alimento" => $row["ALI_PROTEINAS"],
                "porcao_alimento" => $row["ALI_PORCAO"],
                "gordura_total_alimento" => $row["ALI_GORDURA_TOTAL"]
        ]);
        echo json_encode($array);
    }
}
?>
