

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
                <label for="nomeDoSaneamento">Nome</label>
                <input type="text" id="nomeSaneamento" name="nomeSaneamento" required >

                <label for="nomeDoTipoDeSaneamento">Setor Responsavel</label>
                <textarea id="nomeTipoSaneamento" name="nomeTipoSaneamento" required ></textarea>

                <input type="submit" value="Alterar" id="botaoAlterar" required>            
              </form>
            </div>
          <div>
        </div>
      </div>
    </div>     