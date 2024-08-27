<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
           <li class="breadcrumb-item">
            <a href="/md5/vacinacoes">Gerenciamento de Vacinação</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar Vacinação</li>
        </ol>

        <!-- Formulário de Edição -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Cadastro de Vacinação</div>
          <div class="card-body">
              <form>
                <div style="text-align: center;">
                  <p style="font-size: 128px;"><i class="fas fa-syringe"></i></p>
                </div>
                   
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 ml-auto">
                      <label for="Login">Data da Vacinação</label>
                      <input type="datetime" class="form-control" name="data" id="data" placeholder="Data e Hora da Vacinação">
                    </div>
                    <div class="col-3">
                      <label for="Login">Dose da Vacina (ml)</label>
                      <input type="text" class="form-control" name="dose" id="dose" placeholder="Dose em ml da vacina em questão">
                    </div>
                    <div class="col-3 mr-auto">
                      <label for="Login">Nome da Vacina</label>
                      <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Nome da Vacina">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-9 mx-auto">
                      <label for="Login">Observações Médicas</label>
                      <textarea class="form-control" rows="5" name="observacoes" id="observacoes"></textarea> 
                    </div>
                  </div>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-dark btn-lg">Confirmar Registro</button>
                </div>
              </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->