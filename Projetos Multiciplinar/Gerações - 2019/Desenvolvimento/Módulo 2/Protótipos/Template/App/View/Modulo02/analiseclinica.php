<section id="md2" class="container-fluid">
<div id="content-wrapper">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Painel Administrativo</a>
          </li>
          <li class="breadcrumb-item active">Análise Clínica</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"> </i>
              Idoso</div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-1 m-4">
                    <img class="img-fluid rounded-circle float-left img-thumbnail" src="../img/idoso.jpg" alt="">
                  </div>
                  <div class="col-md-2 m-4">
                    <h3>José da Silva</h3>
                    <p>Alergias: -</p>
                    <p>Tipo sanguíneo: O+</p>
                    <p>Situação: Saudável</p>
                    <p>Altura: 183cm</p>
                    <p>Peso: 86KG</p>

                  </div>
                  <div class="col-md-3 m-5">
                    <div class="align-self-center">
                      <a href="doencas" class="btn btn-primary" style="margin-bottom: 1vw" data-toggle="modal" data-target="#modalCart">Editar Análise Clínica</a>
                      <a href="doencas" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Excluir Análise Clínica</a><br>
                    </div>
                  </div>
                </div>
              <div class="card-footer small text-muted">Atualizado 16/05/2019</div>
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
        <h4 class="modal-title" id="myModalLabel">Editar Análise clínica</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Campo</th>
              <th>Novo valor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Alergias</td>
              <td><input type="text" name="alergias"/></td>
            </tr>
            <tr>
              <td>Tipo Sanguíneo</td>
              <td><input type="text" name="tiposang"/></td>
            </tr>
            <tr>
              <td>Situação</td>
              <td><input type="text" name="situacao"/></td>
            </tr>
            <tr>
              <td>Altura</td>
              <td><input type="text" name="altura"/></td>
            </tr>
            <tr>
              <td>Peso</td>
              <td><input type="text" name="peso"/></td>
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
<!-- Modal: modalCart -->

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
        <a href="" class="btn  btn-outline-primary">Ok</a>
        <a type="button" class="btn  btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
</section>