<section id="md6" class="container-fluid">
    <!-- Custom fonts for this template-->
    <link href="<?php echo $this->view->include ?>resources/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo $this->view->include ?>resources/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo $this->view->include ?>resources/css/sb-admin.css" rel="stylesheet">
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Nutrição
                </li>
                <li class="breadcrumb-item active">Alimentos</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center">
                    <img src="../../../img/coffee-cup.png" alt=""/>
                    &nbsp&nbsp&nbsp&nbspAlimentos Cadastrados
                </div>
                <div class="card-body">   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Caloria</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-center">Unidade</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maçã</td>
                                    <td class="text-center">Fruta</td>
                                    <td class="text-center">26 calorias</td>
                                    <td class="text-center">150g</td>
                                    <td class="text-center">Gramas</td>
                                    <th class="text-center"><button type="button" class="btn btn-primary">EDITAR</button></th>
                                    <th class="text-center"><button type="button" class="btn btn-danger">EXCLUIR</button></th>
                                </tr>
                                <tr>
                                    <td>Carne vermelha</td>
                                    <td class="text-center">Carnes</td>
                                    <td class="text-center">144 calorias</td>
                                    <td class="text-center">80g</td>
                                    <td class="text-center">Gramas</td>
                                    <th class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="editar">EDITAR</button></th>
                                    <th class="text-center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">EXCLUIR</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated today at 13:00
                    <button type="button" class="btn btn-success float-lg-right" data-toggle="modal" data-target="#cadastro" data-whatever="cadastrar">Cadastrar alimento</button>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modais -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Alimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome-alimento" placeholder="Carne Vermelha">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Tipo:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Fruta</option>
                                <option>Carne</option>
                                <option>Verdura</option>
                                <option>Legume</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Caloria:</label>
                            <input type="text" class="form-control" id="caloria-alimento" placeholder="144 calorias">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Quantidade:</label>
                            <input type="text" class="form-control" id="quantidade-alimento" placeholder="80g">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Unidade:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Kilogramas</option>
                                <option>Gramas</option>
                                <option>Litros</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir alimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir o alimento?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar alimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome-alimento">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Caloria:</label>
                            <input type="text" class="form-control" id="caloria-alimento" placeholder="Ex: 144 calorias">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Quantidade:</label>
                            <input type="text" class="form-control" id="quantidade-alimento" placeholder="Ex: 80g">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Tipo:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Fruta</option>
                                <option>Carne</option>
                                <option>Verdura</option>
                                <option>Legume</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Unidade:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Kilogramas</option>
                                <option>Gramas</option>
                                <option>Litros</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Cadastrar alimento</button>
                </div>
            </div>
        </div>
    </div>

</section>