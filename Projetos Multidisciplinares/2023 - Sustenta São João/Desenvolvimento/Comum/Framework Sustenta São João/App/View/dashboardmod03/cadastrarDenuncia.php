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
          <form name="formDenuncia" action="/dashboard/inserirDenuncia" method="POST" enctype="multipart/form-data">
            <!-- -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold"><p class="text-green">Título</p></label>
                  <input type="text" class="form-control titulo" id="DEN_TITULO" name="DEN_TITULO" placeholder="Título da sua denúncia">
                </div>
              </div>
            </div>

            <!-- -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="font-weight-bold"><p class="text-green">Descrição</p></label>
                  <textarea rows="4" cols="80" class="form-control" id="DEN_DESCRICAO" name="DEN_DESCRICAO" placeholder="Descrição do problema"></textarea>
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
                  <input type="text" class="mt-2 form-control" id="DEN_RUA" name="DEN_RUA" placeholder="Rua">
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" id="DEN_NUMERO" name="DEN_NUMERO" placeholder="Número">
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" id="DEN_BAIRRO" name="DEN_BAIRRO" placeholder="Bairro">
                </div>
              </div>

              <div class="col-md-10">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" id="DEN_COMPLEMENTO" name="DEN_COMPLEMENTO" placeholder="Complemento">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="mt-2 form-control" id="DEN_CEP" name="DEN_CEP" placeholder="CEP">
                </div>
              </div>

            </div>

            <!-- -->
            <div class="row">
              <div class="col-md-12 mt-5 d-flex justify-content-end">
                <input class="btn btn-enviar w-25" id="botaoEnviar" type="submit" value="Enviar denúncia">
              </div>
            </div>
            
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Seleciona o botão Enviar pelo ID        
  var botaoEnviar = document.getElementById('botaoEnviar');

  botaoEnviar.addEventListener('click', function() {

  event.preventDefault(); // Impede o envio padrão do formulário

  Swal.fire({
    title: 'Salvar denúncia?',
    showDenyButton: true,
    confirmButtonText: 'Salvar',
    denyButtonText: `Não salvar`,
  }).then((result) => {
    if (result.isConfirmed) {
      document.formDenuncia.submit();
    } else if (result.isDenied) {
      Swal.fire('A denúncia não foi salva', '', 'info')
    }
  })
  
});
</script>