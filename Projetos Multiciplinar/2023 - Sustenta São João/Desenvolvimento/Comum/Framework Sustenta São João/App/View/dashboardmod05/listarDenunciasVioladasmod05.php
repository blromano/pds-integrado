<html>
        <head>
        <!--Bibliotecas -Sweet Alert-->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">        
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

           
        </head>
    <body>
        <div class="content">        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="areaDePesquisa">
                                <form class="formularioPesquisa">
                                 <p>
                                        Pesquisar setores:<input style='margin-left:10px' type="text" name="pesquisarSetore">
                                        <input type="submit" value="Pesquisar">
                                    </p>
                                    <p>                                 
                                        <button type="submit" class="botaoAdicionar" onclick=""><i class="fas fa-plus"></i> Adicionar</button>
                                    </p>
                                </form>
                            </div>
                            <div class="container-MOD5">                        
                                <form>
                                    <ul class="elementos">
                                        <li class="itemLista1">
                                            Nome do usuário
                                        </li>                        
                                        <li class="itemLista1">
                                            Descrição completa da Denúncia
                                        </li>                                                                
                                        <li class="itemLista1">
                                            Ações
                                        </li>
                                    </ul>                   
                                    <ul class="elementos">
                                        <li class="itemLista2">
                                            Pedro Queixada
                                        </li>                        
                                        <li class="itemLista2">
                                            DENUCIADENUNCIADENUNCIA
                                        </li>                                                        
                                        <li class="itemLista2">
                                            
                                            
                                            <!-- <button class="btn-lupa" onclick="abrirSweetAlert()"><i class="fas fa-search"></i></button> -->
                                            <button class="btn-lupa" id="abrirAlertLupa"><i class="fas fa-search"></i></button>
                                            <input type="submit" value="Punir" id="punir">
                                            <input type="submit" value="Cancelar" id="fecharAlert">   
                                        </li>                                
                                    </ul>                                             
                                </form>                                                                                         
                            </div>
                        </div>    
                    </div>
                </div>
            </div>      
        </div>          
        <div class="container-MOD5">
            <div class="sweet-alert-overlay" id="sweetAlert1">
                <div class="sweet-alert">
                  <h1>Observações</h1>
                  <form class="formulario">
                    <fieldset>
                      <div class="elementosLabel">
                        <label>Nome Do Usuário</label>
                        <input type="text" value="Pedro Queixada">
                      </div>
                      <div class="elementosLabel">
                        <label>Descrição das Denúncias</label>
                        <input type="text" value="Muitos comentário n...">
                      </div>
                      <div class="elementosLabel">
                        <label>Imagens</label>                        
                      </div>
                      <input type="submit" value="Punir" id="punir">
                      <input type="submit" value="Fechar" id="fecharAlert">
                      
                    </fieldset>
                  </form>            
                  <!-- <button id="closeAlert">Fechar</button> -->
                </div>
              </div>

              <div class="sweet-alert-overlay" id="sweetAlert2">
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
                      <input type="submit" class="fecharBotao" value="Cancelar" id="fecharAlert">
                      
                    </fieldset>
                  </form>            
        
       
                
        </div>
        <script>        
            var botaoExcluir = document.getElementById('Confirmar');
            botaoExcluir.addEventListener('click', function() {            
            event.preventDefault();
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você deseja mesmo excluir essa Denúncia?',
                html:    
                '<div class="sweetEstilo">' +
                '<p class="sweetConteudo">Nome:Antônio</p>' +
                '<p class="sweetConteudo">Setor Responsável:Descarte</p>' + 
                '</div>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Excluído!',
                        'O item foi excluído com sucesso.',
                        'success'
                        );
                    }
                });
            });

            function abrirNovaGuia(url) {
                window.open(url, '_blank');
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
            const botaoAbrir = document.getElementById('abrirAlertLupa');
            const botaoFechar = document.getElementById('fecharAlert');
            const botaoPunir = document.getElementById('punir');
            const sweetAlert1 = document.getElementById('sweetAlert1');
            const sweetAlert2 = document.getElementById('sweetAlert2');
            const overlay = document.querySelector('.sweet-alert-overlay');            
            botaoAbrir.addEventListener('click', () => {
                event.preventDefault();
                sweetAlert1.style.display = 'block';

            });
            botaoFechar.addEventListener('click', () => {
                event.preventDefault();
                overlay.style.display = 'none';
            
            });
            botaoPunir.addEventListener('click', () => {
            event.preventDefault();
                sweetAlert1.style.display = 'none';
                sweetAlert2.style.display = 'block';
            });
        </script>
    </body>
</html>                                                                                    