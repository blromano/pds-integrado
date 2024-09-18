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
                <li class="breadcrumb-item active">Consultas</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center">
                    <img src="../../../img/pen.png" alt=""/>
                    &nbsp&nbsp&nbsp&nbspConsultas Marcadas
                </div>
                <div class="card-body">   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Idoso</th>
                                    <th class="text-center">Data e Hora</th>
                                    <th class="text-center">Local</th>
                                    <th class="text-center">Opinião do idoso</th>
                                    <th class="text-center">Histórico da consulta</th>
                                    <th class="text-center">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Matheus</td>
                                    <td class="text-center">20/05/2019 16:00</td>
                                    <td class="text-center">Sala 1 - Bloco D</td>
                                    <td class="text-center">Muito bom</td>
                                    <td class="text-center">Tudo top</td>
                                    <th class="text-center"><button type="button" class="btn btn-primary float-sm-none" data-toggle="modal" data-target="#ALTERAR" data-whatever="cadastrar">REMARCAR</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated today at 13:00
                    <button type="button" class="btn btn-success float-lg-right" data-toggle="modal" data-target="#cadastro" data-whatever="cadastrar">Agendar Consulta</button>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modais -->

    <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Selecione um idoso:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Matheus</option>
                                <option>Julia</option>
                                <option>Silvana</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Escolha um consultório:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Sala 1 - Bloco D</option>
                                <option>Sala 4 - Consultório</option>
                                <option>Varanda</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Data e Horário:</label>
                            <input type="datetime-local" class="form-control" id="caloria-alimento">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ALTERAR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Selecione um idoso:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Matheus</option>
                                <option>Julia</option>
                                <option>Silvana</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Escolha um consultório:</label>
                            <select class="form-control" id="tipo-alimento">
                                <option>Sala 1 - Bloco D</option>
                                <option>Sala 4 - Consultório</option>
                                <option>Varanda</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Data e Horário:</label>
                            <input type="datetime-local" class="form-control" id="caloria-alimento">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</section>