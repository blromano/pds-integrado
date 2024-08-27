<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
           <li class="breadcrumb-item">
            <a href="/md5/analisesClinicas">Gerenciamento de Análises Clínicas</a>
          </li>
          <li class="breadcrumb-item active">Editar Análise Clínica</li>
        </ol>


        <!-- Formulário de Edição -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Edição de Análise Clínica</div>
          <div class="card-body">
              <form>
                <div style="text-align: center;">
                  <p style="font-size: 128px;"><i class="fas fa-vial"></i></p>
                </div>
                   
                <div class="form-group">
                  <div class="row">
                    <div class="col-4 ml-auto">
                      <label for="Login">Data do Requerimento</label>
                      <input type="datetime" class="form-control" name="data" id="data" value="10/05/2019 - 14:55:00" readonly>
                    </div>
                    <div class="col-4 mr-auto">
                      <label for="Login">Patologia Associada</label>
                      <input type="text" class="form-control" name="patologia" id="patologia" value="Virose" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-4 ml-auto">
                      <label for="Login">Tipo de Análise</label>
                      <input type="text" class="form-control" name="tipo" id="tipo" value="Sorologia" readonly>
                    </div>
                    <div class="col-4 mr-auto">
                      <label for="Login">Descrição dos Sintomas</label>
                      <input type="text" class="form-control" name="sintomas" id="sintomas" value="Febre, Dores e Diarreia">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-8 mx-auto">
                      <label for="Login">Observações Médicas</label>
                      <textarea class="form-control" rows="5" name="observacoes" id="observacoes" value="O Paciente relatou possuir constantes Ânsias de Vômito."></textarea> 
                    </div>
                  </div>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-dark btn-lg">Confirmar Edição</button>
                </div>
              </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->