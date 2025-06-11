<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Denúncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table thead th,
        .table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        
        .btn-custom {
            width: 150px;
            color: #fff;
        }

        .btn-view {
            background-color: #3BBFC3;
            border-color: #3BBFC3;
        }

        .btn-delete {
            background-color: red;
            border-color: red;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <center><h4 class="card-title">Denúncias Recebidas</h4></center>
        
        <div class="d-flex justify-content-end">
        
        </div>

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
                                    <button type="button" class="btn btn-dark btn-custom btn-view" onclick="visualizarDenuncia('<?= $denuncia->__get('DNC_ID'); ?>', '<?= $denuncia->__get('DNC_TITULO'); ?>', '<?= $denuncia->__get('DNC_DESCRICAO'); ?>', '<?= $denuncia->__get('DNC_STATUS'); ?>')">
                                        <i class="mdi mdi-eye"></i> Visualizar
                                    </button>
                                    <button type="button" class="btn btn-dark btn-custom btn-delete" onclick="excluirDenuncia('<?= $denuncia->__get('DNC_ID'); ?>')">
                                        <i class="mdi mdi-delete"></i> Excluir
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
    </div>

        <script>
            function visualizarDenuncia(id, titulo, descricao, status) {
    Swal.fire({
        title: 'Denúncia #' + id,
        html: `
            <strong>Título:</strong> ${titulo}<br>
            <strong>Descrição:</strong><br> ${descricao}<br><br>
            <strong>Status Atual:</strong> ${status}<br><br>
            <label for="novoStatus">Atualizar Status:</label>
            <select id="novoStatus" class="form-select">
                <option value="DEVERIDA" ${status === 'DEVERIDA' ? 'selected' : ''}>DEVERIDA</option>
                <option value="INDEFERIDA" ${status === 'INDEFERIDA' ? 'selected' : ''}>INDEFERIDA</option>
                <option value="PENDENTE" ${status === 'PENDENTE' ? 'selected' : ''}>PENDENTE</option>
            </select>
        `,
        showCancelButton: true,
        confirmButtonText: 'Atualizar Status',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const novoStatus = document.getElementById('novoStatus').value;
            return { novoStatus };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const novoStatus = result.value.novoStatus;
            fetch('/denuncias/atualizar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${id}&status=${novoStatus}`
            })
            .then(response => {
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Atualizado',
                        text: `O status foi atualizado para: ${novoStatus}`
                    }).then(() => location.reload());
                } else {
                    Swal.fire('Erro!', 'Não foi possível atualizar o status.', 'error');
                }
            });
        }
    });
}

            function excluirDenuncia(id) {
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Essa ação não poderá ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Fazer a requisição de exclusão
                        fetch(`/denuncias/excluir?id=${id}`, {
                                method: 'GET'
                            })
                            .then(response => {
                                if (response.ok) {
                                    Swal.fire(
                                        'Excluído!',
                                        `A denúncia #${id} foi excluída.`,
                                        'success'
                                    ).then(() => {
                                        // Recarrega a página para atualizar a lista
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Erro!',
                                        'Não foi possível excluir a denúncia. Tente novamente.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Erro!',
                                    'Ocorreu um problema na requisição. Verifique sua conexão e tente novamente.',
                                    'error'
                                );
                            });
                    }
                });
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>