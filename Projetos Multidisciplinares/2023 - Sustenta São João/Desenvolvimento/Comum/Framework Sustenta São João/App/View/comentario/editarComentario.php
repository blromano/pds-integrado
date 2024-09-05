<?php   
//
    $comentario = $this->getView()->comentario;
?>
<head>
    <style>
        .btn-enviar {
                background-color: #3eb84d;
                color: white;
        }
    </style>
</head>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/dashboard/editarComentarioSelecionado" method="POST" name="formComentario">
                                        <textarea id="COM_TEXTO" name="COM_TEXTO" cols="30" rows="10" class="form-control" placeholder="Escreva aqui seu comentário"><?= $comentario->__get("COM_TEXTO") ?></textarea>
                                        <input type="hidden" id="COM_ID" name="COM_ID" value="<?= $comentario->__get("COM_ID") ?>">
                                        <div class="d-flex justify-content-end my-2">
                                            <input class="btn btn-enviar w-25" id="botaoEnviar" type="submit" value="Enviar">
                                        </div>
                                    </form>   
                                    <a class="form-control btn btn-default" href='/dashboard/meusComentarios'>Voltar</a> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-5 d-flex justify-content-end">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>