<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Atendimentos de Consultas Online Direcionados para Consultas Presenciais</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Prioridade</th>
                        <th>Diagnóstico</th>
                        <th>Data e Horário do Atendimento</th>
                        <th>Local da Consulta</th>
                        <th>Nome do Médico</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Prioridade</th>
                        <th>Diagnóstico</th>
                        <th>Data e Horário do Atendimento</th>
                        <th>Local da Consulta</th>
                        <th>Nome do Médico</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($this->getView()->consultas as $dado) { ?>
                        <tr class="text-center text-nowrap mx-auto">
                            <td scope="row" class="text-success fw-bold"><?php echo $dado->__get("COP_ID") ?></td>
                            <td><?php echo $dado->__get("NOME_PACIENTE") ?></td>
                            <td><?php echo $dado->__get("COP_NIVEL_PRIORIDADE") ?></td>
                            <td><?php echo $dado->__get("CTO_DIAGNOSTICO") ?></td>
                            <td><?php echo $dado->__get("COP_DATA_ATEDIMENTO") ?> - <?php echo $dado->__get("COP_HORA_ATENDIMENTO") ?></td>
                            <td><?php echo $dado->__get("COP_LOCAL_CONSULTA_DIRECIONADA") ?></td>
                            <td><?php echo $dado->__get("NOME_MEDICO") ?></td>
                            <td class="text-center text-nowrap mx-auto">
                                <a href="#">Detalhar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>