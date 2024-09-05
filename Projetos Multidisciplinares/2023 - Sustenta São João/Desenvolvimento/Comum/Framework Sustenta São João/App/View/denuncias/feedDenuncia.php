<!DOCTYPE html>
<html>

<head>
    <title>Feed de Denúncias</title>
    <style>
        .badge-status {
            font-size: 1    rem;
        }

        .custom-carousel-inner {
            height: 400px;
        }

        .visu-coment {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php
    $comentarios = $this->getView()->comentarios;
    // Grava o id das denuncias curtidas pelo usuário em um array
    $denunciasCurtidas = array();
    foreach ($this->getView()->denunciasCurtidas as $denunciaCurtida) {
        array_push($denunciasCurtidas, $denunciaCurtida['FK_DENUNCIAS_DEN_ID']);
    }

    // Percorre as denúncias e exibe na tela
    foreach ($this->getView()->denuncias as $denuncia) {
    ?>
        <div class="container">
            <div class="card mt-4">
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-capitalize card-subtitle text-muted font-weight-normal">
                            <span class="font-weight-bold"><?= $denuncia->__get('USU_NOME'); ?></span> · <?= $denuncia->__get('DEN_DATA_PUBLICACAO'); ?>
                        </h6>
                        <a href="/dashboard/reportarDenuncia?id=<?= $denuncia->__get('DEN_ID') ?>"><span class="badge badge-danger">Denunciar publicação</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $denuncia->__get('DEN_DESCRICAO'); ?></p>
                    <div>
                        <img src="../resources/upload/<?php echo $denuncia->__get('DEN_FOTO_VIDEO'); ?>" class="img-fluid" alt="Imagem do Problema 1">
                    </div>  
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="mb-3 row justify-content-between align-items-center">
                            <!-- Número de curtidas -->
                            <h5 id="curtidasId-<?php echo $denuncia->__get('DEN_ID') ?>" class="text-muted m-0"><san class="far fa-thumbs-up"></san> <?php echo $denuncia->__get('DEN_QDE_CURTIDAS') ?></h5>
                            <p class="btn btn-primary" data-toggle="modal" data-target="#comentModalCenter<?= $denuncia->__get('DEN_ID'); ?>">Visualizar Comentários</p>
                        </div>
                        <!-- Botões de curtir e comentar -->
                        <div class="row justify-content-around">
                            <button id="curtirId-<?php echo $denuncia->__get('DEN_ID') ?>" onclick="curtir(this)" class="curtirBtn col mr-1 btn 
                            <?php
                                //echo("<button id=\"curtirId-" . $denuncia->__get('DEN_ID') . "\" onclick=\"curtir(this)\" action=\"/dashboard/curtir\" class=\"curtirBtn col mr-1 btn");
                                // Se o usuário já curtiu a denúncia, o botão aparece como descurtir
                                
                                if (in_array($denuncia->__get('DEN_ID'), $denunciasCurtidas)) {
                                    echo "btn-success\">";
                                    echo "Descurtir";
                                } else {
                                    echo "btn-primary\">";
                                    echo "Curtir";
                                }
                                echo("</button>"); 
                            ?>
                        
                            <button class="col ml-1 btn btn-primary" onclick="comentar(<?php echo $denuncia->__get('DEN_ID') ?>)">Comentar</button>
                            <!--<a href='/dashboard/adicionarComentario'><button>Comentar</button></a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="comentModalCenter<?= $denuncia->__get('DEN_ID'); ?>" tabindex="-1" role="dialog" aria-labelledby="comentModalCenterTitle<?= $denuncia->__get('DEN_ID'); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comentModalLongTitle<?= $denuncia->__get('DEN_ID'); ?>">Comentários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <ul class="list-group list-group-flush">
                <?php
                    if($comentarios){
                        foreach($comentarios as $comentario){
                            if($comentario->__get('FK_DENUNCIAS_DEN_ID') == $denuncia->__get('DEN_ID')){
                ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-capitalize text-muted font-weight-normal">
                            <span class="font-weight-bold"><?php echo $comentario->__get('USU_NOME') ?></span> · <?php echo $comentario->__get('COM_DATA_HORA') ?>
                        </h6>
                    </div>
                    <p class="card-text"><?php echo $comentario->__get('COM_TEXTO') ?></p>
                </li>
                <?php
                            }
                        }
                    }else{
                        echo "<li class='list-group-item'>Não há comentários</li>";
                    }
                ?>
            </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
    <?php
    }
    ?>

    

    <script>
        function curtir(btn) {
            const btnText = btn.textContent;
            const btnId = btn.id.split('-');

            fetch('/dashboard/curtir_descurtir', {
                method: 'POST',
                headers: {
                    // Passar header como um form
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'idDenuncia=' + btnId[1] + '&idUsuario=' + <?php echo $_SESSION['id']; ?>
            }).then((data) => {
                if (btnText === "Curtir") {
                    btn.textContent = "Descurtir";
                    btn.classList.remove("btn-primary");
                    btn.classList.add("btn-success");
                } else {
                    btn.textContent = "Curtir";
                    btn.classList.remove("btn-success");
                    btn.classList.add("btn-primary");
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        function comentar(idDenuncia) {
            window.location.href = "/dashboard/adicionarComentario?id=" + idDenuncia;
        }
    </script>

</body>

</html>