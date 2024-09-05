<div class="card">
    <div class="card-header">
        <div class="row justify-content-between alinhar">
            <div class="">
                <h5 class="title t_a"><?php echo $this->getView()->title; ?></h5>
            </div>
            <div class="">
                <?php
                    if($_SESSION['goc'] == 0)
                    {
                        echo "<a class=\"a_j\" href=\"/dashboard/duvidas\"><button type=\"button\" class=\"btn btn-success btn-sm\"><i class=\"bi bi-plus-circle\"></i> Registrar</button></a>";

                    }
                ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-row align-items-center search_bar">
            <div class="form-group col-md-10 search_bar d-flex align-items-center">
                <input id="busca" type="search" class="form-control text_j col-md-10" placeholder="Buscar">
                <button id="buscar" type="button" class="btn btn-success btn-sm buscar"><i class="fas fa-search icon"></i></button>
            </div>
            <div class="form-group col-md-2 search_bar">
                <select name="filtro" class="form-control filter">
                    <option>Filtrar</option>
                </select>
            </div>
        </div>
        <table class="table_j table-hover table-sm table-striped">
            <caption>
                <div id="emptyMessage" style="display: none;">
                    <p>Nenhum Descarte Cadastrado</p>
                </div>
                <div id="caption" style="display: none;">
                    <p>Lista de Descartes</p>
                </div>
            </caption>
            <thead class="thead">
                <tr>
                    <th scope="col">Tema da Duvida/Feedback</th>
                    <th scope="col">Setor Responsável</th>
                    <th scope="col">Data de Abertura</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->getView()->duvida as $duvida_feedback) { ?>
                    <tr class="residuo-row">
                        <!--<th scope="row" id="<?php /*echo $duvida_feedback->__get("DEF_ID"); */?>"><?php /*echo $duvida_feedback->__get("DEF_ID"); */?></th>-->
                        <?php
                        // Percorra o array $this->getView()->duvidas em busca do elemento correspondente com base no ID
                        /*foreach ($this->getView()->residuo_solido as $dadoR) {
                            if ($dadoR->__get("RES_ID") === $dado->__get("FK_RESIDUOS_SOLIDOS_RES_ID")) {
                                $matchingResiduo = $dadoR;
                                break; // Sai do loop quando encontrar uma correspondência
                            }
                        }*/
                        ?>
                        <td><?php echo $duvida_feedback->__get("DEF_TEMA"); ?></td>
                        <td>
                        <?php
                        foreach($this->getView()->setor as $setorr)
                        {
                            if($setorr->__GET("SET_ID") == $duvida_feedback->__GET("FK_SETORES_SET_ID"))
                            {
                                echo $setorr->__GET("SET_NOME");
                            }
                        }
                        ?>
                        </td>
                        <td><?php echo $duvida_feedback->__get("DEF_DATA_HORA"); ?></td>
                        <td>
                        <?php
                        if($duvida_feedback->__get("DEF_STATUS") == 0)
                        {
                            echo'<font color= "red">Pendente';
                        }
                        else
                        {
                            echo'<font color= "#1BEB11">Respondido';
                        }
                        ?>
                        </td>
                        <td>
                        <?php
                            if(($duvida_feedback->__get("DEF_STATUS") == 0) & ($_SESSION['goc'] == 1))
                            {
                                echo "<a class=\"btn btn-success btn-color btn-size\" style=\"color: white; text-decoration: none\" href=\"/dashboard/responderDuvidas?id=";
                                echo $duvida_feedback->__get("DEF_ID"); 
                                echo "\">Responder</a>";
                            }
                        ?>
                        <a class="btn btn-warning btn-size" style="color: white; text-decoration: none" href="/dashboard/visualizarDuvidas?id=<?php echo $duvida_feedback->__get("DEF_ID"); ?>">Visualizar</a>
                        </td>
                        <?php
                        /*foreach ($this->getView()->pontoColeta as $dadoP) {
                            if ($dadoP->__get("PCO_ID") === $dado->__get("FK_PONTOS_COLETA_PCO_ID")) {
                                $matchingPonto = $dadoP;
                                break;
                            }
                        }*/
                        ?>
                        <!--<td><?php/* echo $matchingPonto->__get("PCO_NOME"); */?></td>
                        <td>
                            <a class="a_j" href="/dashboard/editarDescarte?id=<?php /*echo $dado->__get("DSR_ID");*/ ?>"><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button></a>
                            <a class="a_j" data-id="<?php /*echo $dado->__get('DSR_ID');*/ ?>" onclick="abrirPopup(this, <?php /*echo $dado->__get('DSR_ID'); */?>, '<?php /*echo $matchingResiduo->__get('RES_NOME_RESIDUO'); */?>', '<?php /*echo $dado->__get('DSR_QUANTIDADE'); */?>', '<?php /*echo $dado->__get('DSR_DATA_HORA_DESCARTE'); */?>', '<?php /*echo $matchingPonto->__get('PCO_NOME'); */?>')">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </a>
                        </td>-->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div id="popup" class="popUp">
    <div class="header_pop">
        <p class="p_j">Excluir Descarte</p>
    </div>
    <div class="body_pop">
        <form class="form_j" id="my_form">
            <div class="form-row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" id="idInput" readonly class="form-control text_j">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="ponto_coleta">Ponto de Coleta</label>
                        <input type="text" id="pontoInput" readonly class="form-control text_j">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="tipo">Resíduo</label>
                        <input type="text" id="residuoInput" readonly class="form-control text_j">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidadeInput" readonly class="form-control text_j">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data">Data e Hora</label>
                        <input type="datetime-local" id="dataHoraInput" readonly class="form-control text_j">
                    </div>
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <button type="button" class="btn btn-danger btn-sm" onclick="fecharPopup()">
                        <i class="bi bi-backspace"></i> Cancelar
                    </button>
                    <a class="a_j" id="confirmarExclusao" href="#">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-trash"></i> Confirmar
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var confirmarExclusaoButton = document.getElementById('confirmarExclusao');
    var idInput = document.getElementById('idInput');
    var residuoInput = document.getElementById('residuoInput');
    var quantidadeInput = document.getElementById('quantidadeInput');
    var dataHoraInput = document.getElementById('dataHoraInput');
    var pontoInput = document.getElementById('pontoInput');
    var popup = document.getElementById('popup');

    function buscarPorID(id, callback) {
        console.log('Chamando buscarPorID com o ID:', id);

        fetch('../DAO/Descarte_ResiduoDAO.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                console.log('Dados recuperados com sucesso:', data);

                if (data) {
                    // Armazene os dados em variáveis JavaScript
                    var id = data.DSR_ID;
                    var residuo = data.RES_NOME_RESIDUO;
                    var quantidade = data.DSR_QUANTIDADE;
                    var dataHora = data.DSR_DATA_HORA_DESCARTE;
                    var ponto = data.PCO_NOME;

                    // Chame a função de callback passando os dados
                    callback(id);
                } else {
                    console.error('Descarte não encontrado.');
                }
            })
            .catch(error => {
                // Lide com erros de requisição aqui
                console.error('Erro:', error);
            });
    }

    function abrirPopup(element, id, residuo, quantidade, dataHora, ponto) {

        // Use PHP ou HTML para inserir os dados nos campos do pop-up
        document.getElementById('idInput').value = id;
        document.getElementById('residuoInput').value = residuo;
        document.getElementById('quantidadeInput').value = quantidade;
        document.getElementById('dataHoraInput').value = dataHora;
        document.getElementById('pontoInput').value = ponto;

        // Atualize o atributo href do botão "Confirmar" com o ID do objeto
        confirmarExclusaoButton.href = '/dashboard/excluirDescarteResiduo?id=' + id;

        popup.style.display = 'block';

        confirmarExclusaoButton.addEventListener('click', function() {
            event.preventDefault();

            Swal.fire(
                'Excluído!',
                'O descarte foi excluído com sucesso.',
                'success'
            ).then((result) => {
                if (result.isConfirmed) {
                    fetch('/dashboard/excluirDescarteResiduo?id=' + id, {
                        method: 'DELETE'
                    }).then(response => {
                        if (response.status === 200) {
                            // Item excluído com sucesso, exiba o segundo Sweet Alert
                            window.location.reload();
                        } else {
                            // Lida com erros, caso haja algum problema na exclusão
                            Swal.fire('Erro na exclusão!', '', 'error');
                        }
                    }).catch(error => {
                        console.error('Erro na solicitação:', error);
                    });
                }
            });
        })
    }

    function fecharPopup() {
        popup.style.display = 'none';
    }

    var descarteList = <?php echo json_encode($this->getView()->descarte_residuo); ?>; // Obtenha a lista de residuos do PHP

    var emptyMessage = document.getElementById('emptyMessage');
    var caption = document.getElementById('caption');
    var tableBody = document.querySelector('.table_j tbody');

    if (descarteList.length === 0) {
        // Se a lista estiver vazia, mostre a mensagem vazia e oculte a tabela
        emptyMessage.style.display = 'block';
        tableBody.style.display = 'none';
    } else {
        // Se houver objetos na lista, mostre a tabela e oculte a mensagem vazia
        caption.style.display = 'block';
        tableBody.style.display = 'table-row-group';
    }

    // Função para filtrar os resíduos com base na busca
    function filtrarResiduos() {
        var campoBusca = document.getElementById("busca");
        var termoBusca = campoBusca.value.toLowerCase();

        var linhas = document.querySelectorAll(".residuo-row");

        linhas.forEach(function(linha) {
            var colunaId = linha.querySelector("th"); // Coluna de ID
            var colunaNome = linha.querySelector("td:nth-child(2)"); // Coluna de nome é a segunda coluna
            var colunaQuantidade = linha.querySelector("td:nth-child(3)"); // Coluna de descrição é a terceira coluna
            var colunaData = linha.querySelector("td:nth-child(4)");
            var colunaPonto = linha.querySelector("td:nth-child(5)");

            if (colunaId && colunaNome && colunaQuantidade && colunaData && colunaPonto) {
                var textoId = colunaId.textContent.toLowerCase();
                var textoNome = colunaNome.textContent.toLowerCase();
                var textoQuantidade = colunaQuantidade.textContent.toLowerCase();
                var textoData = colunaData.textContent.toLowerCase();
                var textoPonto = colunaPonto.textContent.toLowerCase();

                if (textoId.includes(termoBusca) || textoNome.includes(termoBusca) || textoQuantidade.includes(termoBusca) || textoData.includes(termoBusca) || textoPonto.includes(termoBusca)) {
                    linha.style.display = ""; // Mostra a linha se corresponder à busca
                } else {
                    linha.style.display = "none"; // Oculta a linha se não corresponder à busca
                }
            }
        });
    }

    // Adicionar um ouvinte de evento para a busca
    var botaoBuscar = document.getElementById("buscar");
    botaoBuscar.addEventListener("click", filtrarResiduos);

    // Adicionar um ouvinte de evento para a entrada no campo de busca
    var campoBusca = document.getElementById("busca");
    campoBusca.addEventListener("input", filtrarResiduos);
</script>