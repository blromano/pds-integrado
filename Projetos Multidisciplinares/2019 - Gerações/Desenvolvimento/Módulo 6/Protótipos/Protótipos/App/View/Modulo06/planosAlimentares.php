<section id="md6" class="container-fluid">
    <!-- Custom fonts for this template-->
    <link href="<?php echo $this->view->include ?>resources/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo $this->view->include ?>resources/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo $this->view->include ?>resources/css/sb-admin.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../../../js/wizard.js" type="text/javascript"></script>
    <script src="../../js/multi-step-modal.js" type="text/javascript"></script>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Nutrição
                </li>
                <li class="breadcrumb-item active">Refeição</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header text-center">
                    <img src="../../../img/report.png" alt=""/>
                    &nbsp&nbsp&nbsp&nbspPlanos alimentares
                </div>
                <div class="card-body">   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Data da Refeição</th>
                                    <th class="text-center">Visualizar</th>
                                    <th class="text-center">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">29/05/2019</th>
                                    <th class="text-center"><button type="button" class="btn btn-primary float-sm-none" data-toggle="modal" data-target="#myModal" data-whatever="cadastrar">VISUALIZAR DADOS</button></th>
                                    <th class="text-center"><button type="button" class="btn btn-primary float-sm-none" data-toggle="modal" data-target="#myModalEdit" data-whatever="editar">EDITAR DADOS</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated today at 13:00
                    <button type="button" class="btn btn-success float-lg-right" data-toggle="modal" data-target="#demo-modal-6" data-whatever="cadastrar">Cadastrar plano alimentar</button>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Visualizar Dados -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">29/05/2019</h4>

                </div>
                <div class="modal-body">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="tab text-center" role="presentation" class="active"><a href="#cafe" aria-controls="cafe" role="tab" data-toggle="tab">Café da Manhã</a></li>
                            <li class="tab text-center" role="presentation"><a href="#matinal" aria-controls="matinal" role="tab" data-toggle="tab">Lanche Matinal</a></li>
                            <li class="tab text-center" role="presentation"><a href="#almoco" aria-controls="almoco" role="tab" data-toggle="tab">Almoço</a></li>
                            <li class="tab text-center" role="presentation"><a href="#lanchetarde" aria-controls="lanchetarde" role="tab" data-toggle="tab">Lanche da Tarde</a></li>
                            <li class="tab text-center" role="presentation"><a href="#prejantar" aria-controls="prejantar" role="tab" data-toggle="tab">Lanche Pré-Jantar</a></li>
                            <li class="tab text-center" role="presentation"><a href="#jantar" aria-controls="jantar" role="tab" data-toggle="tab">Jantar</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="cafe"></div>
                            <div role="tabpanel" class="tab-pane" id="matinal">Lanche Matinal</div>
                            <div role="tabpanel" class="tab-pane" id="almoco">Almoço</div>
                            <div role="tabpanel" class="tab-pane" id="lanchetarde">Lanche da Tarde</div>
                            <div role="tabpanel" class="tab-pane" id="prejantar">Lanche Pré-Jantar</div>
                            <div role="tabpanel" class="tab-pane" id="jantar">Jantar</div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Dados -->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">29/05/2019</h4>

                </div>
                <div class="modal-body">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="tab text-center" role="presentation" class="active"><a href="#cafe" aria-controls="cafe" role="tab" data-toggle="tab">Café da Manhã</a></li>
                            <li class="tab text-center" role="presentation"><a href="#matinal" aria-controls="matinal" role="tab" data-toggle="tab">Lanche Matinal</a></li>
                            <li class="tab text-center" role="presentation"><a href="#almoco" aria-controls="almoco" role="tab" data-toggle="tab">Almoço</a></li>
                            <li class="tab text-center" role="presentation"><a href="#lanchetarde" aria-controls="lanchetarde" role="tab" data-toggle="tab">Lanche da Tarde</a></li>
                            <li class="tab text-center" role="presentation"><a href="#prejantar" aria-controls="prejantar" role="tab" data-toggle="tab">Lanche Pré-Jantar</a></li>
                            <li class="tab text-center" role="presentation"><a href="#jantar" aria-controls="jantar" role="tab" data-toggle="tab">Jantar</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="123">
                                <input type="text" placeholder="Pão"><br/>
                                <input type="text" placeholder="1 Unidade"><br/>
                                <input type="text" placeholder="250g"><br/>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="1234">Lanche Matinal</div>
                            <div role="tabpanel" class="tab-pane" id="1235">Almoço</div>
                            <div role="tabpanel" class="tab-pane" id="1236">Lanche da Tarde</div>
                            <div role="tabpanel" class="tab-pane" id="1237">Lanche Pré-Jantar</div>
                            <div role="tabpanel" class="tab-pane" id="1238">Jantar</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success float-lg-right" data-toggle="modal" data-target="#alterar" data-whatever="alterar"> Alterar </Button>

                </div>
            </div>
        </div>
    </div>

    <!-- Cadastrar Dados -->
    <form class="modal multi-step" id="demo-modal-6">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title step-1" data-step="cafedamanha">Café da Manhã</h4>
                    <h4 class="modal-title step-2" data-step="lanchematinal">Lanche Matinal</h4>
                    <h4 class="modal-title step-3" data-step="almoco">Almoço</h4>
                    <h4 class="modal-title step-4" data-step="lanchedatarde">Lanche da Tarde</h4>
                    <h4 class="modal-title step-5" data-step="lancheantesjantar">Lanche Pré-Jantar</h4>
                    <h4 class="modal-title step-6" data-step="jantar">Jantar</h4>
                    <div class="m-progress">
                        <div class="m-progress-bar-wrapper">
                            <div class="m-progress-bar">
                            </div>
                        </div>
                        <div class="m-progress-stats">
                            <span class="m-progress-current">
                            </span>
                            /
                            <span class="m-progress-total">
                            </span>
                        </div>
                        <div class="m-progress-complete">
                            Completed
                        </div>
                    </div>
                </div>
                <div class="modal-body step-1" data-step="cafedamanha">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-body step-2" data-step="lanchematinal">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-body step-3" data-step="almoco">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-body step-4" data-step="lanchedatarde">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-body step-5" data-step="lancheantesjantar">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-body step-6" data-step="jantar">
                    <div class="input_fields_wrap">
                        <div class="border border-dark rounded btn btn-success">
                            <img class="plus" src="../../../img/plus.png" alt=""/>    Adicionar um novo alimento
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <!-- Etapa 1 -->
                    <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Prosseguir</button>
                    <!-- Etapa 2 -->
                    <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Voltar</button>  
                    <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 3)">Prosseguir</button>
                    <!-- Etapa 3 -->
                    <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Voltar</button>  
                    <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 4)">Prosseguir</button>
                    <!-- Etapa 4 -->
                    <button type="button" class="btn btn-primary step step-4" data-step="4" onclick="sendEvent('#demo-modal-3', 3)">Voltar</button>  
                    <button type="button" class="btn btn-primary step step-4" data-step="4" onclick="sendEvent('#demo-modal-3', 5)">Prosseguir</button>
                    <!-- Etapa 5 -->
                    <button type="button" class="btn btn-primary step step-5" data-step="5" onclick="sendEvent('#demo-modal-3', 4)">Voltar</button>  
                    <button type="button" class="btn btn-primary step step-5" data-step="5" onclick="sendEvent('#demo-modal-3', 6)">Prosseguir</button>
                    <!-- Etapa 6 -->
                    <button type="button" class="btn btn-primary step step-6" data-step="6" onclick="sendEvent('#demo-modal-3', 5)">Voltar</button>  
                    <button type="button" class="btn btn-primary step step-6" data-step="6" onclick="sendEvent('#demo-modal-3', 6)">Finalizar</button>
                </div>
            </div>
        </div>
    </form>

    <script src="../../../js/multi-step-modal.js" type="text/javascript"></script>
</section>