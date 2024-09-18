<?php
require_once CONTROLLERS_PATH.'modules/Checkups/visao_controller.php';
$tvis = ControllerVisao::get_vis_list(1); // substituir numero por logado da session
?>
<div class="border col-md-10 offset-md-1 align-self-center mt-2 table-responsive-sm">
    <table class="table">
        <thead class="table-borderless">
            <tr>
                <th scope="col">Resultado Teste Astigmatismo</th>
                <th scope="col">Resultado Teste Hipermetropia</th>
                <th scope="col">Resultado Teste Miopia</th>
                <th scope="col">Status Daltonismo</th>
                <th scope="col">Status Astigmatismo</th>
                <th scope="col">Status Hipermetropia</th>
                <th scope="col">Status Miopia</th>
                <th scope="col">Data</th>
                <th scope="col">Excluir</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tvis as $tes): ?>
                <tr> 
                    <td><?= $tes->get_tvi_resposta_astigmatismo() ?></td>
                    <td><?= $tes->get_tvi_resposta_hipermetropia() ?></td>
                    <td><?= $tes->get_tvi_resposta_miopia() ?></td>
                    <td><?= $tes->get_tvi_status_daltonismo() ?></td>
                    <td><?= $tes->get_tvi_status_astigmatismo() ?></td>
                    <td><?= $tes->get_tvi_status_hipermetropia() ?></td>
                    <td><?= $tes->get_tvi_status_miopia() ?></td>
                    <td><?= $tes->get_tvi_data() ?></td>
                    <td><a href="" style="text-decoration: none;">Excluir</a></td>
                    <td><a href="" style="text-decoration: none;">Alterar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>