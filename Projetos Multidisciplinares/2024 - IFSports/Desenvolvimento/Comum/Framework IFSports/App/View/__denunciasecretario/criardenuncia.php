<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Denúncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3BBFC3;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2a99a0;
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title">Enviar Denúncia</div>
        <form id="denunciaForm">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" placeholder="Digite o título da denúncia" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" rows="5" placeholder="Descreva a denúncia" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" required>
                    <option value="" disabled selected>Escolha uma categoria</option>
                    <option value="abuso">Abuso</option>
                    <option value="fraude">Fraude</option>
                    <option value="corrupcao">Corrupção</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Enviar Denúncia</button>
        </form>
    </div>

    <script>
        document.getElementById('denunciaForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita o envio tradicional do formulário

            // Obtém os valores dos campos do formulário
            const titulo = document.getElementById('titulo').value;
            const descricao = document.getElementById('descricao').value;
            const categoria = document.getElementById('categoria').value;

            // Verifica se todos os campos estão preenchidos
            if (titulo && descricao && categoria) {
                Swal.fire({
                    title: 'Denúncia Enviada!',
                    text: 'Sua denúncia foi enviada com sucesso.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Limpa o formulário após o envio
                    document.getElementById('denunciaForm').reset();
                });
            } else {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Por favor, preencha todos os campos.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>