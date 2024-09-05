<?php

// Carregar o Composer
require './vendor/autoload.php';

// Receber da URL a data inicial
$example = filter_input(INPUT_GET, 'example', FILTER_DEFAULT);

// Receber da URL a data final
$example2 = filter_input(INPUT_GET, 'example2', FILTER_DEFAULT);

// Incluir conexao com BD
include_once './conexao.php';
if ((!empty($example)) and (!empty($example2))) {
    // QUERY para recuperar os registros do banco de dados
    $query_usuarios = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_NOTA_AVALIACAO, REC_ANEXO, REC_STATUS, REC_DESCRICAO, REC_DATAHORA, FK_CIDADAOS_USU_ID, FK_SETORES_SET_ID, 
    FK_GESTORES_USU_ID,	REC_RESPOSTA_RECLAMACAO 
                FROM reclamacoes
                WHERE REC_DATAHORA BETWEEN :example AND :example2
                ORDER BY id DESC";

    // Prepara a QUERY
    $result_usuarios = $conn->prepare($query_usuarios);

    // Substitui os link da QUERY pelo valor
    $result_usuarios->bindParam(':example', $example);
    $result_usuarios->bindParam(':example2', $example2);
}else{
    // QUERY para recuperar os registros do banco de dados
    $query_usuarios = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_NOTA_AVALIACAO, REC_ANEXO, REC_STATUS, REC_DESCRICAO, REC_DATAHORA, FK_CIDADAOS_USU_ID, FK_SETORES_SET_ID, 
    FK_GESTORES_USU_ID,	REC_RESPOSTA_RECLAMACAO 
                FROM reclamacoes
                ORDER BY id DESC";

    // Prepara a QUERY
    $result_usuarios = $conn->prepare($query_usuarios);
}


// Executar a QUERY
$result_usuarios->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Listar os Usuário</h1>";

// Ler os registros retornado do banco de dados
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

    // Extrair o array para imprimir pela chave do array
    extract($row_usuario);

    // Imprimir os dados usando a chave do array como variável em função do extract executado acima
    $dados .= "ID: $id <br>";
    $dados .= "Nome: $nome <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "<hr>";
}
$dados .= "</body>";
$dados .= "</html>";

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
