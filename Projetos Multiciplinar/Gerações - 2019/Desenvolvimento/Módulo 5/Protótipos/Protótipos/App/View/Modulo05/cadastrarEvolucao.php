<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
           <li class="breadcrumb-item">
            <a href="/md5/patologiasIdoso">Gerenciamento de Patologias por Idoso</a>
          </li>
          <li class="breadcrumb-item">
            <a href="/md5/historicoEvolucao">Registro de Evolução de Patologia</a>
          </li>
          <li class="breadcrumb-item active">Cadastro de Registro de Evolução</li>
        </ol>

        <!-- Formulário de Edição -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Cadastro de Registro de Evolução</div>
          <div class="card-body">
              <form>
                <div style="text-align: center;">
                  <p style="font-size: 128px;"><i class="fas fa-notes-medical"></i></p>
                </div>
                   
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 ml-auto">
                      <label for="Login">Data/Hora da Atualização</label>
                      <input type="datetime" class="form-control" name="data" id="data" value="11/05/2019 - 09:35:00">
                    </div>
                    <div class="col-3">
                      <label for="Login">Nome da Patologia</label>
                      <input type="text" class="form-control" name="nome" id="nome" value="Virose" readonly>
                    </div>
                    <div class="col-3 mr-auto">
                      <label for="Login">Grau</label>
                      <input type="text" class="form-control" name="grau" id="grau" value="Médio">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-9 mx-auto">
                      <label for="Login">Observações de Evolução</label>
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