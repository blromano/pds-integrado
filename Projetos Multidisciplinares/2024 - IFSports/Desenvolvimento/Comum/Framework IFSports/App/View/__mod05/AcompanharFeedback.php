<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback do Evento X</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        /* Configurações gerais */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        /* Estilização do container principal */
        .container {
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        /* Estilização do título */
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Estilização das estatísticas */
        .stat {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .stat i {
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Feedback do Evento X</h1>
        
        <div class="stat">
            <i class="fas fa-star"></i> Média das Avaliações da Pergunta 1: <span id="mediaQ1">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-star"></i> Média das Avaliações da Pergunta 2: <span id="mediaQ2">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-star"></i> Média das Avaliações da Pergunta 3: <span id="mediaQ3">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-star"></i> Média das Avaliações da Pergunta 4: <span id="mediaQ4">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-star"></i> Média das Avaliações da Pergunta 5: <span id="mediaQ5">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-star"></i> Média Geral: <span id="mediaGeral">0.0</span>
        </div>
        <div class="stat">
            <i class="fas fa-users"></i> Número Total de Feedbacks: <span id="totalFeedbacks">0</span>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        let totalFeedbacks = 0;
        let somaQ1 = 0, somaQ2 = 0, somaQ3 = 0, somaQ4 = 0, somaQ5 = 0;

        function atualizarEstatisticas(q1, q2, q3, q4, q5) {
            somaQ1 += q1;
            somaQ2 += q2;
            somaQ3 += q3;
            somaQ4 += q4;
            somaQ5 += q5;
            totalFeedbacks++;

            const mediaQ1 = somaQ1 / totalFeedbacks;
            const mediaQ2 = somaQ2 / totalFeedbacks;
            const mediaQ3 = somaQ3 / totalFeedbacks;
            const mediaQ4 = somaQ4 / totalFeedbacks;
            const mediaQ5 = somaQ5 / totalFeedbacks;
            const mediaGeral = (mediaQ1 + mediaQ2 + mediaQ3 + mediaQ4 + mediaQ5) / 5;

            document.getElementById('mediaQ1').textContent = mediaQ1.toFixed(1);
            document.getElementById('mediaQ2').textContent = mediaQ2.toFixed(1);
            document.getElementById('mediaQ3').textContent = mediaQ3.toFixed(1);
            document.getElementById('mediaQ4').textContent = mediaQ4.toFixed(1);
            document.getElementById('mediaQ5').textContent = mediaQ5.toFixed(1);
            document.getElementById('mediaGeral').textContent = mediaGeral.toFixed(1);
            document.getElementById('totalFeedbacks').textContent = totalFeedbacks;
        }

        // Exemplo de como chamar a função para atualizar as estatísticas
        // Atualize os valores (q1, q2, q3, q4, q5) com as notas recebidas
        atualizarEstatisticas(4, 5, 3, 4, 5);
    </script>
</body>
</html>
