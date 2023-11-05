<?php
require_once CONTROLLERS_PATH.'modules/Checkups/tgordura_controller.php';
$timc = ControllerTGordura::get_tgo_list(1);
?>
<div class="border col-md-10 offset-md-1 align-self-center mt-2 table-responsive-sm">
    <table class="table">
        <thead class="table-borderless">
            <tr>
                <th scope="col">Taxa de Gordura</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Excluir</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timc as $tes): ?>
                <tr> 
                    <td><?= $tes->get_txg_percentual() ?>%</td>
                    <td>
                        <span class="border border-success text-success"><?= $tes->get_txg_status() ?></span>
                    </td>
                    <td><?= $tes->get_txg_data() ?></td>
                    <td><a href="" style="text-decoration: none;">Excluir</a></td>
                    <td><a href="" style="text-decoration: none;">Alterar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>