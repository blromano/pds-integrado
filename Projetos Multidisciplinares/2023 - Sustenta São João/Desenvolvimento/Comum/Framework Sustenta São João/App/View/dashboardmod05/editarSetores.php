<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
            <div class="cardG-body">
              <div class=containerG>
              <!-- Valida o formulário ao clicar no "submit" --> 
  <form class="form-mod05G" action="/setores/adicionar" method="POST">
                <label for="label">Nome do Setor </label>
                <input type="text" id="SET_NOME" name="SET_NOME" value="<?php echo $this->getView()->setores->__get('SET_NOME'); ?>"> <br>

                <label for="label"> Descrição do Setor</label>
                <input type="text" id="SET_DESCRICAO_SERVICOS" name="SET_DESCRICAO_SERVICOS" value="<?php echo $this->getView()->setores->__get('SET_DESCRICAO_SERVICOS'); ?>"> <br>

                <input type="hidden" name="SET_ID" id="SET_ID" value="<?php echo $this->getView()->setores->__get('SET_ID'); ?>"> <br> >
                <input type="submit" value="Alterar" id="botaoAlterar" required>            
  </form>
  