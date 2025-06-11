<?php
// Incluir os arquivos necessários
use App\DAO\FotosDAO;
use App\Model\FotosModel;

// Obter as fotos
$fotosDAO = new FotosDAO();
$fotos = $fotosDAO->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Fotos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Font Awesome para o ícone -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilo para o efeito de hover na imagem */
        .img-container {
            position: relative;
        }

        .img-container img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            transition: transform 0.3s ease; /* Suavizar o efeito de zoom */
        }

        .img-container:hover img {
            transform: scale(1.1); /* Zoom na imagem ao passar o mouse */
        }

        .img-container .zoom-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .img-container:hover .zoom-icon {
            opacity: 1; /* Mostrar o ícone de zoom quando passar o mouse */
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
</head>
<body>

<div class="container mt-5">
<p class="titulo">FOTOS ENVIADAS</p>

    <!-- Filtro de status -->
    <div class="mb-4">
    <label for="filterStatus" class="form-label">Filtrar por Status:</label>
    <select id="filterStatus" class="form-select" onchange="filterPhotos()">
        <option value="">Todos</option>
        <option value="validado">Aprovados</option>
        <option value="negado">Negados</option>
        <option value="pendente">Pendentes</option>
    </select>
</div>


<div class="row" id="photoContainer">
    <?php foreach ($fotos as $foto): ?>
        <div class="col-md-4 mb-4 photo-item" data-status="<?= $foto->__get('FTS_STATUS'); ?>">
            <div class="card">
                <div class="img-container" onclick="openModal('<?= $foto->__get('FTS_ARQUIVO'); ?>')">
                    <img src="/resources/imagens/<?= $foto->__get('FTS_ARQUIVO'); ?>" class="card-img-top" height="300px" alt="Foto">
                    <i class="fas fa-search-plus zoom-icon" style="color:#3BBFC3;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $foto->__get('FTS_LEGENDA'); ?></h5>
                    <p class="card-text"><?= date('d/m/Y', strtotime($foto->__get('FTS_DATA'))); ?></p>
                    <p>Status: <?= ucfirst($foto->__get('FTS_STATUS')); ?></p>
                    <button class="btn btn-primary" onclick="validarFoto(<?= $foto->__get('FTS_ID'); ?>)">Validar</button>
                    <button class="btn btn-danger" onclick="excluirFoto(<?= $foto->__get('FTS_ID'); ?>)">Excluir</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<!-- Modal para exibir imagem em tela cheia -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid" alt="Imagem em Tela Cheia">
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.all.min.js"></script>

<script>
// Função para abrir o modal e exibir a imagem em tela cheia
function openModal(imageSrc) {
    var modalImage = document.getElementById('modalImage');
    modalImage.src = '/resources/imagens/' + imageSrc;
    $('#imageModal').modal('show');
}

// Função para validar a foto
function validarFoto(ftsId) {
    alterarStatus(ftsId, 'validado');
}

function excluirFoto(ftsId) {
    alterarStatus(ftsId, 'negado');
}

function alterarStatus(ftsId, status) {
    $.ajax({
        url: '/dashboard/fotos/alterar-status',
        method: 'POST',
        data: { FTS_ID: ftsId, FTS_STATUS: status },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'O status foi atualizado para: ' + status,
                confirmButtonText: 'Ok'
            }).then(() => {
                location.reload(); // Recarregar a página
            });
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Não foi possível atualizar o status. Tente novamente.',
                confirmButtonText: 'Ok'
            });
        }
    });
}

function filterPhotos() {
    const filterStatus = document.getElementById('filterStatus').value;
    const photoItems = document.querySelectorAll('.photo-item');

    photoItems.forEach(item => {
        const itemStatus = item.getAttribute('data-status');
        if (!filterStatus || itemStatus === filterStatus) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}




// Função para excluir a fot
</script>

</body>
</html>