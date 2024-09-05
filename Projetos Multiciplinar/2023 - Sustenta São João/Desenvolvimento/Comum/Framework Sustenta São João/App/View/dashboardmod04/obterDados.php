<div class="card">
  <div class="card-header">
    <h5 class="title">
      <?php echo $this->getView()->title; ?>
    </h5>
  </div>
  <div class="card-body">
    <form action="/dashboard/obterDados2" id="my_form" class="form_j" method="POST">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="ponto_coleta">Ponto de Coleta</label>
          <select name="pontoEscolhido" class="form-control text_j">
            <option value="" selected>Selecione o ponto de coleta</option>
            <?php foreach ($this->getView()->pontoColeta as $row) { ?>
              <option value=<?php echo $row->__get('PCO_ID'); ?>><?php echo $row->__get('PCO_NOME') . " - " . $row->__get('PCO_BAIRRO'); ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="data">Período Inicial</label>
          <input type="datetime-local" name="dataInicial" class="form-control text_j">
        </div>
        <div class="form-group col-md-12">
          <label for="data">Período Final</label>
          <input type="datetime-local" name="dataFinal" class="form-control text_j">
        </div>
      </div>
      <div class="row justify-content-end alinhar">
        <div>
          <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Obter Dados</button>
        </div>
      </div>
    </form>
  </div>
</div>