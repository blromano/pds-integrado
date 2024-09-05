<section id="md2" class="container-fluid">
<div id="content-wrapper"> 
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-file-medical"></i>&nbsp; Registro de análise clínica</div>
          <div class="card-body">
           <div id="listaranalise">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Painel Administrativo</a>
          </li>
          <li class="breadcrumb-item active">&nbsp; Tabela de análise clínica</li>
        </ol>
                           
<div class="card mb-6">
          <div class="card-header">
            <i class="fas fa-table"></i>
            &nbsp; Tabela de análise clínica</div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Alergias</th>
                    <th>Tipo sanguíneo</th>
                    <th>Altura</th>
                    <th>Peso</th>
                    <th>Situação atual</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">Editar</a>
                        <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#modalConfirmDelete">Excluir</a>
                    </td>
                  </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>

      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
    </div>
                </div>
            </div>
           

      <!--Body-->

  </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editar doenças</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Alergias</th>
                    <th>Tipo sanguíneo</th>
                    <th>Altura</th>
                    <th>Peso</th>
                    <th>Situação atual</th>
                  </tr>
                </thead>
                <tr>
                    <td><input type="text" style="width: 50px"></input></td>
                    <td><input type="text" style="width: 20px"></input></td>
                    <td><input type="text" style="width: 30px"></input></td>
                    <td><input type="text" style="width: 30px"></input></td>
                    <td><input type="text" style="width: 30px"></input></td>
                    <td><input type="text" style="width: 50px"></input></td>
                  </tr>
                  </tbody>
              </table>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Launch
  modal</button>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-primary" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Confirme a exclusão</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="" class="btn btn-outline-primary">Confirmar</a>
        <a type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>    
</section>    
