<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
           <li class="breadcrumb-item">
            <a href="/md5/incidentes">Gerenciamento de Incidentes</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar Incidente</li>
        </ol>

        <!-- Formulário de Edição -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Cadastro de Incidente</div>
          <div class="card-body">
              <form>
                <div style="text-align: center;">
                  <p style="font-size: 128px;"><i class="fas fa-ambulance"></i></p>
                </div>
                   
                <div class="form-group">
                  <div class="row">
                    <div class="col-3 ml-auto">
                      <label for="Login">Nº Registro</label>
                      <input type="text" class="form-control" name="id" id="id" placeholder="Numero do Registro">
                    </div>
                    <div class="col-3">
                      <label for="Login">Data/Hora Ocorrência</label>
                      <input type="datetime" class="form-control" name="data" id="data" placeholder="Data e Hora da Ocorrência do Incidente">
                    </div>
                    <div class="col-3 mr-auto">
                      <label for="Login">Tipo</label>
                      <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de Incidente">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-9 mx-auto">
                      <label for="Login">Observações Médicas</label>
                      <textarea class="form-control" rows="5" name="observacoes" id="observacoes" placeholder=""></textarea> 
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