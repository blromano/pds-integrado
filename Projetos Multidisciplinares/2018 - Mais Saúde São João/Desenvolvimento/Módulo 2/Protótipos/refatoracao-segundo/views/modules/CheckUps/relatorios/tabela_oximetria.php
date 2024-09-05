<?php
require_once CONTROLLERS_PATH.'modules/Checkups/oximetria_controller.php';
$timc = ControllerOximetria::get_oxi_list(1);
?>
<div class="border col-md-10 offset-md-1 align-self-center mt-2 table-responsive-sm">
    <table class="table">
        <thead class="table-borderless">
            <tr>
                <th scope="col">Porcentagem</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col">Excluir</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timc as $tes): ?>
                <tr> 
                    <td><?= $tes->get_sat_porcentagem() ?>%</td>
                    <td><?= $tes->get_sat_data() ?></td>
                    <td>
                        <span class="border border-danger text-danger"><?= $tes->get_sat_status() ?></span>
                    </td>
                    <td><a href="" style="text-decoration: none;">Excluir</a></td>
                    <td><a href="" style="text-decoration: none;">Alterar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>