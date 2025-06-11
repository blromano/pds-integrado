<!DOCTYPE html>
<html lang="pt-BR"> 
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Denúncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        .th { background-color: #3ABFC3; }
        .table thead th, .table tbody td { text-align: center; vertical-align: middle; }
        .table thead th { background-color: #3ABFC3; color: #fff; }
        .btn-custom { width: 150px; color: #fff; }
        .btn-view { background-color: #3BBFC3; border-color: #3BBFC3; }
        .btn-delete { background-color: red; border-color: red; }
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
    
    <p class="titulo">PAINEL DE DENÚNCIAS - RESPONSÁVEL DE EQUIPE</p>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getView()->denuncias) { ?>
                        <?php foreach ($this->getView()->denuncias as $denuncia) : ?>
                            <tr>
                                <td><?= $denuncia->__get('DNC_ID'); ?></td>
                                <td><?= $denuncia->__get('DNC_TITULO'); ?></td>
                                <td><?= $denuncia->__get('DNC_STATUS'); ?></td>
                                <td><?= $denuncia->__get('DNC_DATA'); ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-custom btn-view" onclick="abrirEditarDenuncia('<?= $denuncia->__get('DNC_ID'); ?>', '<?= $denuncia->__get('DNC_TITULO'); ?>', '<?= $denuncia->__get('DNC_DESCRICAO'); ?>')">
                                        <i class="mdi mdi-pencil"></i> Editar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma denúncia cadastrada</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
  
    </div>

    <!-- Modal de Edição -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Denúncia</h5>
                </div>
                <div class="modal-body">
                    <form id="editarForm">
                        <input type="hidden" id="editDncId">
                        <div class="mb-3">
                            <label for="editTitulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="editTitulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="editDescricao" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarEdicao()">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function abrirEditarDenuncia(id, titulo, descricao) {
        document.getElementById("editDncId").value = id;
        document.getElementById("editTitulo").value = titulo;
        document.getElementById("editDescricao").value = descricao;
        
        // Exibir o modal de edição
        new bootstrap.Modal(document.getElementById("editarModal")).show();
    }

    function salvarEdicao() {
    const id = document.getElementById("editDncId").value;
    const titulo = document.getElementById("editTitulo").value;
    const descricao = document.getElementById("editDescricao").value;

    fetch('/denuncias/editarDenuncia', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}&titulo=${encodeURIComponent(titulo)}&descricao=${encodeURIComponent(descricao)}`
    })
    .then(response => response.text())
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Denúncia atualizada com sucesso!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            location.reload(); // Atualiza a página após o sucesso
        });
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Erro ao atualizar denúncia',
            text: error
        });
    });
}

</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
