<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crachá Personalizado</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            
        }

        .badge-container {
            width: 250px;
            height: 450px;
            background-color: #ffffff; /* Fundo geral branco */
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            color: #000000;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .badge-container .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .badge-container .photo {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            margin: 0 auto 10px;
            background-color: #ffffff;
            overflow: hidden;
        }

        .badge-container .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-container .name-background {
            background-color: #ff0000; /* Fundo vermelho */
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .badge-container .name {
            font-size: 22px;
            font-weight: bold;
            color: #ffffff;
        }

        .badge-container .info {
            font-size: 11px;
            text-align: left;
            margin-bottom: 10px;
            margin-left: 10px;
        }

        .badge-container .qr-code {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 75px;
            height: 75px;
            background-color: #ffffff;
            display: block;
            top: 83%;
            right: 10%;
            
        }

        .badge-container .qr-code img {
            width: 100%;
            height: 100%;
        }
        .logo img {
            width: 45px; /* Largura da logo */
            height: auto; /* Altura automática para manter a proporção */
            display: block;
            margin: 0 auto 10px; /* Centraliza a logo e adiciona margem inferior */
        }


        .badge-container {
    transform: scale(1.5); /* Ajuste o valor de escala conforme necessário */
    transform-origin: center; /* Garante que o zoom seja aplicado a partir do centro */
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -27.5mm; /* Metade da largura do crachá em mm, ajusta a posição horizontal */
    margin-top: -70.5mm; /* Metade da altura do crachá em mm, ajusta a posição vertical */
}

    </style>
</head>
<body>
    <div class="badge-container">
        <div class="logo">
            <img src="resources/images/logo.png" alt="Foto do Funcionário">
        </div> <!-- Substitua "SUAMARCA" pelo nome da sua marca -->
        <div class="photo">
            <img src="resources/images/img_mod03/foto yas.jpeg " alt="Foto do Funcionário">
        </div>
        <div class="name-background">
            <div class="name">Yasmin Oliveira</div>
        </div>
        <div class="info">CPF: 000.000.000-00</div>
        <div class="info">Dt. Nasc: 01/01/2000</div>
        <div class="info">Telefone: (00) 00000-0000</div>
        <div class="info">Câmpus: São João da Boa Vista</div>
        <div class="info">Evento: JIF 2024</div>
        <div class="qr-code">
            <img src="resources/images/img_mod03/qr-code.png" alt="QR Code">
        </div>
    </div>
</body>
</html>
