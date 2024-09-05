<?php
require_once CONTROLLERS_PATH.'modules/Checkups/psanguinea_controller.php';
$tpsan = ControllerPressaoSanguinea::get_psan_list(1); // substituir numero por logado da session
?>
<div class="border col-md-10 offset-md-1 align-self-center mt-2 table-responsive-sm">
    <table class="table">
        <thead class="table-borderless">
            <tr>
                <th scope="col">mmHg</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Excluir</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tpsan as $tes): ?>
                <tr> 
                    <td><?= $tes->get_pra_pressao_diastolica() ?>/<?= $tes->get_pra_precao_sistolica() ?></td>
                    <td>
                        <span class="border border-success text-success"><?= $tes->get_pra_status() ?></span>
                    </td>
                    <td><?= $tes->get_pra_data() ?></td>
                    <td><a href="" style="text-decoration: none;">Excluir</a></td>
                    <td><a href="" style="text-decoration: none;">Alterar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>