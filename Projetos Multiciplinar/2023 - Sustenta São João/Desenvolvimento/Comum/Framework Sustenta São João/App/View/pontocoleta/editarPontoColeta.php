<div class="card">
  <div class="card-header">
    <div class="row justify-content-between">
      <div class="col">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="/dashboard/alterarPontoColeta" method="POST">
      <div class="row justify-content-start">
        <p class="p_a">Dados pessoais do proprietário</p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Nome</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_NOME" id="PRO_NOME" value="<?php echo $this->getview()->pontoColeta->__get('PRO_NOME'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Telefone</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_TELEFONE" id="PRO_TELEFONE" value="<?php echo $this->getview()->pontoColeta->__get('PRO_TELEFONE'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <b><label>CPF</label></b>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_CPF" id="PRO_CPF" value="<?php echo $this->getview()->pontoColeta->__get('PRO_CPF'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>RG</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_RG" id="PRO_RG" value="<?php echo $this->getview()->pontoColeta->__get('PRO_RG'); ?>">
          </div>
        </div>
      </div>
      <div class="row justify-content-start">
        <p class="p_a">Endereço do proprietário</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form_j">
            <label>Rua</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_RUA" id="PRO_RUA" value="<?php echo $this->getview()->pontoColeta->__get('PRO_RUA'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Número</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_NUMERO" id="PRO_NUMERO" value="<?php echo $this->getview()->pontoColeta->__get('PRO_NUMERO'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Bairro</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_BAIRRO" id="PRO_BAIRRO" value="<?php echo $this->getview()->pontoColeta->__get('PRO_BAIRRO'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>CEP</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_CEP" id="PRO_CEP" value="<?php echo $this->getview()->pontoColeta->__get('PRO_CEP'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Logradouro</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PRO_LOGRADOURO" id="PRO_LOGRADOURO" value="<?php echo $this->getview()->pontoColeta->__get('PRO_LOGRADOURO'); ?>">
          </div>
        </div>
      </div>
      <div class="row justify-content-start">
        <p class="p_a">Dados do Ponto de Coleta</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form_j">
            <label>Nome</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_NOME" id="PCO_NOME" value="<?php echo $this->getview()->pontoColeta->__get('PCO_NOME'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Telefone</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_TELEFONE" id="PCO_TELEFONE" value="<?php echo $this->getview()->pontoColeta->__get('PCO_TELEFONE'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>CNPJ</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_CNPJ" id="PCO_CNPJ" value="<?php echo $this->getview()->pontoColeta->__get('PCO_CNPJ'); ?>"><br>
          </div>
        </div>
      </div>
      <div class="row justify-content-start">
        <p class="p_a">Endereço do Ponto de Coleta</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form_j">
            <label>Rua</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_RUA" id="PCO_RUA" value="<?php echo $this->getview()->pontoColeta->__get('PCO_RUA'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Número</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_NUMERO" id="PCO_NUMERO" value="<?php echo $this->getview()->pontoColeta->__get('PCO_NUMERO'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Bairro</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_BAIRRO" id="PCO_BAIRRO" value="<?php echo $this->getview()->pontoColeta->__get('PCO_BAIRRO'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>CEP</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_CEP" id="PCO_CEP" value="<?php echo $this->getview()->pontoColeta->__get('PCO_CEP'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Logradouro</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_LOGRADOURO" id="PCO_LOGRADOURO" value="<?php echo $this->getview()->pontoColeta->__get('PCO_LOGRADOURO'); ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Latitude</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_LATITUDE" id="PCO_LATITUDE" value="<?php echo $this->getview()->pontoColeta->__get('PCO_LATITUDE'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form_j">
            <label>Longitude</label>
            <input type="text" class="form-control" placeholder="Digite aqui" name="PCO_LONGITUDE" id="PCO_LONGITUDE" value="<?php echo $this->getview()->pontoColeta->__get('PCO_LONGITUDE'); ?>">
          </div>
          <input type="hidden" class="form-control" placeholder="Digite aqui" name="PCO_ID" id="PCO_ID" value="<?php echo $this->getview()->pontoColeta->__get('PCO_ID'); ?>">
        </div>
      </div>
      <div class="row justify-content-end alinhar">
        <div>
          <a class="a_j" href="/dashboard/listarPontosDeColetaCadastrados"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
          <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>