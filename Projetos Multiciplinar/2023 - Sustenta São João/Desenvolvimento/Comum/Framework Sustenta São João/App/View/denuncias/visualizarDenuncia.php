<head>
    <style>
        .custom-carousel-inner {
            height: 500px;
        }
    </style>
</head>
<?php 
    $denuncia = $this->getView()->denuncia;
    $comentarios = $this->getView()->comentarios;
?>
<div class="container">
    <div class="card mt-5">
    <div class="card-header">
        <!-- Título da denúncia -->
        <div class="d-flex align-items-center justify-content-between card-title-container">
            <h5 class="card-title font-weight-bold"><?= $denuncia->__get('DEN_TITULO'); ?></h5>
            <span class="badge-status badge badge-info">
                <?php
                if ($denuncia->__get('DEN_STATUS_DENUNCIA') == "A") {
                    echo "Em andamento";
                } else if ($denuncia->__get('DEN_STATUS_DENUNCIA') == "R") {
                    echo "Resolvido";
                } else if ($denuncia->__get('DEN_STATUS_DENUNCIA') == "NR") {
                    echo "Não resolvido";
                }
                ?>
            </span>
        </div>
        <!-- Autor e data -->
        <h6 class="text-capitalize card-subtitle text-muted font-weight-normal">
            <span class="font-weight-bold"><?= $_SESSION['nome'] ?></span> · <?= $denuncia->__get('DEN_DATA_PUBLICACAO'); ?>
        </h6>
    </div>
    <div class="card-body">
        <p class="card-text"><?= $denuncia->__get('DEN_DESCRICAO'); ?></p>
        <div>
            <img src="../resources/upload/<?php echo $denuncia->__get('DEN_FOTO_VIDEO'); ?>" class="img-fluid" alt="Imagem do Problema 1">
        </div>  
    </div>
        <div class="card-footer">
            <div class="mb-3 row ">
                <!-- Número de curtidas -->
                <h5 id="curtidasId-<?php echo $denuncia->__get('DEN_ID') ?>" class="text-muted m-0"><span class="far fa-thumbs-up"></span> <?= $denuncia->__get('DEN_QDE_CURTIDAS') ?></h5>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5 class="card-title">Comentários</h5>
        </div>
        <ul class="list-group list-group-flush">
            <?php
                if($comentarios){
                    foreach($comentarios as $comentario){
            ?>
            <li class="list-group-item">
                <h6 class="text-capitalize card-subtitle text-muted font-weight-normal">
                <span class="font-weight-bold"><?php echo $comentario->__get('USU_NOME') ?></span> · <?php echo $comentario->__get('COM_DATA_HORA') ?>
                </h6>
                <p class="card-text"><?php echo $comentario->__get('COM_TEXTO') ?></p>
            </li>
            <?php
                    }
                }else{
                    echo "<li class='list-group-item'>Não há comentários</li>";
                }
            ?>
        </ul>
    </div>
</div>
