<!--Validar a data
Só falta deixar bonitinho e fazer a pag inserir_cardapio encontrar essa -->

<?php

echo "teste";
exit();

if (isset($_POST["data_inicio"]) && ($_POST["data_inicio"] != "") && ($_POST["data_termino"]) && ($_POST["data_termino"] != "")) {


    $dataI = $_POST["data_inicio"];
    $dataF = $_POST["data_termino"];
    $data1 = strtotime($dataI);
    $data2 = strtotime($dataF);

    if ($data1 > $data2) {
                echo "<script>   
var encaminhar = confirm('Data de termino invalida, por favor verifique!');
 if(encaminhar == true){window.location.replace('../../../?mod=palimentar&sub=inserir_cardapio');}
</script>";
        
        
        return false;
    } 
}

session_start();
include ('../../../classes/DAO/alimento_periodo_cardapioDAO.php');
include ('../../../classes/DAO/cardapio_alimentar_nutricionistaDAO.php');
include ('../../../classes/DAO/periodo_cardapio_nutricionistaDAO.php');
include ('../../../classes/alimento_periodo_cardapio.php');
include ('../../../classes/cardapio_alimentar_nutricionista.php');
include ('../../../classes/periodo_cardapio_nutricionista.php');


$obj_can = new cardapio_alimentar_nutricionista(); 
$obj_can ->setCAN_DATA_INICIO($dataI);
$obj_can ->setCAN_DATA_FIM($dataF);
$obj_can ->setFK_USUARIOS_USU_CODIGO($_SESSION["CARDAPIO_USUARIO_ID"]);

$obj_can_dao = new CARDAPIO_ALIMENTAR_NUTRICIONISTA_DAO();
$obj_can_dao ->Insert($obj_can);

//$cardapio = $obj_can_dao->listarTodos();

$obj_pcn = array();

$periodo = $_POST['periodos'];
$alimento = $_POST['alimento'];
$porcao = $_POST['porcao'];
$qtdCaloria = $_POST['qtdCaloria'];
$variacao = $_POST['variacao'];

$hora = $_POST['hora'];
$obj_pcn_dao = new periodo_cardapio_nutricionistaDAO();
$obj_apc_dao = new ALIMENTO_PERIODO_CARDAPIO_DAO();

for ($i = 1; $i <= count($periodo); $i++) {
    $obj_pcn[$i] = new PERIODO_CARDAPIO_NUTRICIONISTA();
    $obj_pcn[$i] ->setPCN_NOME_PERIODO($periodo[$i]);
    $obj_pcn[$i]->setPCN_HORA_PERIODO_ALIMENTO($hora[$i]);
    $obj_pcn[$i]->setFK_CARDAPIO_ALIMENTAR_NUTRICIONISTA_CAN_CODIGO($obj_can ->getCAN_CODIGO());
    $obj_pcn_dao -> Insert($obj_pcn[$i]);   
    
    
    for ($j = 1; $j <= count($alimento[$i]); $j++) {
        $obj_apc = new ALIMENTO_PERIODO_CARDAPIO();
        $obj_apc ->setAPC_PCN_PORCAO($porcao[$i][$j]);
        $obj_apc->setAPC_QTD_CALORIAS($qtdCaloria[$i][$j]);
        $obj_apc ->setAPC_VARIACAO_ALIMENTO($variacao[$i][$j]);
        $obj_apc ->setFK_ALIMENTOS_ALI_CODIGO($alimento[$i][$j]);
        $obj_apc ->setFK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO($obj_pcn[$i] ->getPCN_CODIGO());
        
        
        $obj_apc_dao->Insert($obj_apc);
    }
}

header("location:../../../?mod=palimentar&sub=gerir_cardapio");

?>





