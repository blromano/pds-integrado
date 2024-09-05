

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title"><?php echo $this->getView()->title; ?></h5>
          </div>
          <div class="card-body">
            <div class=container>
              <!-- Valida o formulário ao clicar no "submit" -->
              <form class="form-mod05" action="">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required >

                <label for="nomeTipoResponsavel">Setor Responsavel</label>
                <textarea id="nomeTipoResponsavel" name="nomeTipoResponsavel" required ></textarea>

                <input type="submit" value="Salvar" id="botaoSalvar" required>            
                <input type="submit" value="Cancelar" id="botaoCancealr" required>            
              </form>
            </div>
          <div>
        </div>
      </div>
    </div>     