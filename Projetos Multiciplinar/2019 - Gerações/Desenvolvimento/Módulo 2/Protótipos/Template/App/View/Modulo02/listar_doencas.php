<link rel="stylesheet" href="/CSS/md2.css">
<section id="md2" class="container-fluid">
<div id="content-wrapper"> 
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-file-medical"></i>&nbsp; Doenças</div>
          <div class="card-body">
           <div id="listardoencas">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Painel Administrativo</a>
          </li>
          <li class="breadcrumb-item active">&nbsp; Listar doenças</li>
        </ol>
                           
<div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>&nbsp;Doenças</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Doença</th>
                    <th>Medicamento</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  	<td>1</td>
                  	<td>Diabetes</td>
                    <td>Cloridrato de Metformina</td>
                    <td><a href="" class="btn btn-primary"data-toggle="modal" data-target="#modalCart">Editar</a>&nbsp;<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Excluir</a></td>
                  </tr>
                  <tr>
                  	<td>2</td>
                  	<td>Arritmia</td>
                    <td>Amoxicilina</td>
                    <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">Editar</a>&nbsp;<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Excluir</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
      </div>
    </div>
        </div>
    </div>
    </div>
</div>
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
                    <th>Doença</th>
                    <th>Medicamento</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input style="width: 150px" type="text"/></td>
                    <td><input style="width: 150px" type="text"/></td>
                  </tr>
                  <tr>
                    <td><input style="width: 150px" type="text"/></td>
                    <td><input style="width: 150px" type="text"/></td>
                  </tr>
                  Adicionar Medicamento<i class="far fa-plus-square"></i>
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
<!--Modal: modalConfirmDelete-->
</section>    

