<tr>
    <th scope="row">1</th>
    <td><?php echo $nome_exame = "Exame de Urina"?></td>
    <td><?php echo $nome_paciente = "Victor Emanuela"?></td>
    <td><?php echo $data = "13/12/1981 - 16:00"?></td>
    <td><?php echo $estado_exame = "Aceito"?></td>
    <td class="action-row">
        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#DetalhesExame">Detalhes</a>
        <div class="modal fade" id="DetalhesExame" tabindex="-1" aria-labelledby="DetalhesExame" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $nome_exame = "Exame de Urina"?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title col-sm-auto"><?php echo "ID : ".$id_exame = "12345678"?></h5>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p class="card-text">Nome do Paciente: <?php echo $nome_paciente = "Victor Emanuela"?></p>
                        </li>
                        <li class="list-group-item">
                            <p class="card-text">Data de Criação: <?php echo $data = "13/12/1981"?></p>
                        </li>
                        <li class="list-group-item">
                            <p class="card-text">Prioridade: <?php echo $prioridade = "Alta"?></p>
                        </li>
                        <li class="list-group-item">
                            <p class="card-text">Periodo de Resposta: <?php echo $periodo_resposta = "1 dia"?></p>
                        </li>
                        <li class="list-group-item">
                            <p class="card-text">Setor: <?php echo $setor = "Casa"?></p>
                        </li>
                        <li class="list-group-item">
                            <img src="https://conteudo.imguol.com.br/c/esporte/62/2022/04/23/neymar-em-acao-durante-psg-x-lens-jogo-valido-pelo-campeonato-frances-1650745590042_v2_1x1.png" width="350" height="300"> 
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary">Autorizar</button>
                    <button type="button" class="btn btn-danger">Recusar</button> -->
                    <button type="button" class="btn btn-light"data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#AutorizarExame">Autorizar</a>
        <div class="modal fade" id="AutorizarExame" tabindex="-1" aria-labelledby="AutorizarExame" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-success"data-bs-dismiss="modal">Confirmar</button>
                    <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Cancelar</button>
                </div>
                
                </div>
            </div>
            </div>
        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ExcluirExame">Excluir</a>
        <div class="modal fade" id="ExcluirExame" tabindex="-1" aria-labelledby="ExcluirExame" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $mensagem = "Deseja Prosseguir com a Ação ?"?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-success"data-bs-dismiss="modal">Confirmar</button>
                    <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Cancelar</button>
                </div>
                
                </div>
            </div>
        </div>
    </tr>
</td>