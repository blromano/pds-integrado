<?php
require_once ('../../../classes/DAO/pesos_alturas_dao.php');
require_once ('../../../classes/pesos_altura.php');

if (isset($_POST["peso"]) && ($_POST["peso"] != "") && ($_POST["altura"]) && ($_POST["altura"] != "")) {
    $contador = 0;
    $codigo_usuario = 1;
    $peso_novo = $_POST["peso"];
    $altura_nova = $_POST["altura"];
    date_default_timezone_set('America/Sao_Paulo');
    $datahora = date('Y-m-d H:i:s');

    $pea_dao = new PESOS_ALTURAS_DAO();
    $result_pea_dao = $pea_dao->pesquisa_dados_tabela_pesos_alturas($codigo_usuario);
    
    
    $pea_model = new PESOS_ALTURAS();
    $pea_model->setPEA_DATA_HORA_CADASTRO($datahora);
    $pea_model->setPEA_ALTURA($altura_nova);
    $pea_model->setPEA_PESO($peso_novo);
    $pea_model->setFK_USUARIOS_USU_CODIGO($codigo_usuario);

    //insere os dados no banco
    $insere_pea = new PESOS_ALTURAS_DAO();
    $insere_pea->insere_dados_tabela_pea($pea_model);
    echo"<script language='javascript' type='text/javascript'>alert('Peso e Altura Atualizados com Sucesso');window.location.replace('../../../?mod=dbordo&sub=gerir_diario_de_bordo');</script>";
}
?>