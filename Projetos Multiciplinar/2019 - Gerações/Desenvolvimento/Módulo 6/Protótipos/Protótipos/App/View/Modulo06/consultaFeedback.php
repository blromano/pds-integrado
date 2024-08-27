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
                <li class="breadcrumb-item active">Feedback Consulta</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center">
                    <img src="../../../img/old-couple.png" alt=""/>
                    &nbsp&nbsp&nbsp&nbspFeedback da consulta
                </div>
                <div class="card-body">   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Nome</th>
                                    <th class="text-center align-middle">Dados/Histórico</th>
                                    <th class="text-center align-middle">Opinião do idoso</th>
                                    <th class="text-center align-middle">Data da consulta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">Matheus Bertholucci Mendonça</td>
                                    <td id="doc-mat" class="text-center align-middle">O paciente se sentia meio mal, cansado, com a cabeça latejando, sentia náuseas e se recusou a comer.</td>
                                    <td id="mat-opi" class="text-center align-middle">Tava top</td>
                                    <td class="text-center align-middle">17/05/2019</td>
                                    <th class="text-center"><button type="button" class="btn btn-success">VISUALIZAR DADOS</button></th>
                                </tr>
                                <tr>
                                    <td class="align-middle">Arthur Lucas</td>
                                    <td class="text-center align-middle">O paciente se sentia meio mal, cansado, com a cabeça latejando, sentia náuseas e se recusou a comer.</td>
                                    <td class="text-center align-middle">Tava ruim</td>
                                    <td class="text-center align-middle">21/05/2019</td>
                                    <th class="text-center align-middle"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">VISUALIZAR DADOS</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated today at 13:00
                    <button type="button" class="btn btn-success float-lg-right" data-toggle="modal" data-target="#feedback" data-whatever="cadastrar">Inserir dados</button>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modais -->

    <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Opinião do idoso</label>
                            <textarea id="opiniao-idoso" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Histórico da consulta</label>
                            <textarea id="historico-consulta" class="form-control"></textarea>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</section>