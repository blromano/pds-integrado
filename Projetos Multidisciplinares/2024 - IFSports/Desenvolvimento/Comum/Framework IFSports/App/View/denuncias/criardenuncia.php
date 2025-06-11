<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Denúncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        

        .form-container h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #555555;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #3BBFC3;
            border-color: #3BBFC3;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #32a5a8;
            border-color: #32a5a8;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }

        .titulo {
            font-size: 40px;
            font-weight: bold;
            color: #3ABFC3;
            text-align: center;
            padding-top: 15px;
           gap: 10px;
        }
    </style>
</head>

<body>
    <p class="titulo">ENVIAR DENÚNCIA</p>
    <br>
    <div class="form-container">
        <form id="denunciaForm" action="/denuncias/inserir" method="POST">
            <div class="mb-3">
                <label for="DNC_TITULO" class="form-label">Título da Denúncia</label>
                <input type="text" class="form-control" name="DNC_TITULO" id="DNC_TITULO" required>
            </div>
            <div class="mb-3">
                <label for="DNC_DESCRICAO" class="form-label">Descrição</label>
                <textarea class="form-control" name="DNC_DESCRICAO" id="DNC_DESCRICAO" rows="4" required></textarea>
            </div>

            <input type="hidden" name="FK_EVENTOS_EVO_ID" id="FK_EVENTOS_EVO_ID" value="2">
            <input type="hidden" name="FK_RESPONSAVEIS_EQUIPE_RES_ID" id="FK_RESPONSAVEIS_EQUIPE_RES_ID" value="2">

            <button type="submit" class="btn btn-primary w-100">Enviar Denúncia</button>
            
            
        </form>
        <div class="form-footer">
            <p>Seus dados serão tratados com confidencialidade.</p>
        </div>
    </div>
</body>

</html>