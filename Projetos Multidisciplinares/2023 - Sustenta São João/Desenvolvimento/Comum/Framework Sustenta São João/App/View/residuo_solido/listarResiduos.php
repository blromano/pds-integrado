<div class="card">
    <div class="card-header">
        <div class="row justify-content-between alinhar">
            <div class="">
                <h5 class="title t_a"><?php echo $this->getView()->title; ?></h5>
            </div>
            <div class="">
                <a class="a_j" href="/dashboard/cadastrarResiduo"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Cadastrar</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="form-group search_bar d-flex align-items-center">
            <input id="busca" type="search" class="form-control text_j col-md-11.5" placeholder="Buscar">
            <button id="buscar" type="button" class="btn btn-success btn-sm buscar"><i class="fas fa-search icon"></i></button>
        </div>

        <table class="table_j table-hover table-sm table-striped">
            <caption>
                <div id="emptyMessage" style="display: none;">
                    <p>Nenhum Resíduo Cadastrado</p>
                </div>
                <div id="caption" style="display: none;">
                    <p>Lista de Resíduos</p>
                </div>
            </caption>
            <thead class="thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->getView()->residuo_solido as $dado) { ?>
                    <tr class="residuo-row">
                        <th scope="row" id="<?php echo $dado->__get("RES_ID"); ?>"><?php echo $dado->__get("RES_ID"); ?></th>
                        <td><?php echo $dado->__get("RES_NOME_RESIDUO"); ?></td>
                        <td><?php echo $dado->__get("RES_DESCRICAO"); ?></td>
                        <td>
                            <a class="a_j" href="/dashboard/editarResiduo?id=<?php echo $dado->__get("RES_ID"); ?>"><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button></a>
                            <a class="a_j" data-id="<?php echo $dado->__get('RES_ID'); ?>" onclick="abrirPopup(this, <?php echo $dado->__get('RES_ID'); ?>, '<?php echo $dado->__get('RES_NOME_RESIDUO'); ?>', '<?php echo $dado->__get('RES_DESCRICAO'); ?>')">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div id="popup" class="popUp">
    <div class="header_pop">
        <p class="p_j">Excluir Resíduo</p>
    </div>
    <div class="body_pop">
        <form class="form_j" id="my_form">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="id">ID</label>
                    <input type="number" id="idInput" readonly class="form-control">
                </div>
                <div class="form-group col-md-9">
                    <label for="nome">Nome</label>
                    <input type="text" id="nomeInput" readonly class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input id="descricaoInput" readonly class="form-control">
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
    var nomeInput = document.getElementById('nomeInput');
    var descricaoInput = document.getElementById('descricaoInput');

    function buscarPorID(id, callback) {
        console.log('Chamando buscarPorID com o ID:', id);

        fetch('../DAO/Residuo_SolidoDAO.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                console.log('Dados recuperados com sucesso:', data);

                if (data) {
                    // Armazene os dados em variáveis JavaScript
                    var id = data.RES_ID;
                    var nome = data.RES_NOME_RESIDUO;
                    var descricao = data.RES_DESCRICAO;

                    // Chame a função de callback passando os dados
                    callback(id, nome, descricao);
                } else {
                    console.error('Objeto não encontrado.');
                }
            })
            .catch(error => {
                // Lide com erros de requisição aqui
                console.error('Erro:', error);
            });
    }

    function abrirPopup(element, id, nome, descricao) {
        var popup = document.getElementById('popup');

        // Use PHP ou HTML para inserir os dados nos campos do pop-up
        document.getElementById('idInput').value = id;
        document.getElementById('nomeInput').value = nome;
        document.getElementById('descricaoInput').value = descricao;

        // Atualize o atributo href do botão "Confirmar" com o ID do objeto
        confirmarExclusaoButton.href = '/dashboard/excluirResiduo?id=' + id;

        popup.style.display = 'block';

        confirmarExclusaoButton.addEventListener('click', function() {
            event.preventDefault();

            Swal.fire(
                'Excluído!',
                'O resíduo foi excluído com sucesso.',
                'success'
            ).then((result) => {
                if (result.isConfirmed) {
                    fetch('/dashboard/excluirResiduo?id=' + id, {
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
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
    }

    var residuoList = <?php echo json_encode($this->getView()->residuo_solido); ?>; // Obtenha a lista de residuos do PHP

    var emptyMessage = document.getElementById('emptyMessage');
    var caption = document.getElementById('caption');
    var tableBody = document.querySelector('.table_j tbody');

    if (residuoList.length === 0) {
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
            var colunaDescricao = linha.querySelector("td:nth-child(3)"); // Coluna de descrição é a terceira coluna

            if (colunaId && colunaNome && colunaDescricao) {
                var textoId = colunaId.textContent.toLowerCase();
                var textoNome = colunaNome.textContent.toLowerCase();
                var textoDescricao = colunaDescricao.textContent.toLowerCase();

                if (textoId.includes(termoBusca) || textoNome.includes(termoBusca) || textoDescricao.includes(termoBusca)) {
                    linha.style.display = ""; // Mostra a linha se corresponder à busca
                } else {
                    linha.style.display = "none"; // Oculta a linha se não corresponder à busca
                    if (residuoList.length === 0) {
                        // Se a lista estiver vazia, mostre a mensagem vazia e oculte a tabela
                        emptyMessage.style.display = 'block';
                        tableBody.style.display = 'none';
                    } else {
                        // Se houver objetos na lista, mostre a tabela e oculte a mensagem vazia
                        caption.style.display = 'block';
                        tableBody.style.display = 'table-row-group';
                    };
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