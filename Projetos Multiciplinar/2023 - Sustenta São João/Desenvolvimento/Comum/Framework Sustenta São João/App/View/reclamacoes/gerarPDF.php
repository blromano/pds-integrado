<?php
    // PAREI VERIFICANDO O ERRO DE HTTPS

    // require_once './vendor/autoload.php';   

    use Dompdf\Dompdf;
    // use Dompdf\Options;

    // Crie uma instância do Dompdf
    // $options = new Options();
    // $options->set('isHtml5ParserEnabled', true);
    // $options->set('isPhpEnabled', true);
    // $pdf = new Dompdf($options);

    $pdf = new Dompdf();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "sustenta_sj";

    try {
        $pdo = new PDO ("mysql:host=$host;dbname=" .$dbname, $user, $pass);
        echo "Conexão com o banco de dados ok SVN ";
    }catch(PDOException $err){
        echo "Erro ao conectar-se ao banco de dados";
        $err->getMessage();
    }
    $query = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_NOTA_AVALIACAO FROM RECLAMACOES";
    $result = $pdo->query($query);

    $html = '<html>';
    $html .= '<head><title>Relatório de Reclamações</title></head>';
    $html .= '<body>';
    $html .= '<h1>Relatório de Reclamações do Meu Setor</h1>';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<p>ID da reclamação: ' . $row['REC_ID'] . '</p>';
        $html .= '<p>Titulo da reclamação: ' . $row['REC_TITULO_RECLAMACAO'] . '</p>';
        $html .= '<p>Nota avaliação: ' . $row['REC_NOTA_AVALIACAO'] . '</p>';
    }
    $html .= '</body>';
    $html .= '</html>';

    // Carregue o conteúdo HTML no Dompdf
    $pdf->loadHtml($html);

    $pdf->render();

    $f;
    $l;
    if(headers_sent($f,$l))
    {
        echo $f,'<br/>',$l,'<br/>';
        die('now detect line');
    };

    $pdf->stream('relatorio.pdf', ['Attachment' => true]);
?> 