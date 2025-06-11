<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDE 2024</title>
    <link rel="stylesheet" href="/resources/css/visualizarfotoseventos.css">
</head>
<body>
    <div class="container">
        <div class="title">GDE 2024</div>

        <div class="grid">
            <?php foreach($this->getView()->fotos as $fotos){ ?>
                <div class="grid-item">
                    <img src="../../resources/imagens/<?php echo $fotos->__get("FTS_ARQUIVO"); ?>" alt="">
                </div><?php } ?>
        </div>
    </div>

    <!-- Botão de Voltar Posicionado no Inferior Direito -->
    <button onclick="window.history.back()" class="btn-voltar">Voltar</button>

    <style>
        /* Estilo para o botão */
        .btn-voltar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            position: fixed;
            bottom: 20px; /* Distância do fundo */
            right: 20px;  /* Distância da direita */
            z-index: 1000; /* Garante que o botão fique sobre outros elementos */
        }

        .btn-voltar:hover {
            background-color: #45a049;
        }
    </style>
</body>
</html>

