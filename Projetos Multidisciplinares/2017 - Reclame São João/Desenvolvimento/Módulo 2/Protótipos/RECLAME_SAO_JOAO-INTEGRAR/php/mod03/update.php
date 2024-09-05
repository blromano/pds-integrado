<?php 
include_once("../../MVC/visao/Produtos/conexao.php");
$des = $_POST['detalhes'];
$ID = $_POST['idReclamacao'];
// $result_reclamacoes= "UPDATE respostas_reclamacoes SET RER_DATA_HORA = CURRENT_TIMESTAMP, RER_AVALIACAO = 'SDAWE', RER_STATUS_APROVADO = 0, RER_DESCRICAO = $des, RER_STATUS_RESOLVIDO = 1 
// WHERE REC_ID = $ID;";
// $resultado_reclamacoes = mysqli_query($conn, $result_reclamacoes);


// $sql = "UPDATE respostas_reclamacoes SET RER_DATA_HORA = CURRENT_TIMESTAMP, RER_AVALIACAO = 'SDAWE', RER_STATUS_APROVADO = 0, RER_DESCRICAO = $des, RER_STATUS_RESOLVIDO = 1 
// WHERE REC_ID = $ID;";

$sql = "UPDATE respostas_reclamacoes SET RER_DATA_HORA = CURRENT_TIMESTAMP, RER_STATUS_RESOLVIDO = 1
WHERE REC_ID = $ID;";

echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

header('Location:mod03-gerenciar-reclamacao-nao-atendida.php?id=70');

// update respostas_reclamacoes set rer_descricao = 'teste', rer_data_hora = current_timestamp where rer_id=4;
// select * from respostas_reclamacoes where rer_id=4;
// select * from respostas_reclamacoes where rec_id = 72;
?>