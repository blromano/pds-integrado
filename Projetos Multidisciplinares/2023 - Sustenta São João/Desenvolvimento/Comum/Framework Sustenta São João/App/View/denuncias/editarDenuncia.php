<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
  <style>
    #file-button::file-selector-button {
      display: none;
    }

    .btn-enviar {
      background-color: #3eb84d;
      color: white;
    }

    .text-green{
      color: #3eb84d;
      font-size: 13px;
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
        <form action="/dashboard/editarDenunciaSelecionada" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="DEN_ID" value="<?php echo($_GET['id']); ?>" />   
            <!-- -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <label class="font-weight-bold"><p class="text-green">Título</p></label>
                  <input type="text" class="form-control"  name="DEN_TITULO" id="DEN_TITULO" value="<?php echo $this->getView()->denuncia->__get('DEN_TITULO'); ?>" placeholder="Título da sua denúncia">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold"><p class="text-green">Descrição</p></label>
                  <textarea rows="4" cols="80" class="form-control" id="DEN_DESCRICAO" name="DEN_DESCRICAO" placeholder="Descrição do problema"><?php echo $this->getView()->denuncia->__get('DEN_DESCRICAO'); ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold form-label" for="file-button"><p class="text-green">Selecionar foto/vídeo</p></label>
                <input class="form-control files-input d-flex justify-content-center" id="DEN_FOTO_VIDEO" name="DEN_FOTO_VIDEO" type="file" />
              </div>

            </div>

            <!-- -->
            <div class="row">
            <label class="col-md-12 font-weight-bold"><p class="text-green">Localização</p></label>

              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" name="DEN_RUA" id="DEN_RUA" value="<?php echo $this->getView()->denuncia->__get('DEN_RUA'); ?>" placeholder="Rua">
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" name="DEN_NUMERO" id="DEN_NUMERO" value="<?php echo $this->getView()->denuncia->__get('DEN_NUMERO'); ?>" placeholder="Número">
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control"  name="DEN_BAIRRO" id="DEN_BAIRRO" value="<?php echo $this->getView()->denuncia->__get('DEN_BAIRRO'); ?>" placeholder="Bairro">
                </div>
              </div>

              <div class="col-md-10">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control"  name="DEN_COMPLEMENTO" id="DEN_COMPLEMENTO" value="<?php echo $this->getView()->denuncia->__get('DEN_COMPLEMENTO'); ?>" placeholder="Complemento">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control"  name="DEN_CEP" id="DEN_CEP" value="<?php echo $this->getView()->denuncia->__get('DEN_CEP'); ?>" placeholder="CEP">
                </div>
              </div>

            </div>

            <!-- -->
            <div class="row">
              <div class="col-md-12 mt-5 d-flex justify-content-end">
                <input class="btn btn-enviar w-25" id="botaoEnviar" type="submit" value="Salvar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>