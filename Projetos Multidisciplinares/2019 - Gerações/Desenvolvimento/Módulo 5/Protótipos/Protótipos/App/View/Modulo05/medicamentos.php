<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/medicamentos">Medicamentos</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar Medicamento</li>
        </ol>

        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-10">
                  <i class="fas fa-file-medical"></i>
                  Medicamentos
                </div>
                <div class="col-2">
                  <a href="/md5/cadastrarMedicamento" style="width:100%" class="btn btn-primary btn-sm">Inserir Medicamento</a>
                </div>
              </div>
            </div> 
            
          <!-- BARRAS DE PESQUISA PARA OS MEDICAMENTO -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nome Comercial</th>
                    <th>Nome Químico</th>
                    <th>Laboratório</th>
                    <th>Via</th>
                    <th>Tipo</th>
                    <th>Tarja</th>
                    <th>Função</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>MedicamentoAS</td>
                    <td>MedicamentoAS11</td>
                    <td>Forma A</td>
                    <td>Soro</td>
                    <td>Genético</td>
                    <td>Amarela</td>
                    <td>Antibiótico</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="/md5/editarMedicamento"> Editar </a>
                      <a class="btn btn-primary btn-sm" href="/md5/excluirMedicamento"> Excluir </a>
                    </td>
                  </tr>
                  <tr>
                    <td>MedicamentoOTY</td>
                    <td>MedicamentoOTY33</td>
                    <td>Forma B</td>
                    <td>Alimentação</td>
                    <td>Similar</td>
                    <td>Amarela</td>
                    <td>Antibiótico</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="/md5/editarMedicamento"> Editar </a>
                      <a class="btn btn-primary btn-sm" href="/md5/excluirMedicamento"> Excluir </a>
                    </td>
                  </tr>
                  <tr>
                    <td>MedicamentoPOT</td>
                    <td>MedicamentoOPOT55</td>
                    <td>Forma C</td>
                    <td>Alimentação</td>
                    <td>Original</td>
                    <td>Amarela</td>
                    <td>Antibiótico</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="/md5/editarMedicamento"> Editar </a>
                      <a class="btn btn-primary btn-sm" href="/md5/excluirMedicamento"> Excluir </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->