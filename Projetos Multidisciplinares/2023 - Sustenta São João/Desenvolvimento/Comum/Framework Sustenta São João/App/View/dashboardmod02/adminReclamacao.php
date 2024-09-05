<style>
  .form-control-infos {
    background-color: transparent;
    border: none;
  }
</style>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label class="text-success title">Usuário</label>
                  <p><?php echo $this->getView()->reclamacoes->__get('USU_NOME'); ?></p>
                  <!-- <input type="text" class="form-control form-control-infos" id="REC_TITULO_RECLAMACAO" disabled='' value=""> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label class="text-success title">Nome da reclamação</label>
                  <p id="REC_TITULO_RECLAMACAO"><?php echo $this->getView()->reclamacoes->__get('REC_TITULO_RECLAMACAO'); ?></p>
                  <!-- <input type="text" class="form-control" id="REC_TITULO_RECLAMACAO" disabled="" value=""> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label class="text-success title">Descrição do problema</label>
                  <textarea style="resize: none" name="" id="" cols="60" rows="10" disabled=""><?php echo $this->getView()->reclamacoes->__get('REC_DESCRICAO'); ?></textarea>
                  <!-- <input type="text" class="form-control" placeholder="Setor de engenharia, tem um buraco aqui no meu bairro meu chapa" disabled=""> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
              <div class="form-group">
                  <label class="text-success title">Resposta da reclamação (Setor da prefeitura)</label>
                  <textarea style="resize: none" name="" id="" cols="60" rows="10" disabled=""><?php echo $this->getView()->reclamacoes->__get('REC_RESPOSTA_RECLAMACAO'); ?></textarea>
                  <!-- <input type="text" class="form-control" placeholder="Setor de engenharia, tem um buraco aqui no meu bairro meu chapa" disabled=""> -->
                </div>
                </div>
              </div>
            </div>
            <div>
              <a class="btn btn-danger" style="color: white; text-decoration: none" href="/dashboard/previaReclamacao">Voltar</a>
              <!-- <button class="btn btn-warning" type="">Enviar</button> -->
              <!-- <button style="border: none;" type=""></button> -->
              <!-- <button class="btn btn-success" type=""><a style="color: white; text-decoration: none" href="/dashboard/respReclamacao">Responder</a></button> -->
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