<div class="card">
    <div class="card-header">
        <h5 class="title">
            <?php echo $this->getView()->title; ?>
        </h5>
    </div>
    <div class="cardG-body">
        <div class="row">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex align-items-center flex-column">
                        <h5 class="card-title font-weight-bold "> Denúncias Violadas</h5>
                    </div>
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExample" data-slide-to="1"></li>
                            <li data-target="#carouselExample" data-slide-to="2"></li>
                        </ol>
                        <div class="rounded carousel-inner custom-carousel-inner d-flex align-items-center">
                            <div class="carousel-item active">
                                <img src="https://static.todamateria.com.br/upload/pa/is/paisagem-natural-og.jpg"
                                    class="w-100" alt="Imagem do Problema 1"
                                    style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="carousel-item">
                                <img src="https://static.todamateria.com.br/upload/pa/is/paisagem-natural-og.jpg"
                                    class="w-100" alt="Imagem do Problema 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://static.todamateria.com.br/upload/pa/is/paisagem-natural-og.jpg"
                                    class="w-100" alt="Imagem do Problema 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between alinhar">
                            <div class="">
                                <h5 class="title t_a">
                                    <?php echo $this->getView()->title; ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row align-items-center search_bar">
                            <div class="form-group col-md-10 search_bar d-flex align-items-center">
                                <input id="busca" type="search" class="form-control text_j col-md-10"
                                    placeholder="Buscar">
                                <button id="buscar" type="button" class="btn btn-success btn-sm buscar"><i
                                        class="fas fa-search icon"></i></button>
                            </div>
                            <div class="form-group col-md-2 search_bar">
                                <select name="filtro" class="form-control filter">
                                    <option>Filtrar</option>
                                </select>
                            </div>
                        </div>
                        <table class="table_j table-hover table-sm">
                            <caption>
                                <div id="emptyMessage" style="display: none;">
                                    <p>Nenhum Resíduo Cadastrado</p>
                                </div>
                                <div id="caption" style="display: none;">
                                    <p>Lista de Violações</p>
                                </div>
                            </caption>
                            <thead class="thead">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">TITULO DENUNCIA</th>
                                    <th scope="col">DESCRIÇÃO DENUNCIA</th>
                                    <th scope="col"> USUARIO DENUNCIADO</th>
                                    <th scope="col"> MOTIVO VIOLACAO</th>
                                    <th scope="col"> BOTÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->getView()->violacoes as $violacao) {
                                    $id = $violacao->__get('VIO_ID');
                                    $titulo_den = $violacao->__get('DEN_TITULO');
                                    $desc_denuncia = $violacao->__get('DEN_DESCRICAO');
                                    $nome_usuario = $violacao->__get('USU_NOME');
                                    $desc_violacao = $violacao->__get('VIO_DESCRICAO');
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $id; ?>
                                        </td>
                                        <td>
                                            <?php echo $titulo_den; ?>
                                        </td>
                                        <td>
                                            <?php echo $desc_denuncia; ?>
                                        </td>
                                        <td>
                                            <?php echo $nome_usuario; ?>
                                        </td>
                                        <td>
                                            <?php echo $desc_violacao; ?>
                                        </td>
                                        <!-- Área botão -->
                                        <td>
                                        <a href="/dashboard/listarViolacoes?id=" data-id="<?php echo $violacao->__get('VIO_ID'); ?><?php echo $violacao->__get('VIO_ID'); ?>, '<?php echo $violacao->__get('USU_NOME'); ?>', '<?php echo $violacao->__get('DEN_DESCRICAO'); ?>')">
                                                <button type="submit" value= "excluirViolacao" onclick="excluirItem(event)" class="botaoExcluir">
                                                    <i class="bi bi-trash"></i> Cancelar
                                        </button>
                                        </td> <td>
                                            <a href="/dashboard/listarViolacoes?id=<?php echo $violacao->__get('VIO_ID'); ?><?php echo $violacao->__get('VIO_ID'); ?>, '<?php echo $violacao->__get('USU_NOME'); ?>', '<?php echo $violacao->__get('DEN_DESCRICAO'); ?>')">
                                                <button type="submit" value= "Punir" id="abrirSweet"class="FormulariobVioladaBotao">
                                                    <i class="bi bi-trash"></i> Punir
                                                </button>
                                            </a>
                                        </td> 
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="container-MOD5">
        <div class="sweet-alert-overlay" id="sweetAlert1">
            <div class="sweet-alert">
            <h1>Punição</h1>
            <form class="formulario2">
                <fieldset>
                <div class="elementosLabel">
                    <label>Motivo da Punição</label>                        
                    <label><input type="radio" value="op1">Palavras Pejorativas</label>                        
                    <label><input type="radio" value="op2">Ódio Gratuito</label>
                </div>
                <div class="elementosLabel">
                    <label>Outros</label>
                    <textarea></textarea>
                </div>
                <div class="elementosLabel">
                    <label>Punição escolhida  / Tempo de Banimento</label>                        
                    <label><input type="radio" value="op1"> 24h  </label>                        
                    <label><input type="radio" value="op2">7 dias</label>                        
                    <label><input type="radio" value="op3">1 mês</label>
                    <label><input type="radio" value="op3"> Definitivo </label>
                </div>

                <input type="submit" value="Confirmar" id="punir">

                    <?php 

                        if ($_GET['p'] == "execute") {
                            echo "Executei isso";
                        }else{
                            //Não executei nada;
                        }

                    ?>
                <input type="submit" value="Confirmar" id="punir">
                <input type="submit" class="fecharBotao" value="Cancelar" id="fecharAlert">
                
                </fieldset>
            </form>            
            </div>
        </div>
    </div>        
                
        <script> 
                function excluirItem(event) {
                    event.preventDefault();
                    const id = event.target.getAttribute('data-id');

                    Swal.fire({
                        title: 'Deseja mesmo cancelar esta violação?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Faça uma solicitação para excluir o item com o ID
                            fetch(`/dashboard/excluirViolacao?id=${id}`, {
                                method: 'DELETE'
                            })
                            .then(response => {
                                if (response.status === 200) {
                                    // Item excluído com sucesso, exiba o segundo Sweet Alert
                                    Swal.fire('A violação foi cancelada com sucesso!', '', 'success');
                                    window.location.reload();
                                } else {
                                    // Lida com erros, caso haja algum problema na exclusão
                                    Swal.fire('Erro ao cancelar!', '', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Erro na solicitação:', error);
                            });
                        }
                    });
                }
            </script>

        
             <script>
            function abrirSweetAlert() {

                event.preventDefault();
                Swal.fire({
                    title: 'Detalhes',
                    html:    
                    '<div class="sweetEstilo">' +
                    'Nome do Usuário<input type="text" id="nomeUsuario" placeholder="" class="swal2-input" value="Abel Santana"></br>' +
                    'Descrição Completa da Denúncia<input type="text" id="descricao" placeholder="" class="swal2-input" value="Ele fez isso..."></br>' + 
                    'Imagens do Problema<input type="text" id="imagens" placeholder="" class="swal2-input" value=""></br>' + 
                    '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Punir',
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const nomeUsuario = Swal.getPopup().querySelector('#nomeUsuario').value;
                        const descricao = Swal.getPopup().querySelector('#descricao').value;
                        const imagens = Swal.getPopup().querySelector('#imagens').value;
                        if (!nomeUsuario || !descricao || !imagens) {
                            Swal.showValidationMessage('Preencha todos os campos');
                            return false;
                        }
                        return { nomeUsuario: nomeUsuario, descricao: descricao, imagens: imagens };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const nomeUsuario = result.value.nomeUsuario;
                        const descricao = result.value.descricao;
                        const imagens = result.value.imagens;
                    
                        Swal.fire(`Motivo da Punição:
                        <input type="radio" id="opcao1" name="opcoes" value="opcao1" class="radioButtom">
                        <label for="opcao1">Ódio Gratuito</label>
                        <input type="radio" id="opcao2" name="opcoes" value="opcao2">
                        <label for="opcao2">Palavras Pejorativas</label>
                        
                        `);
                    }
                });
            }
        </script>
        <script>
            const botaoAbrir = document.getElementById('abrirSweet');

            botaoAbrir.addEventListener('click', () => {
                event.preventDefault();
                sweetAlert1.style.display = 'block';

            });
           
        </script>
    </body>
</html>                                                                                    
                                            

    
