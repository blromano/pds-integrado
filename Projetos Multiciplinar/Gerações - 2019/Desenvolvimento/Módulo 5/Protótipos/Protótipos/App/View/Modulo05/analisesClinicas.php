<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/pesquisa">Pacientes</a>
          </li>
          <li class="breadcrumb-item active">Gerenciamento de Análises Clínicas</li>
        </ol>

        <!-- Prontuário de Paciente -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-file-medical"></i>
            Prontuário do Paciente</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                  <th>Paciente</th>
                  <th>Dados do Paciente</th>
                </thead>
                <tr>
                  <td rowspan="2" style="width: 10%;">
                    <img src="<?php echo $this->view->include ?>resources/img/user.jpg" style="width:200px;height:200px; alt="...">
                  </td>
                  <td class="pb-0">
                    <form class="form-inline">
                      <div class="row container-fluid">
                        <div class="col-lg-1">
                          <label for="ID">Prontuário</label>
                          <input type="text" style="width:100%" class="form-control" name="id" id="id" value="01" readonly>
                        </div>
                        <div class="col-lg-11">
                          <label for="ID">Nome Completo</label>
                          <input type="text" style="width:100%" class="form-control" name="nome" id="nome" value="José da Silva" readonly>
                        </div>              
                      </div>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td class="pb-0">
                     <div class="row container-fluid">
                        <div class="col-lg-6">
                          <label for="ID">Sexo</label>
                          <input type="text" style="width:100%" class="form-control" name="sexo" id="sexo" value="Masculino" readonly>
                        </div>
                        <div class="col-lg-2">
                          <label for="ID">Idade</label>
                          <input type="text" style="width:100%" class="form-control" name="idade" id="idade" value="68 anos" readonly>
                        </div>
                        <div class="col-lg-2">
                          <label for="ID">Altura (cm)</label>
                          <input type="text" style="width:100%" class="form-control" name="altura" id="altura" value="172" readonly>
                        </div> 
                        <div class="col-lg-2">
                          <label for="ID">Peso (kg)</label>
                          <input type="text" style="width:100%" class="form-control" name="peso" id="peso" value="80" readonly>
                        </div>               
                      </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <!-- Pesquisa de Idosos -->
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-10">
                  <i class="fas fa-file-medical"></i>
                  Histórico de Análises Clínicas
                </div>
                <div class="col-2">
                  <a href="/md5/cadastrarAnalise" style="width:100%" class="btn btn-primary btn-sm">Inserir Análise Clínica</a>
                </div>
              </div>
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Data/Hora do Requerimento</th>
                    <th>Tipo</th>
                    <th>Patologia Associada</th>
                    <th>Descrição dos Sintomas</th>
                    <th>Observações Médicas</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>10/05/2019 - 14:55:00</td>
                    <td>Sorologia</td>
                    <td>Virose</td>
                    <td>Febre, Dores e Diarreia</td>
                    <td>O Paciente relatou possuir constantes Ânsias de Vômito.</td>
                    <td><a href="/md5/editarAnalise" class="btn btn-primary btn-sm">Editar</a></td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->