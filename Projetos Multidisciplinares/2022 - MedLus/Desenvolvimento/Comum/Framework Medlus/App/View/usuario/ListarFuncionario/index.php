<?php
if (count($this->getView()->funcionarios) < 1) { ?>
    <p>Não existem Funcionários Cadastrados.</p>
<?php } else { ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listagem de Funcionários</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-med">Funcionários</h6>
            <a href="/registrar/funcionario" class="btn btn-sm btn-med">Cadastrar Funcionários</a> <!-- MUDAR AQ O HREF PRO IGUAL DA ROTA -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profissão</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    </tbody>
                    <?php foreach ($this->getView()->funcionarios as $dado) { ?>
                        <tr>
                            <td><?php echo $dado->__get('USU_ID'); ?></td>
                            <td><?php echo $dado->__get('USU_TIPO'); ?></td>
                            <td><?php echo $dado->__get('USU_NOME'); ?></td> <!-- NÃO SEI OQ COLOCAR AQUI ???? -->
                            <td><?php echo $dado->__get('USU_CPF'); ?></td> <!-- NÃO SEI OQ COLOCAR AQUI ???? -->
                            <td><?php echo $dado->__get('USU_EMAIL'); ?></td> <!-- NÃO SEI OQ COLOCAR AQUI ???? -->
                            <td>
                                <a class="btn btn-med" href='funcionarioseditarFuncionarios?id=<?php echo $dado->__get('USU_ID'); ?>'>
                                    Editar
                                </a>
                                <a class="btn btn-danger" href='/funcionario/excluir?id=<?php echo $dado->__get('USU_ID'); ?>'>
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>