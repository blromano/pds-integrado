<?php

include '../../../../controle/RespostaReclamacaoDAO.php';

$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$php = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $RespostaReclamacaoDAO->editarADM($php['id_reclama'],$php['StatusR'],$php['StatusA']);
    //echo "<script>alert('Categoria editada com sucesso!')</script><script>window.location='../../../index.php?pagina=3';</script>";
};
?> 