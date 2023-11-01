<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
           <li class="breadcrumb-item">
            <a href="/md5/prescricoes">Gerenciamento de Prescrição</a>
          </li>
          <li class="breadcrumb-item active">Visualizar Prescrição</li>
        </ol>

        <!-- Formulário de Edição -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Visualização de Prescrição</div>
          <div class="card-body">
              <form>
                <div style="text-align: center;">
                  <p style="font-size: 128px;"><i class="fas fa-capsules"></i></p>
                </div>
                   
                <div class="form-group">
                  <div class="row">
                    <div class="col-4 ml-auto">
                      <label for="Login">Data do Requerimento</label>
                      <input type="datetime" class="form-control" name="data" id="data" value="10/05/2019 - 14:55:00" readonly>
                    </div>
                    <div class="col-4 mr-auto">
                      <label for="Login">Medicamento</label>
                      <input type="text" class="form-control" name="medicamento" id="medicamento" value="Dipirona" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-4 ml-auto">
                      <label for="Login">Posologia</label>
                      <input type="text" class="form-control" name="posologia" id="posologia" value="4 comprimidos/dia (6 em 6 horas)" readonly>
                    </div>
                    <div class="col-4 mr-auto">
                      <label for="Login">Validade da Prescrição</label>
                      <input type="text" class="form-control" name="validade" id="validade" value="6 meses" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-8 mx-auto">
                      <label for="Login">Observações Médicas</label>
                      <textarea class="form-control" rows="5" name="observacoes" id="observacoes" value="-" readonly></textarea> 
                    </div>
                  </div>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-dark btn-lg">Voltar</button>
                </div>
              </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->