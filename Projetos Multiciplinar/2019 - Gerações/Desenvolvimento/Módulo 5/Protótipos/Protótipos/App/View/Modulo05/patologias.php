<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/md5/patologias">Patologias</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar Patologia</li>
        </ol>

        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-10">
                  <i class="fas fa-file-medical"></i>
                  Patologias
                </div>
                <div class="col-2">
                  <a href="/md5/cadastrarPatologia" style="width:100%" class="btn btn-primary btn-sm">Inserir Patologia</a>
                </div>
              </div>
            </div> 
            
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Gripe</td>
                    <td>Viral</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="/md5/editarPatologia"> Editar </a>
                      <a class="btn btn-primary btn-sm" href="/md5/excluirPatologia"> Excluir </a>
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