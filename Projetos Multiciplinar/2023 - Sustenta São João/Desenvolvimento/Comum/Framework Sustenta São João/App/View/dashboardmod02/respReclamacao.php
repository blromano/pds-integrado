<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">
            <?php echo $this->getView()->title; ?>
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="">
              <div class="form-group">
                <label class="text-success title">Usuário</label>
                <p><?php echo $this->getView()->reclamacoes->__get('USU_NOME'); ?></p>
                <!-- <input type="text" class="form-control form-control-infos" disabled='' value=""> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label class="text-success title">Nome da reclamação</label>
                <p><?php echo $this->getView()->reclamacoes->__get('REC_TITULO_RECLAMACAO'); ?></p>
                <!-- <input type="text" class="form-control" disabled="" value=""> -->
              </div>
            </div>
          </div>
          <form action="/dashboard/inserirResposta" method="POST">
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label class="text-success title">Sua resposta</label>
                  <textarea style="resize: none" name="REC_RESPOSTA_RECLAMACAO" id="REC_RESPOSTA_RECLAMACAO" cols="60" rows="10" required></textarea>
                  <input style="display: none" type="text" name="id" id="id" class="form-control" value="<?php echo $_GET['id'] ?>">
                </div>
                <!-- <input type="text" class="form-control" placeholder="Setor de engenharia, tem um buraco aqui no meu bairro meu chapa" disabled=""> -->
              </div>
            </div>
            <div>
              <!-- <button class="btn btn-warning" type=""><a style="color: white; text-decoration: none" href="/dashboard/adminReclamacao">Visualizar Reclamação</a></button> -->
              <a class="btn btn-danger" style="color: white; text-decoration: none" href="/dashboard/previaReclamacao">Voltar</a>
              <button class="btn btn-success" type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var input = document.querySelector("#REC_TITULO_RECLAMACAO");
  input.disabled = true;
</script>