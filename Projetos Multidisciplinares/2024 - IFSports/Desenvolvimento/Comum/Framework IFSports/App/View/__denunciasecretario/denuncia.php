<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denúncias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-left: 220px; /* Espaço reservado para a sidebar */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 60px;
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .denuncia {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: background-color 0.3s;
        }
        .denuncia:hover {
            background-color: #d1d9e6;
        }
        .denuncia h3 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }
        .visualizar {
            background-color: #3BBFC3;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .visualizar:hover {
            background-color: #FFF;
            color: #3BBFC3;
        }
        .icon {
            margin-right: 10px;
            color: #3BBFC3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title"><i class="fas fa-exclamation-circle icon"></i>Denúncias</div>

        <div class="denuncia">
            <h3><i class="fas fa-file-alt icon"></i>Título da denúncia</h3>
            <a href="#" class="visualizar" onclick="viewAction(event)"><i class="fas fa-eye"></i> Visualizar</a>
            <a href="#" class="visualizar" onclick="editAction(event)"><i class="fas fa-pencil"></i> Editar</a>
            <a href="#" class="btn btn-danger" onclick="deleteAction(event)"><i class="fas fa-trash"></i> Excluir</a>
        </div>

        <div class="denuncia">
            <h3><i class="fas fa-file-alt icon"></i>Título da denúncia</h3>
            <a href="#" class="visualizar" onclick="viewAction(event)"><i class="fas fa-eye"></i> Visualizar</a>
            <a href="#" class="visualizar" onclick="editAction(event)"><i class="fas fa-pencil"></i> Editar</a>
            <a href="#" class="btn btn-danger" onclick="deleteAction(event)"><i class="fas fa-trash"></i> Excluir</a>
        </div>

        <div class="denuncia">
            <h3><i class="fas fa-file-alt icon"></i>Título da denúncia</h3>
            <a href="#" class="visualizar" onclick="viewAction(event)"><i class="fas fa-eye"></i> Visualizar</a>
            <a href="#" class="visualizar" onclick="editAction(event)"><i class="fas fa-pencil"></i> Editar</a>
            <a href="#" class="btn btn-danger" onclick="deleteAction(event)"><i class="fas fa-trash"></i> Excluir</a>
        </div>
    </div>

    <script>
        function viewAction(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Visualizar Denúncia',
                text: 'Ação de visualizar denúncia será realizada.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }

        function editAction(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Editar Denúncia',
                text: 'Ação de editar denúncia será realizada.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }

        function deleteAction(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Excluir Denúncia',
                text: 'Você tem certeza que deseja excluir esta denúncia?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Excluída!',
                        'A denúncia foi excluída.',
                        'success'
                    );
                }
            });
        }
    </script>

</body>
</html>