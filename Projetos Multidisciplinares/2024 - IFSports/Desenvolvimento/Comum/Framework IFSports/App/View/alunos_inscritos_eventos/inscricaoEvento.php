<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Documentos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .titulo {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .tabela {
            width: 80%;
            margin: 20px auto;
            border-spacing: 10px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        .tabela td {
            padding: 15px;
        }

        .tabela td:first-child {
            width: 30%;
            text-align: left;
        }

        .tabela td:last-child {
            width: 70%;
        }

        .subtitulo {
            color: #555;
            font-weight: bold;
        }

        .botoes {
            text-align: center;
            margin-top: 30px;
        }

        .enviar, .cancelar {
            width: 150px;
            height: 50px;
            background-color: #3BBFC3;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 25px;
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .enviar:hover {
            background-color: #34a5a9;
        }

        .cancelar {
            background-color: #ff6b6b;
        }

        .cancelar:hover {
            background-color: #e65a5a;
        }

        input[type="file"] {
            display: block;
            margin: 10px auto;
            width: 95%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        input[type="file"]:hover {
            border-color: #3BBFC3;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="titulo"><?php echo $this->getView()->title; ?></h1>
    </header>
    <main>
        <table class="table table-bordered tabela">
            <form id="uploadForm" enctype="multipart/form-data" action="/listar_eventos/inscricao/inserir" method="POST">
                <tr>
                    <td>
                        <h4 class="subtitulo">Boletim Escolar</h4>
                    </td>
                    <td>
                        <input type="file" id="AIE_BOLETIM_ESCOLAR" name="AIE_BOLETIM_ESCOLAR" accept=".pdf, .jpg, .jpeg, .png" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 class="subtitulo">Foto Pessoal</h4>
                    </td>
                    <td>
                        <input type="file" id="AIE_FOTO_PESSOAL" name="AIE_FOTO_PESSOAL"  accept=".pdf, .jpg, .jpeg, .png" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 class="subtitulo">Cópia do RG</h4>
                    </td>
                    <td>
                        <input type="file" id="AIE_COPIA_RG" name="AIE_COPIA_RG" accept=".pdf, .jpg, .jpeg, .png" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 class="subtitulo">Autorização dos Pais</h4>
                    </td>
                    <td>
                        <input type="file" id="AIE_AUTORIZACAO_PAIS" name="AIE_AUTORIZACAO_PAIS" accept=".pdf, .jpg, .jpeg, .png" required>
                    </td>
                </tr>

                <input type="hidden" id="EVO_ID" name="EVO_ID" value="<?php echo $_POST['EVO_ID']?>">

            </form>
        </table>
        <div class="botoes">
            <button type="submit" form="uploadForm" class="enviar">Enviar</button>
            <button type="button" class="cancelar" onclick="window.location.href='/listar_eventos_aluno'">Cancelar</button>
        </div>
    </main>
</body>
</html>
