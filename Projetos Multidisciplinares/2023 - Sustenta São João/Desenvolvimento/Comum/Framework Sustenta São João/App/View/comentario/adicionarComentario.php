<!-- Página para adicionar comentario -->
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
                                <form action="/dashboard/adicionar" method="POST" name="formComentario">
                                        <textarea id="COM_TEXTO" name="COM_TEXTO" cols="30" rows="10" class="form-control" placeholder="Escreva aqui seu comentário"></textarea>
                                        <input type="hidden" id="FK_DENUNCIAS_DEN_ID" name="FK_DENUNCIAS_DEN_ID" value="<?php echo $this->getView()->idComentario ?>">
                                        <input type="hidden" id="FK_CIDADAOS_USU_ID" name="FK_CIDADAOS_USU_ID" value="<?php echo $_SESSION['id'] ?>">
                                        <div class="d-flex justify-content-end my-2">
                                            <input class="btn btn-enviar w-25" id="botaoEnviar" type="submit" value="Enviar Comentário">
                                        </div>
                                </form>   
                                <a href='/dashboard/feedDenuncia'><button class="form-control btn btn-default">Voltar</button></a>     
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
