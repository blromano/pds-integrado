<?php
require_once CONTROLLERS_PATH.'modules/Checkups/cp_controller.php';
$tcp = ControllerCP::get_cp_list(1); // substituir numero por logado da session
?>
<div class="border col-md-10 offset-md-1 align-self-center mt-2 table-responsive-sm">
    <table class="table">
        <thead class="table-borderless">
            <tr>
                <th scope="col">IMC</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Excluir</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tcp as $tes): ?>
                <tr> 
                    <td><?= $tes->get_cpr_capacidade() ?></td>
                    <td>
                        <span class="border border-warning text-warning"><?= $tes->get_cpr_status() ?></span>
                    </td>
                    <td><?= $tes->get_cpr_data() ?></td>
                    <td><a href="" style="text-decoration: none;">Excluir</a></td>
                    <td><a href="" style="text-decoration: none;">Alterar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>