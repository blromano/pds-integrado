        <link rel="stylesheet" href="/resources/css/verInsc.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <style>
        .titulo {
            text-align: center;
            color: #333;
            margin-top:20px;
        }
    </style>
            <header>
                <h1 class="titulo">Alunos Inscritos em Modalidades</h1>
            </header>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="col-lg-7 title_evento"> Alunos inscritos na modalidade "<?php echo $this->getView()->nomeModalidade?>" do evento "<?php echo $this->getView()->nomeEvento?>"  </div>
                    </div>
                    <br clear="all">

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="centralize">#ID</th>
                                    <th class="centralize">Nome</th>
                                    <th class="centralize">Prontuário</th>
                                    <th class="centralize">Esporte</th>
                                    <th class="centralize">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->getView()->alunos_inscritos_modalidades as $alunos_inscritos) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $alunos_inscritos->__get('ALU_ID'); ?>
                                        </td>
                                        <td>
                                            <?php echo $alunos_inscritos->__get('ALU_NOME'); ?>
                                        </td>
                                        <td>
                                            <?php echo $alunos_inscritos->__get('ALU_PRONTUARIO'); ?>
                                        </td>
                                        <td>
                                            <?php echo $alunos_inscritos->__get('MDE_NOME'); ?>
                                        </td>
                                        <td>
                                            <form action="/listar_alunos_modalidades/verificar" method="POST">
                                                <input type="hidden" id="AIM_ID" name="AIM_ID" value="<?php echo $alunos_inscritos->__get('AIM_ID')?>">
                                                <button type="submit" class="btn btn-primary" style="width: 150px;">Verificar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
